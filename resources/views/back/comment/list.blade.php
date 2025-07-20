@extends("back.template")

@section("title")
    Comments
@endsection

@section("body")

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('back.comment.form') }}" class="btn btn-secondary">
        <i class="bi bi-plus"></i>
        Add comment
    </a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Body</th>
            <th scope="col">User</th>
            <th scope="col">Message</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($comments as $comment)
            <tr>
                <th scope="row">{{$comment->id}}</th>
                <td>{{$comment->body}}</td>
                <td>#{{$comment->user_id." ".$comment->user->email}}</td>
                <td>#{{$comment->message_id}}</td>
                <td class="d-flex d-inline justify-content-end gap-2">
                    <a class="btn btn-secondary" href="{{ route('back.comment.form', $comment->id) }}">
                        <i class="bi bi-pen"></i>
                        Edit
                    </a>
                    <form action="{{ route('back.comment.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
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
