@extends("back.template")

@section("title")
    {{ $answer->exists ? 'Edit answer' : 'Create answer' }}
@endsection

@section("body")
    <div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('back.answer.save', $answer->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input
                    type="text"
                    id="body"
                    name="body"
                    class="form-control @error('body') is-invalid @enderror"
                    value="{{ old('body', $answer->body) }}"
                    required
                >
                @error('body')
                <div class="invalid-feedback">{{ $answer }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select
                    id="user_id"
                    name="user_id"
                    class="form-select @error('user_id') is-invalid @enderror"
                    required
                >
                    @foreach($users as $user)
                        <option value="{{$user->id}}" {{ old('user_id', $answer->user?->id) === $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="invalid-feedback">{{ $answer }}</div>
                @enderror
            </div>

            <div class="mb-3">
            <label for="comment_id" class="form-label">Comment</label>
            <select
                id="comment_id"
                name="comment_id"
                class="form-select @error('comment_id') is-invalid @enderror"
                required
            >
                @foreach($comments as $comment)
                    <option value="{{$comment->id}}" {{ old('comment_id', $answer->comment?->id) === $comment->id ? 'selected' : '' }}>{{$comment->body}}</option>
                @endforeach
            </select>
            @error('comment_id')
            <div class="invalid-feedback">{{ $answer }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-secondary">{{ $answer->exists ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
