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
											<h5 class="text-dark font-weight-bold my-1 mr-5">Local Data</h5>
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
								@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
	@if(session('error'))
 <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
								<!--end::Notice-->
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
									
										<div class="card-toolbar">
											<!--begin::Dropdown-->
										
											<!--end::Dropdown-->
											<!--begin::Button-->
											<a href="{{url('shop')}}" class="btn btn-primary font-weight-bolder" >
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>Back To List</a>



                                            
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Search Form-->
										<!--begin::Search Form-->
										
										<!--end::Search Form-->
										<!--end: Search Form-->

    <div class="modal-header">
        <h5 class="modal-title">Edit Shop Entries</h5>
       
    </div>

	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{ route('shop.update', $shop->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="modal-body">

            <!-- ================= PERSONAL DETAILS ================= -->
            <h5 class="mb-4 text-primary">Edit Personal Details</h5>
            <div class="row">

                <div class="col-sm-3 form-group">
                    <label>Shop Owner Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="shop_owner_name"  value="{{ $shop->shop_owner_name }}" >
                </div>

                <div class="col-sm-3 form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ $shop->email }}" >
                </div>

                <div class="col-sm-3 form-group">
                    <label>Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone_number" value="{{$shop->phone_number}}">
                </div>

                <div class="col-sm-3 form-group">
					<label>Aadhar Number <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="aadhar_number" maxlength="12" value="{{$shop->aadhar_number}}">
				</div>
				<div>
				@if($shop->aadhar_card)
                    <p>Current File: 
                        <a href="{{ asset('uploads/'.$shop->aadhar_card) }}" target="_blank">View</a>
                    </p>
                    @endif
                    <input type="file" class="form-control" name="aadhar_card"></div>
                  

                <div class="col-sm-3 form-group">
                    <label>PAN Card <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pancard_number" value="{{$shop->pancard_number}}" >
                </div>

				<div>
                @if($shop->pan_proof)
                    <p>Current File: 
                        <a href="{{ asset('uploads/'.$shop->pan_proof) }}" target="_blank">View</a>
                    </p>
                    @endif
                    <input type="file" class="form-control" name="pan_proof"></div>

            </div>

            <hr>

            <!-- ================= SHOP DETAILS ================= -->
            <h5 class="mb-4 text-primary">Edit Shop Details</h5>
            <div class="row">

                <div class="col-sm-3 form-group">
                    <label>Shop Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{$shop->name}}" >
                </div>

                <div class="col-sm-3 form-group">
                    <label>Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" value="{{$shop->address}}">
                </div>

                <div class="col-sm-3 form-group">
                    <label>District <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="district" value="{{$shop->district}}">
                </div>

                <div class="col-sm-3 form-group">
                    <label>State <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="state"value="{{$shop->state}}">
                </div>

                <div class="col-sm-3 form-group">
                    <label>GST Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="gst_number" value="{{$shop->gst_number}}">
                </div>

               <div> @if($shop->ffssai)
                    <p>Current File: 
                        <a href="{{ asset('uploads/'.$shop->ffssai) }}" target="_blank">View</a>
                    </p>
                    @endif
                    <input type="file" class="form-control" name="ffssai"></div>


                 <div>@if($shop->municipality_license)
                    <p>Current File: 
                        <a href="{{ asset('uploads/'.$shop->municipality_license) }}" target="_blank">View</a>
                    </p>
                    @endif
                    <input type="file" class="form-control" name="municipality_license"></div>

            </div>


			  <h5 class="mb-4 text-primary">Change Password</h5>
            <div class="row">

                <div class="col-sm-3 form-group">
                    <label>Change Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password"  value="{{$shop->password}}" >
                </div>

				   <div class="col-sm-3 form-group">
                    <label>Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password_confirmation"  value="{{$shop->password}}">
                </div>

               

            </div>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

									


                  


                                        
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