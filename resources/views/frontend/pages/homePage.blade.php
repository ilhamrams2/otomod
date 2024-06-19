@extends('frontend.main')

@section('title', $title)

@section('contents')
    <div class="row r-landing mt-2 mb-5">
         @include('frontend.section.landing')
    </div>

    <div class="row r-content-one mt-2">
        @include('frontend.section.contentOne')
    </div>

    <div class="row r-content-one mt-2">
        @include('frontend.section.contentSecond')
    </div>

    <div class="row r-content-one mt-2">
        @include('frontend.section.contentThird')
    </div>

@endsection
