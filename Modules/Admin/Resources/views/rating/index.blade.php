@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a>Đánh giá</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <div class="row justify-content-between align-items-center">
                <h1>Quản lý đánh giá</h1>
                {{--<a href="{{ route('admin.get.create.category') }}" class="btn btn-success"><i class="menu-icon mdi mdi-plus"></i>Thêm mới</a>--}}
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thành viên</th>
                                <th>Sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Rating</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($ratings))
                            @foreach($ratings as $rating)
                                <tr>
                                    <td class="align-top">{{ $rating->id }}</td>
                                    <td class="align-top">
                                        <h5>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</h5>
                                        <p>{{ isset($rating->user->email) ? $rating->user->email : '[N\A]' }}</p>
                                    </td>
                                    <td class="align-top">{{ $rating->product->pro_name }}</td>
                                    <td class="align-top">{{ $rating->content }}</td>
                                    <td class="align-top">{{ $rating->ra_number }}</td>
                                    <td class="align-top"></td>
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
@stop