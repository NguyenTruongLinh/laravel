<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->limit(4)->get();

        $allProducts = Product::where([
            'pro_active' => Product::STATUS_PUBLIC
        ])->paginate(4);

        $viewData = [
            'productHot' => $productHot,
            'allProducts' => $allProducts
        ];

        return view('home.index', $viewData);
    }

    public function renderProductView(Request $request)
    {
        if ($request->ajax())
        {
            $listID = $request->id;

            $products = Product::whereIn('id', $listID)->get();

            $html = view('components.product_view', compact('products'))->render();

            return response()->json(['data' => $html]);
        }
    }
}
