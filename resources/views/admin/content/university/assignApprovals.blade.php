@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            {{$university->name}} - Approvals
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Approval</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvals ?? '' as $index => $Blog)
                                    <tr>
                                        <td>{{$index+1}} </td>
                                        <td><img src="/{{$Blog->image}}" style="width: 40px;" class="rounded me-2" alt="">{{$Blog->name}}</td>
                                        <td><input id="{{$Blog->id}}" onclick="changeStatus('{{$Blog->id}}','{{$university->id}}');" type="checkbox" name="" @if(in_array($Blog->id, $assigned)) checked @endif class="checkBtn"></span>
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
    function changeStatus(id, uni) {
        let status = $('#' + id).is(":checked") ? 1 : 0;
        console.log(status, uni, id);
        $.ajax({
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                'status': status,
                'approval_id': id,
                'uni_id': uni
            },
            url: '/changeApprovalStatus',
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
    }
</script>
@endsection