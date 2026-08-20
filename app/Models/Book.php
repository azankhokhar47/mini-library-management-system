<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'author_id',
        'category',
        'stock',
        'description',
    ];

    public function authors(){
        return $this->belongsTo(Author::class);
    }

    public function categorys(){
        return $this->belongsTo(Category::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
