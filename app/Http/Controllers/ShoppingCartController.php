<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Input;
use Auth;

class ShoppingCartController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    //Thêm giỏ hàng
    public function addProduct()
    {

        if (\Illuminate\Support\Facades\Request::isMethod('POST'))
        {
            $product_id = Input::get('product_id');

            $product = Product::find($product_id);

            if (!$product) return redirect('/');

            $price = $product->pro_price;
            if ($product->pro_price)
            {
                $price = $price * (100 - $product->pro_sale)/100;
            }

            if ($product->pro_number == 0)
            {
                return redirect()->back()->with('warning', 'Sản phẩm tạm hết hàng.');
            }

            $size = Input::get('sc', '0');

            if ($size == '0')
            {
                return redirect()->back()->with('error','Vui lòng chọn size!');
            }

            $qty = Input::get('qty');
//            $pro_name = Input::get('pro_name');
//            $pro_price = Input::get('pro_price');
//            $pro_avatar = Input::get('pro_avatar');
//
//            dd($product_id, $qty, $pro_name, $pro_price, $pro_avatar);

//            dd($radio);

            \Cart::add([
                'id' => $product_id,
                'name' => $product->pro_name,
                'qty' => $qty,
                'price' => $price,
                'options' => [
                    'avatar' => $product->pro_avatar,
                    'sale' => $product->pro_sale,
                    'price_old' => $product->pro_price,
                    'size' => $size
                ]
            ]);
        }

        $cart = Cart::content();
        $this->data['products'] = $cart;

        return view('cart.index', $this->data);


//        return redirect()->back()->with('success', 'Thêm giỏ hàng thành công. Mời bạn xem giỏ hàng!');
    }

    //Show giỏ hàng
    public function getListShoppingCart()
    {
        $products = \Cart::content();
        return view('cart.index', compact('products'));
    }

    //Form thanh toán
    public function getFormPay()
    {
        $products = \Cart::content();
        return view('cart.checkout', compact('products'));
    }

    public function deleteCart($key)
    {
        \Cart::remove($key);
        return redirect()->back()->with('success','Xoá thành công!');
        //return back();
    }

    public function destroyCart()
    {
        \Cart::destroy();
        return redirect()->back()->with('success','Xoá thành công!');
        //return back();
    }

    public function updateCart(Request $request, $id)
    {
        \Cart::update($id, $request->qty);
        return redirect()->back()->with('success','Cập nhật thành công!');
    }

    public function saveInfoShoppingCart(Request $request)
    {
        $totalMoney = str_replace(',', '', \Cart::subtotal(0,3));
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total' => (int)$totalMoney,
            'tr_note' => $request->note,
            'address' => $request->address,
            'tr_phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if ($transactionId)
        {
            $products = \Cart::content();
            foreach ($products as $product)
            {
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id' => $product->id,
                    'or_qty' => $product->qty,
                    'or_price' => $product->options->price_old,
                    'or_sale' => $product->options->sale,
                    'or_size' => $product->options->size,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        \Cart::destroy();

        return redirect('/');
    }

    public function getPurchase($id)
    {
        return view('purchase.index');
    }
}
