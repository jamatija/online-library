<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Author;
use App\Models\Categories;
use App\Models\Genres;
use App\Models\Binding;
use App\Models\Formats;
use App\Models\Languages;
use App\Models\Publishers;
use App\Models\Letters
;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'page_count',
        'quantity_count',
        'rented_count',
        'body',
        'year',
        'pdf',
        'ISBN',
        'letter_id',
        'language_id',
        'binding_id',
        'format_id',
        'publisher_id',
    ];
    
    //Many to many - pivot 
    
    public function authors():BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
    
    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Categories::class);
    }
    
    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genres::class);
    }
    
    
    //One to many

    public function binding():BelongsTo
    {
        return $this->belongsTo(Binding::class);
    }
    
    public function letter():BelongsTo
    {
        return $this->belongsTo(Letters::class);
    }
    
    public function language():BelongsTo
    {
        return $this->belongsTo(Languages::class);
    }

    public function format():BelongsTo
    {
        return $this->belongsTo(Formats::class);
    }
    
    public function publisher():BelongsTo
    {
        return $this->belongsTo(Publishers::class);
    }
}
