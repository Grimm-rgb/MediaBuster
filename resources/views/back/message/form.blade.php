@extends("back.template")

@section("title")
    {{ $message->exists ? 'Edit message' : 'Create message' }}
@endsection

@section("body")
    <div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('back.message.save', $message->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $message->title) }}"
                    required
                >
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input
                    type="text"
                    id="body"
                    name="body"
                    class="form-control @error('body') is-invalid @enderror"
                    value="{{ old('body', $message->body) }}"
                    required
                >
                @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
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
                        <option value="{{$user->id}}" {{ old('user_id', $message->user?->id) === $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
            <label for="thread_id" class="form-label">Thread_id</label>
            <select
                id="thread_id"
                name="thread_id"
                class="form-select @error('thread_id') is-invalid @enderror"
                required
            >
                @foreach($threads as $thread)
                    <option value="{{$thread->id}}" {{ old('thread_id', $message->thread?->id) === $thread->id ? 'selected' : '' }}>{{$thread->title}}</option>
                @endforeach
            </select>
            @error('thread_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ $message->exists ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
