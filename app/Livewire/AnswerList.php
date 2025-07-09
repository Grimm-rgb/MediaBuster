<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnswerList extends Component
{
    use WithFileUploads;

    public $comment, $body;
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
                'comment_id' => $this->comment->id,
                'body' => $this->body,
                'user_id' => auth()->id(),
            ];

            $this->body = null;

            $answer = new Answer($data);
            $answer->save();

            foreach ($this->attachments as $uploadedFile) {
                $path = $uploadedFile->store('attachments', 'public');
                $answer->files()->create([
                    'name' => $uploadedFile->getClientOriginalName(),
                    'path' => $path,
                    'mime_type' => $uploadedFile->getMimeType(),
                ]);
            }
            $this->attachments = [];
        }
    }
    public function mount($comment){
        $this->comment = $comment;
    }
    public function render()
    {
        return view('livewire.answer-list');
    }
}
