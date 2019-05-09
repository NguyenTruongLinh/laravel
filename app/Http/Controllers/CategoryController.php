<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if ($id = array_pop($url))
        {
            $products = Product::where([
                'pro_category_id' => $id,
                'pro_active' => Product::STATUS_PUBLIC
            ])->orderBy('id','DESC')->paginate(12);

            $cateProduct = Category::find($id);

//            dd($cateProduct);

            $viewData = [
                'products' => $products,
                'cateProduct' => $cateProduct,
                'query' => $request->query()
            ];

            return view('product.index',$viewData);
        }

        if ($request->k)
        {
            $products = Product::where([
                'pro_active' => Product::STATUS_PUBLIC
            ])->where('pro_name','like','%'.$request->k.'%');

            $products = $products->paginate(9);

            $viewData = [
                'products' => $products,
                'query' => $request->query()
            ];

            return view('product.index',$viewData);
        }

        return redirect('/');
    }
}
