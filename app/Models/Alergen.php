<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergen extends Model
{
    use HasFactory;

    protected $table = 'alergen';

    protected $fillable = ['alergen_name', 'alergen_id'];

    protected $primaryKey = 'id';
}
