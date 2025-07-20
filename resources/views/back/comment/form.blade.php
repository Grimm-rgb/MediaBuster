@extends("back.template")

@section("title")
    {{ $comment->exists ? 'Edit comment' : 'Create comment' }}
@endsection

@section("body")
    <div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('back.comment.save', $comment->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input
                    type="text"
                    id="body"
                    name="body"
                    class="form-control @error('body') is-invalid @enderror"
                    value="{{ old('body', $comment->body) }}"
                    required
                >
                @error('body')
                <div class="invalid-feedback">{{ $comment }}</div>
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
                        <option value="{{$user->id}}" {{ old('user_id', $comment->user?->id) === $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="invalid-feedback">{{ $comment }}</div>
                @enderror
            </div>

            <div class="mb-3">
            <label for="message_id" class="form-label">Message</label>
            <select
                id="message_id"
                name="message_id"
                class="form-select @error('message_id') is-invalid @enderror"
                required
            >
                @foreach($messages as $message)
                    <option value="{{$message->id}}" {{ old('message_id', $comment->message?->id) === $message->id ? 'selected' : '' }}>{{$message->body}}</option>
                @endforeach
            </select>
            @error('message_id')
            <div class="invalid-feedback">{{ $comment }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-secondary">{{ $comment->exists ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
