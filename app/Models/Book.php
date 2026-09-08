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
        'category_id',
        'stock',
        'description',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function loans()
    {
        return $this->hasMany(Loan::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    // =========================================================
    // LOCAL SCOPES
    // =========================================================

    // Books that currently have stock available
    public function scopeAvailable($query)
    {
        return $query->where('stock', '>', 0);
    }


    // Books that have overdue active loans
    public function scopeOverdue($query)
    {
        return $query->whereHas('loans', function ($query) {

            $query->whereNull('returned_at')
                ->where('due_at', '<', now());
        });
    }


    // =========================================================
    // COMPUTED VALUES
    // =========================================================

    // Average rating of the book
    public function getAverageRatingAttribute()
    {
        return round(
            $this->reviews()->avg('rating') ?? 0,
            1
        );
    }


    // Number of currently active loans
    public function getActiveLoanCountAttribute()
    {
        return $this->loans()
            ->whereNull('returned_at')
            ->count();
    }
}
