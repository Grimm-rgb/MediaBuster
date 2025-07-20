<div>
    <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Submit your own research!
    </button>
    <div class="collapse" id="collapseExample">
        <div class=" mt-3 card card-body">
            @if(session()->has('success'))
                <div class="mb-3 text-green-600">{{session('success')}}</div>
            @endif
            <form action="" methode="POST" wire:submit="save">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input wire:model="title" type="text" id="title"  name="title"  class="form-control"  value="{{ old('title') }}"  required >
                    @error('title') <span>{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea wire:model="body" id="body"  name="body"  class="form-control"  value="{{ old('body') }}"  required>
                    </textarea>
                    @error('body') <span>{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="attachments" class="form-label">Attachments</label>
                    <input wire:model="attachments" type="file" id="attachments" name="attachments[]" class="form-control" multiple>
                    @error('attachments.*') <span>{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-secondary">Create</button>
            </form>
        </div>
    </div>
</div>
