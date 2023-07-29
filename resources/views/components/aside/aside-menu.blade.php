<!--begin::Aside Menu-->
<div class="hover-scroll-overlay-y lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
        <div class="menu-item">
            <a class="menu-link {{ (request()->is('/')) || (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg-->
                    <span class="svg-icon svg-icon-2 fs-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </div>
{{--        @permission('view-events')--}}
        <div class="menu-item">
            <div class="menu-content">
                <div class="separator mx-1"></div>
            </div>
        </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('buses')) ? 'hover show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/Interface/Lock.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-bus fs-4"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">{{ __('Buses') }}</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ (request()->is('buses')) || (request()->is('buses/search')) ? 'active' : '' }}" href="{{ route('buses-list') }}">
                            <span class="menu-icon">
                                <i class="fas fa-th-list fs-4"></i>
                            </span>
                            <span class="menu-title">Lista</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('buses-history') }}">
                            <span class="menu-icon">
                                <i class="fas fa-history fs-4"></i>
                            </span>
                            <span class="menu-title">Histórico</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ (request()->is('backoffice/event-management/trash')) ? 'active' : '' }}" href="{{ route('buses-trash') }}">
                            <span class="menu-icon">
                                <i class="far fa-trash-alt fs-4"></i>
                            </span>
                            <span class="menu-title">Reciclagem</span>
                        </a>
                    </div>
                </div>
            </div>
{{--        @endpermission--}}
{{--        @permission('view-images')--}}
        <div class="menu-item">
            <div class="menu-content">
                <div class="separator mx-1"></div>
            </div>
        </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('images*')) || (request()->is('image-management*')) ? 'hover show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen006.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx">
                           <i class="fas fa-image fs-4"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">{{ __('Galery') }}</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ (request()->is('images/')) || (request()->is('image-management/*/*')) ? 'active' : '' }}" href="{{ route('image-list') }}">
                            <span class="menu-icon">
                                <i class="fas fa-th-list fs-4"></i>
                            </span>
                            <span class="menu-title">{{ __('List') }}</span>
                        </a>
                    </div>
{{--                    @permission('manage-images')--}}
                        <div class="menu-item">
                            <a class="menu-link {{ (request()->is('image-management/history')) ? 'active' : '' }}" href="{{ route('image-history') }}">
                                <span class="menu-icon">
                                    <i class="fas fa-history fs-4"></i>
                                </span>
                                <span class="menu-title">{{ __('History') }}</span>
                            </a>
                        </div>
{{--                    @endpermission--}}
                </div>
            </div>
{{--        @endpermission--}}

{{--        @role('admin')--}}
{{--        <div class="menu-item">--}}
{{--            <div class="menu-content">--}}
{{--                <div class="separator mx-1"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('backoffice/admin*')) ? 'hover show' : '' }}">--}}
{{--            <span class="menu-link">--}}
{{--                <span class="menu-icon">--}}
{{--                    <span class="svg-icon">--}}
{{--                        <i class="fas fa-user-circle fs-4"></i>--}}
{{--                    </span>--}}
{{--                </span>--}}
{{--                <span class="menu-title">Utilizadores</span>--}}
{{--                <span class="menu-arrow"></span>--}}
{{--            </span>--}}
{{--            <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--                <div class="menu-item">--}}
{{--                    <a class="menu-link {{ (request()->is('backoffice/admin/user-management/*')) ? 'active' : '' }}" href="{{ route('user-list') }}">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <i class="fas fa-th-list fs-4"></i>--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Listagem</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="menu-item">--}}
{{--                    <a class="menu-link {{ (request()->is('backoffice/admin/role-management/*')) ? 'active' : '' }}" href="{{ route('role-list') }}">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <i class="fas fa-user-tag fs-4"></i>--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Papeis</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="menu-item">--}}
{{--                    <a class="menu-link {{ (request()->is('backoffice/admin/perm-management/*')) ? 'active' : '' }}" href="{{ route('perm-list') }}">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <i class="fas fa-user-shield fs-4"></i>--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Permissões</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endrole--}}
    </div>
    <!--end::Menu-->
</div>
