<?php

namespace App\Livewire\Pages;
use App\Models\Thread;
use Livewire\Component;

class ThreadList extends Component
{
    public $threads;
    public function mount()
    {
        $this->threads = Thread::all();
    }
    public function render()
    {
        return view('livewire.pages.threads')->layout('layouts.template');
    }

}
