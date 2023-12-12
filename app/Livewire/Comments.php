<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Listing;
use Livewire\Component;

class Comments extends Component
{
    public Listing $listing;

    public function mount(Listing $listing)
    {
        $this->listing = $listing;
    }
    public function render()
    {
        $comments = Comment::where('listing_id', '=', $this->listing->id)->get();
        return view('livewire.comments', compact('comments'));
    }
}
