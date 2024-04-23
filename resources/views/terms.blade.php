@extends('layout.layout')
@section('title','terms')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('share.left-sidepar')

        </div>
        <div class="col-6">

            <h1>Reliable and hassle-free email delivery, email logs for improved troubleshooting, dashboards with a clear
                snapshot of the state of your email, and super-responsive technical support.</h1>

        </div>
        <div class="col-3">
            @include('share.search-par')
            @include('share.follow-box')


        </div>
    @endsection
