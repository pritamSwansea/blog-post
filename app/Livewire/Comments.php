<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Comments extends Component
{
    public Listing $listing;
    public  $comments;
    protected $listeners = [
        'commentCreated' => 'commentCreated',
        'commentDeleted' => 'commentDeleted'
    ];
    public function mount(Listing $listing)
    {
        $this->listing = $listing;
        $this->comments = Comment::where('listing_id', '=', $this->listing->id)->orderByDesc('created_at')->get();
    }
    public function render()
    {
        return view('livewire.comments');
    }
    public function commentCreated($id)
    {
        $this->comments = Comment::where('listing_id', '=', $this->listing->id)->orderByDesc('created_at')->get();
    }
    public function commentDeleted($id)
    {
        $this->comments = $this->comments->reject(function ($comment, $key) use ($id) {
            return $comment->id == $id;
        });
    }
}
