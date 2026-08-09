<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::OrderBy('created_at', 'DESC')->get();
        return view('admin.content.leads', compact('leads'));

    }
     public function regindex()
    {
        $regs = Registration::OrderBy('created_at', 'DESC')->get();
        return view('admin.content.regs', compact('regs'));

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'contact' => 'required|string',
            'cv' => 'mimes:pdf,jpeg,webp,png,jpg,gif,svg|max:10000',
            'type' => 'required|string',

        ]);

        try {
            $lead = new Lead;
            $lead->name = $validated['name'];
            $lead->email = $validated['email'];
            $lead->contact = $validated['contact'];
            $lead->type = $validated['type'];
            $lead->father = $request['father'];
            $lead->state = $request['state'];
            $lead->course = $request['course'];
            $lead->gender = $request['gender'];
            $lead->message = $request['message'];
            $lead->qualification = $request['qualification'];
            $lead->remark = $request['remark'];
            $lead->institutename = $request['institutename'];
            $lead->instituteownername = $request['instituteownername'];
            if ($request->file('cv')) {
                $file = $request->file('cv');
                $name = Str::slug($request['name']) . '_cv' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $lead->cv = 'new-assets/img/uplords/' . $name;
            }
            $lead_saved = $lead->save();
            if ($lead_saved) {
                // Send email notification to prakashsinghsuraj69@gmail.com
                try {
                    $targetMail = env('MAIL_TO_ADDRESS', 'prakashsinghsuraj69@gmail.com');
                    $bodyText = "New Lead / Form Submission Received:\n\n" .
                                "Name: {$lead->name}\n" .
                                "Email: {$lead->email}\n" .
                                "Contact: {$lead->contact}\n" .
                                "Course: {$lead->course}\n" .
                                "State: {$lead->state}\n" .
                                "Message: {$lead->message}\n" .
                                "Form Type: {$lead->type}\n";

                    Mail::raw($bodyText, function($msg) use ($targetMail, $lead) {
                        $msg->to($targetMail)
                            ->subject("New Admission Enquiry Form - {$lead->name}");
                    });
                } catch (\Exception $mailEx) {
                    Log::error("Lead email dispatch failed: " . $mailEx->getMessage());
                }

                return ['status' => '200', 'msg' => 'Details sent successfully!'];
            } else {
                return ['status' => '500', 'msg' => 'Something Went wrong!'];
            }
        } catch (\Exception $e) {
            return response()->json(['status' => $e, 'msg' => $e->getMessage()]);
        }
    }

     public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'fname' => 'required|string',
            'mname' => 'required|string',
            'email' => 'required|email',

        ]);

        try {
            $Registration = new Registration;
            $Registration->name = $validated['name'];
            $Registration->fname = $validated['fname'];
            $Registration->mname = $validated['mname'];
            $Registration->email = $validated['email'];
            $Registration->contact = $request['contact'];
            $Registration->dob = $request['dob'];
            $Registration->course = $request['course'];
            $Registration->uni = $request['uni'];
            $Registration->course = $request['course'];
            $Registration->mode = $request['mode'];
            $Registration->session = $request['session'];
            $Registration->adhar = $request['adhar'];
            $Registration->category = $request['category'];
            $Registration->employment = $request['employment'];
            $Registration->abc = $request['abc'];
            $Registration->deb = $request['deb'];
            $Registration->address = $request['address'];
            $Registration->board__uni_10 = $request['board__uni_10'];
            $Registration->subject_year_10 = $request['subject_year_10'];
            $Registration->passing_year_10 = $request['passing_year_10'];
            $Registration->grade_10 = $request['grade_10'];
            $Registration->board__uni_12 = $request['board__uni_12'];
            $Registration->subject_year_12 = $request['subject_year_12'];
            $Registration->passing_year_12 = $request['passing_year_12'];
            $Registration->grade_12 = $request['grade_12'];
            $Registration->board_uni_other = $request['board_uni_other'];
            $Registration->subject_year_other = $request['subject_year_other'];
            $Registration->passing_year_other = $request['passing_year_other'];
            $Registration->grade_other = $request['grade_other'];
            $Registration->other1_name = $request['other1_name'];
            $Registration->other2_name = $request['other2_name'];
            $Registration->other3_name = $request['other3_name'];
            $Registration->other4_1 = $request['other4_1'];
            $Registration->other4_2 = $request['other4_2'];
            $Registration->other4_3 = $request['other4_3'];
            $Registration->other4_4 = $request['other4_4'];
            $Registration->other5_1 = $request['other5_1'];
            $Registration->other5_2 = $request['other5_2'];
            $Registration->other5_3 = $request['other5_3'];
            $Registration->other5_4 = $request['other5_4'];

            if ($request->file('adhcard')) {
                $file = $request->file('adhcard');
                $name = Str::slug($request['name']) . '_adhcard' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->adhcard = 'new-assets/img/uplords/' . $name;
            }

             if ($request->file('proof')) {
                $file = $request->file('proof');
                $name = Str::slug($request['name']) . '_proof' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->proof = 'new-assets/img/uplords/' . $name;
            }
             if ($request->file('other1')) {
                $file = $request->file('other1');
                $name = Str::slug($request['name']) . '_other1' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->other1 = 'new-assets/img/uplords/' . $name;
            }
             if ($request->file('other2')) {
                $file = $request->file('other2');
                $name = Str::slug($request['name']) . '_other2' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->other2 = 'new-assets/img/uplords/' . $name;
            }
             if ($request->file('other3')) {
                $file = $request->file('other3');
                $name = Str::slug($request['name']) . '_other3' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->other3 = 'new-assets/img/uplords/' . $name;
            }

             if ($request->file('photo')) {
                $file = $request->file('photo');
                $name = Str::slug($request['name']) . '_photo' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->photo = 'new-assets/img/uplords/' . $name;
            }

             if ($request->file('guardian_signature')) {
                $file = $request->file('guardian_signature');
                $name = Str::slug($request['name']) . '_guardian_signature' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->guardian_signature = 'new-assets/img/uplords/' . $name;
            }

             if ($request->file('student_signature')) {
                $file = $request->file('student_signature');
                $name = Str::slug($request['name']) . '_student_signature' . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/new-assets/img/uplords/', $name);
                $Registration->student_signature = 'new-assets/img/uplords/' . $name;
            }
            $lead_saved = $Registration->save();
            if ($lead_saved) {
                // Send email notification to prakashsinghsuraj69@gmail.com
                try {
                    $targetMail = env('MAIL_TO_ADDRESS', 'prakashsinghsuraj69@gmail.com');
                    $bodyText = "New Application Form Registration Received:\n\n" .
                                "Student Name: {$Registration->name}\n" .
                                "Father Name: {$Registration->fname}\n" .
                                "Mother Name: {$Registration->mname}\n" .
                                "Email: {$Registration->email}\n" .
                                "Contact: {$Registration->contact}\n" .
                                "Course: {$Registration->course}\n" .
                                "University: {$Registration->uni}\n" .
                                "Mode: {$Registration->mode}\n" .
                                "Address: {$Registration->address}\n";

                    Mail::raw($bodyText, function($msg) use ($targetMail, $Registration) {
                        $msg->to($targetMail)
                            ->subject("New Student Application Registration - {$Registration->name}");
                    });
                } catch (\Exception $mailEx) {
                    Log::error("Registration email dispatch failed: " . $mailEx->getMessage());
                }

                return ['status' => '200', 'msg' => 'Registration successfully!'];
            } else {
                return ['status' => '500', 'msg' => 'Something Went wrong!'];
            }
        } catch (\Exception $e) {
            return response()->json(['status' => $e, 'msg' => $e->getMessage()]);
        }
    }

      public function regsview(Request $request)
    {
        $regview = Registration::where('id', $request->id)->first();
        return view('admin.content.regview', compact('regview'));
    }
}
