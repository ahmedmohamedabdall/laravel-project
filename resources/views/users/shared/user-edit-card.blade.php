<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->GetImageURL() }}"
                        alt="{{ $user->name }}">
                    <div>

                        <input name='name' value="{{ $user->name }}" type="text" class='form-control'>
                        @error('name')
                            <span class='text-danger fs-6'>{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                @auth
                    @if (Auth::id() === $user->id)
                        <div><a class="ms-1 btn btn-danger btn-sm" href="{{ route('user.show', $user->id) }}">show</a></div>
                    @endif
                @endauth
            </div>

            <div class='mt-4'>
                <label for=>profile image</label>
                <input type="file" name='image' class='form-control'>
                @error('image')
                    <span class="fs-6 text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio: </h5>

                <div class="mb-3">
                    <textarea name='bio' class="form-control " id="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm mb-3">save</button>

                @include('users.shared.users-stats')

            </div>
        </form>
    </div>
</div>
