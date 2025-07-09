<?php

namespace App\Livewire\Pages;

use App\Models\Message;
use App\Models\Thread;
use Livewire\Component;

class MessageList extends Component
{
    public $messages;
    public $threadId;
    public $thread;
    public function mount($threadId)
    {
        $this->thread = Thread::find($threadId);
        $this->messages = Message::where('thread_id', $threadId)->get();
    }
    public function render()
    {
        return view('livewire.pages.list-message')->layout('layouts.template');
    }
}
