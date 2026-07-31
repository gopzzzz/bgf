@extends('layouts.mainlayout') @section('content')

<style>
    /* Main Card */
    .card-custom{
        border:none;
        border-radius:20px;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
    }
    
    /* LEFT PANEL */
    .left-panel{
        background:#fff;
        border-radius:20px;
        padding:20px;
        height:calc(100vh - 160px);
        overflow-y:auto;
        box-shadow:0 5px 20px rgba(0,0,0,.05);
    }
    
    /* RIGHT BILL PANEL */
    .bill-panel{
        background:#fff;
        border-radius:20px;
        padding:20px;
        position:sticky;
        top:15px;
        /* height:calc(100vh - 160px);
        overflow-y:auto; */
        box-shadow:0 8px 30px rgba(0,0,0,.08);
    }
    
    /* SEARCH */
    .search-box{
        position:relative;
        margin-bottom:20px;
    }
    
    .search-box i{
        position:absolute;
        left:15px;
        top:50%;
        transform:translateY(-50%);
        color:#999;
    }
    
    .search-box input{
        border-radius:40px;
        border:1px solid #ddd;
        height:50px;
        padding-left:45px;
        box-shadow:none;
    }
    
    .search-box input:focus{
        border-color:#0d6efd;
        box-shadow:0 0 0 .2rem rgba(13,110,253,.15);
    }
    
    /* PRODUCT CARD */
    .item-card{
        border:none;
        border-radius:18px;
        overflow:hidden;
        transition:.25s;
        cursor:pointer;
        background:#fff;
        box-shadow:0 8px 20px rgba(0,0,0,.05);
    }
    
    .item-card:hover{
        transform:translateY(-6px);
        box-shadow:0 20px 40px rgba(0,0,0,.12);
        border:1px solid #0d6efd;
    }
    
    .item-card .card-body{
        padding:18px;
    }
    
    .item-card img{
        width:85px;
        height:85px;
        object-fit:contain;
        margin:auto;
        transition:.3s;
    }
    
    .item-card:hover img{
        transform:scale(1.08);
    }
    
    .item-card h6{
        font-size:15px;
        font-weight:600;
        margin-top:10px;
        color:#222;
        min-height:40px;
    }
    
    /* BRAND BADGE */
    .badge{
        padding:6px 14px;
        border-radius:30px;
        font-size:11px;
        font-weight:500;
    }
    
    /* PRICE */
    .text-success{
        font-size:22px;
        font-weight:700;
    }
    
    .text-primary{
        font-size:22px;
        font-weight:700;
    }
    
    /* ADD BUTTON */
    .item-card .btn{
        border-radius:12px;
        font-weight:600;
        margin-top:10px;
        transition:.3s;
    }
    
    .item-card .btn:hover{
        transform:scale(1.03);
    }
    
    /* BILL HEADER */
    .bill-header{
        background:linear-gradient(135deg,#0d6efd,#4f8cff);
        color:#fff;
        border-radius:15px;
        text-align:center;
        padding:20px;
        margin-bottom:20px;
    }
    
    .bill-header img{
        width:60px;
        height:60px;
        border-radius:50%;
        background:#fff;
        padding:5px;
    }
    
    .bill-header h5{
        margin-top:10px;
        margin-bottom:0;
    }
    
    /* BILL ROW */
    .bill-row{
        background:#f8fafc;
        border-radius:12px;
        padding:12px;
        margin-bottom:10px;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }
    
    .bill-row:hover{
        background:#eef4ff;
    }
    
    /* QTY BUTTON */
    .qty-btn{
        width:32px;
        height:32px;
        border-radius:50%;
        border:none;
        background:#eef2f7;
        font-weight:bold;
    }
    
    .qty-btn:hover{
        background:#0d6efd;
        color:#fff;
    }
    
    /* TOTAL */
    .total-box{
        background:linear-gradient(135deg,#198754,#32c766);
        color:#fff;
        border-radius:15px;
        padding:18px;
        text-align:center;
        margin:20px 0;
    }
    
    .total-box h2{
        margin:0;
        font-weight:700;
        font-size:32px;
    }
    
    /* GENERATE BUTTON */
    .proceed-btn button{
        height:55px;
        border-radius:15px;
        font-size:17px;
        font-weight:600;
        box-shadow:0 8px 20px rgba(25,135,84,.35);
    }
    
    .proceed-btn button:hover{
        transform:translateY(-2px);
    }
    
    /* SCROLLBAR */
    .left-panel::-webkit-scrollbar,
    .bill-panel::-webkit-scrollbar{
        width:8px;
    }
    
    .left-panel::-webkit-scrollbar-thumb,
    .bill-panel::-webkit-scrollbar-thumb{
        background:#cfd6df;
        border-radius:20px;
    }
    
    /* HEADER */
    .modal-header{
        border:none;
        margin-bottom:15px;
    }
    
    .modal-title{
        font-weight:700;
        color:#222;
    }
    
    /* RESPONSIVE */
    @media(max-width:992px){
    
        .left-panel,
        .bill-panel{
            height:auto;
            position:relative;
        }
    
        .bill-panel{
            margin-top:20px;
        }
    }
    .bill-items{
        max-height:auto;
        /* overflow-y:auto; */
        padding-right:5px;
    }
    
    .bill-item-card{
        background:#fff;
        border:1px solid #edf1f7;
        border-radius:15px;
        padding:15px;
        margin-bottom:12px;
        transition:.3s;
        box-shadow:0 3px 10px rgba(0,0,0,.05);
    }
    
    .bill-item-card:hover{
        border-color:#0d6efd;
        box-shadow:0 8px 18px rgba(13,110,253,.12);
    }
    
    .bill-item-title{
        font-size:15px;
        font-weight:600;
        margin-bottom:3px;
        color:#222;
    }
    
    .bill-price{
        color:#198754;
        font-weight:700;
        font-size:22px;
    }
    
    .qty-control{
        display:flex;
        align-items:center;
        gap:10px;
        background:#f4f6fa;
        border-radius:30px;
        padding:4px;
    }
    
    .qty-control span{
        min-width:20px;
        text-align:center;
        font-weight:600;
    }
    
    .qty-btn{
        width:32px;
        height:32px;
        border:none;
        border-radius:50%;
        background:#fff;
        color:#333;
        font-size:18px;
        font-weight:700;
        box-shadow:0 2px 6px rgba(0,0,0,.08);
        transition:.3s;
    }
    
    .qty-btn:hover{
        background:#0d6efd;
        color:#fff;
    }
    
    .bill-item-card .btn-light{
        width:34px;
        height:34px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        background:#fff5f5;
        border:none;
    }
    
    .bill-item-card .btn-light:hover{
        background:#dc3545;
        color:#fff !important;
    }
</style>

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Create Bill</h5>
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
            @endif @if(session('error'))
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
                        <a href="{{url('shop')}}" class="btn btn-primary font-weight-bolder">
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
                        <h5 class="modal-title">Shop Entries</h5>

                    </div>


                    <div class="container-fluid">
                        <div class="row g-3">

                            <!-- LEFT PANEL -->
                            <div class="col-lg-9 ">
                                <div class="left-panel">

                                    <!-- Search -->
                                    <div class="row mb-3">
                                        <div class="col-md-5 ms-auto">
                                            <div class="search-box">
                                                <i class="ri-search-line"></i>
                                                <input type="text" class="form-control" placeholder="Search Items...">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Items -->
                                    <div class="row g-2">

                                        @foreach($items as $item)

                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="card item-card h-100">
                                                <div class="card-body p-2 text-center">

                                                    <img src="{{ asset('assets/images/logo.jpeg') }}" class="img-fluid mb-2" style="height:70px;object-fit:contain;">

                                                    <span class="badge bg-primary mb-1">
                                    {{ $item->brand_name }}
                                </span>

                                                    <h6 class="small fw-bold mb-1">
                                    {{ $item->item_name }}
                                </h6> @if($item->special_rate)

                                                    <small class="text-decoration-line-through text-muted d-block">
                                        ₹{{ number_format($item->offer_price,2) }}
                                    </small>

                                                    <div class="fw-bold text-success">
                                                        ₹{{ number_format($item->special_rate,2) }}
                                                    </div>

                                                    @else

                                                    <div class="fw-bold text-primary">
                                                        ₹{{ number_format($item->offer_price,2) }}
                                                    </div>

                                                    @endif

                                                  <button type="button"
        class="btn btn-success btn-sm w-100 mt-2 add-to-cart"
        data-id="{{ $item->id }}"
        data-name="{{ $item->item_name }}"
        data-price="{{ $item->special_rate ? $item->special_rate : $item->offer_price }}">
    <i class="ri-add-line"></i> Add
</button>

                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                    </div>

                                </div>
                            </div>

                            <!-- RIGHT BILL -->
                            <div class="col-lg-3">
                                <div class="bill-panel">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('assets/images/logo.jpeg') }}" class="img-fluid mb-2" style="height:70px;object-fit:contain;">
                                        <small>Shop Address</small>
                                    </div>

                                    <hr>

                                    <!-- BILL META -->
                                    <p><strong>Bill No:</strong> 1</p>
                                    <p><strong>Date:</strong> {{ date('d/m/Y') }}</p>
                                    <hr>

									<form method="POST" action="{{url('generatebill')}}" enctype="multipart/form-data" name="crmedit">

                                                @csrf

                                    <div class="bill-items" id="cartItems">

                                     

                                    

                                    </div>

									  <hr>

                                    <!-- TOTAL -->
                                    <h5 class="mb-3">Total : <span id="grandTotal">0</span></h5>
									

                                    <!-- PAY BUTTON -->
                                    <div class="proceed-btn">
                                        <button type="submit" class="btn btn-success w-100">
                                            GENERATE
                                        </button>
                                    </div>
</form>

                                  
                                </div>
                            </div>

                        </div>
                    </div>







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