<?php

namespace App\Http\Controllers;

use App\Models\CoursesCategory;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CoursesCategoryController extends Controller
{
    public function categoryIndex()
    {
        $categories = CoursesCategory::all();
        return view('admin.content.course-category.index', compact('categories'));
    }
    public function categoryCreate()
    {
        return view('admin.content.course-category.create');
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
            $categories = new CoursesCategory;
            $categories->name = $request['category_name'];
            $categories->slug = Str::slug($request['category_name']);
            $categories->save();
            return response()->json(['status' => '200', 'msg' => 'category added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function categoryEdit(Request $request)
    {
        $categories = CoursesCategory::where('id', $request->id)->first();
        return view('admin.content.course-category.edit', compact('categories'));
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
            $categories =  CoursesCategory::where('id', $request->id)->first();
            $categories->name = $request['category_name'];
            $categories->slug = Str::slug($request['category_name']);
            $categories->update();
            return response()->json(['status' => '200', 'msg' => 'category updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function categoryDestroy(Request $request)
    {
        $categories = CoursesCategory::where('id', $request->id)->first();
        $del_cat = $categories->delete();
        if ($del_cat) {
            return response()->json(['status' => '200', 'msg' => 'category delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
    public function departmentIndex()
    {
        $categories = Department::all();
        return view('admin.content.departments.index', compact('categories'));
    }
    public function departmentCreate()
    {
        return view('admin.content.departments.create');
    }
    public function departmentStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'department_name' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $categories = new Department;
            $categories->name = $request['department_name'];
            $categories->slug = Str::slug($request['department_name']);
            $categories->save();
            return response()->json(['status' => '200', 'msg' => 'department added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function departmentEdit(Request $request)
    {
        $categories = Department::where('id', $request->id)->first();
        return view('admin.content.departments.edit', compact('categories'));
    }

    public function departmentUpdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'department_name' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $categories =  Department::where('id', $request->id)->first();
            $categories->name = $request['department_name'];
            $categories->slug = Str::slug($request['department_name']);
            $categories->update();
            return response()->json(['status' => '200', 'msg' => 'department updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function departmentDestroy(Request $request)
    {
        $categories = Department::where('id', $request->id)->first();
        $del_cat = $categories->delete();
        if ($del_cat) {
            return response()->json(['status' => '200', 'msg' => 'department delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
}
