@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Beranda') }}</h2>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

@include('components.alert')
<div class="row">
    {{-- Jumlah user --}}
    @if (auth()->user()->level == 'admin')
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon primary">
                <i class="lni lni-user"></i>
            </div>
            <div class="content ml-20">
                <h6 class="mb-10">Jumlah Pengguna</h6>
                <h3 class="text-bold mb-10">{{$jml_user}}</h3>
            </div>
        </div>
    </div>
    @endif

    {{-- Jumlah Sertifikat --}}
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon primary">
                <i class="lni lni-certificate"></i>
            </div>
            <div class="content ml-20">
                <h6 class="mb-10">Jumlah Sertifikat</h6>
                <h3 class="text-bold mb-10">{{$jml_sertif}}</h3>
            </div>
        </div>
    </div>

    {{-- Detail Profile --}}
    <div class="{{auth()->user()->level == 'admin'? 'col-xl-6 col-lg-4' : 'col-xl-9 col-lg-8'}} col-sm-6">
        <div class="icon-card mb-30">
            <div class="content ml-20">
                <h6 class="mb-10">Nama</h6>
                <h3 class="text-bold mb-50">{{auth()->user()->name}}</h3>
                <h6 class="mb-10">Level</h6>
                <h3 class="text-bold mb-10">{{auth()->user()->level}}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
