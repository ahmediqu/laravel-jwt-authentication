<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductReqest;
use App\Models\Product;
use App\Services\ProductService;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service
            ->latest()
            ->paginate(10);
    }


    public function store(ProductReqest $request)
    {

         $this->service
            ->setAttrs($request->only('title', 'description', 'price', 'image'))
            ->store();

        return response()->json([
            'success' => true
        ]);
    }


    public function show(Product $product)
    {
        return $product;
    }


    public function update(ProductReqest $request, Product $product)
    {

        $this->service
            ->setModel($product)
            ->setAttrs($request->only('title', 'description', 'price', 'image'))
            ->update();
        return response()->json([
            'success' => true,
        ]);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'successfully delete',
        ]);
    }
}
