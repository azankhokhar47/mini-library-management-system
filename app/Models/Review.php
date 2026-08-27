<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'comment',
    ];


    // Review belongs to User

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Review belongs to Book

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
