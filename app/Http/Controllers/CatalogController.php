<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Htpp\Controllers\ParameterController;

class CatalogController extends Controller
{
    
    public function createProductColumn() 
    {
        $products = Products::all();
        $parameter = new ParametersController();
        $paramValues = $parameter->getParam()->original;
    
        $productData = [];
        foreach ($products as $product) {
            $formattedProduct = [];
            foreach ($paramValues['columns'] as $column) {
                if ($column === 'item') {
                    $formattedProduct[$column] = $product->id;
                } else {
                    $formattedProduct[$column] = $product->$column;
                }
            }
            $productData[] = $formattedProduct;
        }
        return response()->json($productData);
    }
    
    public function getProducts()
    {
        $products = Products::all();
        $collectionOfListProduct = [];

        foreach ($products as $index => $product) {
            $formattedProduct = [
                'item' => $product->id,
                'price' => $product->price
            ];
            $collectionOfListProduct[$index + 1] = $formattedProduct;
        }
        return $collectionOfListProduct;
    }
}
