<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function categoryIndex()
    {
        $categories = BlogCategory::all();
        return view('admin.content.blog-category.index', compact('categories'));
    }

    public function categoryCreate(Request $request)
    {
        return view('admin.content.blog-category.create');
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
            $categories = new BlogCategory;
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
        $categories = BlogCategory::where('id', $request->id)->first();
        return view('admin.content.blog-category.edit', compact('categories'));
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
            $categories =  BlogCategory::where('id', $request->id)->first();
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
        $categories = BlogCategory::where('id', $request->id)->first();
        $del_cat = $categories->delete();
        if ($del_cat) {
            return response()->json(['status' => '200', 'msg' => 'category delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('admin.content.blog.index', compact('blogs'));
    }

    public function create(Request $request)
    {
        $categories = BlogCategory::all();
        return view('admin.content.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            // 'category' => 'required|string',
            'name' => 'required|string',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
            'short_description' => 'required|string',
            'content' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $categories = new Blog;
            $categories->name = $request['name'];
            // $categories->category_id = $request['category'];
            $categories->short_content = $request['short_description'];
            $categories->content = $request['content'];
            $categories->alt = $request['banner_alt'];
            $categories->slug = $request['slug'] ? $request['slug'] : Str::slug($request['name']);
            $categories->meta_titel = $request['meta_title'] ? $request['meta_title'] : $request['name'];
            $categories->meta_description = $request['meta_description'] ? $request['meta_description'] : $request['short_description'];
            $categories->ld_schema = $request['ld_schema'];

            $categories->slug = $request['slug'] ? Str::slug($request['slug']) : Str::slug($request['name']);
            if ($request->file('banner_image')) {
                $file = $request->file('banner_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/blog/banner/', $name);
                $categories->image = 'new-assets/img/blog/banner/' . $name;
            }
            $categories->save();
            return response()->json(['status' => '200', 'msg' => 'blog added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function edit(Request $request)
    {
        $blogs = Blog::where('id', $request->id)->first();
        $categories = BlogCategory::all();
        return view('admin.content.blog.edit', compact('categories', 'blogs'));
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            // 'category' => 'required|string',
            'name' => 'required|string',
            'short_description' => 'required|string',
            'content' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $blogs = Blog::where('id', $request->id)->first();

            $blogs->name = $request['name'];
            // $blogs->category_id = $request['category'];
            $blogs->short_content = $request['short_description'];
            $blogs->content = $request['content'];
            $blogs->alt = $request['banner_alt'];
            $blogs->meta_titel = $request['meta_title'];
            $blogs->meta_description = $request['meta_description'];
            $blogs->ld_schema = $request['ld_schema'];
            $blogs->slug = $request['slug'] ? Str::slug($request['slug']) : $blogs->slug;
            if ($request->file('banner_image')) {
                $old = $blogs->image;
                unlink(public_path() . '/' . $old);
                $file = $request->file('banner_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/blog/banner/', $name);
                $blogs->image = 'new-assets/img/blog/banner/' . $name;
            }
            $blogs->update();
            return response()->json(['status' => '200', 'msg' => 'blog updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $blogs = Blog::where('id', $request->id)->first();
        $blogs_img = $blogs->image;
        $del_cat = $blogs->delete();
        if ($del_cat) {
            unlink(public_path() . '/' . $blogs_img);
            return response()->json(['status' => '200', 'msg' => 'blog delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }

    public function changeStatus(Request $request)
    {
        $blog = Blog::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function faqIndex()
    {
        $faqs = BlogFaq::with('blog')->get();
        return view('admin.content.blog-faq.index', compact('faqs'));
    }
    public function createFaq()
    {
        $blogs = Blog::all();
        return view('admin.content.blog-faq.create', compact('blogs'));
    }

    public function storeFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'blog_id' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = new BlogFaq;
            $faqs->blog_id = $request['blog_id'];
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
        $faq = BlogFaq::where('id', $request->id)->first();
        $blogs = Blog::all();
        return view('admin.content.blog-faq.edit', compact('faq', 'blogs'));
    }

    public function updateFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'blog_id' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = BlogFaq::where('id', $request->id)->first();
            $faqs->blog_id = $request['blog_id'];
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
        $faqs = BlogFaq::where('id', $request->id)->first();

        $del_cat = $faqs->delete();
        if ($del_cat) {

            return response()->json(['status' => '200', 'msg' => 'faq delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
}
