@extends('layouts.master')

@section('content')
    @include('layouts.partials.messages')
    @include('layouts.partials.errors')

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            This is the Main Page

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
@endsection

