@extends('layouts.app', ['title' => __('Whatsapp Setup')])
@section('content')
<div class="header pb-8 pt-2 pt-md-7">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="mb-3 mt--3">💬 {{__('WhatsApp Cloud API Setup')}}</h1>
            <div class="row align-items-center pt-2">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--8">  
    <div class="row">
        <div class="col-12">
            @include('partials.flash')
        </div>
        <form method="POST" action="{{ route('whatsapp.store') }}">
            @csrf
            <div class="row">
            <div class="col-lg-8 col-md-7">
                @include('wpbox::setup.step1')
                @include('wpbox::setup.step2')
                @include('wpbox::setup.step3')
            </div>
            <div class="col-lg-4 col-md-5">
                @include('wpbox::setup.verified')
            </div>
            </div>

            
               

        </form>
    </div>
</div>
@endsection
