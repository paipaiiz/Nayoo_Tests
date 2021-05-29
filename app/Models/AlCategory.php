<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AlCategory extends Model
{
    use HasFactory;

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    protected $fillable = [
        'name_categorie'
    ];
}
