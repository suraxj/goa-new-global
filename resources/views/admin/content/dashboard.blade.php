@extends('admin.layouts.main')
@section('content')

<div class="main-content app-content" style="background: #f8fafc; min-height: 100vh;">
	<div class="container-fluid">
		<!-- Welcome Header Banner -->
		<div class="d-flex align-items-center justify-content-between my-4 page-header-breadcrumb flex-wrap gap-3 p-4 rounded-24" style="background: linear-gradient(135deg, #0b0f19 0%, #1e1b4b 50%, #0f172a 100%); color: white; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.25);">
			<div>
				<span class="badge bg-warning text-dark font-weight-bold px-3 py-1 rounded-pill mb-2">🚀 COMMAND CENTER ACTIVE</span>
				<h2 class="fw-bold fs-24 mb-1 text-white">Welcome Back, {{Auth::User()->name ?? 'Administrator'}}!</h2>
				<p class="fs-14 text-white-50 mb-0">Here is your real-time Apex Horizon Institute admissions & system overview.</p>
			</div>
			<div class="d-flex gap-2">
				<a href="/" target="_blank" class="btn btn-cyber-glow px-4 py-2" style="font-size: 0.9rem;">
					<i class="ri-external-link-line me-1"></i> Live Website Preview &rarr;
				</a>
			</div>
		</div>

		<!-- 3D Stat Cards Row -->
		<div class="row gy-4 mb-4">
			<!-- Total Leads Card -->
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card holographic-card h-100 border-0 shadow-sm" style="border-radius: 20px; background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%); border: 1px solid rgba(56, 189, 248, 0.2);">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<span class="text-uppercase fw-bold text-muted small tracking-wide">Total Leads</span>
								<h3 class="mb-3 fw-bold mt-1" style="font-size: 2.2rem; color: #0284c7;">{{$leadcount}}</h3>
								<a href="/admin/leads" class="btn btn-sm btn-outline-primary rounded-pill fw-bold px-3">
									View All Leads &rarr;
								</a>
							</div>
							<div style="width: 56px; height: 56px; border-radius: 18px; background: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 26px; box-shadow: 0 10px 20px rgba(2, 132, 199, 0.3);">
								<i class="ri-user-voice-line"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Total Universities Card -->
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card holographic-card h-100 border-0 shadow-sm" style="border-radius: 20px; background: linear-gradient(135deg, #ffffff 0%, #f5f3ff 100%); border: 1px solid rgba(139, 92, 246, 0.2);">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<span class="text-uppercase fw-bold text-muted small tracking-wide">Universities</span>
								<h3 class="mb-3 fw-bold mt-1" style="font-size: 2.2rem; color: #7c3aed;">{{$universitycount}}</h3>
								<a href="/admin/university" class="btn btn-sm btn-outline-purple rounded-pill fw-bold px-3" style="color: #7c3aed; border-color: #7c3aed;">
									Manage Universities &rarr;
								</a>
							</div>
							<div style="width: 56px; height: 56px; border-radius: 18px; background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 26px; box-shadow: 0 10px 20px rgba(124, 58, 237, 0.3);">
								<i class="ri-bank-line"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Active Courses Card -->
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card holographic-card h-100 border-0 shadow-sm" style="border-radius: 20px; background: linear-gradient(135deg, #ffffff 0%, #ecfdf5 100%); border: 1px solid rgba(16, 185, 129, 0.2);">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<span class="text-uppercase fw-bold text-muted small tracking-wide">Course Catalog</span>
								<h3 class="mb-3 fw-bold mt-1" style="font-size: 2.2rem; color: #059669;">{{$coursecount}}</h3>
								<a href="/admin/courses" class="btn btn-sm btn-outline-success rounded-pill fw-bold px-3">
									Manage Courses &rarr;
								</a>
							</div>
							<div style="width: 56px; height: 56px; border-radius: 18px; background: linear-gradient(135deg, #10b981 0%, #34d399 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 26px; box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);">
								<i class="ri-book-open-line"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Published Blogs Card -->
			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card holographic-card h-100 border-0 shadow-sm" style="border-radius: 20px; background: linear-gradient(135deg, #ffffff 0%, #fff7ed 100%); border: 1px solid rgba(245, 158, 11, 0.2);">
					<div class="card-body p-4">
						<div class="d-flex align-items-start justify-content-between">
							<div>
								<span class="text-uppercase fw-bold text-muted small tracking-wide">Published Blogs</span>
								<h3 class="mb-3 fw-bold mt-1" style="font-size: 2.2rem; color: #d97706;">{{$blogcount}}</h3>
								<a href="/admin/blog" class="btn btn-sm btn-outline-warning rounded-pill fw-bold px-3 text-dark">
									Manage Blogs &rarr;
								</a>
							</div>
							<div style="width: 56px; height: 56px; border-radius: 18px; background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 26px; box-shadow: 0 10px 20px rgba(245, 158, 11, 0.3);">
								<i class="ri-article-line"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Recent Admission Enquiries Table -->
		<div class="row">
			<div class="col-xl-12">
				<div class="card border-0 shadow-sm" style="border-radius: 24px; overflow: hidden; border: 1px solid #e2e8f0;">
					<div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
						<div>
							<h4 class="card-title fw-bold m-0 text-dark" style="font-size: 1.2rem;">
								<i class="ri-user-received-line text-primary me-2"></i> Recent Student Admission Enquiries
							</h4>
						</div>
						<a href="/admin/leads" class="btn btn-sm btn-dark rounded-pill fw-bold px-3">View All Enquiries</a>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table id="datatable-basic" class="table table-hover align-middle m-0 text-nowrap w-100">
								<thead class="bg-light">
									<tr>
										<th class="ps-4">Student Name</th>
										<th>Email Address</th>
										<th>Phone</th>
										<th>Interested Program</th>
										<th>Father Name</th>
										<th>Gender</th>
										<th>State</th>
										<th class="pe-4">Date</th>
									</tr>
								</thead>
								<tbody>
									@forelse($leads as $lead)
									<tr>
										<td class="ps-4 font-weight-bold text-dark">{{$lead->name}}</td>
										<td><a href="mailto:{{$lead->email}}" class="text-primary">{{$lead->email}}</a></td>
										<td><a href="tel:{{$lead->contact}}" class="text-dark fw-bold">{{$lead->contact}}</a></td>
										<td><span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1.5 rounded-pill">{{$lead->course}}</span></td>
										<td>{{$lead->father ?? 'N/A'}}</td>
										<td>{{$lead->gender ?? 'N/A'}}</td>
										<td>{{$lead->state ?? 'Delhi NCR'}}</td>
										<td class="pe-4 text-muted small">{{ $lead->created_at->format('d M Y') }}</td>
									</tr>
									@empty
									<tr>
										<td colspan="8" class="text-center py-4 text-muted fw-bold">No admission enquiries recorded yet.</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="scrollToTop">
	<span class="arrow lh-1"><i class="ti ti-caret-up fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>

@endsection

