<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $products = Product::with('category:id,c_name')->paginate(10);

        $viewData = [
            'products' => $products
        ];

        return view('admin::product.index',$viewData);
    }

    public function create()
    {
        $categories = $this->getCategories();

        return view('admin::product.create',compact('categories'));
    }

    public function store(RequestProduct $requestProduct)
    {
        $this->insertOrUPdate($requestProduct);

        return redirect()->back()->with('success', 'Thêm mới thành công!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update', compact('product', 'categories'));
    }

    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct, $id);
        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function insertOrUPdate($requestProduct, $id='')
    {
        $product = new Product();

        if ($id)
        {
            $product = Product::find($id);
        }

        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = str_slug($requestProduct->pro_name);
        $product->pro_category_id = $requestProduct->pro_category_id;
        $product->pro_number = $requestProduct->pro_number;
        $product->pro_qty_xs = $requestProduct->pro_qty_xs ? $requestProduct->pro_qty_xs : 0;
        $product->pro_qty_s = $requestProduct->pro_qty_s ? $requestProduct->pro_qty_s : 0;
        $product->pro_qty_m = $requestProduct->pro_qty_m ? $requestProduct->pro_qty_m : 0;
        $product->pro_qty_l = $requestProduct->pro_qty_l ? $requestProduct->pro_qty_l : 0;
        $product->pro_qty_xl = $requestProduct->pro_qty_xl ? $requestProduct->pro_qty_xl : 0;
        $product->pro_qty_xxl = $requestProduct->pro_qty_xxl ? $requestProduct->pro_qty_xxl : 0;
        $product->pro_price = $requestProduct->pro_price;
        $product->pro_sale = $requestProduct->pro_sale;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
        $product->pro_description_seo = $requestProduct->pro_description_seo ? $requestProduct->pro_description_seo : $requestProduct->pro_name;
        $product->pro_size_xs = Input::has('pro_size_xs') ? true : false;
        $product->pro_size_s = Input::has('pro_size_s') ? true : false;
        $product->pro_size_m = Input::has('pro_size_m') ? true : false;
        $product->pro_size_l = Input::has('pro_size_l') ? true : false;
        $product->pro_size_xl = Input::has('pro_size_xl') ? true : false;
        $product->pro_size_xxl = Input::has('pro_size_xxl') ? true : false;

//        dd($product->pro_size_xs);

        if ($requestProduct->hasFile('pro_avatar'))
        {
            $file = upload_image('pro_avatar');

            if (isset($file['name']))
            {
                $product->pro_avatar = $file['name'];
            }
        }

//        dd($requestProduct->all());

//        dd(Input::has('pro_size_xs'));

        $product->save();
    }

    public function action($action, $id)
    {
        if ($action)
        {
            $product = Product::find($id);
            switch ($action)
            {
                case 'delete':
                    $product->delete();
                    break;
                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $product->save();
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $product->save();
                    break;
            }
        }

        return redirect()->back();
    }
}
