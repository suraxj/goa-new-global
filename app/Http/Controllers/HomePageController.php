<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HomeAbout;
use App\Models\HomeFaq;
use Illuminate\Support\Str;
use App\Models\HomePage;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomePageController extends Controller
{
    public function Index()
    {
        $about = HomeAbout::first();
        $banners = HomePage::all();

        return view('admin.content.home.index', compact('banners', 'about'));
    }
   public function create(Request $request)
    {
        $banners = HomePage::all();
        return view('admin.content.banner.create', compact('banners'));
    }
    public function store(Request $request)
    {
        try {
            $categories = new HomePage;
            $categories->tag = $request['tag'];
            $categories->link = $request['link'];

            // $categories->slug = $request['slug'] ? Str::slug($request['slug']) : Str::slug($request['name']);
            if ($request->file('image')) {
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                // $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/blog/banner/', $name);
                $categories->image = 'new-assets/img/blog/banner/' . $name;
            }
            $categories->save();
            return response()->json(['status' => '200', 'msg' => 'Banner added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    // public function edit(Request $request)
    // {
    //     $banner = HomePage::where('id', $request->id)->first();
    //     return view('admin.content.banner.edit', compact('banner'));
    // }

    public function edit($banner)
    {
      $banner = HomePage::findOrFail($banner);
      return view('admin.content.banner.edit',compact('banner'));
    }


    public function update($Banner_id, Request $request)
    {
  
      try {
        $Banner = HomePage::findOrFail($Banner_id);
        $Banner->tag = $request->tag;
        $Banner->link = $request->link;

        if ($request->file('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            // $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/new-assets/img/blog/banner/', $name);
            $Banner->image = 'new-assets/img/blog/banner/' . $name;
            $Banner->save();
        return ['status'=>'200', 'msg'=>'Banner Updated successfully!'];
        }
    else{
      $Banner->save();
      return ['status'=>'200', 'msg'=>'Banner Updated successfully!'];
    }
      } catch (\Exception $e) {
          return response()->json(['status'=>$e, 'msg'=>$Banner]);
      }
}

    public function destroy(Request $request)
    {
        $Banners = HomePage::where('id', $request->id)->first();
        $Banners_img = $Banners->image;
        $del_cat = $Banners->delete();
        if ($del_cat) {
            unlink(public_path() . '/' . $Banners_img);
            return response()->json(['status' => '200', 'msg' => 'blog delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }



    public function aboutstore(Request $request)
    {
        if ($request['about_id'] == null) {
            $validate = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
                'heading' => 'required|string',
                'subheading' => 'required|string',
                'multiple_points' => 'required|string',
            ]);
            if ($validate->fails()) {
                return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
            }
            try {
                $about = new HomeAbout;
                $about->heading = $request['heading'];
                $about->subheading = $request['subheading'];
                $about->multiple_points	 = $request['multiple_points'];
                $about->icon_point_1 = $request['icon_point_1'];
                $about->icon_point_2 = $request['icon_point_2'];

                if ($request->file('image')) {
                    $file = $request->file('image');
                    $heading = 'vidya-campus' . '_about_image' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $heading);
                    $about->image = 'new-assets/img/' . $heading;
                }
                if ($request->file('icon_image_1')) {
                    $file = $request->file('icon_image_1');
                    $heading = 'vidya-campus' . '_icon_image_1' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $heading);
                    $about->icon_image_1 = 'new-assets/img/' . $heading;
                }
                if ($request->file('icon_image_2')) {
                    $file = $request->file('icon_image_2');
                    $heading = 'vidya-campus' . '_icon_image_2' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $heading);
                    $about->icon_image_2 = 'new-assets/img/' . $heading;
                }
                $about_save = $about->save();
                if ($about_save) {
                    return response()->json(['status' => '200', 'msg' => 'About content Saved Successfully']);
                } else {
                    return response()->json(['status' => '500', 'msg' => 'Something went wrong']);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
            }
        } else {
            $validate = Validator::make($request->all(), [

                'heading' => 'required|string',

            ]);

            if ($validate->fails()) {
                return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
            }

            try {
                $u_about = HomeAbout::find($request['about_id']);
                $u_about->heading = $request['heading'];
                $u_about->subheading = $request['subheading'];
                $u_about->multiple_points = $request['multiple_points'];
                $u_about->icon_point_1 = $request['icon_point_1'];
                $u_about->icon_point_2 = $request['icon_point_2'];

                if ($request->file('image')) {
                    $file = $request->file('image');
                    $old = $u_about->image;
                    if (file_exists(public_path() . '/' . $old)) {
                        unlink(public_path() . '/' . $old);
                    }
                    $heading = 'vidya-campus' . '_about_image' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $heading);
                    $u_about->image = 'new-assets/img/' . $heading;
                }
                if ($request->file('icon_image_1')) {
                    $file = $request->file('icon_image_1');
                    $old = $u_about->icon_image_1;
                    if (file_exists(public_path() . '/' . $old)) {
                        unlink(public_path() . '/' . $old);
                    }
                    $heading = 'vidya-campus' . '_icon_image_1' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $heading);
                    $u_about->icon_image_1 = 'new-assets/img/' . $heading;
                }
                if ($request->file('icon_image_2')) {
                    $file = $request->file('icon_image_2');
                    $old = $u_about->icon_image_2;
                    if (file_exists(public_path() . '/' . $old)) {
                        unlink(public_path() . '/' . $old);
                    }
                    $heading = 'vidya-campus' . '_icon_image_2' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $heading);
                    $u_about->icon_image_2 = 'new-assets/img/' . $heading;


                }



                $u_about_save = $u_about->update();

                if ($u_about_save) {
                    return response()->json(['status' => '200', 'msg' => 'About content Updated Successfully']);
                } else {
                    return response()->json(['status' => '500', 'msg' => 'Something went wrong']);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
            }
        }
        return response()->json(['status' => '200', 'msg' => 'About content Saved Successfully']);
    }
    public function faqIndex()
    {
        $faqs = HomeFaq::all();
        return view('admin.content.homefaq.index', compact('faqs'));
    }

    public function faqCreate(Request $request){
        return view('admin.content.homefaq.create');
    }

    public function storeFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',


        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = new HomeFaq;

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
        $faqs = HomeFaq::where('id', $request->id)->first();
        return view('admin.content.homefaq.edit', compact('faqs'));
    }

    public function updateFaq(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required|string',
            'content' => 'required|string',


        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $faqs = HomeFaq::where('id', $request->id)->first();

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
        $faqs = HomeFaq::where('id', $request->id)->first();

        $del_cat = $faqs->delete();
        if ($del_cat) {

            return response()->json(['status' => '200', 'msg' => 'faq deleted succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
    public function indexabout()
    {

        $about = About::all();
        return view('admin.content.about.index', compact('about'));
    }

    public function createabout(Request $request)
    {
        return view('admin.content.about.create');
    }

    public function storeabout(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'heading' => 'required|string',
            'sub_heading' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',

            'content' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $about = new About;


            $about->heading = $request['heading'];
            $about->sub_heading = $request['sub_heading'];
            $about->content = $request['content'];
            if ($request->file('image')) {
                $file = $request->file('image');
                $heading = Str::slug($request['heading']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/about/', $heading);
                $about->image = 'new-assets/img/about/' . $heading;
            }


            $about->save();
            return response()->json(['status' => '200', 'msg' => 'Course added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function editabout(Request $request)
    {
        $about = About::where('id', $request->id)->first();
        return view('admin.content.about.edit', compact('about'));
    }



    //notice
    public function noticeIndex()
    {
        $notices = Notice::all();
        return view('admin.content.notice.index', compact('notices'));
    }

    public function noticeCreate(Request $request){
        return view('admin.content.notice.create');
    }

    public function storeNotice(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $notices = new Notice;
            $notices->name = $request['name'];
            $notices->link = $request['link'];
            $notices->save();
            return response()->json(['status' => '200', 'msg' => 'notices added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }

    public function editNotice(Request $request)
    {
        $notices = Notice::where('id', $request->id)->first();
        return view('admin.content.notice.edit', compact('notices'));
    }

    public function updateNotice(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $notices = Notice::where('id', $request->id)->first();
            $notices->name = $request['name'];
            $notices->link = $request['link'];
            $notices->update();
            return response()->json(['status' => '200', 'msg' => 'notices updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function destroyNotice(Request $request)
    {
        $notices = Notice::where('id', $request->id)->first();
        $del_cat = $notices->delete();
        if ($del_cat){
            return response()->json(['status' => '200', 'msg' => 'notices deleted succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
}
