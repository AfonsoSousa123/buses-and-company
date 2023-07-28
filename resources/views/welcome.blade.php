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
                This is the main page
            </div>
        </div>
    </div>
@endsection

{{--Scripts no rodapé que são utilizados apenas nesta página--}}
@section('footer_assets')

@endsection
