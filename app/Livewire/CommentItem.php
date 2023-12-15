<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;
    public bool $editing = false;
    protected $listeners = [
        'cancelEditing' => 'cancelEditing',
        'commentUpdated' => 'commentUpdated'
    ];
    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function render()
    {
        return view('livewire.comment-item');
    }
    public function deleteComment()
    {
        $user = auth()->user();
        if (!$user) {
            return $this->redirect('/login');
        }
        if ($this->comment->user_id != $user->id) {
            return response('You are not authorized to perform this action', 403);
        }
        $id = $this->comment->id;
        $this->comment->delete();
        $this->dispatch('commentDeleted', $id);
    }
    public function editComment()
    {
        $id = $this->comment->id;
        $this->comment->edit();
        $this->dispatch('editDeleted', $id);
    }
    public function startCommentEdit()
    {
        $this->editing = true;
    }
    public function cancelEditing()
    {
        $this->editing = false;
    }
    public function commentUpdated()
    {

        $this->editing = false;
    }
}
