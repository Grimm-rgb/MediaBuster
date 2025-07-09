@extends("back.template")

@section("title")
User
@endsection

@section("body")

  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <a href="{{ route('back.user.form') }}" class="btn btn-primary">
    <i class="bi bi-plus"></i>
    Add user
  </a>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($users as $user)
    <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td class="d-flex d-inline justify-content-end gap-2">
            <a class="btn btn-primary" href="{{ route('back.user.form', $user->id) }}">
              <i class="bi bi-pen"></i>
              Edit
            </a>
            <form action="{{ route('back.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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