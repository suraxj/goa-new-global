@extends('admin.layouts.main')
@section('content')

<div class="main-content app-content">
	<div class="container-fluid">
		<div class="d-flex align-items-center justify-content-between my-4 page-header-breadcrumb flex-wrap gap-2">
			<div>
				<p class="fw-medium fs-20 mb-0">Hello there, {{Auth::User()->name}}</p>
				<p class="fs-13 text-muted mb-0">Let's make today a productive one!</p>
			</div>

		</div>

		<div class="row">
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card custom-card">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<div>
									<span class="d-block mb-2 ">Leads</span>
									<h5 class="mb-4 fs-4">{{$leadcount}}</h5>
								</div>
								<a href="/admin/leads" class="btn btn-link px-0">See All Leads</a>
							</div>
							<div>
								<div class="main-card-icon primary">
									<div class="avatar avatar-lg bg-primary-transparent border border-primary border-opacity-10">
										<i class="ri-wallet-fill display-6"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card custom-card main-card">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<div>
									<span class="d-block mb-2">University</span>
									<h5 class="mb-4 fs-4">{{$universitycount}}</h5>
								</div>
								<a href="/admin/university" class="btn btn-link px-0">See All Universities</a>
							</div>
							<div>
								<div class="main-card-icon secondary">
									<div class="avatar avatar-lg bg-secondary-transparent border border-secondary border-opacity-10">
										<i class="ri-school-fill display-6"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card custom-card main-card">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<div>
									<span class="d-block mb-2">Courses</span>
									<h5 class="mb-4 fs-4">{{$coursecount}}</h5>
								</div>
								<a href="/admin/courses" class="btn btn-link px-0">See All Courses</a>
							</div>
							<div>
								<div class="main-card-icon success">
									<div class="avatar avatar-lg bg-success-transparent border border-success border-opacity-10">
										<i class="ri-book-fill display-6"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card custom-card main-card">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<div>
									<span class="d-block mb-2">Blogs</span>
									<h5 class="mb-4 fs-4">{{$blogcount}}</h5>
								</div>
								<a href="/admin/blog" class="btn btn-link px-0">See All Blogs</a>
							</div>
							<div>
								<div class="main-card-icon orange">
									<div class="avatar avatar-lg bg-orange-transparent border border-orange border-opacity-10">
										<i class="ri-blogger-fill display-6"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>




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
                                        <th>Father</th>
                                        <th>Gender</th>
										<th>State</th>
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
                                        <td>{{$lead->father}}</td>
                                        <td>{{$lead->gender}}</td>
										<td>{{$lead->state}}</td>
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

<!-- End::app-content -->

<!-- Start::main-modal -->

<div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="input-group">
					<input type="text" class="form-control border-end-0" placeholder="Search Anything ..." aria-label="Search Anything ..." aria-describedby="button-addon2">
					<button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End::main-modal -->


<div class="scrollToTop">
	<span class="arrow lh-1"><i class="ti ti-caret-up fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->


@endsection
