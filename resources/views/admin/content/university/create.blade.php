@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Create University
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form" action="/admin/university/store" method="post" id="common_form_university" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Mode</label>
                                                <select class="form-select" name="mode">
                                                    <option value="">Select Mode</option>
                                                    @foreach($mode as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="university Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Location</label>
                                                <input type="text" class="form-control" name="location" placeholder="location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label"> Logo</label>
                                                <input type="file" class="form-control" name="logo" required>
                                                <small class="text-danger">(Preferred size (WxH): 420x235) (less than 1 MB)</small>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label"> Logo alt text</label>
                                                <input type="text" class="form-control" name="logo_alt" placeholder="Logo alt text">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Banner Image</label>
                                                <input type="file" class="form-control" name="banner_image" required>
                                                <small class="text-danger">(Preferred size (WxH): 420x235) (less than 1 MB)</small>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label"> image alt text</label>
                                                <input type="text" class="form-control" name="image_alt" placeholder="banner image alt text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Sample Certificate <small class="text-danger">(accepted file: Image) (less than 1 MB)</small></label>
                                                <input type="file" class="form-control" name="certificate" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Brochure <small class="text-danger">(accepted file: PDF) (less than 1 MB)</small></label>
                                                <input type="file" accept="application/pdf" class="form-control" name="brochure" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Short Content</label>
                                                <textarea class="form-control" name="short_description" placeholder="Short content for folder page" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Content</label>
                                                <textarea class="form-control ckContent" name="content" id="content"></textarea>
                                                <!-- <p class="text-success">Use <span class="text-danger">@@@</span> in the end of break line</p> -->
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="fw-bold mb-3">SEO Data</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Slug</label>
                                                <input type="text" class="form-control" name="slug" placeholder="Slug">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Meta Title</label>
                                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Meta Description</label>
                                                <textarea class="form-control" name="meta_description" placeholder="Meta Description"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Schema</label>
                                                <textarea class="form-control" name="ld_schema" placeholder="Schema"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <button type="submit" class="btn btn-primary ms-1 waves-effect waves-float waves-light">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    constructEditor('content')
</script>
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
                        $('#md_modal').modal('hide');
                        Toastify({
                            text: data.msg,
                            duration: 1500,
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                        setTimeout(() => {
                            window.location.href = '/admin/university';
                        }, 1500);
                    } else {
                        // $('#md_modal').modal('hide');
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