@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="">Đơn hàng</a></li>
                        <li class="breadcrumb-item"><a>Chi tiết</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <div class="row justify-content-between align-items-center">
                <h1>Chi tiết đơn hàng</h1>
                {{--<a href="{{ route('admin.get.create.category') }}" class="btn btn-success"><i class="menu-icon mdi mdi-plus"></i>Thêm mới</a>--}}
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình đại diện sản phầm</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( isset($orders) )
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td class="align-top"></td>
                                    <td class="align-top" width="10%">
                                        <img  class="img img-reponsive rounded-0 image-product height-15" src="{{ isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : '' }}" alt="">
                                    </td>
                                    <td class="align-top">
                                        <a href="{{ route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id]) }}" target="_blank"><h4>{{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}</h4></a>
                                        <ul class="list-unstyled">
                                            <li class="menu-icon mdi mdi-cash-usd"> {{ number_format($order->or_price, 0, ',', '.') }} <small>VNĐ</small></li>
                                            <li>{{ $order->or_size }}</li>
                                        </ul>
                                    </td>
                                    <td class="align-top">{{ $order->or_qty }}</td>
                                    <td class="align-top">{{ number_format($order->or_price * $order->or_qty, 0, ',', '.') }} <small>VNĐ</small></td>
                                    <td class="align-top">
                                        <a href="" title="Xoá"><i class="menu-icon mdi mdi-delete btn btn-xs btn-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection