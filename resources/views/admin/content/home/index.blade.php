@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Home Banner
                        </div>
                        <div class="d-flex flex-wrap gap-1 project-list-main">
                            <a href="/admin/banner/create" class="btn btn-primary me-2"><i class="ri-add-line me-1 fw-medium align-middle"></i>New Banner</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Banner Image</th>
                                        <th>Tag</th>
                                        <th>URL</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners ?? '' as $index => $banner)
                                    <tr>
                                        <td>{{$index+1}} </td>
                                        <td><img src="/{{$banner->image}}" class="rounded" style="width:100px;"></td>
                                        <td>{{$banner->tag}} </td>
                                        <td>{{$banner->link}} </td>
                                        <td class="text-end">
                                            <a href="/admin/banner/edit/{{$banner->id}}" class="btn btn-sm btn-warning me-2"><i class="far fa-edit me-1"></i> Edit</a>
                                            <a href="javascript:void(0);" onclick="destroy('{{ $banner->id }}');" class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt me-1"></i>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Home About Content
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="common_form_about" action="/admin/about/content/store" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="about_id" id="about_content" value="{{isset($about->id) ? $about->id : ''}}">
                                <div class="form-group mb-3 col-md-6">
                                    <label>Heading:</label>
                                    <textarea type="type" name="heading"  class="form-control" >{{isset($about->heading) ? $about->heading : ''}}</textarea>
                                </div>

                                <div class="form-group mb-3 col-md-6">
                                    <label>Sub Heading</label>
                                    <textarea class="form-control" type="text" name="subheading" placeholder="Sub Heading" value="" required> {{isset($about->subheading) ? $about->subheading : ''}}</textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" accept="image/*" class="form-control" value="">
                                    <img src="{{isset($about->image) ? '/'.$about->image : ''}}" style="width: 100px;" alt="">
                                </div>

                                <div class="form-group mb-3 col-md-6">
                                    <label>Multiple points</label>
                                    <textarea type="type" name="multiple_points" class="form-control" value="">{{isset($about->multiple_points) ? $about->multiple_points : ''}}</textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6 d-none">
                                    <label for="email">Icon Point 1</label>
                                    <input class="form-control" type="text" name="icon_point_1" placeholder="Primary email" value="{{isset($about->icon_point_1) ? $about->icon_point_1 : ''}}" required>
                                </div>

                                <div class="form-group mb-3 col-md-6 d-none">
                                    <label for="image">Icon Image 1</label>
                                    <input type="file" name="icon_image_1" accept="image/*" class="form-control" value="">
                                    <img src="{{isset($about->icon_image_1) ? '/'.$about->icon_image_1 : ''}}" style="width: 100px;" alt="">
                                </div>
                                <div class="form-group mb-3 col-md-6 d-none">
                                    <label for="email">Icon Point 2</label>
                                    <input class="form-control" type="text" name="icon_point_2" placeholder="Primary email" value="{{isset($about->icon_point_2) ? $about->icon_point_2 : ''}}" required>
                                </div>

                                <div class="form-group mb-3 col-md-6 d-none">
                                    <label for="image">Icon Image 2</label>
                                    <input type="file" name="icon_image_2" accept="image/*" class="form-control" value="">
                                    <img src="{{isset($about->icon_image_2) ? '/'.$about->icon_image_2 : ''}}" style="width: 100px;" alt="">
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

function destroy(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/banner/destroy",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(data) {
                        if (data.status == 200) {
                            Swal.fire('Deleted!', data.msg, 'success');
                            window.location.reload(true);
                        } else {
                            Swal.fire('Unable to delete!', data.msg, 'error');
                        }
                    }
                });
            }
        })
    }
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



    $(function() {
        $("#common_form_about").on("submit", function(e) {
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
