<?php

namespace App\Http\Controllers;

use App\Gate\ProductAbilities;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection(
            Product::paginate(15)
        );
        //return Product::query()->select('id', 'name', 'price')->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    #[Middleware('auth:sanctum')]
    public function store(Request $request)
    {
        Gate::authorize(ProductAbilities::GESTIONAR_PRODUCTOS);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return $product;
    }

    #[Middleware('auth:sanctum')]
    public function update(Request $request, Product $product)
    {
        Gate::authorize(ProductAbilities::GESTIONAR_PRODUCTOS);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return $product;
    }

    #[Middleware('auth:sanctum')]
    public function destroy(Product $product)
    {
        Gate::authorize(ProductAbilities::GESTIONAR_PRODUCTOS);

        $product->delete();

        return [
            'message' => 'Deleted product',
            'product' => $product,
        ];
    }
}
