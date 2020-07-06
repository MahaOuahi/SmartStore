<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charts\LatestProducts;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->categorie){
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->categorie);
            })->paginate(6);
        }else{
            $products = Product::with('categories')->paginate(6);
        }

        return view('products.index')->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('products.show')->with('product', $product);
    }

    public function search()
    {
        request()->validate([
            'q' => 'required|min:3'
        ]);

        $q = request()->input('q');

        $products = Product::where('title', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->paginate(6);

        return view('products.search')->with('products', $products);
    }

    public function indexe()
    {
        $productsDate = Product::pluck('id', 'created_at');

        $productsPrice = Product::pluck('price', 'created_at');

        $date = new LatestProducts;
        $date->labels($productsDate->keys());
        $date->dataset('Latest products', 'bar', $productsDate->values());

        $price = new LatestProducts;
        $price->labels($productsPrice->keys());
        $price->dataset('Latest products prices', 'line', $productsPrice->values());

        return view('products.chart', compact('date', 'price'));
    }


}
