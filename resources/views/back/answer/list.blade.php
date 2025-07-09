@extends("back.template")

@section("title")
    Answers
@endsection

@section("body")

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('back.answer.form') }}" class="btn btn-primary">
        <i class="bi bi-plus"></i>
        Add answer
    </a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Body</th>
            <th scope="col">User</th>
            <th scope="col">Comment</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($answers as $answer)
            <tr>
                <th scope="row">{{$answer->id}}</th>
                <td>{{$answer->body}}</td>
                <td>#{{$answer->user_id." ".$answer->user->email}}</td>
                <td>#{{$answer->comment_id}}</td>
                <td class="d-flex d-inline justify-content-end gap-2">
                    <a class="btn btn-primary" href="{{ route('back.answer.form', $answer->id) }}">
                        <i class="bi bi-pen"></i>
                        Edit
                    </a>
                    <form action="{{ route('back.answer.destroy', $answer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this answer?');">
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
