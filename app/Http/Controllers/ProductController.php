<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json(Product::orderBy('id', 'desc')->get());
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $fields=$request->validate([
                'name' => 'required',
                'image' => 'required',
                'description' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'status' => 'required'
            ]);
            $product = Product::create([
                'name' => $fields['name'],
                'image' => $fields['image'],
                'description' => $fields['description'],
                'price' => $fields['price'],
                'quantity' => $fields['quantity'],
                'status' => $fields['status']
            ]);
            return response()->json($product,200);
        }catch (\Exception $exception)
        {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $productAux = Product::find($request->id);

        if($productAux)
        {
            $productAux->name = $product->name;
            $productAux->image = $product->image;
            $productAux->description = $product->description;
            $productAux->price = $product->price;
            $productAux->quantity = $product->quantity;
            $productAux->status = $product->status;

            $productAux->save();
            return response()->json([
                'message' => 'Producto modificado correctamente'
            ], 200);
        }

        return response()->json([
            'message' => 'El producto a modificar no fue encontrado'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try{
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully'
            ], 200);
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}
