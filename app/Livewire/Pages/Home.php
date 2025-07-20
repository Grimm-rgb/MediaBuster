<?php

namespace App\Livewire\Pages;
use App\Models\Answer;
use App\Models\Message;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $lastMessages = Message::all()->sortByDesc('created_at')->take(3);
        $lastAnswers = Answer::all()->sortByDesc('created_at')->take(3);

        return view('livewire.pages.home', compact('lastMessages', 'lastAnswers'))->layout('layouts.template');
    }
}
