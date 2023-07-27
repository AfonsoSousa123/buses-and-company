<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

    <!--begin::Head-->
    @include('layouts.partials.header')
    <!--end::Head-->
    <!--begin::Body-->

    @yield('body')

    <!--begin::Global Javascript Bundle(used by all pages)-->
    @include('layouts.partials.footer')
    <!--end::Global Javascript Bundle-->

<!--end::Body-->
</html>
