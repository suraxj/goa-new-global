<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubCourse;
use App\Models\SubCourseFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SubCourseController extends Controller
{
    public function index()
    {
        $courses = SubCourse::orderBy('updated_at', 'desc')->get();;
        return view('admin.content.sub-course.index', compact('courses'));
    }

    public function create(Request $request)
    {
        $categories = Course::orderBy('name', 'asc')->get();
        return view('admin.content.sub-course.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'name' => 'required|string',
            'category' => 'required|string',
            'fees' => 'required|string',
            'duration' => 'required|string',
            'eligbilty' => 'required|string',
            'course_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
            'short_description' => 'required|string',
            'content' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $courses = new SubCourse;
            $courses->course_id = $request['category'];
            $courses->name = $request['name'];
            $courses->duration = $request['duration'];
            $courses->eligibilty = $request['eligbilty'];
            $courses->fees = $request['fees'];
            $courses->short_content = $request['short_description'];
            $courses->content = $request['content'];
            $courses->alt = $request['image_alt'];
            $courses->meta_title = $request['meta_title'] ? $request['meta_title'] : $request['name'];
            $courses->meta_description = $request['meta_description'] ? $request['meta_description'] : $request['short_description'];
            $courses->ld_schema = $request['ld_schema'];
            $courses->slug = $request['slug'] ? Str::slug($request['slug']) : Str::slug($request['name']);
            if ($request->file('course_image')) {
                $file = $request->file('course_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/sub-courses/', $name);
                $courses->image = 'new-assets/img/sub-courses/' . $name;
            }


            $courses->save();
            return response()->json(['status' => '200', 'msg' => 'Sub-course added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function edit(Request $request)
    {
        $courses = SubCourse::where('id', $request->id)->first();
        $categories = Course::orderBy('name', 'asc')->get();
        return view('admin.content.sub-course.edit', compact('courses', 'categories'));
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'name' => 'required|string',
            'category' => 'required|string',
            'fees' => 'required|string',
            'duration' => 'required|string',
            'eligbilty' => 'required|string',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $courses = SubCourse::where('id', $request->id)->first();
            $courses->course_id = $request['category'];
            $courses->name = $request['name'];
            $courses->duration = $request['duration'];
            $courses->eligibilty = $request['eligbilty'];
            $courses->fees = $request['fees'];
            $courses->short_content = $request['short_description'];
            $courses->content = $request['content'];
            $courses->alt = $request['image_alt'];
            $courses->meta_title = $request['meta_title'];
            $courses->meta_description = $request['meta_description'];
            $courses->ld_schema = $request['ld_schema'];
            $courses->slug = $request['slug'] ? Str::slug($request['slug']) : $courses->slug;
            if ($request->file('course_image')) {
                $old = $courses->logo;
                if (file_exists(public_path() . '/' . $old)) {
                    unlink(public_path() . '/' . $old);
                }
                $file = $request->file('course_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/sub-courses/', $name);
                $courses->image = 'new-assets/img/sub-courses/' . $name;
            }


            $courses->update();
            return response()->json(['status' => '200', 'msg' => 'Sub-course updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function destroy(Request $request)
    {
        $course = SubCourse::where('id', $request->id)->first();
        $course_img = $course->image;
        $del_cat = $course->delete();
        if ($del_cat) {
            unlink(public_path() . '/' . $course_img);
            return response()->json(['status' => '200', 'msg' => 'Sub-course delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }

    public function changeStatus(Request $request)
    {
        $course = SubCourse::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function faqIndex()
    {
        $faqs = SubCourseFaq::OrderBy('created_at', 'DESC')->With('subCourse')->get();
        return view('admin.content.sub-course-faq.index', compact('faqs'));
    }

    public function faqCreate()
    {
        $courses = Course::OrderBy('name', 'asc')->whereHas('subCourses')->get();
        return view('admin.content.sub-course-faq.create', compact('courses'));
    }
    public function subs(Request $request)
    {
        $subs = SubCourse::OrderBy('name', 'asc')->where('course_id', $request->id)->select('course_name', 'id')->get();
        return response()->json(['status' => '200', 'subs' => $subs]);
    }

    public function storeFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'subcourse_id' => 'required|string',
            'course_id' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = new SubCourseFaq;
            $faqs->course_id = $request['course_id'];
            $faqs->sub_course_id = $request['subcourse_id'];
            $faqs->question = $request['question'];
            $faqs->answer = $request['answer'];

            $faqs->save();
            return response()->json(['status' => '200', 'msg' => 'faq added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function editFaq(Request $request)
    {
        $faq = SubCourseFaq::where('id', $request->id)->first();
        $courses = Course::all();
        $sub_courses = SubCourse::all();
        return view('admin.content.sub-course-faq.edit', compact('faq', 'courses', 'sub_courses'));
    }

    public function updateFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'subcourse_id' => 'required|string',
            'course_id' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = SubCourseFaq::where('id', $request->id)->first();
            $faqs->course_id = $request['course_id'];
            $faqs->sub_course_id = $request['subcourse_id'];
            $faqs->question = $request['question'];
            $faqs->answer = $request['answer'];

            $faqs->update();
            return response()->json(['status' => '200', 'msg' => 'faq updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function destroyFaq(Request $request)
    {
        $faqs = SubCourseFaq::where('id', $request->id)->first();

        $del_cat = $faqs->delete();
        if ($del_cat) {

            return response()->json(['status' => '200', 'msg' => 'faq deleted succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
}
