<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Categories;
use App\Models\Genres;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    
    public function booksAuthors():BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
    
    public function booksCategories():BelongsToMany
    {
        return $this->belongsToMany(Categories::class);
    }
    
    public function booksGenres():BelongsToMany
    {
        return $this->belongsToMany(Genres::class);
    }
}
