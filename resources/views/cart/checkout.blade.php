@extends('layouts.app')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Your cart</h4>
            <div class="site-pagination">
                <a href="">Home</a> /
                <a href="">Your cart</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->


    <!-- checkout section  -->
    <section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">
                    <form class="checkout-form" method="POST">
                        @csrf
                        <div class="cf-title">Địa chỉ giao hàng</div>
                        <div class="row">
                            <div class="col-md-7">
                                <p>*Thông tin địa chỉ</p>
                            </div>
                        </div>
                        <div class="row address-inputs">
                            <div class="col-md-12">
                                <input type="text" placeholder="Họ tên" name="name" value="{{ get_data_user('web','name') }}">
                                <input type="text" placeholder="Địa chỉ" name="address" value="{{ get_data_user('web','address') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="E-mail" name="email" value="{{ get_data_user('web','email') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Số điện thoại" name="phone" value="{{ get_data_user('web','phone') }}">
                            </div>
                            <div class="col-md-12">
                                <textarea type="text" placeholder="Ghi chú" rows="3" name="note"></textarea>
                            </div>
                        </div>
                        <div class="cf-title">Delievery Info</div>
                        <div class="row shipping-btns">
                            <div class="col-6">
                                <h4>Standard</h4>
                            </div>
                            <div class="col-6">
                                <div class="cf-radio-btns">
                                    <div class="cfr-item">
                                        <input type="radio" name="shipping" id="ship-1">
                                        <label for="ship-1">Free</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4>Next day delievery  </h4>
                            </div>
                            <div class="col-6">
                                <div class="cf-radio-btns">
                                    <div class="cfr-item">
                                        <input type="radio" name="shipping" id="ship-2">
                                        <label for="ship-2">$3.45</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cf-title">Payment</div>
                        <ul class="payment-list">
                            <li>Paypal<a href="#"><img src="img/paypal.png" alt=""></a></li>
                            <li>Credit / Debit card<a href="#"><img src="img/mastercart.png" alt=""></a></li>
                            <li>Pay when you get the package</li>
                        </ul>
                        <button type="submit" class="site-btn submit-order-btn">Đặt hàng</button>
                    </form>
                </div>
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="checkout-cart">
                        <h3>Sản phẩm của bạn</h3>
                        <ul class="product-list">
                            @foreach($products as $product)
                            <li>
                                <div class="pl-thumb"><img src="{{ pare_url_file($product->options->avatar) }}" alt=""></div>
                                <h6>{{ $product->name }}</h6>
                                <p>{{ number_format($product->price, 0, ',', '.') }} <small>VNĐ</small></p>
                                <p>SL: {{ $product->qty }}</p>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="price-list">
                            <li>Shipping<span>free</span></li>
                            <li class="total">Tổng tiền<span>{{ \Cart::subtotal(0, ',', '.') }}<small> VNĐ</small></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout section end -->
@stop