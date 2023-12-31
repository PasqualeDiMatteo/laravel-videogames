<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Game extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'date_release', 'image', 'vote', 'description', 'developer_id','publisher_id', 'genre_id'];
    use SoftDeletes;


    // Many to Many on Consoles
    public function consoles()
    {
        return $this->belongsToMany(Console::class);
    }
  
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
