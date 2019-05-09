<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transaction = Transaction::with('user:id,name')->paginate(10);

        $viewData = [
            'transaction' => $transaction
        ];

        return view('admin::transaction.index',$viewData);
    }

    public function viewOrder(Request $request, $id)
    {
//        if ($request->ajax())
//        {
//            $orders = Order::with('product')->where('or_transaction_id',$id)->get();
//
//            $html = view('admin::components.order',compact('orders'))->render();
//
//            return \response()->json($html);
//        }

        $orders = Order::with('product')->where([
            'or_transaction_id' => $id
        ])->get();

        $viewData = [
            'orders' => $orders
        ];

        return view('admin::order.index',$viewData);
    }

    /*
     * Xu lys trang thai don hang
     */
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();

        if ($orders)
        {
            foreach ($orders as $order)
            {
                $product = Product::find($order->or_product_id);

                // Tru di so luong san pham sau khi da xu ly
                $product->pro_number = $product->pro_number - $order->or_qty;

                // tang so luong luot mua "pro_pay" len 1 don vi
                // de viet duoc san phan do co bao nhieu luot mua
                $product->pro_pay ++;

                // Luu lai
                $product->save();
            }
        }

        // Update user
        \DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');

        // Cap nhat lai trang thai don hang
        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success','Xử lý đơn hàng thành công!');





    }
}
