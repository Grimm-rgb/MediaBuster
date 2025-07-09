<div>
    <h1 class="mb-5">Threads</h1>
    <div class="list-group">
        @foreach($threads as $thread)
        <a href="{{route("thread.messagelist", $thread->id)}}" class="list-group-item list-group-item-action" wire:navigate>{{$thread->title}}</a>
        @endforeach
    </div>
</div>
