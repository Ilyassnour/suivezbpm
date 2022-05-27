<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Foundation\Auth;
class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'cif',
        'nom',
        'nutelephone',
        'adhesion',
        'ccl',
        'etat',
        'cover',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

}
