<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Game extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'date_release', 'image', 'vote', 'description'];
    use SoftDeletes;

    // Many to Many on Consoles
    public function consoles()
    {
        return $this->belongsToMany(Console::class);
    }
}
