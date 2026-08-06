@extends('layouts.mainlayout')

@section('content')


<div class="d-flex flex-row flex-column-fluid container">
						<!--begin::Content Wrapper-->
						<div class="main d-flex flex-column flex-row-fluid">
							<!--begin::Subheader-->
							<div class="subheader py-2 py-lg-6" id="kt_subheader">
								<div class="w-100 d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
									<!--begin::Info-->
									<div class="d-flex align-items-center flex-wrap mr-1">
										<!--begin::Page Heading-->
										<div class="d-flex align-items-baseline flex-wrap mr-5">
											<!--begin::Page Title-->
											<h5 class="text-dark font-weight-bold my-1 mr-5">Franchise Entries</h5>
											<!--end::Page Title-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
												<li class="breadcrumb-item">
													<a href="" class="text-muted">Crud</a>
												</li>
												<li class="breadcrumb-item">
													<a href="" class="text-muted">KTDatatable</a>
												</li>
												<li class="breadcrumb-item">
													<a href="" class="text-muted">Base</a>
												</li>
												<li class="breadcrumb-item">
													<a href="" class="text-muted">Local Data</a>
												</li>
											</ul>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page Heading-->
									</div>
									<!--end::Info-->
									<!--begin::Toolbar-->
									<div class="d-flex align-items-center">
										<!--begin::Daterange-->
										<a href="#" class="btn btn-light-primary btn-sm font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
											<span class="opacity-60 font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
											<span class="font-weight-bold" id="kt_dashboard_daterangepicker_date">Aug 16</span>
										</a>
										<!--end::Daterange-->
										<!--begin::Dropdown-->
										<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
											<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-success svg-icon-2x">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24" />
															<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</a>
											<div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
												<!--begin::Navigation-->
												<ul class="navi navi-hover">
													<li class="navi-header font-weight-bold py-4">
														<span class="font-size-lg">Choose Label:</span>
														<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
													</li>
													<li class="navi-separator mb-3 opacity-70"></li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-text">
																<span class="label label-xl label-inline label-light-success">Customer</span>
															</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-text">
																<span class="label label-xl label-inline label-light-danger">Partner</span>
															</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-text">
																<span class="label label-xl label-inline label-light-warning">Suplier</span>
															</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-text">
																<span class="label label-xl label-inline label-light-primary">Member</span>
															</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-text">
																<span class="label label-xl label-inline label-light-dark">Staff</span>
															</span>
														</a>
													</li>
													<li class="navi-separator mt-3 opacity-70"></li>
													<li class="navi-footer py-4">
														<a class="btn btn-clean font-weight-bold btn-sm" href="#">
														<i class="ki ki-plus icon-sm"></i>Add new</a>
													</li>
												</ul>
												<!--end::Navigation-->
											</div>
										</div>
										<!--end::Dropdown-->
									</div>
									<!--end::Toolbar-->
								</div>
							</div>
							<!--end::Subheader-->
							<div class="content flex-column-fluid" id="kt_content">
								<!--begin::Notice-->
							
								<!--end::Notice-->
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
										<div class="card-title">
											<h3 class="card-label">Sales Window
											
										</div>
										
									</div>
									<div class="card-body">
										<div class="row mb-3">

    <div class="col-md-4">
        <label class="form-label">Customer Name</label>
        <input type="text"
               name="customer_name"
               class="form-control"
               placeholder="Enter Customer Name">
    </div>

    <div class="col-md-4">
        <label class="form-label">Phone Number</label>
        <input type="text"
               name="customer_phone"
               class="form-control"
               maxlength="10"
               placeholder="Enter Phone Number">
    </div>

    <div class="col-md-4">
        <label class="form-label">Email Address</label>
        <input type="email"
               name="customer_email"
               class="form-control"
               placeholder="Enter Email Address">
    </div>

</div>

				
                                     <h3>Invoice #{{ $master->id }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->item_name }}</td>
           <td width="120">
    <input type="number"
           class="form-control qty"
           data-rate="{{ $item->rate }}"
           data-id="{{ $item->id }}"
           value="{{ $item->qty }}"
           min="1">
</td>
            <td>₹{{ number_format($item->rate, 2) }}</td>
            <td class="lineTotal">
    ₹{{ number_format($item->total_amount,2) }}
</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h4 class="text-end">
Grand Total :
<span id="grandTotal">
₹{{ number_format($master->total_amount,2) }}
</span>
</h4>

<div class="d-flex justify-content-end mt-4">

    <button type="button" class="btn btn-warning mr-2" onclick="history.back()">
        <i class="fa fa-edit"></i> Edit Bill
    </button>

    <button type="button" class="btn btn-success mr-2" onclick="window.print()">
        <i class="fa fa-print"></i> Print Bill
    </button>

    <a href="#" class="btn btn-primary">
        <i class="fa fa-plus"></i> New Sale
    </a>

</div>
                  


                                        
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->


                                        
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Content-->
						</div>
						<!--begin::Content Wrapper-->
					</div>


					
@endsection