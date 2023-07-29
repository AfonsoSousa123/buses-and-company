@extends('layouts.app')

@section('body')
    <!--begin::Body-->
    <body id="kt_body" class="bg-dark">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Error 404 -->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
                <!--begin::Logo-->
                <a href="{{ route('dashboard') }}" class="mb-5 pt-lg-20">
                    <img alt="Logo" src="{{ asset('assets/media/logos/BUS-COMPANY-LOGO.png') }}" width="350" height="auto" class="h-auto" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="pt-lg-10">
                    <!--begin::Logo-->
                    <h1 class="fw-bolder fs-4x text-gray-700 mb-10">@yield('title')</h1>
                    <!--end::Logo-->
                    <!--begin::Code-->
                    <div class="fw-bold fs-2 text-gray-400 mb-15">Erro @yield('code')</div>
                    <!--end::Code-->
                    <!--begin::Message-->
                    <div class="fw-bold fs-3 text-gray-400 mb-15">@yield('message')</div>
                    <!--end::Message-->
                    <!--begin::Action-->
                    <div class="text-center align-center">
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-light-primary fw-bolder">
                            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen058.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                                    <path d="M12.0657 12.5657L14.463 14.963C14.7733 15.2733 14.8151 15.7619 14.5621 16.1204C14.2384 16.5789 13.5789 16.6334 13.1844 16.2342L9.69464 12.7029C9.30968 12.3134 9.30968 11.6866 9.69464 11.2971L13.1844 7.76582C13.5789 7.3666 14.2384 7.42107 14.5621 7.87962C14.8151 8.23809 14.7733 8.72669 14.463 9.03696L12.0657 11.4343C11.7533 11.7467 11.7533 12.2533 12.0657 12.5657Z" fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            Voltar Atrás
                        </a>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
{{--                <div class="d-flex align-items-center fw-bold fs-6">--}}
{{--                    <a href="https://www.funchal.pt" target="_blank" class="text-muted text-hover-primary px-2">CMF</a>--}}
{{--                    <a href="https://intranet.cm-funchal.pt" target="_blank" class="text-muted text-hover-primary px-2">Intranet</a>--}}
{{--                </div>--}}
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Error 404-->
    </div>
    <!--end::Main-->
    </body>
    <!--end::Body-->
@endsection
