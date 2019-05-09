@extends('layouts.app')
@section('content')


    <!-- cart section end -->
    <section class="cart-section p-lg-4 profile">
        <div class="container">
            <div class="row">
                <div class="user-penal">
                    <div class="user-page d-flex align-items-center">
                        <div class="user-avatar">
                            <img src="{{ isset($user->avatar) ? pare_url_file($user->avatar) : asset('theme_frontend/img/businessman.svg') }}" alt="">
                        </div>
                        <div class="user-name ml-2">
                            <div class="name">
                                <h5>{{ get_data_user('web','name') }}</h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5 body-side-left">
                        <a href="{{ route('get.profile.view') }}"><i class="far fa-user"></i> Tài khoản của tôi</a>
                        <a class="mt-4 active" href="{{ route('get.purchase.view',$user->id) }}"><i class="far fa-file-alt"></i> Đơn mua</a>
                    </div>
                </div>
                <div class="main-content">
                    <div class="purchase-head mb-3">
                        <ul>
                            <a href="{{ route('get.purchase.view',get_data_user('web')) }}"><li class="active">Chờ xử lý</li></a>
                            <a href="{{ route('get.purchase.processed.view',get_data_user('web')) }}"><li>Đã xử lý</li></a>
                        </ul>
                    </div>
                    <div class="content">
                        <div class="p-4">
                            @if(isset($orders))
                                @foreach($orders as $order => $item)
                                    @if($item->transaction->tr_status == 0)
                                        <div class="order-content d-flex justify-content-between align-items-center mb-3 mt-3">
                                            <div class="d-flex">
                                                <div class="image-content">
                                                    <a href="{{ route('get.detail.product',[$item->product->pro_slug,$item->product->id])  }}"><img src="{{ pare_url_file($item->product->pro_avatar) }}" alt=""></a>
                                                </div>
                                                <div class="detail-content">
                                                    <p><a href="{{ route('get.detail.product',[$item->product->pro_slug,$item->product->id])  }}">{{ $item->product->pro_name }}</a></p>
                                                    <p>x {{ $item->or_qty }}</p>
                                                </div>
                                            </div>
                                            <div class="price-content">
                                                <p><small>VNĐ </small></p>{{ number_format($item->transaction->tr_total, 0, ',', '.') }}<p></p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            @else
                                <div class="w-100 text-center">
                                    <img width="100px" src="{{ asset('theme_frontend/img/no-cart.png') }}" alt="">
                                    <p class="pt-2">Không có đơn hàng nào.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->
@stop
