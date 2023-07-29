@extends('layouts.master')

@section('content')
    @include('layouts.partials.messages')
    @include('layouts.partials.errors')

    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div class="w-100 bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">

                    <div class="flex justify-center">
                        <h1> This is the Dashboard</h1>
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-basic" href="assets/media/stock/900x600/23.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                 style="background-image:url('assets/media/stock/900x600/23.jpg')">
                            </div>
                            <!--end::Image-->

                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                        <!--end::Overlay-->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_assets')
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endsection

