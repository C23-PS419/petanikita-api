<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all()->load(['user', 'media']));
    }

    public function show(Product $product)
    {
        return ProductResource::make($product->load(['user', 'media']));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::make($request->safe()->only([
            'name',
            'description',
            'price',
            'stock',
        ]));

        $request->user()->products()->save($product);

        return ProductResource::make($product);
    }

    public function update(Product $product, ProductRequest $request)
    {
        $this->authorize('update', $product);

        $product->update($request->safe()->only([
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
