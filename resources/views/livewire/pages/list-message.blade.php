<div>
    <h1 class="mb-5">{{$thread->title}}</h1>

    @livewire("message-form", ['threadId' => $threadId])

    <div class="container-fluid row mt-5 p-0 mx-0">
        @foreach($messages as $message)
            <div class="col-md-3 col-12 px-1 mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$message->title}}</h5>
                            <p class="card-text">{{$message->body}}</p>
                        </div>
                        <div class="card-footer border-0" style="background-color: white">
                            <a href="{{route("show.message", $message->id)}}" class="btn btn-secondary">See more</a>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
</div>
