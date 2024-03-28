<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function createProductColumn($listOfRawProduct) {
        foreach (array_keys($listOfRawProduct) as $listOfRawProductKey) {
            $listOfRawProduct[Parameters::COLUMNS[$listOfRawProductKey]] = $listOfRawProduct[$listOfRawProductKey];
            unset($listOfRawProduct[$listOfRawProductKey]);
          }
          return $listOfRawProduct;
    }
}
