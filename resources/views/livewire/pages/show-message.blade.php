<div>
    <div class="message-card">
    <h1>{{$message->title}}</h1>
    <p>{{$message->body}}</p>
        @livewire("show-attachments", ["model"=>$message])
    </div>
    @livewire("comment-list", ["message"=>$message])
</div>
