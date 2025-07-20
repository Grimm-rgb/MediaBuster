<?php

namespace App\Livewire\Pages;

use App\Models\File;
use Livewire\Component;

class Gallery extends Component
{
    public $audios = [];
    public $videos = [];
    public $images = [];

    public function mount()
    {
        $files = File::where('fileable_type', 'App\Models\Message')->get();
        foreach ($files as $file) {
            if(str_starts_with($file->mime_type, 'audio/')){
                $this->audios[] = $file;
            }
            if(str_starts_with($file->mime_type, 'video/')){
                $this->videos[] = $file;
            }
            if(str_starts_with($file->mime_type, 'image/')){
                $this->images[] = $file;
            }
        }
    }



    public function render()
    {
        return view('livewire.pages.gallery')->layout('layouts.template');
    }
}
