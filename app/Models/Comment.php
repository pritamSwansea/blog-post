<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'listing_id',
        'user_id',

    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
    // Define the polymorphic relationship
    public function commentable()
    {
        return $this->morphTo();
    }
}
