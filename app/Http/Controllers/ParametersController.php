<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;

class ParametersController extends Controller
{
      public function getParam()
    {
        $param = Parameter::first();
       
        $columns = ['item', 'price'];
    
        $populationSize = $param->population_size;
        $budget = $param->budget;
        $stoppingValue = $param->stopping_value;
        $crossoverRate = $param->crossover_rate;
        $paramValues = [
            'columns' => $columns,
            'populationSize' => $populationSize,
            'budget' => $budget,
            'stoppingValue' => $stoppingValue,
            'crossoverRate' => $crossoverRate,
        ];
                
        return response()->json($paramValues);
    }
}
