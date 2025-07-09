<?php

namespace App\Livewire\Pages;

use App\Models\Message;
use Livewire\Component;

class ShowMessage extends Component
{
    public $message;

    public function mount($messageId)
    {
        $this->message = Message::find($messageId);
    }
    public function render()
    {
        return view('livewire.pages.show-message')->layout('layouts.template');
    }
}
