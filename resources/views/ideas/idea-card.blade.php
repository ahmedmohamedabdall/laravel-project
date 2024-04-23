<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->GetImageURL() }}" alt=''/>
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('user.show',$idea->user->id) }}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                @auth
                @can('update',$idea)


<form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                    @csrf



                    <a href="{{ route('ideas.edit', $idea->id) }}">edit</a>
                    <a href="{{ route('ideas.show', $idea->id) }}">show</a>
                     @endcan
                    @method('delete')

                    <button type="submit" class="ms-1 btn btn-danger btn-sm">x</button>
                </form>
            @endauth
            </div>
        </div>

    </div>



    <div class="card-body">
        @if ($editing ?? false)

                <form action="{{ route('ideas.update',$idea->id) }}" method="POST">{{-- post --}}
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name='content' class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                        @error('content')
                            <span class="fs-6 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark btn-sm"> update </button>
                    </div>
                </form>

        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}

            </p>
        @endif

        <div class="d-flex justify-content-between">
    @include('ideas.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>

        </div>
        @include('ideas.comments-box')

    </div>

</div>
