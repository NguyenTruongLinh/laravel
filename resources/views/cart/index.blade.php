@extends('layouts.app')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Giỏ hàng của bạn</h4>
            <div class="site-pagination">
                <a href="{{ route('home') }}">Trang chủ</a> /
                <a href="">Giỏ hàng</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->


    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row">
                @if(Cart::content()->isEmpty())
                    <div class="w-100 text-center">
                        <img src="{{ asset('theme_frontend/img/no-cart.png') }}" alt="">
                        <h4 class="p-4">Không có sản phẩm nào trong giỏ hàng của bạn.</h4>
                        <a href="{{ route('home') }}">Trở về trang chủ</a>
                    </div>
                @else
                <div class="col-lg-8">
                    <div class="cart-table">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="cart-table-warp">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-th">Sản phẩm</th>
                                    <th class="quy-th">Số lượng</th>
                                    <th class="size-th">Size</th>
                                    <th class="total-th text-right">Giá</th>
                                    <th width="25px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td class="product-col">
                                            <img src="{{ pare_url_file($product->options->avatar) }}" alt="">
                                            <div class="pc-title">
                                                <h4>{{ $product->name }}</h4>
                                                <p>{{ number_format($product->price, 0, ',', '.') }} <small>VNĐ</small></p>
                                            </div>
                                        </td>
                                        <td class="quy-col align-top">
                                            <form class="d-flex align-content-center" action="{{ route('update.shopping.cart',$key) }}" method="get">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="quantity" name="qty" value="{{ $product->qty }}">
                                                </div>

                                            </div>
                                                <button type="submit" class="btn" title="Cập nhật"><i class="fas fa-redo-alt"></i></button>
                                            </form>
                                        </td>
                                        <td class="size-col align-top pt-2"><h4>{{ $product->options->size }}</h4></td>
                                        <td class="total-col align-top pt-2"><h4>{{ number_format($product->price * $product->qty, 0, ',', '.') }} <small>VNĐ</small></h4></td>
                                        <td class="text-right align-top pt-2"><a href="{{ route('delete.shopping.cart',$key) }}" title="Xoá"><i class="fas fa-times"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="total-cost">
                            <h6><a href="{{ route('destroy.shopping.cart') }}">Huỷ đơn hàng</a></h6>
                            <h6>Tổng <span>{{ \Cart::subtotal(0, ',', '.') }}</span><small> VNĐ</small></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 card-right">
                    <form class="promo-code-form">
                        <input type="text" placeholder="Nhập mã giảm giá (Nếu có)">
                        <button>Đồng ý</button>
                    </form>
                    <a href="{{ route('get.form.pay') }}" class="site-btn">Thanh toán</a>
                    <a href="{{ route('home') }}" class="site-btn sb-dark">Tiếp tục mua sắm</a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- cart section end -->

    <!-- Related product section -->
    <section class="related-product-section">
        <div class="container">
            <div class="section-title text-uppercase">
                <h2>Tiếp tục mua sắm</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <div class="tag-new">New</div>
                            <img src="./img/product/2.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Black and White Stripes Dress</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="./img/product/5.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="./img/product/9.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="./img/product/1.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related product section end -->
@stop
