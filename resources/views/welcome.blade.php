@extends('layouts.app')

{{--Scripts no cabeçalho que são utilizados apenas nesta página--}}
@section('header_assets')

@endsection

@section('body')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size: 100% 100%; background-image: url({{ asset('assets/media/patterns/bus-wallpaper.jpg') }} )">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div class="w-lg-800px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Button-->
                    <div class="menu-item me-lg-1 mb-5">
                        <a class="btn btn-light-primary btn-hover-scale py-3" href="{{ route('login') }}">
                            <span class="menu-title">{{ __('Login') }}</span>
                        </a>
                    </div>
                    <!--end::Button-->

                    <div id="kt_carousel_3_carousel" class="carousel carousel-custom slide mb-10" data-bs-ride="carousel" data-bs-interval="8000">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <!--begin::Label-->
                            <span class="fs-4 fw-bold pe-2">{{ __('Important Info') }}</span>
                            <!--end::Label-->

                            <!--begin::Carousel Indicators-->
                            <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
                                <li data-bs-target="#kt_carousel_3_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
                                <li data-bs-target="#kt_carousel_3_carousel" data-bs-slide-to="1" class="ms-1"></li>
                                <li data-bs-target="#kt_carousel_3_carousel" data-bs-slide-to="2" class="ms-1"></li>
                            </ol>
                            <!--end::Carousel Indicators-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Carousel-->
                        <div class="carousel-inner pt-8">
                            <!--begin::Item-->
                            <div class="carousel-item active">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="carousel-item">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="carousel-item">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Carousel-->
                    </div>

                    <!--begin::Accordion-->
                    <div class="accordion accordion-icon-collapse mb-12" id="kt_accordion_3">
                        <!--begin::Item-->
                        <div class="mb-5">
                            <!--begin::Header-->
                            <div class="accordion-header py-3 d-flex" data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_item_1">
                                <span class="accordion-icon">
                                    <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span class="path1"></span><span class="path2"></span></i>
                                </span>
                                <h3 class="fs-4 fw-semibold mb-0 ms-4">The best way to quick start business</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div id="kt_accordion_3_item_1" class="fs-6 collapse show ps-10" data-bs-parent="#kt_accordion_3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="mb-5">
                            <!--begin::Header-->
                            <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_item_2">
                                <span class="accordion-icon">
                                <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span class="path1"></span><span class="path2"></span></i>
                                </span>
                                <h3 class="fs-4 fw-semibold mb-0 ms-4">How To Create Channel ?</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div id="kt_accordion_3_item_2" class="collapse fs-6 ps-10" data-bs-parent="#kt_accordion_3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="mb-5">
                            <!--begin::Header-->
                            <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_item_3">
                                <span class="accordion-icon">
                                <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span class="path1"></span><span class="path2"></span></i>
                                </span>
                                <h3 class="fs-4 fw-semibold mb-0 ms-4">What are the support terms & conditions ?</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div id="kt_accordion_3_item_3" class="collapse fs-6 ps-10" data-bs-parent="#kt_accordion_3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Accordion-->
                    <!--begin::Overlay-->
                    <a class="d-block overlay mr-2" data-fslightbox="lightbox-basic" href="{{ asset('assets/media/misc/project-detail-2.jpg') }}">
                        <!--begin::Image-->
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-150px min-w-250px" style="background-image:url('{{ asset('assets/media/misc/project-detail-2.jpg') }}') !important;">
                        </div>
                        <!--end::Image-->

                        <!--begin::Action-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                            <i class="bi bi-eye-fill text-white fs-3x"></i>
                        </div>
                        <!--end::Action-->
                    </a>
                    <!--end::Overlay-->
                </div><!--end::Card-->
            </div>
        </div>
    </div>
@endsection

{{--Scripts no rodapé que são utilizados apenas nesta página--}}
@section('footer_assets')
    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endsection
