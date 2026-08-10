<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{
    public function index()
    {
        $sitesetting = SiteSetting::first();
        // dd($sitesetting);
        return view('admin.content.siteSettings', compact('sitesetting'));
    }
    public function store(Request $request)
    {
        if ($request['setting_id'] == null) {
            $validate = Validator::make($request->all(), [
                'logo' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
                'logo_f' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:1048',
                'primary_email' => 'required|string',
                'primary_contact' => 'required|string',
                'primary_address' => 'required|string',
            ]);
            if ($validate->fails()) {
                return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
            }
            try {
                $site = new SiteSetting;
                $site->primary_contact = $request['primary_contact'];
                $site->secondary_contact = $request['secondary_contact'];
                $site->primary_email = $request['primary_email'];
                $site->secondary_email = $request['secondary_email'];
                $site->primary_address = $request['primary_address'];
                $site->secondary_address = $request['secondary_address'];
                $site->facebook = '#';
                $site->instagram = '#';
                $site->twitter = '#';
                $site->linkedin = '#';
                $site->youtube = '#';
                if ($request->file('logo')) {
                    $file = $request->file('logo');
                    $name = 'carrerloverinstitute' . '_logo' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $name);
                    $site->logo = 'new-assets/img/' . $name;
                }
                if ($request->file('logo_f')) {
                    $file = $request->file('logo_f');
                    $name = 'carrerloverinstitute' . '_logof' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $name);
                    $site->logo = 'new-assets/img/' . $name;
                }
                $site_save = $site->save();
                if ($site_save) {
                    return response()->json(['status' => '200', 'msg' => 'Site Settings Saved Successfully']);
                } else {
                    return response()->json(['status' => '500', 'msg' => 'Something went wrong']);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
            }
        } else {
            $validate = Validator::make($request->all(), [
                'primary_email' => 'required|string',
                'primary_contact' => 'required|string',
                'primary_address' => 'required|string',
            ]);
            if ($validate->fails()) {
                return response()->json(['status' => 'error', 'msg' => $validate->errors()]);
            }
            try {
                $u_site = SiteSetting::find($request['setting_id']);
                $u_site->primary_contact = $request['primary_contact'];
                $u_site->secondary_contact = $request['secondary_contact'];
                $u_site->primary_email = $request['primary_email'];
                $u_site->secondary_email = $request['secondary_email'];
                $u_site->primary_address = $request['primary_address'];
                $u_site->secondary_address = $request['secondary_address'];
                $u_site->facebook = '#';
                $u_site->instagram = '#';
                $u_site->twitter = '#';
                $u_site->linkedin = '#';
                $u_site->youtube = '#';
                if ($request->file('logo')) {
                    $file = $request->file('logo');
                    $old = $u_site->logo;
                    if (file_exists(public_path() . '/' . $old)) {
                        unlink(public_path() . '/' . $old);
                    }
                    $name = 'carrerloverinstitute' . '_logo' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $name);
                    $u_site->logo = 'new-assets/img/' . $name;
                }
                if ($request->file('logo_f')) {
                    $file = $request->file('logo_f');
                    $old = $u_site->logo_f;
                    if (file_exists(public_path() . '/' . $old)) {
                        unlink(public_path() . '/' . $old);
                    }
                    $name = 'carrerloverinstitutef' . '_logof' . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/new-assets/img/', $name);
                    $u_site->logo = 'new-assets/img/' . $name;
                }
                $u_site_save = $u_site->update();
                if ($u_site_save) {
                    return response()->json(['status' => '200', 'msg' => 'Site Settings Updated Successfully']);
                } else {
                    return response()->json(['status' => '500', 'msg' => 'Something went wrong']);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => '500', 'msg' => $e->getMessage()]);
            }
        }
        return response()->json(['status' => '200', 'msg' => 'Site Settings Saved Successfully']);
    }
}
