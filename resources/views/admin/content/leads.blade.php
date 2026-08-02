@extends('admin.layouts.main')
@section('content')



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Leads
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
                                        <th>CV</th>
                                        <th>Qualification</th>
                                        <th>Father</th>
                                        <th>Gender</th>
                                        <th>State</th>
                                        <th>Inquiry Type</th>
                                        <th>Created On</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $lead)

                                    <tr>
                                        <td>{{$lead->name}}</td>
                                        <td>{{$lead->email}}</td>
                                        <td>{{$lead->contact}}</td>
                                        <td>{{$lead->course}}</td>
                                        <td> {{$lead->cv}}</td>
                                        <td> {{$lead->qualification}}</td>
                                        <td>{{$lead->father}}</td>
                                        <td>{{$lead->gender}}</td>
                                        <td>{{$lead->state}}</td>
                                        <td>{{$lead->type}}</td>
                                        <td>{{ $lead->created_at->format('d M Y') }}</td>
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
