@extends('layout.layout')
@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('share.left-sidepar')

        </div>
        <div class="col-6">
            @include('share.success-message')
            @include('ideas.submit-idea')
<hr>



            <div class='mt-3'>



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
                <hr>
            </div>
        </div>
        <div class="col-3">
            @include('share.search-par')
            @include('share.follow-box')


        </div>
    </div>
@endsection
