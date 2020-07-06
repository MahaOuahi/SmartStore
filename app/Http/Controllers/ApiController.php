<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        if(request()->categorie){
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->categorie);
            })->paginate(6);
        }else{
            $products = Product::with('categories')->paginate(6);
        }

        return response()->json($products);
    }

    public function show()
    {
        $list = Product::all();

        return response()->json($list);
    }

    public function search($q)
    {

        $products = Product::where('title', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->paginate(6);

        return response()->json($products);
    }

    public function create(Request $request)
    {

        $product = new Product();

        $product->title = $request->input('title');
        $product->slug = $request->input('slug');
        $product->subtitle = $request->input('subtitle');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->input('image');

        $product->save();
        return response()->json($product);
    }

    public function delete($id)
    {
        $product =  Product::find($id);

        $product->delete();
        return response()->json($product);
    }

}
