<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Listing;
use Livewire\Component;

class CommentCreate extends Component
{
    public string $comment = '';
    public Listing $listing;

    public function mount(Listing $listing)
    {
        $this->listing = $listing;
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
        $comment = Comment::create([
            'comment' => $this->comment,
            'listing_id' => $this->listing->id,
            'user_id' => $user->id
        ]);
    }
}
