<div class="request__area-two pt-60 pb-60 faq__area">
    <div class="container">
        <p class="fw-bold text-center h2 mb-5 text-black">Apply Now For Our Top Courses</p>
        <div class="row gy-4 align-items-center">
             <div class="col-lg-5">
                <img src="/web-assets/main/apply-now.webp" class="img-fluid rounded" alt="shape" data-aos="fade-down" data-aos-delay="400">
            </div>
            <div class="col-lg-7">
                <div class="request__wrap mt-0 rounded">
                    <div class="request__tab-wrap">
                                <form action="add_lead" class="request__form request__form-two" id="leadFormfooter">
                                    @csrf
                                    <span class="title">Great Decision! Let's Connect With You Soon</span>
                                    <div class="row gutter-20">
                                        <div class="col-lg-6">
                                            <div class="form-grp">
                                                 <input type="hidden"  name="type" value="B2C" placeholder="Name*">
                                                <input type="text" onkeypress="return isNotNumberKey(event);" name="name" placeholder="Name*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-grp">
                                                <input type="email" placeholder="Mail*" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-grp">
                                                <input type="tel" name="contact" minlength="10" maxlength="10" onkeypress="return isNumberKey(event);" placeholder="Phone*" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-grp">
                                                <input type="text" placeholder="Father Name*" name="father" required>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="title">Other Details</span>
                                    <div class="row gutter-20">
                                        <div class="col-lg-6">
                                            <div class="form-grp">
                                                <div class="form-grp select-grp">
                                                    <select name="course" required>
                                                        <option value="" selected disabled>Select Course</option>
                                                        @php
                                                        $courses = DB::select('select name from courses order by name asc')
                                                        @endphp
                                                        <option value="Acadmic Support">Acadmic Support</option>
                                                        @foreach($courses as $course)
                                                        <option value="{{$course->name}}">{{$course->name}}</option>
                                                        @endforeach
                                                        <option value="Other">Other</option>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-grp select-grp">
                                                <select name="gender" required>
                                                    <option value="" disabled selected>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-grp select-grp">
                                                <select name="state" required>
                                                   <option value="" disabled selected>State You Live in</option>
                                                   <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                   <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                   <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                   <option value="Assam">Assam</option>
                                                   <option value="Bihar">Bihar</option>
                                                   <option value="Chandigarh">Chandigarh</option>
                                                   <option value="Chhattisgarh">Chhattisgarh</option>
                                                   <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                                   <option value="Delhi">Delhi</option>
                                                   <option value="Goa">Goa</option>
                                                   <option value="Gujarat">Gujarat</option>
                                                   <option value="Haryana">Haryana</option>
                                                   <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                   <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                   <option value="Jharkhand">Jharkhand</option>
                                                   <option value="Karnataka">Karnataka</option>
                                                   <option value="Kerala">Kerala</option>
                                                   <option value="Ladakh">Ladakh</option>
                                                   <option value="Lakshadweep">Lakshadweep</option>
                                                   <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                   <option value="Maharashtra">Maharashtra</option>
                                                   <option value="Manipur">Manipur</option>
                                                   <option value="Meghalaya">Meghalaya</option>
                                                   <option value="Mizoram">Mizoram</option>
                                                   <option value="Nagaland">Nagaland</option>
                                                   <option value="Odisha">Odisha</option>
                                                   <option value="Puducherry">Puducherry</option>
                                                   <option value="Punjab">Punjab</option>
                                                   <option value="Rajasthan">Rajasthan</option>
                                                   <option value="Sikkim">Sikkim</option>
                                                   <option value="Tamil Nadu">Tamil Nadu</option>
                                                   <option value="Telangana">Telangana</option>
                                                   <option value="Tripura">Tripura</option>
                                                   <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                   <option value="Uttarakhand">Uttarakhand</option>
                                                   <option value="West Bengal">West Bengal</option>
                                                </select>
                                             </div>
                                        </div>


                                    </div>

                                    <button type="submit" class="btn">Submit</button>
                                </form>

                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <div class="request__shape">
        <img src="/assets/img/images/request_shape.svg" alt="shape" data-aos="fade-down" data-aos-delay="400">
    </div>
</div>
