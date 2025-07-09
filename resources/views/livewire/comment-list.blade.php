<div>
    <div class="collapseComponent">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseComment" aria-expanded="false" aria-controls="collapseComment">
           Answer this message!
        </button>
        <div class="collapse" id="collapseComment">
            <div class=" mt-3 card card-body">
                    @if(session()->has('success'))
                        <div class="mb-3 text-green-600">{{session('success')}}</div>
                    @endif
                <form action="" methode="POST" wire:submit="save">
                    @csrf
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea wire:model="body" id="body"  name="body"  class="form-control"  value="{{ old('body') }}"  required>
                        </textarea>
                        @error('body')error @enderror
                    </div>
                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments</label>
                        <input wire:model="attachments" type="file" id="attachments" name="attachments[]" class="form-control" multiple>
                        @error('attachments.*') <span>{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <div class="listComment">
        @foreach($message->comments as $comment)
            <div class="card-body">
                <p class="card-text">{{$comment->user->name}} - {{$comment->body}}</p>
                @livewire("show-attachments", ["model"=>$comment])
                @livewire('answer-list',['comment'=>$comment])
                <hr>
            </div>
        @endforeach
    </div>
</div>
