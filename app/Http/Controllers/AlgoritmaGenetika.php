<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;
use App\Models\Products;

class AlgoritmaGenetika extends Controller
{
    public function getParam(){
        $param = Parameter::get();
        return response()->json($param);
    }

    public function param()
    {
        $products = Products::all();
        $param = Parameter::first();

        $columns = [];
        foreach ($products as $product) {
            $item = $product->id;
            $price = $product->price;
            $columns[] = [$item, $price];
        }

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

        $result = $this->createProductColumn($paramValues);
        
        return response()->json($result);
    }
    
    public function createProductColumn($paramValues) {
        $listOfRawProduct = [];
        $columns = $paramValues['columns'];
    
        foreach ($columns as $column) {
            $listOfRawProduct[] = [
                $column[0],
                $column[1]
            ];
        }
    
        return response()->json($listOfRawProduct);
    }
    
}
