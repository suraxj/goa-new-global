@extends('front.layouts.main')
@section('title', 'Registration')
@section('description', 'Description')
@section('content')

    <div class="breadcumb-wrapper" data-bg-src="/web-assets/img/bg/breadcumb-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h2 class="breadcumb-title">Registration
                        </h2>
                        <ul class="breadcumb-menu">
                            <li><a href="/">Home</a></li>
                            <li>
                                Registration
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact__area pt-10 pb-60">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12 col-sm-12">
                    <div class="contact__form-wrap">
                        <h2 class="title">Fill this Registration Form</h2>
                        <form action="/add_registration" class="contact__form" id="reg" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gutter-20">
                                <div class="col-lg-4">
                                    <div class=" form-group style-border3">
                                        <input type="hidden" value="B2C" name="type">
                                        <input type="text" class="form-control" 
                                            onkeypress="return isNotNumberKey(event);" name="name"
                                            placeholder="Student Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" onkeypress="return isNotNumberKey(event);" class="form-control"  name="fname"
                                            placeholder="Father's Name-" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" onkeypress="return isNotNumberKey(event);"class="form-control"  name="mname"
                                            placeholder="Mother's Name-" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="email" name="email" placeholder="E-mail" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="tel" name="contact" minlength="10" maxlength="10"
                                            onkeypress="return isNumberKey(event);" placeholder="Phone" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="date" name="dob" class="form-control"  placeholder="Date of Birth">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" name="course" class="form-control"  placeholder="Enter Course name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" name="uni"class="form-control"  placeholder="Enter University name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <select name="mode" class="form-control"  required>
                                            <option value="" selected disabled>Select Mode</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Online">Online</option>
                                            <option value="Distance">Distance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" name="session" class="form-control"  placeholder="Session">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" name="adhar" class="form-control"  minlength="12" maxlength="12"
                                            onkeypress="return isNumberKey(event);" placeholder="Addhar No">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <select name="category" class="form-control"  required>
                                            <option value="" selected disabled>Select Category</option>
                                            <option value="General">General</option>
                                            <option value="OBC">OBC</option>
                                            <option value="SC/ST">SC/ST</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <select name="employment" class="form-control"  required>
                                            <option value="" selected disabled>Select Employment</option>
                                            <option value="Employmed">Employmed</option>
                                            <option value="UnEmploymed">UnEmploymed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" name="abc" class="form-control"  onkeypress="return isNumberKey(event);"
                                            placeholder="ABC ID">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <input type="text" class="form-control"  name="deb" onkeypress="return isNumberKey(event);"
                                            placeholder="DEB ID">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class=" form-group style-border3">
                                        <textarea name="address" class="form-control"  id="" cols="30" rows="10" required placeholder="address here!"></textarea>
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
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="board__uni_10"
                                                        placeholder="Board Name" required=""></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="subject_year_10"
                                                        placeholder="Subject" required=""></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="passing_year_10"
                                                        required="" placeholder="Passing year"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="grade_10"
                                                        required="" placeholder="Passing grade"></td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <th>12th</th>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="board__uni_12"
                                                        placeholder="Board Name"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="subject_year_12"
                                                        placeholder="Subject"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="passing_year_12"
                                                        placeholder="Passing year"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="grade_12"
                                                        placeholder="Passing grade"></td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <th class=" form-group style-border3" > Other 1 <span><input type="text" class="form-control"
                                                            name="other1_name" placeholder="Enter Here"></span></th>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="board_uni_other"
                                                        placeholder="College/university Name"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="subject_year_other"
                                                        placeholder="Subject"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="passing_year_other"
                                                        placeholder="Passing Year"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="grade_other"
                                                        placeholder="grade"></td>
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <th class=" form-group style-border3">Other 2 <span><input type="text" class="form-control"
                                                            name="other2_name" placeholder="Enter Here"></span></th>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other4_1"
                                                        placeholder="College/university Name"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other4_2"
                                                        placeholder="Subject"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other4_3"
                                                        placeholder="Passing Year"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other4_4"
                                                        placeholder="grade"></td>
                                            </tr>
                                            <tr>
                                                <th>5</th>
                                                <th class=" form-group style-border3">Other 3 <span><input type="text" class="form-control"
                                                            name="other3_name" placeholder="Enter Here"></span></th>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other5_1"
                                                        placeholder="College/university Name"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other5_2"
                                                        placeholder="Subject"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other5_3"
                                                        placeholder="Passing Year"></td>
                                                <td class=" form-group style-border3"><input type="text" class="form-control" name="other5_4"
                                                        placeholder="grade"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h5>Document required:</h5>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">Aadhar Card</label>
                                        <input type="file" name="adhcard" class="form-control pt-3"  placeholder="Aadhar Card">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">10Th</label>
                                        <input type="file" name="proof" class="form-control pt-3" placeholder="Education proof">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">12Th</label>
                                        <input type="file" name="proof2" class="form-control pt-3"  placeholder="Education proof">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">Other1</label>
                                        <input type="file" name="other1"class="form-control pt-3"  placeholder="Education proof">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">Other2</label>
                                        <input type="file" name="other2" class="form-control pt-3"  placeholder="Education proof">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">Other3</label>
                                        <input type="file" name="other3" class="form-control pt-3"  placeholder="Education proof">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">Passport size photo</label>
                                        <input type="file" name="photo"class="form-control pt-3"   placeholder="Passport size photo">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">Father/Mother/ guardian Signature</label>
                                        <input type="file" class="form-control pt-3"   name="guardian_signature"
                                            placeholder="Father/Mother/ guardian Signature">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group style-border3">
                                        <label for="">Student Signature</label>
                                        <input type="file" name="student_signature" class="form-control pt-3"  placeholder="Student Signature">
                                    </div>
                                </div>


                                <div class="form-btn  text-center">
                                    <input type="submit" class="th-btn">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
