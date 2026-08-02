@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Register Student
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Courses</th>
                                        <th>University</th>
                                        <th>F Name</th>
                                        <th>M Name</th>
                                        <th>Reg On</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($regs as $reg)

                                    <tr>
                                        <td>{{$reg->name}}</td>
                                        <td>{{$reg->email}}</td>
                                        <td>{{$reg->contact}}</td>
                                        <td>{{$reg->course}}</td>
                                        <td>{{$reg->uni}}</td>
                                        <td> {{$reg->fname}}</td>
                                        <td> {{$reg->mname}}</td>
                                        <td>{{ $reg->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="/admin/regs/view/{{$reg->id}}" class="btn btn-sm btn-warning me-2"><i class="far fa-edit me-1"></i> View</a>
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
