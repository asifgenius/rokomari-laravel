<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = [
        'type',
        'title',
        'author_id',
        'description',
        'category',
        'rating',
        'year_published',
        'publisher',
        'pages',
        'price',
        'language',
        'cover_image',
        'availability_status',
        'genre',
        'dimensions',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
