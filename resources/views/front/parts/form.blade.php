<div class="contact-form">

<form action="/add_lead" class="contact__form" id="leadForm" method="POST">
    @csrf


    <div class="row">


        <div class="col-md-12 form-group style-border3">
            <input type="text" onkeypress="return isNotNumberKey(event);" class="form-control" name="name"
                placeholder="name" required>
            <i class="fal fa-user"></i>
        </div>

        <div class="col-md-12 form-group style-border3">
            <input type="email" name="email" placeholder="E-mail" class="form-control" />
            <i class="fal fa-envelope"></i>
        </div>

        <div class="col-md-12 form-group style-border3">
            <input type="tel" name="contact" minlength="10" maxlength="10" onkeypress="return isNumberKey(event);"
                placeholder="Phone" class="form-control" required>
            <i class="fal fa-phone-alt"></i>
        </div>

        <div class="col-md-12 form-group style-border3">
            <select name="course" class="form-select" required>
                <option value="" disabled selected>Select Course</option>

                @php
                    $courses = DB::select('select name from courses order by name asc');
                @endphp

                @foreach ($courses as $course)
                    <option value="{{ $course->name }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 form-group style-border3">
            <select name="state" class="form-select" required>
                <option value="" selected disabled>State You Live in</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                </option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar
                    Haveli
                    and
                    Daman and Diu
                </option>
                <option value="Delhi">Delhi</option>
                <option value="Delhi">Delhi NCR</option>
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
            <i class="fal fa-chevron-down"></i>
        </div>

        <input type="hidden" name="type" value="B2C">

        <div class="form-btn col-12 text-center">
            <button type="submit" class="th-btn">
                SEND MESSAGE
            </button>
        </div>

    </div>

</form>

</div>

