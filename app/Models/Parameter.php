<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameters';
    protected $fillable = ['population_size', 'budget', 'stopping_value', 'crossover_rate'];
}
