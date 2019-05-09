<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Rating;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // Danh gia moi nhat
        $ratings = Rating::with('user:id,name,email','product:id,pro_name')->orderBy('id','DESC')->limit(5)->get();

        // Lien he moi nhat
        $contacts = Contact::orderBy('id','DESC')->limit(5)->get();


        //DOANH THU
        // Doanh thu Ngay
        $moneyDay = Transaction::whereDay('updated_at', date('d'))->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');

        // Doanh thu Thang
        $moneyMonth = Transaction::whereMonth('updated_at', date('m'))->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');

        // Doanh thu Nam
        $moneyYear = Transaction::whereYear('updated_at', date('Y'))->where('tr_status',Transaction::STATUS_DONE)
            ->sum('tr_total');

        $dataMoney = [
            [
                "name" => "Doanh thu ngày",
                "y" => (int)$moneyDay
            ],
            [
                "name" => "Doanh thu tháng",
                "y" => (int)$moneyMonth
            ],
            [
                "name" => "Doanh thu Năm",
                "y" => (int)$moneyYear
            ]

        ];
        // END DOANH THU

        // DS don hang moi nhat
        $transactionNews = Transaction::with('user:id,name')->orderBy('id','DESC')->limit(5)->get();

        // Dem so don hang duyet thanh cong
        $countTransaction = DB::table('transaction')->where('tr_status',Transaction::STATUS_DONE)->count();

        // Tong so san pham
//        $countProduct = Product::->count;

        // San pham ban duoc nhieu nhat
        $productPay = Product::orderBy('pro_pay', 'DESC')->limit(5)->get();

        $viewData = [
            'ratings' => $ratings,
            'contacts' => $contacts,
            'dataMoney' => json_encode($dataMoney),
            'transactionNews' => $transactionNews,
            'countTransaction' => $countTransaction,
//            'countProduct' => $countProduct
            'productPay' => $productPay
        ];

        return view('admin::index',$viewData);
    }
}
