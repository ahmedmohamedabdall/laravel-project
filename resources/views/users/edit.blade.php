@extends('layout.layout')
@section('title','idet')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('share.left-sidepar')

        </div>
        <div class="col-6">
            @include('share.success-message')

            <div class="mt-3">

                @include('users.shared.user-edit-card')
            </div>
            <hr>

            @forelse ($ideas as $idea)
                <div class='mt-3'>

                    @include('ideas.idea-card')

                </div>

            @empty
                <h2 class='text-center my-5'>no result</h2>
            @endforelse
            <div class='mt-3'>
                {{ $ideas->WithQueryString()->links() }}
            </div>


        </div>
        <div class="col-3">
            @include('share.search-par')
            @include('share.follow-box')

        </div>
    </div>
@endsection
