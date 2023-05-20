<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all()->load('user'));
    }

    public function show(Product $product)
    {
        return ProductResource::make($product->load('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
        ]);

        $product = Product::make($request->only([
            'name',
            'description',
            'price',
            'stock',
        ]));

        $request->user()->products()->save($product);

        return ProductResource::make($product);
    }

    public function update(Product $product, Request $request)
    {
        $this->authorize('update', $product);

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

        return ProductResource::make($product->load('user'));
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();

        return response()->noContent();
    }
}
