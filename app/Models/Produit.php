<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public $fillable = [
        "categorie_id",
        "designation",
        "description",
        "prix",
        "image"
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
