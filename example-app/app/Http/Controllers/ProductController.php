<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->save();

        return response()->json([
            'message' => 'Product successfully added.'
        ], 201);
    }

    public function show(Product $id)
    {
        $product = Product::find($id);

        if (!empty($product)) {
            return response()->json([
                'data' => $product,
            ]);
        } else {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);

            $product->name = is_null($request->name) ? $product->name : $request->name;
            $product->price = is_null($request->price) ? $product->price : $request->price;
            $product->category_id = is_null($request->category_id) ? $product->category_id : $request->category_id;
            $product->status = is_null($request->status) ? $product->status : $request->status;
            $product->save();

            return response()->json([
                'message' => 'Product successfully updated.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Updated Failed.'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);
            $product->delete();

            return response()->json([
                'message' => 'Successfully delete data.'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Failed delete data.'
            ], 404);
        }
    }
}
