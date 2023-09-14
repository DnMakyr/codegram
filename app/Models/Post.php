<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{   
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'caption',
        'image',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
