<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        // dd($request);

        $query = $request->get('q');
        // dd($query);
        $products = Product::where('title', 'like', "%{$query}%")
                    ->where('status', 1)
                    ->take(7)
                    ->get(['id', 'title', 'image']);

        // dd($products);

        $items = view('frontend.layouts.search_results', compact('products'))->render();

        return response()->json(['html' => $items]);
    }
}
