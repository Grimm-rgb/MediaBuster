<div>
    <h2>Video</h2>
        <div class="container row gap-4 mt-2">
    @foreach($videos as $file)
                <div class="border col-12 col-md-6 col-lg-4 p-2 rounded shadow-sm">
                    <video controls style="max-width: 300px;">
                        <source src="{{ asset('storage/' . $file->path) }}" type="{{ $file->mime_type }}">
                        Your browser does not support the video tag.
                    </video>
                    <a href="{{route('show.message', ["messageId" => $file->fileable->id])}}" class="btn btn-secondary" wire:navigate.hover> Show this message!</a>
                </div>

                @endforeach
        </div>
    <h2>Image</h2>
        <div class="container row gap-4 mt-2">
    @foreach($images as $file)
                <div class="border col-12 col-md-6 col-lg-4 p-2 rounded shadow-sm">
                    <img src="{{ asset('storage/' . $file->path) }}"
                         alt="{{ $file->name }}"
                         class="img-fluid rounded mb-2"
                         style="max-height: 300px; object-fit: contain;">
                    <a href="{{route('show.message', ["messageId" => $file->fileable->id])}}" class="btn btn-secondary" wire:navigate.hover> Show this message!</a>
                </div>
                @endforeach
        </div>
    <h2>Musics</h2>
        <div class="container row gap-4 mt-2">
    @foreach($audios as $file)
                <div class="border col-12 col-md-6 col-lg-4 p-2 rounded shadow-sm">
                    <audio controls style="width: 100%;">
                        <source src="{{ asset('storage/' . $file->path) }}" type="{{ $file->mime_type }}">
                        Your browser does not support the audio tag.
                    </audio>
                    <a href="{{route('show.message', ["messageId" => $file->fileable->id])}}" class="btn btn-secondary" wire:navigate.hover> Show this message!</a>
                </div>
                @endforeach
        </div>
</div>
