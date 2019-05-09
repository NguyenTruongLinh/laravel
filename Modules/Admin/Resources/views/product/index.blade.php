@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a>Sản phẩm</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <div class="row justify-content-between align-items-center">
                <h1>Quản lý sản phẩm</h1>
                <a href="{{ route('admin.get.create.product') }}" class="btn btn-success"><i class="menu-icon mdi mdi-plus"></i>Thêm mới</a>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hình đại diện sản phầm</th>
                                <th>Sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th>Nổi bật</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( isset($products) )
                                @foreach($products as $product)
                                    <?php
                                        $average = 0;

                                        if ($product->pro_total_rating)
                                        {
                                            $average = round($product->pro_total_number / $product->pro_total_rating,1);
                                        }
                                    ?>
                                    <tr class="table-tr" data-url="{{ route('admin.get.edit.product',$product->id) }}">
                                        <td class="align-top">{{ $product->id }}</td>
                                        <td class="align-top" width="10%">
                                            <div class="img-pro">
                                                <img src="{{ pare_url_file($product->pro_avatar) }}" alt="" class="img img-reponsive rounded-0 image-product">
                                            </div>
                                        </td>
                                        <td class="align-top">
                                            <h4>{{ $product->pro_name }}</h4>
                                            <ul class="list-unstyled">
                                                <li class="menu-icon mdi mdi-cash-usd"> {{ number_format($product->pro_price, 0, ',', '.') }} <small>VNĐ</small></li>
                                                <li>SL: {{ $product->pro_number }}</li>
                                                <li class="menu-icon mdi mdi-sale"> {{ $product->pro_sale }} %</li>
                                                <li class="star">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="menu-icon mdi mdi-star {{ $i <= $average ? 'active' : '' }}"></i>
                                                    @endfor
                                                    <span>{{ $average }}</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-top">{{ isset($product->category->c_name) ? $product->category->c_name : '[N\A]' }}</td>
                                        <td class="align-top">
                                            <a href="{{ route('admin.get.action.product', ['active',$product->id]) }}" class="{{ $product->getStatus($product->pro_active)['class'] }}">{{ $product->getStatus($product->pro_active)['name'] }}</a>
                                        </td>
                                        <td class="align-top">
                                            <a href="{{ route('admin.get.action.product', ['hot',$product->id]) }}" class="{{ $product->getHot($product->pro_hot)['class'] }}">{{ $product->getHot($product->pro_hot)['name'] }}</a>
                                        </td>
                                        <td class="align-top">
                                            <a href="{{ route('admin.get.edit.product',$product->id) }}" title="Sửa"><i class="menu-icon mdi mdi-pencil btn btn-xs btn-primary"></i></a>
                                            <a href="{{ route('admin.get.action.product',['delete',$product->id]) }}" title="Xoá"><i class="menu-icon mdi mdi-delete btn btn-xs btn-danger"></i></a>
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
@stop