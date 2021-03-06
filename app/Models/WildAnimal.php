<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color as Color;

class WildAnimal extends Model
{
    use HasFactory;

    public function ecolor()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
