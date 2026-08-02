@extends('admin.layouts.main')
@section('content')

<style>
    .form-grp{
        margin-bottom: 10px;
    }
</style>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Details of <span class="text-success">{{$regview->name}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                       <div class="row gutter-20">
                     <div class="col-lg-4">
                        <div class="form-grp">
                           <input disabled type="text" class="form-control" name="name" value="{{$regview->name}}" placeholder="Student Name"
                              required disabled>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-grp">
                           <input disabled type="text" class="form-control" name="fname" value="{{$regview->fnamee}}" placeholder="Father's Name-"
                              required>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-grp">
                           <input disabled type="text" class="form-control" name="mname" value="{{$regview->mname}}" placeholder="Mother's Name-"
                              required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled class="form-control" type="email" name="email" value="{{$regview->email}}" placeholder="E-mail" required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled class="form-control" type="tel" name="contact" value="{{$regview->contact}}" minlength="10" maxlength="10"
                              onkeypress="return isNumberKey(event);" placeholder="Phone" required>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled class="form-control" type="date" name="dob" value="{{$regview->dob}}" placeholder="Date of Birth">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled class="form-control" type="text" name="course" value="{{$regview->course}}" placeholder="Enter Course name">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled class="form-control" type="text" name="uni" value="{{$regview->uni}}" placeholder="Enter University name">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <select name="mode" required class="form-control">
                              <option value="" selected disabled>{{$regview->mode}}</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled type="text" name="session" value="{{$regview->session}}" class="form-control" placeholder="Session">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled type="text" name="adhar" class="form-control" value="{{$regview->adhar}}">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <select name="category" required class="form-control">
                             <option value="">{{$regview->category}}</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <select name="employment" required class="form-control">
                             <option value="">{{$regview->employment}}</option>

                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled type="text" name="abc"
                              class="form-control" placeholder="ABC ID" value="{{$regview->abc}}">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                           <input disabled type="text" name="deb"
                              class="form-control" placeholder="DEB ID" {{$regview->deb}}>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-grp">
                           <textarea name="address" id="" cols="30" rows="5" required placeholder="address here!" class="form-control">{{$regview->address}}</textarea>
                        </div>
                     </div>
                     <div class="col-md-12 table-responsive">
                        <h5>Education details</h5>
                        <table class="table table-striped table-hover table-bordered">
                           <thead>
                              <tr class="">
                                 <th class="text-center">S.No.</th>
                                <th>Course Name</th>
                                 <th>Board Name</th>
                                 <th>Subject Name</th>
                                 <th>Passing Year</th>
                                 <th>Devision/Grade</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th>1</th>
                                 <th>10th <span style="color: red;"><sup>*</sup></span></th>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="board__uni_10" value="{{$regview->board__uni_10}}"  ></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="subject_year_10"  value="{{$regview->subject_year_10}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="passing_year_10"  value="{{$regview->passing_year_10}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="grade_10"  value="{{$regview->grade_10}}"></td>
                              </tr>
                              <tr>
                                 <th>2</th>
                                 <th>12th</th>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="board__uni_12" value="{{$regview->board__uni_12}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="subject_year_12" value="{{$regview->subject_year_12}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="passing_year_12" value="{{$regview->passing_year_12}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="grade_12" value="{{$regview->grade_12}}"></td>
                              </tr>
                              <tr>
                                 <th>3</th>
                                 <th>Other1 <span><input type="text" class="form-control" name="other1_name" placeholder="Enter Here" value="{{$regview->other1_name}}"></span></th>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="board_uni_other" value="{{$regview->board_uni_other}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="subject_year_other" value="{{$regview->subject_year_other}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="passing_year_other" value="{{$regview->passing_year_other}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="grade_other" value="{{$regview->grade_other}}"></td>
                              </tr>
                               <tr>
                                 <th>4</th>
                                 <th>Other2 <span><input type="text" class="form-control" name="other1_name" placeholder="Enter Here" value="{{$regview->other2_name}}"></span></th>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="board_uni_other" value="{{$regview->other4_1}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="subject_year_other" value="{{$regview->other4_2}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="passing_year_other" value="{{$regview->other4_3}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="grade_other" value="{{$regview->other4_4}}"></td>
                              </tr>
                               <tr>
                                 <th>5</th>
                                 <th>Other3 <span><input type="text" class="form-control" name="other1_name" placeholder="Enter Here" value="{{$regview->other3_name}}"></span></th>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="board_uni_other" value="{{$regview->other5_1}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="subject_year_other" value="{{$regview->other5_2}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="passing_year_other" value="{{$regview->other5_3}}"></td>
                                 <td><input disabled class="form-control" type="text" class="form-control" name="grade_other" value="{{$regview->other5_4}}"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <h5>Document required:</h5>
                     <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">Aadhar Card</label>
                           <input disabled class="form-control" type="file" name="adhcard" placeholder="Aadhar Card">
                           @if ($regview->adhcard)
                           <span><img src="/{{$regview->adhcard}}". width="100"></span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">10th</label>
                           <input disabled class="form-control" type="file" name="proof" placeholder="Education proof">
                           @if ($regview->proof)
                           <span>
                                 <img src="/{{$regview->proof}}" width="80">
                           </span>
                           @endif
                        </div>
                     </div>
                      <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">12th</label>
                           <input disabled class="form-control" type="file" name="proof" placeholder="Education proof">
                           @if ($regview->proof2)
                           <span>
                                 <img src="/{{$regview->proof2}}" width="80">
                           </span>
                           @endif
                        </div>
                     </div>
                      <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">other1</label>
                           <input disabled class="form-control" type="file" name="other1" placeholder="Education proof">
                           @if ($regview->other1)
                           <span>
                                 <img src="/{{$regview->other1}}" width="80">
                           </span>
                           @endif
                        </div>
                     </div>
                      <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">other2</label>
                           <input disabled class="form-control" type="file" name="other2" placeholder="Education proof">
                           @if ($regview->other2)
                           <span>
                                 <img src="/{{$regview->other2}}" width="80">
                           </span>
                           @endif
                        </div>
                     </div>
                      <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">other3</label>
                           <input disabled class="form-control" type="file" name="other3" placeholder="Education proof">
                           @if ($regview->other3)
                           <span>
                                 <img src="/{{$regview->other3}}" width="80">
                           </span>
                           @endif
                        </div>
                     </div>
                      <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">Passport size photo</label>
                           <input disabled class="form-control" type="file" name="photo" placeholder="Passport size photo">
                           @if ($regview->photo)
                           <span><img src="/{{$regview->photo}}". width="100"></span>
                           @endif
                        </div>
                     </div>
                      <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">Father/Mother/ guardian Signature</label>
                           <input disabled class="form-control" type="file" name="guardian_signature" placeholder="Father/Mother/ guardian Signature">
                           @if ($regview->guardian_signature)
                           <span><img src="/{{$regview->guardian_signature}}". width="100"></span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-grp">
                            <label for="">Student Signature</label>
                            <input disabled class="form-control" type="file" name="student_signature" placeholder="Student Signature">
                            @if ($regview->student_signature)
                           <span><img src="/{{$regview->student_signature}}". width="100"></span>
                            @endif
                        </div>
                     </div>
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
