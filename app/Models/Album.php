<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public function alCategory()
    {
        return $this->belongsTo(AlCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    protected $fillable = [
        'name_album',
        'al_categories_id'
    ];
}
