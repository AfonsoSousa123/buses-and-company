@extends('layouts.master')

{{--Scripts no cabeçalho que são utilizados apenas nesta página--}}
@section('header_assets')
    <!--begin::link-->
    <link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css") }}" rel="stylesheet" type="text/css">
    <!--end::link-->
@endsection

{{--Exemplo de toolbar com conteúdo de exemplo--}}
@section('toolbar')
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Por Levantar</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <!--end::Separator-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Requerimentos</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Empréstimos</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Por Levantar</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
@endsection

{{--Conteúdo dinâmico na página--}}
@section('content')
    @include('layouts.partials.messages')
    @include('layouts.partials.errors')

    <!--begin::Col-->
    <div class="post d-flex flex-column-fluid" id="kt_post" data-select2-id="select2-data-kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl" data-select2-id="select2-data-kt_content_container">
{{--            <!--begin::Search-->--}}
{{--            <div class="card mb-7">--}}
{{--                <!--begin::Card body-->--}}
{{--                <form method="GET" action="{{ route('emprestimos-search') }}" id="emprestimos_search">--}}
{{--                    <div class="card-header">--}}
{{--                        <!--begin::Compact form-->--}}
{{--                        <div class="card-title">--}}
{{--                            <!--begin::Input group-->--}}
{{--                            <div class="position-relative w-lg-550px w-md-450px w-sm-200px me-md-2">--}}
{{--                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->--}}
{{--                                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>--}}
{{--                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>--}}
{{--                                    </svg>--}}
{{--                                </span>--}}
{{--                                <!--end::Svg Icon-->--}}
{{--                                <input type="text" class="form-control form-control-solid ps-10" name="field" placeholder="Pesquisa de Emprestimos...">--}}
{{--                            </div>--}}
{{--                            <!--end::Input group-->--}}
{{--                            <!--begin:Action-->--}}
{{--                            <div class="d-flex align-items-center justify-content-start me-md-2">--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <select--}}
{{--                                        class="form-select form-select-solid w-225px"--}}
{{--                                        id="select_field"--}}
{{--                                        name="select_field"--}}
{{--                                        data-control="select2"--}}
{{--                                        data-placeholder="Selecione um campo de pesquisa"--}}
{{--                                        data-allow-clear="false"--}}
{{--                                        data-hide-search="true"--}}
{{--                                    >--}}
{{--                                        <option value="nome_requerimento">Nome Requerente</option>--}}
{{--                                        <option value="nome_levantamento">Nome Levantamento</option>--}}
{{--                                        <option value="nome_devolucao">Nome Devolução</option>--}}
{{--                                        <option value="qtd_equipamentos">Quantidade</option>--}}
{{--                                        <option value="desc_equipamentos">Equipamentos/Materiais</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end:Action-->--}}
{{--                            <!--begin:Action-->--}}
{{--                            <div class="d-flex align-items-center justify-content-start">--}}
{{--                                <button type="submit" class="btn btn-light-primary me-5">Pesquisa</button>--}}
{{--                            </div>--}}
{{--                            <!--end:Action-->--}}
{{--                        </div>--}}
{{--                        <div class="card-toolbar">--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <a id="kt_horizontal_search_advanced_link" class="btn btn-link collapsed" data-bs-toggle="collapse" href="#kt_advanced_search_form" aria-expanded="false">Pesquisa Avançada</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Compact form-->--}}
{{--                    </div>--}}
{{--                    <!--begin::Advance form-->--}}
{{--                    <div class="collapse" id="kt_advanced_search_form" >--}}
{{--                        <div class="card-body">--}}
{{--                            <!--begin::Row-->--}}
{{--                            <div class="row g-8 mb-8">--}}
{{--                                <!--begin::Col-->--}}
{{--                                <div class="col-xxl-12">--}}
{{--                                    <!--begin::Row-->--}}
{{--                                    <div class="row">--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <label class="fs-6 form-label fw-bolder text-dark">Estado</label>--}}
{{--                                            <!--begin::Select-->--}}
{{--                                            <select--}}
{{--                                                class="form-select form-select-solid select2-hidden-accessible"--}}
{{--                                                name="state"--}}
{{--                                                data-control="select2"--}}
{{--                                                data-placeholder="---"--}}
{{--                                                data-hide-search="true"--}}
{{--                                                tabindex="-1"--}}
{{--                                                aria-hidden="true"--}}
{{--                                                data-allow-clear="true"--}}
{{--                                            >--}}
{{--                                                <option></option>--}}
{{--                                                @foreach ($states as $state)--}}
{{--                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <!--end::Select-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Col-->--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-2">--}}
{{--                                            <label class="fs-6 form-label fw-bolder text-dark">ID</label>--}}
{{--                                            <!--begin::Select-->--}}
{{--                                            <select--}}
{{--                                                class="form-select form-select-solid select2-hidden-accessible"--}}
{{--                                                name="select_id"--}}
{{--                                                data-control="select2"--}}
{{--                                                data-placeholder="#"--}}
{{--                                                data-hide-search="false"--}}
{{--                                                tabindex="-1"--}}
{{--                                                data-allow-clear="true"--}}
{{--                                                aria-hidden="true"--}}
{{--                                            >--}}
{{--                                                <option></option>--}}
{{--                                                @foreach ($ids as $id)--}}
{{--                                                    <option value="{{ $id->id }}">#{{ $id->id }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <!--end::Select-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Col-->--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-4">--}}
{{--                                            <label class="fs-6 form-label fw-bolder text-dark">Data</label>--}}

{{--                                            <div class="d-flex flex-row align-items-center">--}}
{{--                                                <!--begin::datePicker-->--}}
{{--                                                <input--}}
{{--                                                    class="form-control form-control-solid me-1"--}}
{{--                                                    name="field_date"--}}
{{--                                                    placeholder="---"--}}
{{--                                                    id="kt_datepicker_data-requerimento"--}}
{{--                                                />--}}
{{--                                                <!--end::datePicker-->--}}
{{--                                                <!--begin::Select-->--}}
{{--                                                <select--}}
{{--                                                    class="form-select form-select-solid select2-hidden-accessible"--}}
{{--                                                    name="select_date"--}}
{{--                                                    id="select_date"--}}
{{--                                                    data-control="select2"--}}
{{--                                                    data-hide-search="true"--}}
{{--                                                    tabindex="-1"--}}
{{--                                                    aria-hidden="true"--}}
{{--                                                >--}}
{{--                                                    <option value="data_requerimento">Data Requerimento</option>--}}
{{--                                                    <option value="data_levantamento">Data Levantamento</option>--}}
{{--                                                    <option value="data_prev_dev">Data prevista Devolução</option>--}}
{{--                                                    <option value="data_devolucao">Data Devolução</option>--}}
{{--                                                </select>--}}
{{--                                                <!--end::Select-->--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!--end::Col-->--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-4">--}}
{{--                                            <div class="fv-row mb-9">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <label for="service" class="fs-6 fw-bold mb-2">Serviço</label>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Input-->--}}
{{--                                                <div class="input-group input-group-solid">--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <select--}}
{{--                                                            class="form-select form-select-solid"--}}
{{--                                                            id="service_select_search"--}}
{{--                                                            name="service_select_search"--}}
{{--                                                            data-control="select2"--}}
{{--                                                            data-placeholder="Pesquise um Serviço"--}}
{{--                                                            data-allow-clear="true"--}}
{{--                                                            data-hide-search="false"--}}
{{--                                                        >--}}
{{--                                                            <option></option>--}}
{{--                                                            @foreach ($services as $service)--}}
{{--                                                                <option value="{{ $service->name }}">--}}
{{--                                                                    {{ $service->name }}--}}
{{--                                                                </option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Input-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::State group-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Col-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Row-->--}}
{{--                                </div>--}}
{{--                                <!--end::Col-->--}}
{{--                            </div>--}}
{{--                            <!--end::Row-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--end::Advance form-->--}}
{{--                </form>--}}
{{--                <!--end::Card body-->--}}
{{--            </div>--}}
{{--            <!--end::Search-->--}}
            <!--begin::Toolbar-->
            <div class="justify-content-between flex-stack pb-7">
                <div class="d-flex flex-wrap justify-content-lg-between flex-stack" data-select2-id="select2-data-81-spz0">
                    <!--begin::Button-->
{{--                    <div class="d-flex align-items-center {{ Auth::user()->hasPermission('create-emprestimos') == false ? 'd-none' : '' }}">--}}
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add_emprestimos">
                            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen035.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"/>
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            {{ __('Create Bus') }}
                        </button>
                    </div>
                    <!--end::Button-->
                    <!--begin::Controls-->
                    <div class="d-flex flex-wrap my-1" data-select2-id="select2-data-80-8afo">
                        <!--begin::Count-->
                        <div class="d-flex my-0">
                            <div class="d-flex flex-wrap align-items-center my-1">
                                <div class="badge badge-lg badge-primary">
                                    {{ $buses->count() }} {{ __('off') }} {{ $buses->total() }} {{ __('Buses') }}
                                </div>
                            </div>
                        </div>
                        <!--end::Count-->
                    </div>
                    <!--end::Controls-->
                </div>
            </div>
            <!--end::Toolbar-->

            <!--begin::Card-->
            <div class="card card-flush bg-white rounded shadow-sm mx-auto">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table container-->
                    <!--begin::Table-->
                    <div id="kt_project_users_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="kt_por_levantar_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder dataTable no-footer">
                                <!--begin::Head-->
                                <thead class="fs-7 text-gray-400 align-center text-uppercase">
                                <tr>
                                    <th class="mw-30px sorting text-start" tabindex="0" rowspan="1" colspan="1" style="width: 0px;">{{ __('Licence Plate') }}</th>
                                    <th class="mw-30px sorting text-start" tabindex="0" rowspan="1" colspan="1" style="width: 0px;">{{ __('Brand') }}</th>
                                    <th class="min-w-180px sorting text-start" tabindex="0" rowspan="1" colspan="1" style="width: 0px;">{{ __('Model') }}</th>
                                    <th class="min-w-90px sorting text-start" tabindex="0" rowspan="1" colspan="1" style="width: 0px;">{{ __('Prod Year') }}</th>
                                    <th class="min-w-90px sorting text-start" tabindex="0" rowspan="1" colspan="1" style="width: 0px;" aria-sort="descending">{{ __('Company') }}</th>
                                    <th class="min-w-90px sorting text-start" tabindex="0" rowspan="1" colspan="1" style="width: 0px;">{{ __('State') }}</th>
                                    <th class="min-w-90px sorting text-start sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 0px;">{{ __('Fuel') }}</th>
                                    <th class="min-w-50px text-center sorting" rowspan="1" colspan="1" aria-label="Details" style="width: 0px;">{{ __('Actions') }}</th>
{{--                                    <th class="min-w-50px text-center sorting {{ Auth::user()->hasPermission('manage-emprestimos') == false ? 'd-none' : '' }} " rowspan="1" colspan="1" aria-label="Details" style="width: 0px;">Ações</th>--}}
                                </tr>
                                </thead>
                                <!--end::Head-->
                                <!--begin::Body-->
                                <tbody class="fs-6">
                                @foreach ($buses as $bus)
                                    <tr class="odd">
                                        <td class="text-start align-center mw-30px">
{{--                                            <a href="{{ route('emprestimos-show', $bus->id ) }}" class="mb-1 text-gray-800 text-hover-primary">--}}
                                                {{ $bus->licence_plate }}
{{--                                            </a>--}}
                                        </td>
                                        <td class="text-start align-center mw-30px">
                                            {{ $bus->brand_id == null ? '' : $bus->brand->name }}
                                        </td>
                                        <!--begin::Description-->
                                        <td class="text-start align-center">
                                            {{ $bus->model == null ? '' : $bus->model }}
                                        </td>
                                        <!--end::Description-->
                                        <!--begin::State-->
                                        <td class="sorting_1 text-start">
                                            {{ $bus->prod_year == null ? $bus->prod_year : '' }}
                                        </td>
                                        <!--end::State-->
                                        <!--begin::Service-->
                                        <td class="text-start">
                                            {{ $bus->company_id == null ? '' : $bus->company->name}}
                                        </td>
                                        <!--end::Service-->
                                        <!--begin::Nome de Requerimento-->
                                        <td class="text-start">
                                            @switch ($bus->state_id)
                                                @case (1)
                                                    <span class="badge badge-{{ $bus->state->color }} fw-bolder px-4 py-3">{{ $bus->state->name }}</span>
                                                    @break
                                                @case (7)
                                                    <span class="badge badge-{{ $bus->state->color }} text-dark fw-bolder px-4 py-3">{{ $bus->state->name }}</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-info fw-bolder px-4 py-3">{{ __('Undefined') }}</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <!--end::Nome de Requerimento-->
                                        <!--begin::Data de Requerimento-->
                                        <td data-order="20-12-2021T00:00:00+00:00" class="sorting_1 text-start">
                                            {{ $bus->fuel }}
                                        </td>
                                        <!--end::Data de Requerimento-->
{{--                                        <td class="text-start {{ Auth::user()->hasPermission('manage-buses') == false ? 'd-none' : '' }}">--}}
                                        <td class="text-start">
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <a
                                                    href="{{ route('buses-edit', $bus->id ) }}"
                                                    class="btn btn-icon btn-bg-white bg-hover-secondary me-1"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="{{ __('Edit Bus') }}"
                                                >
                                                    <!--begin::Svg Icon-->
                                                    <i class="fas fa-edit text-success" style="font-size: 18px"></i>
                                                    <!--end::Svg Icon-->
                                                </a>

                                                <form method="post" id="buses-delete" action="{{ route('buses-delete', $bus->id) }}">
                                                    @method('DELETE')
                                                    @csrf

                                                    <a
                                                        role="button"
                                                        type="submit"
                                                        class="btn btn-icon btn-bg-white bg-hover-secondary"
                                                        data-kt-eventmanager-table-filter="delete_row"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="{{ __('Delete Bus') }}"
                                                    >
                                                        <!--begin::Svg Icon-->
                                                        <i class="fas fa-trash-alt text-danger" style="font-size: 18px"></i>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <!--end::Body-->
                            </table>
                            <!--end::Table-->

                            <div class="d-flex justify-content-center">
                                {!! $buses->links("pagination::bootstrap-4") !!}
                            </div>
                        </div>
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--end::Table-->

{{--            <!--begin::Modal - New Emprestimo-->--}}
{{--            @include('buses.buses-create')--}}
{{--            <!--end::Modal - New Emprestimo-->--}}
        </div>
        <!--end::Container-->
    </div>
    <!--end::Col-->
@endsection

{{--Scripts no rodapé que são utilizados apenas nesta página--}}
@section('footer_assets')
    <script src="{{ asset('assets/js/custom/pages/search/horizontal.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection
