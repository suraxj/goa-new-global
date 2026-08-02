@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Approvals
                        </div>
                        <div class="d-flex flex-wrap gap-1 project-list-main">
                            <button onclick="add();" class="btn btn-primary me-2"><i class="ri-add-line me-1 fw-medium align-middle"></i>New Approval</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvals ?? '' as $index => $approval)
                                    <tr>
                                        <td>{{$approval->name}}</td>
                                        <td><img src="/{{$approval->image}}" style="width: 100px;" class="rounded" alt=""></td>
                                        <td class="text-end">
                                            <a href="#" onclick="edit('{{ $approval->id }}');" class="btn btn-sm btn-warning me-2"><i class="far fa-edit me-1"></i> Edit</a>
                                            <a href="javascript:void(0);" onclick="destroy('{{ $approval->id }}');" class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt me-1"></i>Delete</a>
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
    function add() {
        $.ajax({
            url: '/admin/approvals/create',
            success: function(data) {
                $('#md_modal_content').html(data);
                $('#md_modal').modal('show');
            }
        })
    }

    function edit(id) {
        $.ajax({
            url: '/admin/approvals/edit/' + id,
            success: function(data) {
                $('#md_modal_content').html(data);
                $('#md_modal').modal('show');
            }
        })
    }

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
                    url: "/admin/approvals/destroy",
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
</script>
@endsection