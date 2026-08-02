<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CoursesCategoryController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SubCourseController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\WebHomeController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {return view('front.content.index');});



Route::get('/', [WebHomeController::class, 'index'])->name('home');
Route::get('/about', [WebHomeController::class, 'aboutus'])->name('about');
// Route::get('/course', [WebHomeController::class, 'course'])->name('course-index');
Route::get('/course/{slug}', [WebHomeController::class, 'courseDetails'])->name('course-details');
Route::get('/courses/{slug}', [WebHomeController::class, 'courseCats'])->name('course-categories');
Route::get('/course/{cslug}/{slug}', [WebHomeController::class, 'subCourseDetails'])->name('sub-course-details');
// Route::get('/university', [WebHomeController::class, 'university'])->name('university-index');
Route::get('/university/{slug}', [WebHomeController::class, 'uniDetails'])->name('university-details');
Route::get('/universities/{slug}', [WebHomeController::class, 'uniCats'])->name('university-categories');
Route::get('/blog', [WebHomeController::class, 'blogIndex'])->name('blog-index');
Route::get('/blog/{slug}', [WebHomeController::class, 'blogDetails'])->name('blog-details');
Route::view('/contact', 'front.content.contact')->name('contact');
Route::view('/term-conditions', 'front.content.term-conditions')->name('term-conditions');
Route::view('/privacy-policy', 'front.content.privacy-policy')->name('privacy-policy');

Route::post('/add_lead', [LeadController::class, 'store'])->name('add_lead');
Route::get('/getSearchResults', [SearchController::class, 'search'])->name('getSearchResults');


Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [WebHomeController::class, 'dashboard'])->name('dashboard');
    // courses Category
    Route::get('/admin/courses/category', [CoursesCategoryController::class, 'categoryIndex'])->name('course-category-index');
    Route::get('/admin/courses/category/create', [CoursesCategoryController::class, 'categoryCreate'])->name('course-category-create');
    Route::post('/admin/courses/category/store', [CoursesCategoryController::class, 'categoryStore'])->name('courses-category-store');
    Route::get('/admin/courses/category/edit/{id}', [CoursesCategoryController::class, 'categoryEdit'])->name('courses-category-edit');
    Route::post('/admin/courses/category/update', [CoursesCategoryController::class, 'categoryUpdate'])->name('courses-category-update');
    Route::post('/admin/courses/category/destroy', [CoursesCategoryController::class, 'categoryDestroy'])->name('courses-category-destroy');
    // courses Department
    Route::get('/admin/courses/program', [CoursesCategoryController::class, 'departmentIndex']);
    Route::get('/admin/courses/program/create', [CoursesCategoryController::class, 'departmentCreate'])->name('courses-program-create');
    Route::post('/admin/courses/program/store', [CoursesCategoryController::class, 'departmentStore'])->name('courses-program-store');
    Route::get('/admin/courses/program/edit/{id}', [CoursesCategoryController::class, 'departmentEdit'])->name('courses-program-edit');
    Route::post('/admin/courses/program/update', [CoursesCategoryController::class, 'departmentUpdate'])->name('courses-program-update');
    Route::post('/admin/courses/program/destroy', [CoursesCategoryController::class, 'departmentDestroy'])->name('courses-program-destroy');
    // courses
    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin-courses-index');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin-courses-create');
    Route::post('/admin/courses/store', [CourseController::class, 'store'])->name('courses-store');
    Route::get('/admin/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses-edit');
    Route::post('/admin/courses/update', [CourseController::class, 'update'])->name('courses-update');
    Route::post('/admin/courses/destroy', [CourseController::class, 'destroy'])->name('courses-destroy');
    // course FAQ
    Route::get('/admin/courses/faq', [CourseController::class, 'faqIndex'])->name('course-faq-index');
    Route::get('/admin/courses/faq/create', [CourseController::class, 'faqCreate'])->name('course-faq-create');
    Route::post('/admin/courses/faq/store', [CourseController::class, 'storeFaq'])->name('course-faq-store');
    Route::get('/admin/courses/faq/edit/{id}', [CourseController::class, 'editFaq'])->name('course-faq-edit');
    Route::post('/admin/courses/faq/update', [CourseController::class, 'updateFaq'])->name('course-faq-update');
    Route::post('/admin/courses/faq/destroy', [CourseController::class, 'destroyFaq'])->name('course-faq-destroy');
    // Sub courses
    Route::get('/admin/sub-courses', [SubCourseController::class, 'index'])->name('admin-sub-courses-index');
    Route::get('/admin/sub-courses/create', [SubCourseController::class, 'create'])->name('admin-sub-courses-create');
    Route::post('/admin/sub-courses/store', [SubCourseController::class, 'store'])->name('sub-courses-store');
    Route::get('/admin/sub-courses/edit/{id}', [SubCourseController::class, 'edit'])->name('sub-courses-edit');
    Route::post('/admin/sub-courses/update', [SubCourseController::class, 'update'])->name('sub-courses-update');
    Route::post('/admin/sub-courses/destroy', [SubCourseController::class, 'destroy'])->name('sub-courses-destroy');
    // Sub course FAQ
    Route::get('/admin/sub-courses/faq', [SubCourseController::class, 'faqIndex'])->name('sub-courses-faq-index');
    Route::get('/admin/sub-courses/faq/create', [SubCourseController::class, 'faqCreate'])->name('sub-courses-faq-create');
    Route::get('/subcourseSelect/{id}', [SubCourseController::class, 'subs'])->name('subcourseSelect');
    Route::post('/admin/sub-courses/faq/store', [SubCourseController::class, 'storeFaq'])->name('sub-courses-faq-store');
    Route::get('/admin/sub-courses/faq/edit/{id}', [SubCourseController::class, 'editFaq'])->name('sub-courses-faq-edit');
    Route::post('/admin/sub-courses/faq/update', [SubCourseController::class, 'updateFaq'])->name('sub-courses-faq-update');
    Route::post('/admin/sub-courses/faq/destroy', [SubCourseController::class, 'destroyFaq'])->name('sub-courses-faq-destroy');
    // approvals
    Route::get('/admin/approvals', [ApprovalController::class, 'index'])->name('admin-approvals-index');
    Route::get('/admin/approvals/create', [ApprovalController::class, 'create'])->name('admin-approvals-create');
    Route::post('/admin/approvals/store', [ApprovalController::class, 'store'])->name('approvals-store');
    Route::get('/admin/approvals/edit/{id}', [ApprovalController::class, 'edit'])->name('approvals-edit');
    Route::post('/admin/approvals/update', [ApprovalController::class, 'update'])->name('approvals-update');
    Route::post('/admin/approvals/destroy', [ApprovalController::class, 'destroy'])->name('approvals-destroy');
    // university Mode
    Route::get('/admin/university/mode', [UniversityController::class, 'categoryIndex'])->name('university-mode-index');
    Route::get('/admin/university/mode/create', [UniversityController::class, 'categoryCreate'])->name('university-mode-create');
    Route::post('/admin/university/mode/store', [UniversityController::class, 'categoryStore'])->name('courses-category-store');
    Route::get('/admin/university/mode/edit/{id}', [UniversityController::class, 'categoryEdit'])->name('courses-category-edit');
    Route::post('/admin/university/mode/update', [UniversityController::class, 'categoryUpdate'])->name('courses-category-update');
    Route::post('/admin/university/mode/destroy', [UniversityController::class, 'categoryDestroy'])->name('courses-category-destroy');
    // university
    Route::get('/admin/university', [UniversityController::class, 'index'])->name('admin-university-index');
    Route::get('/admin/university/create', [UniversityController::class, 'create'])->name('admin-university-create');
    Route::post('/admin/university/store', [UniversityController::class, 'store'])->name('university-store');
    Route::get('/admin/university/edit/{id}', [UniversityController::class, 'edit'])->name('university-edit');
    Route::post('/admin/university/update', [UniversityController::class, 'update'])->name('university-update');
    Route::post('/admin/university/destroy', [UniversityController::class, 'destroy'])->name('university-destroy');
    // university FAQ
    Route::get('/admin/university/faq', [UniversityController::class, 'faqIndex'])->name('university-faq-index');
    Route::get('/admin/university/faq/create', [UniversityController::class, 'createFaq'])->name('university-faq-create');
    Route::post('/admin/university/faq/store', [UniversityController::class, 'storeFaq'])->name('university-faq-store');
    Route::get('/admin/university/faq/edit/{id}', [UniversityController::class, 'editFaq'])->name('university-faq-edit');
    Route::post('/admin/university/faq/update', [UniversityController::class, 'updateFaq'])->name('university-faq-update');
    Route::post('/admin/university/faq/destroy', [UniversityController::class, 'destroyFaq'])->name('university-faq-destroy');
    Route::get('/admin/university/assign-approvals/{id}', [UniversityController::class, 'assignApprovals'])->name('assign-approvals');
    Route::get('/admin/university/assign-courses/{id}', [UniversityController::class, 'assignCourses'])->name('assign-courses');
    Route::post('/changeApprovalStatus', [UniversityController::class, 'changeApprovalStatus'])->name('changeApprovalStatus');
    Route::post('/changeCourseAssignStatus', [UniversityController::class, 'changeCourseAssignStatus'])->name('changeCourseAssignStatus');
    // Blog Category
    Route::get('/admin/blog/category', [BlogController::class, 'categoryIndex'])->name('blog-category-index');
    Route::get('/admin/blog/category/create', [BlogController::class, 'categoryCreate'])->name('blog-category-create');
    Route::post('/admin/blog/category/store', [BlogController::class, 'categoryStore'])->name('blog-category-store');
    Route::get('/admin/blog/category/edit/{id}', [BlogController::class, 'categoryEdit'])->name('blog-category-edit');
    Route::post('/admin/blog/category/update', [BlogController::class, 'categoryUpdate'])->name('blog-category-update');
    Route::post('/admin/blog/category/destroy', [BlogController::class, 'categoryDestroy'])->name('blog-category-destroy');
    // Blog
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin-blog-index');
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin-blog-create');
    Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('blog-store');
    Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog-edit');
    Route::post('/admin/blog/update', [BlogController::class, 'update'])->name('blog-update');
    Route::post('/admin/blog/destroy', [BlogController::class, 'destroy'])->name('blog-destroy');
    Route::post('changeBlogStatus/{id}', [BlogController::class, 'changeStatus'])->name('changeBlogStatus');
    Route::post('changeCourseStatus/{id}', [CourseController::class, 'changeStatus'])->name('changeCourseStatus');
    Route::post('changeSubCourseStatus/{id}', [SubCourseController::class, 'changeStatus'])->name('changeSubCourseStatus');
    Route::post('changeUniversityStatus/{id}', [UniversityController::class, 'changeStatus'])->name('changeUniversityStatus');
    // Blog FAQ
    Route::get('/admin/blog/faq', [BlogController::class, 'faqIndex'])->name('blog-faq-index');
    Route::get('/admin/blog/faq/create', [BlogController::class, 'createFaq'])->name('blog-faq-create');
    Route::post('/admin/blog/faq/store', [BlogController::class, 'storeFaq'])->name('blog-faq-store');
    Route::get('/admin/blog/faq/edit/{id}', [BlogController::class, 'editFaq'])->name('blog-faq-edit');
    Route::post('/admin/blog/faq/update', [BlogController::class, 'updateFaq'])->name('blog-faq-update');
    Route::post('/admin/blog/faq/destroy', [BlogController::class, 'destroyFaq'])->name('blog-faq-destroy');
    // Site Settings
    Route::get('/admin/site-settings', [SiteSettingController::class, 'index']);
    Route::post('/admin/site-settings/store', [SiteSettingController::class, 'store'])->name('site-settings-store');

    //home
    Route::get('/admin/homecontent', [HomePageController::class, 'Index'])->name('index');
    // Route::post('/admin/homecontent/store', [HomePageController::class, 'store'])->name('store');
    Route::get('/admin/banner/create', [HomePageController::class, 'create'])->name('admin-banner-create');
    Route::post('/admin/banner/store', [HomePageController::class, 'store'])->name('banner-store');
    Route::get('/admin/banner/edit/{id}', [HomePageController::class, 'edit'])->name('banner-edit');
    Route::post('/admin/banner/update', [HomePageController::class, 'update'])->name('banner-update');
    Route::post('/admin/banner/destroy', [HomePageController::class, 'destroy'])->name('banner-destroy');
    Route::post('/admin/about/content/store', [HomePageController::class, 'aboutstore'])->name('aboutstore');
    //home Faq

    Route::get('/admin/home/faq', [HomePageController::class, 'faqIndex'])->name('faqIndex');
    Route::get('/admin/home/faq/create', [HomePageController::class, 'faqCreate'])->name('faq-create');
    Route::post('/admin/home/faq/store', [HomePageController::class, 'storeFaq'])->name('faq-store');
    Route::get('/admin/home/faq/edit/{id}', [HomePageController::class, 'editFaq'])->name('faq-edit');
    Route::post('/admin/home/faq/update', [HomePageController::class, 'updateFaq'])->name('faq-update');
    Route::post('/admin/home/faq/destroy', [HomePageController::class, 'destroyFaq'])->name('faq-destroy');

    //testimonials
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('index');
    Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->name('create');
    Route::post('/admin/testimonials/store', [TestimonialController::class, 'store'])->name('store');
    Route::get('/admin/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
    Route::post('/admin/testimonials/update', [TestimonialController::class, 'update'])->name('update');
    Route::post('/admin/testimonials/destroy', [TestimonialController::class, 'destroy'])->name('destroy');

    //about

    Route::get('/admin/home/about', [HomePageController::class, 'indexabout'])->name('about');
    Route::get('/admin/about/create', [HomePageController::class, 'createabout'])->name('about-create');
    Route::post('/admin/about/store', [HomePageController::class, 'storeabout'])->name('about-store');
    Route::get('/admin/about/edit/{id}', [HomePageController::class, 'editabout'])->name('about-edit');
    // Leads
    Route::get('/admin/leads', [LeadController::class, 'index'])->name('lead-page');

    // Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);
    // Route::resource('products', ProductController::class);
});
