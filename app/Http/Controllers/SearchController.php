<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Blog;
use App\Models\University;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        if ($request->search_val != null) {
            $search_val = $request->search_val;
            $blogs = Blog::where('name', 'LIKE', '%' . $search_val . '%')->get();
            $courses = Course::where('name', 'LIKE', '%' . $search_val . '%')->get();
            // $subcourses = SubCourse::where('name', 'LIKE', '%' . $search_val . '%')->get();
            $universities = University::where('name', 'LIKE', '%' . $search_val . '%')->get();
            return view('front.parts.search-ajax', compact('blogs', 'courses', 'universities'));
        }
    }
}
