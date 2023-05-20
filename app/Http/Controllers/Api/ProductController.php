<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
        ]);

        $product = Product::create($request->only([
            'name',
            'description',
            'price',
            'stock',
        ]));

        return ProductResource::make($product);
    }

    public function update(Product $product, Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'description' => ['string'],
            'price' => ['integer'],
            'stock' => ['integer'],
        ]);

        $product->update($request->only([
            'name',
            'description',
            'price',
            'stock',
        ]));

        return ProductResource::make($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}