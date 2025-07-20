<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithFileUploads;

class CommentList extends Component
{
    use WithFileUploads;

    public $message, $body;
    public $attachments = [];

    public function save()
    {
        if(auth()->id() == null){
            $this->redirectRoute('login', navigate: true);
        }else{
            $this->validate([
                'body' => 'required|string|max:255',
                'attachments.*' => 'file|max:10240', // 10MB max par fichier
            ]);

            $data = [
                'message_id' => $this->message->id,
                'body' => $this->body,
                'user_id' => auth()->id(),
            ];

            $this->body = null;

            $comment = new Comment($data);
            $comment->save();

            foreach ($this->attachments as $uploadedFile) {
                $path = $uploadedFile->store('attachments', 'public');
                $comment->files()->create([
                    'name' => $uploadedFile->getClientOriginalName(),
                    'path' => $path,
                    'mime_type' => $uploadedFile->getMimeType(),
                ]);
            }
            $this->attachments = [];
        }
    }
    public function mount($message)
    {
        $this->message = $message;
    }
    public function render()
    {
        return view('livewire.comment-list');
    }
}
