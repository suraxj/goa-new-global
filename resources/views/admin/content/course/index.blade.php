@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Courses
                        </div>
                        <div class="d-flex flex-wrap gap-1 project-list-main">
                            <a href="/admin/courses/create" class="btn btn-primary me-2"><i class="ri-add-line me-1 fw-medium align-middle"></i>New Course</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Full Name</th>
                                        <th>Slug</th>
                                        <th>Duration</th>
                                        <!-- <th>Status</th> -->
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses ?? '' as $index => $course)
                                    <tr>
                                        <td>{{$index+1}} </td>
                                        <td>{{$course->name}}</td>
                                        <td class="text-center"><img src="/{{$course->image}}" class="rounded" style="width:100px;"></td>
                                        <td>{{$course->full_name}}</td>
                                        <td>{{$course->slug}}</td>
                                        <td>{{$course->duration}}</td>
                                        </td>
                                        <!-- <td>
                                            <input data-id="{{$course->id}}" onclick="changeStatus('{{$course->id}}');" @if($course->status == 1) checked @endif class="check_status" id="check_status_{{$course->id}}" type="checkbox">
                                        </td> -->
                                        <td class="text-end">
                                            <a href="/admin/courses/edit/{{$course->id}}" class="btn btn-sm btn-warning me-2"><i class="far fa-edit me-1"></i> Edit</a>
                                            <a href="javascript:void(0);" onclick="destroy('{{ $course->id }}');" class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt me-1"></i>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                    url: "/admin/courses/destroy",
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

    function changeStatus(id) {
        let status = $('#check_status_' + id).is(":checked") ? 1 : 0;
        $.ajax({
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                'status': status,
                'id': id
            },
            url: '/changeCourseStatus/' + id,
            success: function(data) {
                Swal.fire(
                    'Good job!',
                    'Status Changed Sucessfully!',
                    'success'
                )
            }
        });
    }
</script>
@endsection