<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WildAnimal as Animal;

class Color extends Model
{
    use HasFactory;

    public function animals()
    {
        return $this->hasMany(Animal::class, 'color_id', 'id');
    }
}
