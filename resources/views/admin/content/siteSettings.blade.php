@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Site Settings
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="common_form_university" action="/admin/site-settings/store" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="setting_id" id="sitesettings" value="{{isset($sitesetting->id) ? $sitesetting->id : ''}}">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="image">Menu Logo:</label>
                                    <input type="file" name="logo" accept="image/*" class="form-control" value="">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{isset($sitesetting->logo) ? '/'.$sitesetting->logo : ''}}" style="width: 150px;" alt="">
                                </div>
                                {{-- <div class="form-group mb-3 col-md-6">
                                    <label for="image">Footer Logo:</label>
                                    <input type="file" name="logo_f" accept="image/*" class="form-control" value="">
                                </div> --}}
                                <div class="col-md-6">
                                    <img src="{{isset($sitesetting->logo_f) ? '/'.$sitesetting->logo_f : ''}}" style="width: 150px;" alt="">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="email">Primary Email:</label>
                                    <input class="form-control" type="email" name="primary_email" placeholder="Primary email" value="{{isset($sitesetting->primary_email) ? $sitesetting->primary_email : ''}}" required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="email">Secondary Email (Optional):</label>
                                    <input class="form-control" type="email" name="secondary_email" value="{{isset($sitesetting->secondary_email) ? $sitesetting->secondary_email : ''}}" placeholder="Secondary email">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="mobile_number">Primary Contact:</label>
                                    <input class="form-control" type="tel" name="primary_contact" value="{{isset($sitesetting->primary_contact) ? $sitesetting->primary_contact : ''}}" placeholder="Primary mobile number" required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="mobile_number">Secondary Contact (Optional):</label>
                                    <input class="form-control" type="tel" name="secondary_contact" value="{{isset($sitesetting->secondary_contact) ? $sitesetting->secondary_contact : ''}}" placeholder="Secondary mobile number">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="mobile_number">Primary Address:</label>
                                    <textarea class="form-control" name="primary_address" placeholder="Primary Address" required>{{isset($sitesetting->primary_address) ? $sitesetting->primary_address : ''}}</textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="mobile_number">Secondary Address (Optional):</label>
                                    <textarea class="form-control" name="secondary_address" placeholder="Secondary Address">{{isset($sitesetting->secondary_address) ? $sitesetting->secondary_address : ''}}</textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="facebook">Facebook (Optional):</label>
                                    <input class="form-control" name="facebook" value="#" placeholder="Enter facebook link">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="twitter">Twitter / X (Optional):</label>
                                    <input class="form-control" name="twitter" id="twitter" value="#" placeholder="Enter twitter link">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="linked_in">LinkedIn (Optional):</label>
                                    <input class="form-control" name="linked_in" id="linked_in" value="#" placeholder="Enter linkedIn profile link">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="instagram">Instagram (Optional):</label>
                                    <input class="form-control" name="instagram" id="instagram" value="#" placeholder="Enter instagram profile link">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="youtube">YouTube (Optional):</label>
                                    <input class="form-control" name="youtube" id="youtube" value="#" placeholder="Enter youTube profile link">
                                </div>
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(function() {
        $("#common_form_university").on("submit", function(e) {
            var formData = new FormData(this);
            $.ajax({
                url: this.action,
                type: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == '200') {
                        Toastify({
                            text: data.msg,
                            duration: 1500,
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Toastify({
                            text: data.msg,
                            duration: 1500,
                            style: {
                                background: "linear-gradient(111.4deg, rgb(246, 4, 26) 0.4%, rgb(251, 139, 34) 100.2%)",
                            }
                        }).showToast();
                    }
                }
            });
            e.preventDefault();
        });
    });
</script>
@endsection