@extends("back.template")

@section("title")
    Messages
@endsection

@section("body")

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('back.message.form') }}" class="btn btn-secondary">
        <i class="bi bi-plus"></i>
        Add message
    </a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">User</th>
            <th scope="col">Thread</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($messages as $message)
            <tr>
                <th scope="row">{{$message->id}}</th>
                <td>{{$message->title}}</td>
                <td>#{{$message->user_id." ".$message->user->email}}</td>
                <td>{{$message->thread->title}}</td>
                <td class="d-flex d-inline justify-content-end gap-2">
                    <a class="btn btn-secondary" href="{{ route('back.message.form', $message->id) }}">
                        <i class="bi bi-pen"></i>
                        Edit
                    </a>
                    <form action="{{ route('back.message.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
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
