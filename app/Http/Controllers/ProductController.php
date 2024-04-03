<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::get();
        return response()->json($products);
    }

    public function show($name)
    {
        $product = Products::findOrFail($name);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = Products::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        Products::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
