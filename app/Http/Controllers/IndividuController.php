<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CatalogController;

class IndividuController extends Controller
{
    public function countNumberOfGen ()
    {
        $catalog = new CatalogController();
        $countCatalogs = count($catalog->getProducts());
    
        return response()->json($countCatalogs);
    }
    
    public function createRandomIndividu() 
    {
        $numberOfGen = $this->countNumberOfGen()->original;

        $ret = [];
        for ($i = 0; $i < $numberOfGen; $i++) {
            $ret[] = rand(0, 1);
        }
        return response()->json($ret);
    }
}
