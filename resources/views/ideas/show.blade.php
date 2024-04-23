@extends('layout.layout')
@section('title','view idea')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('share.left-sidepar')

        </div>
        <div class="col-6">
            @include('share.success-message')



            <hr>

            <div class="mt-3">

                    @include('ideas.idea-card')



            </div>
        </div>
        <div class="col-3">
            @include('share.search-par')
            @include('share.follow-box')

        </div>
    </div>
@endsection
