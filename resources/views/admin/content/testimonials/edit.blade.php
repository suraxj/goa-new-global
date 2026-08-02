@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Edit testimonials
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form" action="/admin/testimonials/update" method="post" id="common_form_university" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        
                                       
                                        <div class="col-md-6 col-6">
                                            <div class="form-group mb-3">
                                            <input type="hidden" name="id" id="id" value="{{$testimonial->id}}">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$testimonial->name}}" placeholder=" Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Course</label>
                                                <select class="form-select" name="course_id">
                                                    <option value="">Select Program</option>
                                                    @foreach($courses as $course)
                                                    <option value="{{$course->id}}" @if($course->id == $testimonial->course_id) selected @endif>{{$course->name}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                       
                                    
                                        <div class="col-md-6 col-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label"> Image <small class="text-danger"> (Preferred size (WxH): 600x350) (less than 1 MB)</small></label>
                                                <input type="file" class="form-control" name="image" >
                                                <img src="/{{$testimonial->image}}" alt="" style="width:100px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">rating</label>
                                                <input type="number" max="5" min="1" class="form-control" value="{{$testimonial->rating}}" name="rating" placeholder="rating" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label"> Content</label>
                                                <textarea class="form-control" name="content" placeholder=" content " required>{{$testimonial->content}}</textarea>
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="col-12 text-end">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <button type="submit" class="btn btn-primary ms-1 waves-effect waves-float waves-light">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- end col -->
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
                            window.location.href = '/admin/testimonials';
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