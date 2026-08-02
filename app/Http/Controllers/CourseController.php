<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseFaq;
use App\Models\CoursesCategory;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('updated_at', 'desc')->get();;
        return view('admin.content.course.index', compact('courses'));
    }

    public function create(Request $request)
    {
        $categories = CoursesCategory::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        return view('admin.content.course.create', compact('categories', 'departments'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'name' => 'required|string',
            'department' => 'required|string',
            'full_name' => 'required|string',
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
            $courses = new Course;
            $courses->category_id = $request['category'];
            $courses->department_id = $request['department'];
            $courses->name = $request['name'];
            $courses->full_name = $request['full_name'];
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
                $file->move(public_path() . '/new-assets/img/courses/', $name);
                $courses->image = 'new-assets/img/courses/' . $name;
            }


            $courses->save();
            return response()->json(['status' => '200', 'msg' => 'Course added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function edit(Request $request)
    {
        $courses = Course::where('id', $request->id)->first();
        $categories = CoursesCategory::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        return view('admin.content.course.edit', compact('courses', 'categories', 'departments'));
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'name' => 'required|string',
            'department' => 'required|string',
            'full_name' => 'required|string',
            'fees' => 'required|string',
            'duration' => 'required|string',
            'eligbilty' => 'required|string',
            'short_description' => 'required|string',
            'content' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $courses = Course::where('id', $request->id)->first();
            $courses->category_id = $request['category'];
            $courses->department_id = $request['department'];
            $courses->name = $request['name'];
            $courses->full_name = $request['full_name'];
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
                $old = $courses->image;
                if (file_exists(public_path() . '/' . $old)) {
                    unlink(public_path() . '/' . $old);
                }
                $file = $request->file('course_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/courses/', $name);
                $courses->image = 'new-assets/img/courses/' . $name;
            }


            $courses->update();
            return response()->json(['status' => '200', 'msg' => 'Course updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function destroy(Request $request)
    {
        $course = Course::where('id', $request->id)->first();
        $course_img = $course->image;
        $del_cat = $course->delete();
        if ($del_cat) {
            unlink(public_path() . '/' . $course_img);
            return response()->json(['status' => '200', 'msg' => 'Course delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }

    public function changeStatus(Request $request)
    {
        $course = Course::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function faqIndex()
    {
        $faqs = CourseFaq::OrderBy('created_at', 'DESC')->With('course')->get();
        return view('admin.content.course-faq.index', compact('faqs'));
    }

    public function faqCreate()
    {
        $courses = Course::OrderBy('name', 'asc')->get();
        return view('admin.content.course-faq.create', compact('courses'));
    }

    public function storeFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'course_id' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = new CourseFaq;
            $faqs->course_id = $request['course_id'];
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
        $faq = CourseFaq::where('id', $request->id)->first();
        $courses = Course::all();
        return view('admin.content.course-faq.edit', compact('faq', 'courses'));
    }

    public function updateFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'content' => 'required|string',
            'course_id' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = CourseFaq::where('id', $request->id)->first();
            $faqs->course_id = $request['course_id'];
            $faqs->question = $request['question'];
            $faqs->answer = $request['content'];

            $faqs->update();
            return response()->json(['status' => '200', 'msg' => 'faq updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function destroyFaq(Request $request)
    {
        $faqs = CourseFaq::where('id', $request->id)->first();

        $del_cat = $faqs->delete();
        if ($del_cat) {

            return response()->json(['status' => '200', 'msg' => 'faq deleted succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
}
