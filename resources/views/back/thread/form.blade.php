@extends('back.template')

@section('title')
    {{ $thread->exists ? 'Edit Thread' : 'Create Thread' }}
@endsection

@section('body')
    <div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('back.thread.save', $thread->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $thread->title) }}"
                    required
                >
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-secondary">{{ $thread->exists ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
