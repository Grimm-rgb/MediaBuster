<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediaBuster</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="{{asset('css/front.css')}}" rel="stylesheet">
</head>
<body wire:navigate>
<div class="container-fluid d-flex justify-content-center">
    <a class="h1" href="{{route('home')}}" wire:navigate>MediaBuster</a>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('threads')}}" wire:navigate>Threads</a>
                <a class="nav-link" href="{{route('gallery')}}" wire:navigate>Gallery</a>
                <a class="nav-link" href="{{route('about')}}" wire:navigate>About us</a>
            </div>
        </div>
    </div>
</nav>
<div class="container border mt-3 p-5" style="margin-bottom: 150px">
    {{$slot}}
</div>

@persist('audioplayer')
    @livewire('playlist-player')
@endpersist

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
@livewireScripts

</bodywire>
</html>
