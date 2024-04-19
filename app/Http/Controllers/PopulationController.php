<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\IndividuController;
use App\Http\Controllers\ParametersController;

class PopulationController extends Controller
{
    public function createRandomPopulation() {
        $individu = new IndividuController();
        $param = new ParametersController();
        $valueParam = $param->getParam()->original; 
        $populationSize = $valueParam['populationSize']; 
        
        for ($i = 0; $i <= $populationSize -1; $i++) {
            $ret[] = $individu->createRandomIndividu();
        }
        return response()->json($ret);
    }
    
}
