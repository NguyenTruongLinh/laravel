<section class="product-filter-section p-0 last-seen">
    <div class="container">
        <div class="section-title">
            <h2>SẢN PHẨM VỪA XEM</h2>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-sm-6 nothing">
                    <div class="product-item">
                        <div class="pi-pic">
                            @if($product->pro_number == 0)
                                <div class="tag-sale">Hết hàng</div>
                            @endif
                            @if($product->pro_sale > 0)
                                <div class="tag-new">{{ $product->pro_sale }} %</div>
                            @endif
                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id])  }}"><img src="{{ pare_url_file($product->pro_avatar) }}" alt=""></a>
                            <div class="pi-links">
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>{{ number_format($product->pro_price, 0, ',', '.') }} <small>VNĐ</small></h6>
                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id])  }}"><p>{{ $product->pro_name }}</p></a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--<div class="row justify-content-center w-100">--}}
                {{--{{ $product->links() }}--}}
            {{--</div>--}}
        </div>
        {{--<div class="text-center pt-5">--}}
            {{--<button class="site-btn sb-line sb-dark">LOAD MORE</button>--}}
        {{--</div>--}}
    </div>
</section>