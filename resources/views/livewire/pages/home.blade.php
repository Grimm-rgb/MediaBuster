<div>
    <div class="container row">
        <div class="lastMessages col-12 col-md-6">
            <H2> Last messages created </H2>
            @foreach($lastMessages as $message)
                <div class="mb-3">
                    <h3>{{$message->title}}</h3>
                    <p>{{$message->body}}</p>
                    <a class="btn btn-secondary" href="{{route('show.message', $message->id)}}">See more !</a>
                </div>
            @endforeach
        </div>
        <div class="lastAnswers col-12 col-md-6">
            <h2> last reacted message </h2>
            @foreach($lastAnswers as $a)
                <div class="mb-3">
                    <h3>{{$a->comment->message?->title}}</h3>
                    <p>{{$a->comment->message?->body}}</p>
                    <a class="btn btn-secondary" href="{{route('show.message', $a->comment->message->id)}}">See more !</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
