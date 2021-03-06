@extends('layouts.app')
@section('content')

    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>CAtegory PAge</h4>
            <div class="site-pagination">
                <a href="{{ route('home') }}">Trang Chủ</a> /
                @if(isset($cateProduct->c_name))
                <a>{{ $cateProduct->c_name }}</a> /
                @endif
            </div>
        </div>
    </div>
    <!-- Page info end -->


    <!-- Category section -->
    <section class="category-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="filter-widget">
                        <h2 class="fw-title">Categories</h2>
                        <ul class="category-menu">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <li><a class="" href="{{ route('get.list.product',[$category->c_slug,$category->id]) }}">{{ $category->c_name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">refine by</h2>
                        <div class="price-range-wrap">
                            <h4>Price</h4>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">color by</h2>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" name="cs" id="gray-color">
                                <label class="cs-gray" for="gray-color">
                                    <span>(3)</span>
                                </label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="cs" id="orange-color">
                                <label class="cs-orange" for="orange-color">
                                    <span>(25)</span>
                                </label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="cs" id="yollow-color">
                                <label class="cs-yollow" for="yollow-color">
                                    <span>(112)</span>
                                </label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="cs" id="green-color">
                                <label class="cs-green" for="green-color">
                                    <span>(75)</span>
                                </label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="cs" id="purple-color">
                                <label class="cs-purple" for="purple-color">
                                    <span>(9)</span>
                                </label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" name="cs" id="blue-color" checked="">
                                <label class="cs-blue" for="blue-color">
                                    <span>(29)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget mb-0">
                        <h2 class="fw-title">Size</h2>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" name="sc" id="xs-size">
                                <label for="xs-size">XS</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="sc" id="s-size">
                                <label for="s-size">S</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="sc" id="m-size"  checked="">
                                <label for="m-size">M</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="sc" id="l-size">
                                <label for="l-size">L</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="sc" id="xl-size">
                                <label for="xl-size">XL</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" name="sc" id="xxl-size">
                                <label for="xxl-size">XXL</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h2 class="fw-title">Brand</h2>
                        <ul class="category-menu">
                            <li><a href="#">Abercrombie & Fitch <span>(2)</span></a></li>
                            <li><a href="#">Asos<span>(56)</span></a></li>
                            <li><a href="#">Bershka<span>(36)</span></a></li>
                            <li><a href="#">Missguided<span>(27)</span></a></li>
                            <li><a href="#">Zara<span>(19)</span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                    @if(!empty($products))
                    <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            @if($product->pro_number == 0)
                                                <div class="tag-sale">Hết hàng</div>
                                            @endif
                                            @if($product->pro_sale > 0)
                                                <div class="tag-new">{{ $product->pro_sale }} %</div>
                                            @endif
                                            {{--<div class="tag-sale">ON SALE</div>--}}
                                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                                <img src="{{ pare_url_file($product->pro_avatar) }}" alt="">
                                            </a>
                                            <div class="pi-links">
                                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="pi-text">
                                            <h6>{{ number_format($product->pro_price, 0, ',', '.') }} <small>VNĐ</small></h6>
                                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}"><p>{{ $product->pro_name }}</p></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <div class="text-center w-100 pt-3">
                            {{--<button class="site-btn sb-line sb-dark">LOAD MORE</button>--}}
                            {!! $products->appends($query)->links() !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Category section end -->

@stop