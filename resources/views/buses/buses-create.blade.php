<!--begin::Modal - New Bus-->
<div class="modal fade" id="kt_modal_add_buses" role="dialog" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-850px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('buses-store') }}" method="post" id="kt_modal_add_buses_form" enctype="multipart/form-data">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder" data-kt-calendar="title">{{ __('Create Bus') }}
{{--                        {{ (request()->is('backoffice/ls-bus-management/*')) || (request()->is('backoffice/ls-buss/*'))  ? 'Ecrã Bloqueio' : '' }}--}}
                    </h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_buses_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">

{{--                    <!--begin::Wrapper-->--}}
{{--                    <div class="d-flex align-content-center justify-content-center mb-4">--}}
{{--                        <!--begin::Alert-->--}}
{{--                        <div class="alert bg-white d-flex flex-column align-items-center flex-lg-row p-5 mt-3 mt-md-0 mt-lg-0 mt-xl-0">--}}
{{--                            <div class="d-flex align-items-center pe-0 pe-sm-4 mt-3 mt-md-0 mt-lg-0 mt-xl-0">--}}
{{--                                <!--begin::Content-->--}}
{{--                                <div class="fw-bolder fs-lg-5 fs-6 pe-lg-4 mr-md-5 mr-lg-5 mr-xl-5">--}}
{{--                                    <span class="text-dark fs-lg-2 fs-1">+</span>--}}
{{--                                    <span class="">Prioritário</span>--}}
{{--                                </div>--}}
{{--                                <!--end::Content-->--}}
{{--                            </div>--}}

{{--                            <div class="d-flex align-items-center pe-0 pe-sm-4 mt-3 mt-md-0 mt-lg-0 mt-xl-0">--}}
{{--                                <!--begin::Content-->--}}
{{--                                <div class="text-primary align-middle d-block">--}}
{{--                                    <span class="badge badge-circle badge-danger fw-bolder fs-5 pt-4 px-4 pb-4 me-1">1</span>--}}
{{--                                    <span class="badge badge-circle badge-warning fw-bolder fs-5 pt-4 px-4 pb-4 me-1">2</span>--}}
{{--                                    <span class="badge badge-circle badge-success fw-bolder fs-5 pt-4 px-4 pb-4 me-1">3</span>--}}
{{--                                    <span class="badge badge-circle badge-info fw-bolder fs-5 pt-4 px-4 pb-4 me-1">4</span>--}}
{{--                                    <span class="badge badge-circle badge-primary fw-bolder fs-5 pt-4 px-4 pb-4 me-1">5</span>--}}
{{--                                </div>--}}
{{--                                <!--end::Content-->--}}
{{--                            </div>--}}
{{--                            <!--end::Wrapper-->--}}

{{--                            <div class="d-flex align-items-center pe-0 pe-sm-10 mt-3 mt-md-0 mt-lg-0 mt-xl-0">--}}
{{--                                <!--begin::Content-->--}}
{{--                                <div class="fw-bolder fs-lg-5 fs-6 px-5">--}}
{{--                                    <span class="text-dark fs-lg-2 fs-1">-</span>--}}
{{--                                    <span class="">Prioritário</span>--}}
{{--                                </div>--}}
{{--                                <!--end::Content-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Alert-->--}}

{{--                    </div>--}}

                    <!--begin::Input Group-->
                    <div class="row row-cols-lg-2 g-10">
                        <div class="col-lg-6">
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold required mb-2">{{ __('Licence Plate') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input
                                    type="text"
                                    class="form-control form-control-solid @error('licence_plate') is-invalid @enderror"
                                    name="licence_plate"
                                    id="licence_plate"
                                    value="{{ old('licence_plate') }}"
                                    placeholder="{{ __('__-__-__') }}"
                                    required
                                >
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                @error('licence_plate')
                                    @foreach($errors->get('licence_plate') as $message)
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @endforeach
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!--begin::State group-->
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label for="brand_select" class="fs-6 fw-bold mb-2 required">{{ __('Brand') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group input-group-solid">
                                    <div class="flex-grow-1">
                                        <select
                                            class="form-select form-select-solid @error('brand_select') is-invalid @enderror"
                                            id="brand_select"
                                            name="brand_select"
                                            data-control="select2"
                                            data-placeholder="{{ __('Select a Brand') }}"
                                            data-dropdown-parent="#kt_modal_add_buses_form"
                                            data-allow-clear="true"
                                            data-hide-search="false"
                                        >
                                            <option></option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input-->

                                <div class="fv-plugins-message-container invalid-feedback">@error('brand_select') {{ $message }} @enderror</div>
                            </div>
                            <!--end::State group-->
                        </div>
                    </div>
                    <!--end::Input Group-->

                    <!--begin::Input group-->
                    <div class="row row-cols-lg-2 g-10">
                        <div class="col-lg-6">
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">{{ __('Model') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input
                                    type="text"
                                    class="form-control form-control-solid @error('model') is-invalid @enderror"
                                    name="model"
                                    id="model"
                                    value="{{ old('model') }}"
                                    placeholder="{{ __('Insert the Model') }}"
                                >
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                @error('model')
                                    @foreach($errors->get('model') as $message)
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @endforeach
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!--begin::Company group-->
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label for="company_select" class="fs-6 fw-bold mb-2 required">{{ __('Company') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group input-group-solid">
                                    <div class="flex-grow-1">
                                        <select
                                            class="form-select form-select-solid @error('company_select') is-invalid @enderror"
                                            id="company_select"
                                            name="company_select"
                                            data-control="select2"
                                            data-placeholder="{{ __('Select a Company') }}"
                                            data-dropdown-parent="#kt_modal_add_buses_form"
                                            data-allow-clear="true"
                                            data-hide-search="false"
                                        >
                                            <option></option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">
                                                    {{ $company->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input-->

                                <div class="fv-plugins-message-container invalid-feedback">@error('company_select') {{ $message }} @enderror</div>
                            </div>
                            <!--end::Company group-->
                        </div>
                    </div>
                    <!--end::Input group-->

                    <div class="row row-cols-lg-2 g-10 mb-7">
                        <!--begin::Prod Year group-->
                        <div class="col-g-6">
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2 required">{{ __('Production Year') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-solid flatpickr-input @error('prod_year') is-invalid @enderror"
                                    name="prod_year"
                                    placeholder="Select the production year"
                                    id="kt_datepicker_prod_year"
                                    value="{{ old('prod_year') }}"
                                    type="text"
                                    readonly="readonly"
                                    required
                                >
                                <!--end::Input-->
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                @error('prod_year')
                                @foreach($errors->get('prod_year') as $message)
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @endforeach
                                @enderror
                            </div>
                        </div>
                        <!--end::Prod Year group-->
                        <!--begin::State group-->
                        <div class="col-lg-6">
                            <div class="fv-row mb-9">
                                <!--begin::Label-->
                                <label for="bus_state" class="fs-6 fw-bold mb-2 required">{{ __('State') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group input-group-solid">
                                    <div class="flex-grow-1">
                                        <select
                                            class="form-select form-select-solid @error('bus_state') is-invalid @enderror"
                                            id="bus_state"
                                            name="bus_state"
                                            data-control="select2"
                                            data-dropdown-parent="#kt_modal_add_buses_form"
                                            data-placeholder="{{ __('Select a State') }}"
                                            data-allow-clear="false"
                                            data-hide-search="true"
                                        >
                                            @foreach ($selectStates as $state)
                                                <option value="{{ $state->id }}">
                                                    {{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input-->

                                <div class="fv-plugins-message-container invalid-feedback">@error('bus_state') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <!--end::State group-->
                    </div>

                    <div class="row row-cols-lg-2 g-10 mb-7">
                        <!--begin::Description group-->
                        <div class="col-lg-12">
                            <div class="fv-row">
                                <!--begin::Label-->
                                <label for="bus_description" class="fs-6 fw-bold mb-2">{{ __('Description') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea
                                    class="form-control @error('bus_description') is-invalid @enderror form-control-solid"
                                    name="bus_description"
                                    id="bus_description"
                                    placeholder="Insira uma descrição com máximo de 500 carateres"
                                    data-kt-autosize="true"
                                ></textarea>
                                <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback">@error('bus_description') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <!--end::Description group-->
                    </div>

                    <!--begin::Controls-->
                    <div class="fv-row d-flex justify-content-center mb-3" data-select2-id="select2-data-80-8afo">
                        <!--begin::Tab nav-->
                        <ul class="nav nav-pills me-6 mb-2 mb-sm-0">
                            <li class="nav-item m-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Nova imagem">
                                <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3 active" data-bs-toggle="tab" id="new_image_btn" href="#new_image">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen014.svg-->
                                    <span class="svg-icon svg-icon-2">
                                                   <i class="fas fa-file-image fs-2"></i>
                                                </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </li>
                            <li class="nav-item m-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Imagem existente">
                                <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary" data-bs-toggle="tab" id="existing_image_btn" href="#existing_image">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-2">
                                                   <i class="fas fa-images fs-2"></i>
                                                </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </li>
                        </ul>
                        <!--end::Tab nav-->
                    </div>
                    <!--end::Controls-->

                    <!--begin::Tab Content-->
                    <div class="tab-content mt-5 mb-2">
                        <!--begin::Tab pane-->
                        <div id="new_image" class="tab-pane fade active show my-5">
                            <div class="col-lg-12">
                                <!--begin::Dropzone-->
                                <div class="dropzone dropzone-queue mb-2" id="kt_upload_image_dropzone">
                                    <div class="fv-row">
                                        <div class="d-none">
                                            <input type="file" id="image" name="image" />
                                        </div>
                                    </div>

                                    <!--begin::Controls-->
                                    <div class="dropzone-panel mb-4 text-center">
                                        <a class="dropzone-select btn btn-light-primary me-2 dz-clickable">
                                            <span class="svg-icon svg-icon-1">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <g id="Stockholm-icons-/-Files-/-Upload" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" id="Path-57" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <rect id="Rectangle" fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1"></rect>
                                                        <path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" id="Path-102" fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            {{ __('Upload Images') }}
                                        </a>
                                        <div class="d-none">
                                            <a class="dropzone-upload btn btn-light-primary me-2" style="display: none;">{{ __('Send') }}</a>
                                        </div>
                                        <a class="dropzone-remove-all btn btn-light-primary" style="display: none;">{{ __('Remove') }}</a>
                                    </div>
                                    <!--end::Controls-->
                                    <!--begin::Items-->
                                    <div class="dropzone-items wm-200px">
                                        <div class="dropzone-item" style="display:none">
                                            <!--begin::File-->
                                            <div class="dropzone-file">
                                                <div class="dropzone-filename">
                                                    <img data-dz-thumbnail src="" alt="" width="150" height="auto" class="mx-3 my-3 min-h-100">
                                                    <span data-dz-name></span>
                                                    <strong>(<span data-dz-size></span>)</strong>
                                                </div>

                                                <div class="dropzone-error" data-dz-errormessage></div>
                                            </div>
                                            <!--end::File-->

                                            <!--begin::Toolbar-->
                                            <div class="dropzone-toolbar">
                                                <span class="dropzone-start d-none"><i class="bi bi-play-fill fs-3"></i></span>
                                                <span class="dropzone-cancel d-none" data-dz-remove><i class="bi bi-x fs-3"></i></span>
                                                <span class="dropzone-delete d-none" data-dz-remove><i class="bi bi-x fs-1"></i></span>
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                    </div>
                                    <!--end::Items-->
                                    <!--begin::Hint-->
                                    <div class="text-center">
                                        <span class="form-text fs-6 text-muted">Apenas jpg aceite, tamanho máximo da imagem é {{ config('app.image_max_size') }}MB.</span>
                                        <span class="d-none" id="image_size">{{ config('app.image_max_size')}}</span>
                                        <div class="fv-plugins-message-container invalid-feedback">@error('bus_state') {{ $message }} @enderror</div>
                                    </div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Dropzone-->

                                @error('image')
                                @foreach($errors->get('image') as $message)
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                @endforeach
                                @enderror
                            </div>
                        </div>

                        <div id="existing_image" class="tab-pane fade my-5">
                            <div class="row row-cols-lg-12 g-10 mb-6">
                                <!--begin::Image group-->
                                <div class="col-lg-12">
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label for="bus_images" class="fs-6 fw-bold mb-2">{{ __('Image') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="input-group input-group-solid @error('bus_images') is-invalid @enderror">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-image"></i>
                                                        </span>
                                            <div class="flex-grow-1">
                                                <select
                                                    class="form-select form-select-solid"
                                                    id="bus_images"
                                                    name="bus_images[]"
                                                    data-control="select2"
                                                    data-placeholder="Selecione uma Imagem"
                                                    data-dropdown-parent="#kt_modal_add_bus_form"
                                                    data-allow-clear="true"
                                                >
                                                    <option></option>
                                                    @foreach ($images as $image)
                                                        <option value="{{ $image->id }}" data-kt-select2-image="{{ $image->thumbnail }}">
                                                            <span class="text-truncate">{{ $image->real_name }}</span>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        @error('bus_images')
                                            @foreach($errors->get('bus_images') as $message)
                                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                            @endforeach
                                        @enderror
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Image group-->
                            </div>
                        </div>
                    </div>
                    <!--end::Tab content-->

                    <!--begin::Image Preview-->
                    <div class="d-flex justify-content-start mb-7">
                        <img class="rounded mh-150px mh-lg-200px" width="auto" height="auto" id="image-preview" src="">
                    </div>
                    <!--end::Image Preview-->

{{--                    <!--begin::Input group-->--}}
{{--                    <div class="row row-cols-lg-2 g-10">--}}
{{--                        <div class="col">--}}
{{--                            <div class="fv-row mb-9">--}}
{{--                                <!--begin::Label-->--}}
{{--                                <label class="fs-6 fw-bold mb-2 required">Data de Fim</label>--}}
{{--                                <!--end::Label-->--}}
{{--                                <!--begin::Input-->--}}
{{--                                <input--}}
{{--                                    class="form-control form-control-solid @error('bus_end_date') is-invalid @enderror flatpickr-input"--}}
{{--                                    name="bus_end_date"--}}
{{--                                    placeholder="Escolha uma data de término"--}}
{{--                                    id="kt_calendar_datepicker_end_date"--}}
{{--                                    type="text"--}}
{{--                                    value="{{ old('bus_end_date') }}"--}}
{{--                                    readonly="readonly"--}}
{{--                                    required--}}
{{--                                >--}}
{{--                                <!--end::Input-->--}}
{{--                                <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                @error('bus_end_date')--}}
{{--                                @foreach($errors->get('bus_end_date') as $message)--}}
{{--                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>--}}
{{--                                @endforeach--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--end::Input group-->--}}

{{--                    <div class="odd accordion accordion-icon-toggle" id="kt_accordion_details">--}}
{{--                        Extra Fields--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="btn btn-icon btn-bg-white btn-active-light-primary toggle h-30px w-30px"--}}
{{--                            id="kt_accordion_details"--}}
{{--                            data-kt-table-widget-4="expand_row"--}}
{{--                            data-bs-toggle="collapse"--}}
{{--                            data-bs-target="#kt_accordion_details_item"--}}
{{--                        >--}}
{{--                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->--}}
{{--                            <span--}}
{{--                                class="svg-icon svg-icon-1 svg-icon-primary svg-icon-2hx m-0 toggle-off"--}}
{{--                            >--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>--}}
{{--                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                            <!--end::Svg Icon-->--}}
{{--                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->--}}
{{--                            <span class="svg-icon svg-icon-1 svg-icon-primary svg-icon-2hx m-0 toggle-on">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                            <!--end::Svg Icon-->--}}
{{--                        </button>--}}

{{--                        <div--}}
{{--                            id="kt_accordion_details_item"--}}
{{--                            class="mb-0 fs-6 me-5 accordion-body collapse ps-10"--}}
{{--                            data-bs-parent="#kt_accordion_details"--}}
{{--                        >--}}
{{--                            <!--begin::Input Group-->--}}
{{--                            <div class="row row-cols-lg-2 g-10">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="fv-row mb-9">--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label for="engine" class="fs-6 fw-bold mb-2">{{ __('Engine') }}</label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Input-->--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            class="form-control form-control-solid @error('engine') is-invalid @enderror"--}}
{{--                                            name="engine"--}}
{{--                                            id="engine"--}}
{{--                                            value="{{ old('engine') }}"--}}
{{--                                            placeholder="{{ __('Insert the engine here') }}"--}}
{{--                                        >--}}
{{--                                        <!--end::Input-->--}}
{{--                                        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        @error('engine')--}}
{{--                                        @foreach($errors->get('engine') as $message)--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>--}}
{{--                                        @endforeach--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="fv-row mb-9">--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label for="engine_num" class="fs-6 fw-bold mb-2">{{ __('Engine Number') }}</label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Input-->--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            class="form-control form-control-solid @error('engine_num') is-invalid @enderror"--}}
{{--                                            name="engine_num"--}}
{{--                                            id="engine_num"--}}
{{--                                            value="{{ old('engine_num') }}"--}}
{{--                                            placeholder="{{ __('Insert the engine number here') }}"--}}
{{--                                        >--}}
{{--                                        <!--end::Input-->--}}
{{--                                        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        @error('engine_num')--}}
{{--                                            @foreach($errors->get('engine_num') as $message)--}}
{{--                                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>--}}
{{--                                            @endforeach--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Input Group-->--}}
{{--                            <!--begin::Input Group-->--}}
{{--                            <div class="row row-cols-lg-2 g-10">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="fv-row mb-9">--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label for="fuel" class="fs-6 fw-bold mb-2">{{ __('Fuel') }}</label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Input-->--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            class="form-control form-control-solid @error('fuel') is-invalid @enderror"--}}
{{--                                            name="fuel"--}}
{{--                                            id="fuel"--}}
{{--                                            value="{{ old('fuel') }}"--}}
{{--                                            placeholder="{{ __('Insert the fuel here') }}"--}}
{{--                                        >--}}
{{--                                        <!--end::Input-->--}}
{{--                                        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        @error('fuel')--}}
{{--                                        @foreach($errors->get('fuel') as $message)--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>--}}
{{--                                        @endforeach--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="fv-row mb-9">--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label for="capacity" class="fs-6 fw-bold mb-2">{{ __('Capacity') }}</label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Input-->--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            class="form-control form-control-solid @error('capacity') is-invalid @enderror"--}}
{{--                                            name="capacity"--}}
{{--                                            id="capacity"--}}
{{--                                            value="{{ old('capacity') }}"--}}
{{--                                            placeholder="{{ __('Insert the capacity number here') }}"--}}
{{--                                        >--}}
{{--                                        <!--end::Input-->--}}
{{--                                        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        @error('capacity')--}}
{{--                                        @foreach($errors->get('capacity') as $message)--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>--}}
{{--                                        @endforeach--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Input Group-->--}}

{{--                            <!--begin::Input Group-->--}}
{{--                            <div class="row row-cols-lg-2 g-10">--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="fv-row mb-9">--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label for="chassis" class="fs-6 fw-bold mb-2">{{ __('Chassis') }}</label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Input-->--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            class="form-control form-control-solid @error('chassis') is-invalid @enderror"--}}
{{--                                            name="chassis"--}}
{{--                                            id="chassis"--}}
{{--                                            value="{{ old('chassis') }}"--}}
{{--                                            placeholder="{{ __('Insert the chassis here') }}"--}}
{{--                                        >--}}
{{--                                        <!--end::Input-->--}}
{{--                                        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        @error('chassis')--}}
{{--                                        @foreach($errors->get('chassis') as $message)--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>--}}
{{--                                        @endforeach--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6">--}}
{{--                                    <div class="fv-row mb-9">--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label for="chassis_num" class="fs-6 fw-bold mb-2">{{ __('Chassis Number') }}</label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Input-->--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            class="form-control form-control-solid @error('chassis_num') is-invalid @enderror"--}}
{{--                                            name="chassis_num"--}}
{{--                                            id="chassis_num"--}}
{{--                                            value="{{ old('chassis_num') }}"--}}
{{--                                            placeholder="{{ __('Insert the chassis number here') }}"--}}
{{--                                        >--}}
{{--                                        <!--end::Input-->--}}
{{--                                        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        @error('chassis_num')--}}
{{--                                        @foreach($errors->get('chassis_num') as $message)--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>--}}
{{--                                        @endforeach--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Input Group-->--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_buses_cancel" class="btn btn-light me-3">{{ __('Cancel') }}</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_buses_submit" class="btn btn-success">
{{--                        <i class="fas fa-save fs-1"></i>--}}
                        <span class="indicator-label">{{ __('Create Bus') }}</span>
                        <span class="indicator-progress">{{ __('Please wait, reloading...') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Button-->

{{--                    <!--begin::Wrapper-->--}}
{{--                    <div class="d-flex flex-stack flex-grow-1 mb-4">--}}
{{--                        <!--begin::Content-->--}}
{{--                        <div class="fw-bold">--}}
{{--                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-5 mt-5 p-6">--}}
{{--                                <!--begin::Icon-->--}}
{{--                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->--}}
{{--                                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>--}}
{{--                                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>--}}
{{--                                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>--}}
{{--                                                </svg>--}}
{{--                                            </span>--}}
{{--                                <!--end::Svg Icon-->--}}
{{--                                <!--end::Icon-->--}}
{{--                                <!--begin::Wrapper-->--}}
{{--                                <div class="d-flex flex-stack flex-grow-1">--}}
{{--                                    <!--begin::Content-->--}}
{{--                                    <div class="fw-bold">--}}
{{--                                        <div class="fs-6 text-gray-700">Note que para um buso não seja processado pelo servidor, selecione o estado do buso "Inativo"!</div>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Content-->--}}
{{--                                </div>--}}
{{--                                <!--end::Wrapper-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Content-->--}}
{{--                    </div>--}}
{{--                    <!--end::Wrapper-->--}}
                </div>
                <!--end::Modal footer-->

            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Bus-->
