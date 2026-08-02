<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Approval;
use App\Models\Notice;
use App\Models\Course;
use App\Models\Blog;
use App\Models\CoursesCategory;
use App\Models\Lead;
use App\Models\University;
use App\Models\Department;
use App\Models\HomeAbout;
use App\Models\HomeFaq;
use App\Models\HomePage;
use App\Models\SubCourse;
use App\Models\testimonial;
use App\Models\UniversityMode;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function dashboard()
    {
        $leadcount  = Lead::count();
        $coursecount  = Course::count();
        $universitycount  = University::count();
        $blogcount  = Blog::count();
        $leads = Lead::OrderBy('created_at', 'DESC')->take(10)->get();
        return view('admin.content.dashboard', compact('leads', 'leadcount', 'coursecount', 'universitycount', 'blogcount'));
    }

   public function index()
    {
        $banners = HomePage::all();
        $approvals = Approval::all(); 
        $notices = Notice::OrderBy('created_at', 'Desc')->get();
        $about = HomeAbout::first();
        $testimonial = testimonial::with('course')->get();
        $faqs = HomeFaq::all();
        $universities = University::where('status', 1)->select('logo', 'logo_alt', 'name', 'slug')->get();
        $blogs = Blog::where('status', 1)->take(3)->get();

        $categories = Department::with('course')->distinct('name')->orderBy('created_at', 'asc')->get();

        $coursesByCategory = [];
        foreach ($categories as $category) {
            $coursesByCategory[$category->name] = Course::whereHas('department', function ($query) use ($category) {
                $query->where('name', $category->name);
            })
            ->withCount('subCourses')
            ->with('faqs')
            ->with('department', 'program')
            ->withCount('universities')
            ->get();
        }

        return view('front.content.index', compact(
            'categories',
            'coursesByCategory',
            'universities',
            'blogs',
            'banners',
            'about',
            'testimonial',
            'faqs',
            'notices',
            'approvals' 
        ));
    }
    public function aboutus()
    {
        $about = HomeAbout::first();
        $faqs = HomeFaq::all();
        return view('front.content.about', compact('about', 'faqs'));
    }
    public function course()
    {

        $categories = Department::with('course')->distinct('name')->orderBy('name', 'desc')->get();
        $coursesByCategory = [];
        foreach ($categories as $category) {
            $coursesByCategory[$category->name] = Course::whereHas('department', function ($query) use ($category) {
                $query->where('name', $category->name);
            })->withCount('subCourses')->With('faqs')->with('department', 'program')->withCount('universities')->get();
        }
        // dd($coursesByCategory);
        return view('front.content.course.index', compact('categories', 'coursesByCategory'));
    }


    public function courseCats($slug)
    {
        $coursesmode = CoursesCategory::Where('slug', $slug)->first();
        $categories = Department::orderBy('id', 'asc')->get();
        $coursesByCategory = [];
        foreach ($categories as $department) {
            $coursesByCategory[$department->name] = Course::whereHas('department', function ($query) use ($department) {
                $query->where('name', $department->name);
            })->where('category_id', $coursesmode->id)->with('department', 'program')->withCount('universities')->get();
        }
        return view('front.content.course.categories', compact('coursesByCategory', 'coursesmode', 'categories'));
    }
    public function courseDetails($slug)
    {
        $course = Course::where('slug', $slug)->withCount('subCourses')->withCount('universities')->with('faqs')->first();
        $similarCourses = Course::Where('status', 1)->Where('department_id', $course->department_id)->Where('id', '<>', $course->id)->get();
        return view('front.content.course.details', compact('course', 'similarCourses'));
    }
    public function subCourseDetails($cslug, $slug)
    {
        $course = Course::where('slug', $cslug)->withCount('subCourses')->withCount('universities')->with('subCourses')->With('universities')->first();
        $subcourse = SubCourse::Where('course_id', $course->id)->Where('slug', $slug)->with('faqs')->first();
        $similarCourses = Course::Where('status', 1)->Where('department_id', $course->department_id)->Where('id', '<>', $course->id)->get();
        $similarSubCourses = SubCourse::Where('status', 1)->Where('course_id', $course->id)->Where('id', '<>', $subcourse->id)->get();
        // dd($course);
        return view('front.content.subcourse.details', compact('course', 'subcourse', 'similarCourses', 'similarSubCourses'));
    }
    public function university()
    {
        $university = University::Where('status', 1)->With('approvals')->withCount('approvals')->withCount('courses')->get();
        return view('front.content.university.index', compact('university'));
    }
    public function uniCats($slug)
    {
        $mode = UniversityMode::Where('slug', $slug)->first();
        $university = University::Where('mode_id', $mode->id)->Where('status', 1)->With('approvals')->withCount('approvals')->withCount('courses')->get();
        return view('front.content.university.categories', compact('university', 'mode'));
    }
    public function uniDetails($slug)
    {
        $university = University::Where('slug', $slug)->With('approvals')->withCount('approvals')->With('faqs')->withCount('courses')->first();
        $assign_course = Course::whereHas('getAgnCourse', function ($query) use ($university) {
            $query->where('university_id', $university->id);
        })->get();

        $similarUnis = University::Where('status', 1)->Where('id', '<>', $university->id)->With('mode')->get();
        return view('front.content.university.details', compact('university', 'similarUnis', 'assign_course'));
    }
    public function blogIndex()
    {
        // $latestBlog = Blog::Where('status', 1)->With('categories')->OrderBy('created_at', 'DESC')->first();
        $blogs = Blog::Where('status', 1)->OrderBy('created_at', 'DESC')->get();
        return view('front.content.blog.index', compact('blogs'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::Where('slug', $slug)->With('faqs')->With('categories')->first();
        $views = $this->viewCount($blog->id);
        $similarBlogs = Blog::Where('status', 1)->Where('id', '<>', $blog->id)->With('categories')->get();
        return view('front.content.blog.details', compact('blog', 'similarBlogs'));
    }
    public function viewCount($id)
    {
        $blog = Blog::where('id', $id)->first();
        if (isset($blog->view) && is_numeric($blog->view)) {
            $viewsCount = $blog->view + 1;
            $viewUpdate = Blog::find($id);
            $viewUpdate->view = $viewsCount;
            $viewUpdate->update();
        }
        return $viewsCount;
    }

    // public function search(Request $request)
    // {
    //     if ($request->search_val != null) {
    //         $search_val = $request->search_val;
    //         $blogs = Blog::where('name', 'LIKE', '%' . $search_val . '%')->get();
    //         $courses = Course::where('name', 'LIKE', '%' . $search_val . '%')->get();
    //         // $subcourses = SubCourse::where('name', 'LIKE', '%' . $search_val . '%')->get();
    //         $universities = University::where('name', 'LIKE', '%' . $search_val . '%')->get();
    //         return view('front.parts.search-ajax', compact('blogs', 'courses', 'universities'));
    //     }
    // }
}
