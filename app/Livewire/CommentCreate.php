<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class CommentCreate extends Component
{
    public string $comment = '';
    public Listing $listing;
    public ?Comment $commentModel = null;
    public function mount(Listing $listing, $commentModel = null)
    {
        $this->listing = $listing;
        $this->commentModel = $commentModel;
        $this->comment = $commentModel ? $commentModel->comment : '';
    }
    public function render()
    {
        return view('livewire.comment-create');
    }
    public function createComment()
    {
        $user = auth()->user();
        if (!$user) {
            return $this->redirect('/login');
        }
        if ($this->commentModel) {
            if ($this->commentModel->user_id != $user->id) {
                return response('You are not authorized to perform this action', 403);
            }
            $this->commentModel->comment = $this->comment;
            $this->commentModel->save();
            $this->comment = '';
            $this->dispatch('commentUpdated');
            $this->dispatch('commentCreated', $this->commentModel->comment);
        } else {

            $comment = Comment::create([
                'comment' => $this->comment,
                'listing_id' => $this->listing->id,
                'user_id' => $user->id,
                'commentable_type' => get_class($this->listing), // or 'App\Models\Post'
                'commentable_id' => $this->listing->id
            ]);

            $this->dispatch('commentCreated', $comment);
            $this->comment = '';
            return redirect()->with('message', 'Listing updated successfully!');
        }
    }
}
