<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\AssignApproval;
use App\Models\AssignCourse;
use App\Models\Course;
use App\Models\University;
use App\Models\UniversityFaq;
use App\Models\UniversityMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UniversityController extends Controller
{
    public function categoryIndex()
    {
        $categories = UniversityMode::all();
        return view('admin.content.university-mode.index', compact('categories'));
    }
    public function categoryCreate()
    {
        return view('admin.content.university-mode.create');
    }
    public function categoryStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_name' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $categories = new UniversityMode;
            $categories->name = $request['category_name'];
            $categories->slug = Str::slug($request['category_name']);
            $categories->save();
            return response()->json(['status' => '200', 'msg' => 'Mode added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function categoryEdit(Request $request)
    {
        $categories = UniversityMode::where('id', $request->id)->first();
        return view('admin.content.university-mode.edit', compact('categories'));
    }

    public function categoryUpdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_name' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $categories =  UniversityMode::where('id', $request->id)->first();
            $categories->name = $request['category_name'];
            $categories->slug = Str::slug($request['category_name']);
            $categories->update();
            return response()->json(['status' => '200', 'msg' => 'Mode updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function categoryDestroy(Request $request)
    {
        $categories = UniversityMode::where('id', $request->id)->first();
        $del_cat = $categories->delete();
        if ($del_cat) {
            return response()->json(['status' => '200', 'msg' => 'Mode delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }

    public function index()
    {
        $universities = University::all();
        return view('admin.content.university.index', compact('universities'));
    }

    public function create(Request $request)
    {
        $university = University::all();
        $mode = UniversityMode::orderBy('name', 'asc')->get();;
        return view('admin.content.university.create', compact('university', 'mode'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'mode' => 'required|string',
            'name' => 'required|string',
            'location' => 'required|string',
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
            'short_description' => 'required|string',
            'content' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $university = new University;
            $university->name = $request['name'];
            $university->mode_id = $request['mode'];
            $university->location = $request['location'];
            $university->short_content = $request['short_description'];
            $university->content = $request['content'];
            $university->alt = $request['image_alt'];
            $university->logo_alt = $request['logo_alt'];
            $university->meta_title =  $request['meta_title'] ? $request['meta_title'] : $request['name'];
            $university->meta_description = $request['meta_description'] ? $request['meta_description'] : $request['short_description'];
            $university->ld_schema = $request['ld_schema'];
            $university->slug = $request['slug'] ? Str::slug($request['slug']) : Str::slug($request['name']);
            if ($request->file('logo')) {
                $file = $request->file('logo');
                $name = Str::slug($request['name']) . '_logo' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->logo = 'new-assets/img/university/' . $name;
            }
            if ($request->file('banner_image')) {
                $file = $request->file('banner_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->image = 'new-assets/img/university/' . $name;
            }
            if ($request->file('certificate')) {
                $file = $request->file('certificate');
                $name = Str::slug($request['name']) . '_certificate' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->sample_certificate = 'new-assets/img/university/' . $name;
            }
            if ($request->file('brochure')) {
                $file = $request->file('brochure');
                $name = Str::slug($request['name']) . '_brochure' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->brochure = 'new-assets/img/university/' . $name;
            }
            $university->save();
            return response()->json(['status' => '200', 'msg' => 'university added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function edit(Request $request)
    {
        $university = University::where('id', $request->id)->first();
        $mode = UniversityMode::orderBy('name', 'asc')->get();;
        return view('admin.content.university.edit', compact('university', 'mode'));
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'location' => 'required|string',
            'mode' => 'required|string',
            'name' => 'required|string',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'banner_image' => 'image|mimes:jpg,jpeg,png,webp,svg|max:1048',


        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $university =  University::where('id', $request->id)->first();
            $university->name = $request['name'];
            $university->mode_id = $request['mode'];
            $university->location = $request['location'];
            $university->short_content = $request['short_description'];
            $university->content = $request['content'];
            $university->alt = $request['banner_alt'];
            $university->logo_alt = $request['logo_alt'];
            $university->meta_title = $request['meta_title'];
            $university->meta_description = $request['meta_description'];
            $university->ld_schema = $request['ld_schema'];
            $university->slug = $request['slug'] ? Str::slug($request['slug']) : $university->slug;
            if ($request->file('logo')) {
                $old = $university->image;
                if (file_exists(public_path() . '/' . $old)) {
                    unlink(public_path() . '/' . $old);
                }
                $file = $request->file('logo');
                $name = Str::slug($request['name']) . '_logo' . '.'  .$file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->logo = 'new-assets/img/university/' . $name;
            }
            if ($request->file('banner_image')) {
                $old = $university->image;
                if (file_exists(public_path() . '/' . $old)) {
                    unlink(public_path() . '/' . $old);
                }
                $file = $request->file('banner_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->image = 'new-assets/img/university/' . $name;
            }
            if ($request->file('certificate')) {
                $old = $university->sample_certificate;
                if (file_exists(public_path() . '/' . $old)) {
                    unlink(public_path() . '/' . $old);
                }
                $file = $request->file('certificate');
                $name = Str::slug($request['name']) . '_certificate' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->sample_certificate = 'new-assets/img/university/' . $name;
            }
            if ($request->file('brochure')) {
                $old = $university->brochure;
                if ($old) {
                    if (file_exists(public_path() . '/' . $old)) {
                        unlink(public_path() . '/' . $old);
                    }
                }
                $file = $request->file('brochure');
                $name = Str::slug($request['name']) . '_brochure' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/university/', $name);
                $university->brochure = 'new-assets/img/university/' . $name;
            }
           
            $university->update();
            return response()->json(['status' => '200', 'msg' => 'University Updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $university = University::where('id', $request->id)->first();

        $university_logo = $university->logo;
        $university_img = $university->image;
        $university_sample = $university->sample_certificate;
        $university_brochure = $university->brochure;

        $del_cat = $university->delete();
        if ($del_cat) {
            if (file_exists(public_path() . '/' . $university_logo)) {
                unlink(public_path() . '/' . $university_logo);
            }
            if (file_exists(public_path() . '/' . $university_img)) {
                unlink(public_path() . '/' . $university_img);
            }
            if (file_exists(public_path() . '/' . $university_sample)) {
                unlink(public_path() . '/' . $university_sample);
            }
            if (file_exists(public_path() . '/' . $university_brochure)) {
                unlink(public_path() . '/' . $university_brochure);
            }
            return response()->json(['status' => '200', 'msg' => 'University delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }

    public function changeStatus(Request $request)
    {
        $university = University::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function faqIndex()
    {
        $faqs = UniversityFaq::With('university')->get();
        return view('admin.content.university-faq.index', compact('faqs'));
    }
    public function createFaq()
    {
        $unis = University::orderBy('name', 'ASC')->get();
        return view('admin.content.university-faq.create', compact('unis'));
    }

    public function storeFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'university_id' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = new UniversityFaq;
            $faqs->university_id = $request['university_id'];
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
        $faq = UniversityFaq::where('id', $request->id)->first();
        $universities = University::all();
        return view('admin.content.university-faq.edit', compact('faq', 'universities'));
    }

    public function updateFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'university_id' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = UniversityFaq::where('id', $request->id)->first();
            $faqs->university_id = $request['university_id'];
            $faqs->question = $request['question'];
            $faqs->answer = $request['answer'];

            $faqs->update();
            return response()->json(['status' => '200', 'msg' => 'faq update succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }


    public function destroyFaq(Request $request)
    {
        $faqs = UniversityFaq::where('id', $request->id)->first();

        $del_cat = $faqs->delete();
        if ($del_cat) {

            return response()->json(['status' => '200', 'msg' => 'blog delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
    public function assignApprovals(Request $request)
    {
        $university = University::Where('id', $request->id)->first();
        $approvals = Approval::All();
        $assigned = AssignApproval::where('university_id', $university->id)->pluck('approval_id')->toArray();
        return view('admin.content.university.assignApprovals', compact('university', 'approvals', 'assigned'));
    }
    public function changeApprovalStatus(Request $request)
    {
        $status = $request['status'];
        $uni = $request['uni_id'];
        $app = $request['approval_id'];
        if ($status == 1) {
            $assign = new AssignApproval;
            $assign->university_id = $uni;
            $assign->approval_id = $app;
            $saveAssign = $assign->save();
            if ($saveAssign) {
                return response()->json(['status' => '200', 'msg' => 'approval assigned succesfully']);
            } else {
                return response()->json(['status' => '500', 'msg' => 'something went wrong']);
            }
        } elseif ($status == 0) {
            $assign = AssignApproval::Where('university_id', $uni)->Where('approval_id', $app)->delete();
            if ($assign) {
                return response()->json(['status' => '200', 'msg' => 'approval un-assigned succesfully']);
            } else {
                return response()->json(['status' => '500', 'msg' => 'something went wrong']);
            }
        }
    }
    public function assignCourses(Request $request)
    {
        $university = University::Where('id', $request->id)->first();
        $approvals = Course::All();
        $assigned = AssignCourse::where('university_id', $university->id)->pluck('course_id')->toArray();
        return view('admin.content.university.assignCourses', compact('university', 'approvals', 'assigned'));
    }
    public function changeCourseAssignStatus(Request $request)
    {
        $status = $request['status'];
        $uni = $request['uni_id'];
        $app = $request['approval_id'];
        if ($status == 1) {
            $assign = new AssignCourse;
            $assign->university_id = $uni;
            $assign->course_id = $app;
            $saveAssign = $assign->save();
            if ($saveAssign) {
                return response()->json(['status' => '200', 'msg' => 'course assigned succesfully']);
            } else {
                return response()->json(['status' => '500', 'msg' => 'something went wrong']);
            }
        } elseif ($status == 0) {
            $assign = AssignCourse::Where('university_id', $uni)->Where('course_id', $app)->delete();
            if ($assign) {
                return response()->json(['status' => '200', 'msg' => 'course un-assigned succesfully']);
            } else {
                return response()->json(['status' => '500', 'msg' => 'something went wrong']);
            }
        }
    }
}
