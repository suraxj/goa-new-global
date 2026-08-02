<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index()
    {

        $testimonial = testimonial::with('course')->get();


        return view('admin.content.testimonials.index', compact('testimonial'));
    }

    public function create()
    {

        $courses = Course::select('name', 'id')->get();
        return view('admin.content.testimonials.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'name' => 'required|string',
            'course_id' => 'required|string',
            'rating' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
            'content' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $testimonial = new testimonial;
            $testimonial->name = $request['name'];
            $testimonial->course_id = $request['course_id'];
            $testimonial->rating = $request['rating'];
            $testimonial->content = $request['content'];
            if ($request->file('image')) {
                $file = $request->file('image');
                $name =  $request['name']. '_testimonials' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/testimonials/', $name);
                $testimonial->image = 'new-assets/img/testimonials/' . $name;
            }

            $testimonial->save();

            return response()->json(['status' => '200', 'msg' => 'Testimonial added successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function edit(Request $request)
    {
        $testimonial = testimonial::where('id', $request->id)->first();
        $courses = Course::select('name', 'id')->get();
        return view('admin.content.testimonials.edit', compact('testimonial', 'courses'));
    }

    public function update(Request $request)
    {

        $validate = Validator::make($request->all(), [

            'name' => 'required|string',
            'course_id' => 'required|string',
            'rating' => 'required|string',
            'content' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $testimonial = testimonial::find($request['id']);
            $testimonial->name = $request['name'];
            $testimonial->course_id = $request['course_id'];
            $testimonial->rating = $request['rating'];
            $testimonial->content = $request['content'];
            if ($request->file('image')) {
                $old = $testimonial->image;
                if (file_exists(public_path() . '/' . $old)) {
                    unlink(public_path() . '/' . $old);
                }
                $file = $request->file('image');
                $name = $request['name'] . '_testimonials' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/testimonials/', $name);
                $testimonial->image = 'new-assets/img/testimonials/' . $name;
            }
            $testimonial->update();
            return response()->json(['status' => '200', 'msg' => 'Course updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request){
        $testimonial = testimonial::where('id', $request->id)->first();
        $testimonial_img = $testimonial->image;
        $del_cat = $testimonial->delete();
        if ($del_cat) {
            if (file_exists(public_path(). '/'. $testimonial_img)) {
                unlink(public_path(). '/'. $testimonial_img);
            }
            return response()->json(['status' => '200','msg' => 'Testimonial deleted successfully']);
        } else {
            return response()->json(['status' => '500','msg' => 'Failed to delete Testimonial']);
        }
    }
}
