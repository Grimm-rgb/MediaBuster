<?php

namespace App\Livewire;

use Livewire\Component;

class ShowAttachments extends Component
{
    public $model;
    public function mount($model){
        $this->model = $model;
    }
    public function render()
    {
        return view('livewire.show-attachments');
    }
}
