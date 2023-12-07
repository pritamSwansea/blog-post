<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

    // public static function all(): array
    // {
    //     return [
    //         [
    //             'id' => 1,
    //             'title' => 'Listing One',
    //             'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    //                 Lorem Ipsum has been the industry's standard dummy 
    //                 text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
    //                 It has survived not only five centuries, 
    //                 but also the leap into electronic typesetting, remaining essentially unchanged.
    //                 It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
    //                 and more recently with desktop publishing software like Aldus
    //                 PageMaker including versions of Lorem Ipsum."
    //         ],
    //         [
    //             'id' => 2,
    //             'title' => 'Listing Two',
    //             'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    //                 Lorem Ipsum has been the industry's standard dummy 
    //                 text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
    //                 It has survived not only five centuries, 
    //                 but also the leap into electronic typesetting, remaining essentially unchanged. 
    //                 It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
    //                 and more recently with desktop publishing software like Aldus
    //                 PageMaker including versions of Lorem Ipsum."
    //         ]
    //     ];
    // }
    // //
    // public static function find($id)
    // {
    //     $listings = self::all();
    //     foreach ($listings as $listing) {
    //         if ($listing['id'] == $id) {
    //             return $listing;
    //         }
    //     }
    // }
    //
    use HasFactory;
    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship To User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}