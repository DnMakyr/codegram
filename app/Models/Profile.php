<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'profile/7FpzVTsdK2HfGtCMd029qpMYxK3PblhUn3L2ZZWC.jpg';
        return '/storage/'.$imagePath;
    }

    public function user()
    {   
        return $this->belongsTo('App\Models\User');   
    }
}
