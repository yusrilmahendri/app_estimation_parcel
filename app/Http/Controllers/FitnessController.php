<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndividuController;
use Illuminate\Http\Response;

class FitnessController extends Controller
{
    public function selectingItem()
    {   
        $catalog = new CatalogController();
        $product  = $catalog->getProducts();

        $population = new IndividuController();
        $individu = $population->createRandomIndividu()->original;
        
        

        foreach($individu as $individuKey => $binaryGen) {
            if ($binaryGen === 1) {
                $ret[] = [
                    'selectedKey' => $individuKey,
                    'selectedPrice' => $product
                ];
            } 
        }
        return response()->json($ret);
    }


    // note masih error
    public function calculaterFitnessValue()
    {
        $population = new IndividuController();
        $response = $population->createRandomIndividu();
        $individu = json_decode($response->getContent(), true); // Mengonversi respons JSON menjadi array
    
        // Pastikan $individu adalah array sebelum menggunakan array_column()
        if (!is_array($individu)) {
            // Handle error
            return response()->json(['error' => 'Invalid data format']);
        }
    
        // Mengambil nilai 'selectedPrice' dari setiap elemen dalam array $individu
        $selectedPrices = array_column($individu, 'selectedPrice');

        $totalSum = array_sum($selectedPrices);
        return response()->json($totalSum);
    }
    
    
    
    
    
    
    
    
    
}
