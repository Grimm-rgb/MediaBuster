<div>
    @if ($model->files->count())
        <div class="mt-3">
            <strong>Attachments:</strong>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                @foreach ($model->files as $file)
                    <div class="border p-2 rounded shadow-sm">
                        @if (Str::startsWith($file->mime_type, 'image/'))
                            <img src="{{ asset('storage/' . $file->path) }}"
                                 alt="{{ $file->name }}"
                                 class="img-fluid rounded"
                                 style="max-height: 300px; object-fit: contain;">
                        @elseif (Str::startsWith($file->mime_type, 'video/'))
                            <video controls style="max-width: 300px;">
                                <source src="{{ asset('storage/' . $file->path) }}" type="{{ $file->mime_type }}">
                                Your browser does not support the video tag.
                            </video>
                        @elseif (Str::startsWith($file->mime_type, 'audio/'))
                            <audio controls style="width: 100%;">
                                <source src="{{ asset('storage/' . $file->path) }}" type="{{ $file->mime_type }}">
                                Your browser does not support the audio tag.
                            </audio>
                        @else
                            <a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="text-blue-600 underline">
                                📎 Download {{ $file->name }}
                            </a>
                        @endif
                        <div class="text-sm text-muted mt-1">{{ $file->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
