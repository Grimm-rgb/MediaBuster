<?php

namespace App\Livewire;

use Livewire\Component;

class PlaylistPlayer extends Component
{
    public $playlist = [];
    public function mount()
    {
        $folder = public_path('/storage/music');
        $audioExtensions = ['mp3', 'flac', 'ogg', 'wav', 'm4a'];

        foreach(scandir($folder) as $file) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, $audioExtensions)) {
                $this->playlist[] = asset('storage/music/'.$file);
            }
        }
    }
    public function render()
    {
        return view('livewire.playlist-player');
    }
}
