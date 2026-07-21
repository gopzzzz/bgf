<!DOCTYPE html>

<html lang="en">

@include('layouts.partials.head')



<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed subheader-enabled page-loading">


    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('layouts.partials.navbar') @include('layouts.partials.header') @yield('content') @include('layouts.partials.footer')

                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    @include('layouts.partials.sidebar') 
    
    @include('layouts.partials.footer-scripts')




</body>
<!--end::Body-->

</html>