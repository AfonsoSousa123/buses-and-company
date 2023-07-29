@extends('layouts.app')

@section('body')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size: 100% 100%; background-image: url({{ asset('assets/media/patterns/bus-wallpaper.jpg') }} )">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @include('layouts.partials.logo')

                        @if ($errors->any())
                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first() }}</div>
                        @endif

                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label for="email" class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
                            </div>
                            <!--begin::Input-->
                            <input id="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" name="email" autocomplete="email" required/>
                            @error ('email')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label for="password" class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input id="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="current-password" required/>
                            @error ('password')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-10">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!--begin::Actions-->
                        <div class="fv-row">
                            <!--begin::Submit button-->
                            <div class="d-flex flex-column">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">{{ __('Login') }}</span>
                                    <span class="indicator-progress">{{ __('Loading, please wait...') }}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __("Don't have an account yet? Register Here") }}
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

{{--Scripts no rodapé que são utilizados apenas nesta página--}}
@section('footer_assets')
    <script src="{{ asset( 'assets/js/custom/authentication/sign-in/general.js') }}"></script>
@endsection
