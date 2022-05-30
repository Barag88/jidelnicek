<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodAlergen extends Model
{
    use HasFactory;

    protected $table = 'pivot_alergen_food';

    protected $fillable = ['food_id', 'alergen_id'];
}
