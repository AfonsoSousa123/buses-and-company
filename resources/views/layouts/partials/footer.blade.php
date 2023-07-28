{{--Scripts--}}
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}?v={{config('app.version_code')}}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}?v={{config('app.version_code')}}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}?v={{config('app.version_code')}}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}?v={{config('app.version_code')}}"></script>
@yield('footer_assets')
<!--end::Global Javascript Bundle-->
