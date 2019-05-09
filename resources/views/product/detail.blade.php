@extends('layouts.app')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Chi tiết sản phẩm</h4>
            <div class="site-pagination">
                <a href="{{ route('home') }}">Trang chủ</a> /
                <a href="">Sản phẩm</a> /
                <a>{{ $productDetail->pro_name }}</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->


    <!-- product section -->
    <section class="product-section" id="content_product" data-id="{{ $productDetail->id }}">
        <div class="container">
            <div class="back-link">
                <a href="{{ route('home') }}"> &lt;&lt; Về trang chủ</a>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-pic-zoom">
                        @if($productDetail->pro_number == 0)
                            <div class="tag-sale">Hết hàng</div>
                        @endif
                        @if($productDetail->pro_sale > 0)
                            <div class="tag-new">{{ $productDetail->pro_sale }} %</div>
                        @endif
                        <img class="product-big-img" src="{{ pare_url_file($productDetail->pro_avatar) }}" alt="">
                    </div>
                    <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                        <div class="product-thumbs-track">
                            <div class="pt active" data-imgbigurl="img/single-product/1.jpg"><img src="img/single-product/thumb-1.jpg" alt=""></div>
                            <div class="pt" data-imgbigurl="img/single-product/2.jpg"><img src="img/single-product/thumb-2.jpg" alt=""></div>
                            <div class="pt" data-imgbigurl="img/single-product/3.jpg"><img src="img/single-product/thumb-3.jpg" alt=""></div>
                            <div class="pt" data-imgbigurl="img/single-product/4.jpg"><img src="img/single-product/thumb-4.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 product-details">
                    <h2 class="p-title">{{ $productDetail->pro_name }}</h2>
                    <h3 class="p-price">{{ number_format($productDetail->pro_price, 0, ',', '.') }} <small>VNĐ</small></h3>
                    <h4 class="p-stock">Available: <span>In Stock</span></h4>
                    <?php
                        $average = 0;

                        if ($productDetail->pro_total_rating)
                        {
                            $average = round($productDetail->pro_total_number / $productDetail->pro_total_rating,1);
                        }
                    ?>
                    <div class="p-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="far fa-star {{ $i <= $average ? '' : 'fa-fade' }}"></i>
                        @endfor
                    </div>
                    <div class="p-review">
                        <a href="">{{ $average }} đánh giá</a>|<a href="#ratings">Thêm đánh giá của bạn</a>
                    </div>
                    <form action="{{ route('add.cart') }}" method="POST">
                    <div class="fw-size-choose">
                        <p>Size</p>
                        <div class="sc-item {{ ($productDetail->pro_size_xs == 0 ? 'disable' : '') }}">
                            <input type="radio" name="sc" id="xs-size" {{ ($productDetail->pro_size_xs == 0 ? "disabled='disabled'": '') }} value="Size XS">
                            <label for="xs-size">XS
                                <span>{{ $productDetail->pro_qty_xs }}</span>
                            </label>
                        </div>
                        <div class="sc-item {{ ($productDetail->pro_size_s == 0 ? 'disable' : '') }}">
                            <input type="radio" name="sc" id="s-size" {{ ($productDetail->pro_size_s == 0 ? "disabled='disabled'": '') }} value="Size S">
                            <label for="s-size">S
                                <span>{{ $productDetail->pro_qty_s }}</span>
                            </label>
                        </div>
                        <div class="sc-item {{ ($productDetail->pro_size_m == 0 ? 'disable' : '') }}">
                            <input type="radio" name="sc" id="m-size" {{ ($productDetail->pro_size_m == 0 ? "disabled='disabled'": '') }} value="Size M">
                            <label for="m-size">M
                                <span>{{ $productDetail->pro_qty_m }}</span>
                            </label>
                        </div>
                        <div class="sc-item {{ ($productDetail->pro_size_l == 0 ? 'disable' : '') }}">
                            <input type="radio" name="sc" id="l-size" {{ ($productDetail->pro_size_l == 0 ? "disabled='disabled'": '') }} value="Size L">
                            <label for="l-size">L
                                <span>{{ $productDetail->pro_qty_l }}</span>
                            </label>
                        </div>
                        <div class="sc-item {{ ($productDetail->pro_size_xl == 0 ? 'disable' : '') }}">
                            <input type="radio" name="sc" id="xl-size" {{ ($productDetail->pro_size_xl == 0 ? "disabled='disabled'": '') }} value="Size XL">
                            <label for="xl-size">XL
                                <span>{{ $productDetail->pro_qty_xl }}</span>
                            </label>
                        </div>
                        <div class="sc-item {{ ($productDetail->pro_size_xxl == 0 ? 'disable' : '') }}">
                            <input type="radio" name="sc" id="xxl-size" {{ ($productDetail->pro_size_xxl == 0 ? "disabled='disabled'": '') }} value="Size XXL">
                            <label for="xxl-size" class="last">XXL
                                <span>{{ $productDetail->pro_qty_xxl }}</span>
                            </label>
                        </div>
                    </div>

                        @csrf
                        <input type="hidden" name="product_id" value="{{$productDetail->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="quantity">
                            <p>Quantity</p>
                            <div class="pro-qty">
                                <input type="text" name="qty" value="1" min="1">
                            </div>
                        </div>
                        <button class="site-btn">SHOP NOW</button>
                    </form>
                    <div id="accordion" class="accordion-area">
                        <div class="panel">
                            <div class="panel-header" id="headingOne">
                                <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Thông tin sản phẩm</button>
                            </div>
                            <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="panel-body">
                                    {{ $productDetail->pro_content }}
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingTwo">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="panel-body">
                                    <img src="./img/cards.png" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingThree">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="panel-body">
                                    <h4>7 Days Returns</h4>
                                    <p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-sharing">
                        <a href=""><i class="fa fa-google-plus"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->

    {{--Rating product--}}
    <div class="related-product-section" id="ratings">
        <div class="container">
            <div class="boxRatingCmt col-xl-8" id="boxRatingCmt">
                <div class="hrt" id="danhgia">
                    <div class="tltRt ">
                        <h3>{{ $productDetail->pro_total_rating }} đánh giá {{ $productDetail->pro_name }}</h3>
                    </div>
                </div>

                <div class="toprt">
                    <div class="crt">
                        <div class="top-ctr">
                            <div class="lcrt" data-gpa="3.9">
                                <b>{{ $average }} <i class="fa fas fa-star"></i></b>

                            </div>
                            <div class="rcrt">
                                @foreach($arrayRatings as $key => $arrayRating)
                                    <?php
                                        $itemAverage = round(($arrayRating['total'] / $productDetail->pro_total_rating) * 100,0);
                                    ?>
                                    <div class="r">
                                        <span class="t">{{ $key }} <i class="fa fas fa-star"></i></span>
                                        <div class="bgb">
                                            <div class="bgb-in" style="width: {{ $itemAverage }}%"></div>
                                        </div>
                                        <span class="c" onclick="ratingCmtList(1,5)" data-buy="16"><strong>{{ $arrayRating['total'] }}</strong> đánh giá</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="bcrt">
                            <a href="#" class="showInputRating">Gửi đánh giá của bạn</a>
                        </div>
                    </div>

                    <div class="clr"></div>

                    <form class="input hide" name="fRatingComment" style="">
                        <input type="hidden" name="hdfProductID" id="hdfProductID" value="200294">
                        <div class="ips">
                            <span class="visible-pc">Chọn đánh giá của bạn</span>
                            <span class="visible-sm">Chọn đánh giá</span>
                            <span class="lStar">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="iconcom fa fas fa-star" data-key="{{$i}}"></i>
                                @endfor
                            </span>
                            <span class="rsStar hide"></span>
                            <input type="hidden" name="hdfStar" class="hdfStar" value="">
                        </div>
                        <div class="clr"></div>
                        <div class="ipt hide">
                            <div class="ct">
                                <textarea name="fRContent" id="ra_content" placeholder="Nhập đánh giá về sản phẩm (tối thiểu 80 ký tự)"></textarea>
                            </div>
                            <div class="if">
                                <a href="{{ route('post.rating.product',$productDetail) }}" class="submitRatingComment">GỬI ĐÁNH GIÁ</a>
                            </div>
                            <div class="clr"></div>
                            <ul class="resImg hide">

                            </ul>
                            <span class="lbMsgRt"></span>
                        </div>
                    </form>
                </div>

                <div class="list">
                    <ul class="ratingLst">
                        @if(isset($ratings))
                            @foreach($ratings as $rating)
                                <li id="" class="par">
                                    <div class="rh">
                                        <span>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</span>
                                        <label class="sttB"><i class="fa fas fa-check-circle"></i>Đã mua tại Shop</label>
                                    </div>

                                    <div class="rc">
                                        <p>
                                            <span>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fa fas fa-star {{ $i <= $rating->ra_number ? 'active' : '' }}"></i>
                                                @endfor
                                            </span>
                                            <i>{{ $rating->content }}</i>
                                        </p>
                                    </div>

                                    <div class="rcf" style="display: none;"><p>Thegioididong.com xác nhận: <label><i class="iconcom-rtusr"></i><span>Khách hàng <b class="name">Hi</b></span></label><label><i class="iconcom-rtadr"></i><span>Mua online trên website Thegioididong.com</span></label></p><div class="clr"></div><label><i class="iconcom-rttime"></i><span>Mua <b>2 tháng </b> trước</span></label><p></p></div>

                                    <div class="ra">
                                        <i class="fa fas fa-clock-o"></i>
                                        <a class="cmtd">{{ $rating->created_at->format('H:i:s d-m-Y') }}</a>
                                    </div>
                                </li>
                            @endforeach
                            @else
                            <h3>Nothing</h3>
                        @endif

                    </ul>

                    <div class="clr"></div>
                    <div class="pgrc">
                        <div class="pagcomment">
                            {{ $ratings->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--End rating product--}}


    <!-- RELATED PRODUCTS section -->
    <section class="related-product-section">
        <div class="container">
            <div class="section-title">
                <h2>RELATED PRODUCTS</h2>
            </div>
            <div class="product-slider owl-carousel">
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
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="./img/product/3.jpg" alt="">
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
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="./img/product/4.jpg" alt="">
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
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="./img/product/6.jpg" alt="">
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
    </section>
    <!-- RELATED PRODUCTS section end -->
@stop

@section('script')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {

            // Show Rating
            let listStar = $(".lStar .fa");

            listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Rất tốt',
                5 : 'Tuyệt vời'
            }


            listStar.mouseover(function () {
                let $this = $(this);
                let number = $this.attr('data-key');

                $(".rsStar").removeClass('hide');

                listStar.removeClass('active');

                $(".hdfStar").val(number);

                $.each(listStar, function (key, value) {
                    if (key + 1 <= number){
                        $(this).addClass('active')
                    }
                });

                $(".rsStar").text('').text(listRatingText[number]);
            });

            $(".showInputRating").click(function (event) {
                event.preventDefault();
                
                if ($(".input").hasClass('hide')){
                    $(".input").removeClass('hide');
                    $(".showInputRating").text('').text('Đóng').addClass('active');
                }
                else{
                    $(".input").addClass('hide');
                    $(".showInputRating").text('').text('Gửi đánh giá của bạn').removeClass('active');
                }
            });

            $(".iconcom").click(function (event) {
                event.preventDefault();

                if ($(".ipt").hasClass('hide')){
                    $(".ipt").removeClass('hide');
                }
            });

            $(".submitRatingComment").click(function (e) {
                event.preventDefault();

                let content = $("#ra_content").val();
                let number = $(".hdfStar").val();
                let url = $(this).attr('href');

                // console.log(content, number, url);

                if (content && number){
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            number : number,
                            r_content :content
                        }
                    }).done(function(result) {
                        if (result.code == 1){
                            alert("Gửi đánh giá thành công. Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi!");
                            location.reload();
                        }
                    });
                }
            });
            // End Show Rating

            // Show last seen on home
            let idProduct = $("#content_product").attr('data-id');

            //Lay gia tri
            let products = localStorage.getItem('products');
            
            if (products == null){

                arrayProduct = new Array();
                arrayProduct.push(idProduct)

                localStorage.setItem('products',JSON.stringify(arrayProduct))
            }
            else {
                //Lay gia tri mang id da luu
                let products = localStorage.getItem('products');

                //chuyen ve mang
                products = $.parseJSON(products)
                
                if (products.indexOf(idProduct) == -1){
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products))
                }

            console.log(products);
            }
            // End Show last seen on home


        })
    </script>
@stop