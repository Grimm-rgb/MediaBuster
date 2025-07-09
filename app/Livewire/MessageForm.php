<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\File;

class MessageForm extends Component
{
    use WithFileUploads;

    public $threadId, $title, $body;
    public $attachments = [];

    public function save()
    {
        if(auth()->id() == null){
            $this->redirectRoute('login', navigate: true);
        }else {
            $this->validate([
                'title' => 'required|max:255',
                'body' => 'required|string|max:255',
                'attachments.*' => 'file|max:10240', // 10MB max par fichier
            ]);

            $data = [
                'title' => $this->title,
                'body' => $this->body,
                'user_id' => auth()->id(),
                'thread_id' => $this->threadId,
            ];

            $this->body = null;
            $this->title = null;

            $message = new Message($data);
            $message->save();

            foreach ($this->attachments as $uploadedFile) {
                $path = $uploadedFile->store('attachments', 'public');
                $message->files()->create([
                    'name' => $uploadedFile->getClientOriginalName(),
                    'path' => $path,
                    'mime_type' => $uploadedFile->getMimeType(),
                ]);
            }
            $this->attachments = [];


            return redirect()->route('thread.messagelist', $this->threadId);
        }
    }

    public function mount($threadId)
    {
        $this->threadId = $threadId;
    }

    public function render()
    {
        return view('livewire.message-form');
    }
}
