<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rate;
use App\Models\Catalog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('/client/index');
    }

    public function productList()
    {
        $catalogs = Catalog::all();
        $products = Product::all();

        return view('/client/products', compact('products', 'catalogs'));
    }

    public function show($id)
    {
        //chi tiet san pham

        
        $products = Product::findOrFail($id);

        $ratings = Rate::where('product_ID', $products->id)->get();
        $rating_sum = Rate::where('product_ID', $products->id)->get()->sum('star');
        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        $related_products = Product::where('catalog_ID', $products->catalog_ID)->limit(3)->get();
        return view('/client/product_detail', compact('products', 'related_products', 'ratings', 'rating_value'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $catalogs = Catalog::all();
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->get();
        return view('/client/products', compact('products', 'search', 'catalogs'));
    }

    
}
