@extends('back.template')

@section('title')
Thread
@endsection

@section('body')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('back.thread.form') }}" class="btn btn-primary">
    <i class="bi bi-plus"></i>
    Add thread
</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($threads as $thread)
        <tr>
            <th scope="row">{{$thread->id}}</th>
            <td>{{$thread->title}}</td>
            <td class="d-flex d-inline justify-content-end gap-2">
                <a class="btn btn-primary" href="{{ route('back.thread.form', $thread->id) }}">
                    <i class="bi bi-pen"></i>
                    Edit
                </a>
                <form action="{{ route('back.thread.destroy', $thread->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this thread?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
