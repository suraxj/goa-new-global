<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApprovalController extends Controller
{
    public function index()
    {
        $approvals = Approval::all();
        return view('admin.content.approval.index', compact('approvals'));
    }
    public function create(Request $request)
    {
        return view('admin.content.approval.create');
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $approvals = new Approval;
            $approvals->name = $request['name'];
            if ($request->file('banner_image')) {
                $file = $request->file('banner_image');
                $name = Str::slug($request['name']) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/approvals/', $name);
                $approvals->image = 'new-assets/img/approvals/' . $name;
            }
            $approvals->save();
            return response()->json(['status' => '200', 'msg' => 'approval added succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function edit(Request $request)
    {
        $approvals = Approval::where('id', $request->id)->first();
        return view('admin.content.approval.edit', compact('approvals'));
    }
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',

        ]);
        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
        }
        try {
            $approvals = Approval::where('id', $request->id)->first();
            $approvals->name = $request['name'];
            if ($request->file('banner_image')) {
                $old = $approvals->image;
                unlink(public_path() . '/' . $old);
                $file = $request->file('banner_image');
                $name = Str::slug($request['name']) . '_banner' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/approvals/', $name);
                $approvals->image = 'new-assets/img/approvals/' . $name;
            }
            $approvals->update();
            return response()->json(['status' => '200', 'msg' => 'approval updated succesfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
        }
    }
    public function destroy(Request $request)
    {
        $approvals = Approval::where('id', $request->id)->first();
        $Approval_img = $approvals->image;
        $del_cat = $approvals->delete();
        if ($del_cat) {
            unlink(public_path() . '/' . $Approval_img);
            return response()->json(['status' => '200', 'msg' => 'blog delete succesfully']);
        } else {
            return response()->json(['status' => '500', 'msg' => 'something went wrong']);
        }
    }
}
