@extends('layouts.app')

@section('body')
    @include('layouts.partials.messages')

    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size: 100% 100%; background-image: url({{ asset('assets/media/patterns/bus-wallpaper.jpg') }} )">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        @include('layouts.partials.logo')

                        @if ($errors->any())
                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first() }}</div>
                        @endif

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label for="email" class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
                            </div>
                            <!--begin::Input-->
                            <input id="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" name="email" autocomplete="email" required/>
                            @error ('email')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="fv-row">
                            <!--begin::Submit button-->
                            <div class="d-flex flex-column">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">{{ __('Send Password Reset Link') }}</span>
                                    <span class="indicator-progress">{{ __('Loading, please wait...') }}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Return to Login') }}
                                </a>
                            </div>
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
