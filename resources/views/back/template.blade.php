<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body style="background-color:#F9F9F9;">
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi pe-none me-2" width="40" height="32" aria-hidden="true">
                    <use xlink:href="#bootstrap"></use>
                </i> <span class="fs-4">Mediabuster</span> </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route("back.user.list") }}" class="nav-link text-white" >
                        <i class="bi bi-user"></i>
                        User
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("back.thread.list") }}" class="nav-link text-white" >
                        <i class="bi bi-"></i>
                        Thread
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("back.message.list") }}" class="nav-link text-white" >
                        <i class="bi bi-"></i>
                        Message
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("back.comment.list") }}" class="nav-link text-white" >
                        <i class="bi bi-"></i>
                        Comment
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("back.answer.list") }}" class="nav-link text-white" >
                        <i class="bi bi-"></i>
                        Answer
                    </a>
                </li>

            </ul>
            <hr>


            <div class="dropdown"> <a href="#"
                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>{{ auth()->user()->name }}</strong> </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button as="button" type="submit" class="dropdown-item" >
                            {{ __('Déconnexion') }}
                        </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-fluid pt-3">
            <div class="card px-3 py-2" >
                <div class="card-body">
                    <h1 class="card-title pb-3 ">@yield("title")</h1>
                    <p class="card-text">
                        @yield("body")
                    </p>

                </div>
            </div>
        </div>
    </main>
    <footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
            <script src="{{ asset("js/sidebars.js") }}"></script>
    </footer>
</body>

</html>
