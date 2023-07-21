<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Binding extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
    
    public function books():HasMany
    {
        return $this->hasMany(Book::class);
    }
}
