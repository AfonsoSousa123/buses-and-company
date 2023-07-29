<!--begin::Container-->
<div class="container-fluid d-flex align-items-stretch justify-content-between">
    <!--begin::Mobile logo-->
    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
        <a href="{{ route('dashboard') }}" class="d-lg-none">
            <img alt="Logo" src="{{ asset('assets/media/logos/BUS-COMPANY-LOGO.png') }}" class="h-auto w-175px" />
        </a>
    </div>
    <!--end::Mobile logo-->
    <!--begin::Wrapper-->
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
        <!--begin::Navbar-->
        <div class="d-flex align-items-stretch" id="kt_header_nav">
            @include('components.wrapper.wrapper-header-nav')
        </div>
        <!--end::Navbar-->
        <!--begin::Topbar-->
        <div class="d-flex align-items-stretch flex-shrink-0">
            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                @auth
                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-lg-3" id="kt_header_user_menu_toggle">
                        <div class="d-flex flex-column-auto mr-1 fs-5">
                            <div class="fw-bolder d-flex">
                                {{ auth()->user()->username != null ? auth()->user()->username : '' }}
                            </div>
                        </div>
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
    {{--                        @if (Str::userAvatar(Auth::user()->id) != null)--}}
    {{--                            <img src="{{ asset(Str::userAvatar(Auth::user()->id)) }}" alt="avatar"/>--}}
    {{--                        @else--}}
                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="avatar"/>
    {{--                        @endif--}}
                        </div>
                        <!--begin::Menu-->
                        <!--begin::Aside mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none" title="Show aside menu">
                            <div class="btn btn-icon btn-icon-primary w-40px h-40px w-md-50px h-md-50px me-0" id="kt_aside_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                                <span class="svg-icon svg-icon-2hx mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                            <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="1" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Aside mobile toggle-->

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
    {{--                                <div class="symbol symbol-50px me-5">--}}
    {{--                                    <img alt="Logo" src="{{ Str::userAvatar(Auth::user()->id) != null ? asset(Str::userAvatar(Auth::user()->id)) : asset('assets/media/avatars/blank.png') }}" />--}}
    {{--                                </div>--}}
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->username != null ? auth()->user()->username : '' }}
    {{--                                        @if (Auth::user()->roles->count() > 0)--}}
    {{--                                            @foreach (Auth::user()->roles as $role)--}}
    {{--                                                <span class="badge badge-light-primary fw-bolder fs-8 px-2 py-1 ms-2">{{ $role->display_name }}</span>--}}
    {{--                                            @endforeach--}}
    {{--                                        @else--}}
                                                <span class="badge badge-light-primary fw-bolder fs-8 px-2 py-1 ms-2">Não tem role atribuída</span>
    {{--                                        @endif--}}
                                        </div>
                                        <a class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email != null ? auth()->user()->email : '' }}</a>
                                        <div class="text-primary fw-bold">
                                            <span>v</span>{{config('app.version')}}
                                        </div>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
    {{--                        <div class="menu-item px-5">--}}
    {{--                            <a href="{{ route('user-profile') }}" class="menu-link px-5">--}}
    {{--                                 <span class="menu-icon">--}}
    {{--                                      <span class="svg-icon svg-icon-2 me-1 text-hover-primary">--}}
    {{--                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                                         <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"/>--}}
    {{--                                          <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"/>--}}
    {{--                                        </svg>--}}
    {{--                                    </span>--}}
    {{--                                </span>--}}
    {{--                                Perfil--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('logout') }}" class="menu-link px-5" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span class="menu-icon">
                                          <span class="svg-icon svg-icon-2 me-1 text-hover-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.25" d="M13.1409 21.8611C11.5331 21.7101 10.3267 20.4628 10.2092 18.8523C10.0992 17.3432 10 15.118 10 12C10 8.882 10.0992 6.65682 10.2092 5.14773C10.3267 3.5372 11.5331 2.2899 13.1408 2.13886C13.9779 2.06022 14.9589 2 16 2C17.0411 2 18.0221 2.06022 18.8592 2.13886C20.4669 2.2899 21.6733 3.53721 21.7908 5.14773C21.9008 6.65683 22 8.882 22 12C22 15.118 21.9008 17.3432 21.7908 18.8523C21.6733 20.4628 20.4669 21.7101 18.8591 21.8611C18.0221 21.9398 17.0411 22 16 22C14.9589 22 13.9779 21.9398 13.1409 21.8611Z" fill="#12131A"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.20711 14.7929C7.59763 15.1834 7.59763 15.8166 7.20711 16.2071C6.81658 16.5976 6.18342 16.5976 5.79289 16.2071L2.29289 12.7071C1.90237 12.3166 1.90237 11.6834 2.29289 11.2929L5.79289 7.79289C6.18342 7.40237 6.81658 7.40237 7.20711 7.79289C7.59763 8.18342 7.59763 8.81658 7.20711 9.20711L5.41421 11H15C15.5523 11 16 11.4477 16 12C16 12.5523 15.5523 13 15 13L5.41421 13L7.20711 14.7929Z" fill="#12131A"/>
                                            </svg>
                                        </span>
                                    </span>
                                    Terminar Sessão
                                </a>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                @endauth
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Container-->
