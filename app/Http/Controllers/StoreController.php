<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $products = Store::paginate(9);
        if ($checked_category = request('category')) {
            $products = Store::where('category', $checked_category)->paginate(9);
        }

        return view('site.store', [
            'categories'       => Store::pluck('category'),
            'checked_category' => $checked_category,
            'products'         => $products
        ]);
    }

    public function detail(Store $product)
    {
        $products = Store::orderByRaw('RAND()')->limit(3)->get();
        return view('site.store_detail', [
            'product'  => $product,
            'products' => $products
        ]);
    }
}
