@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
                        <li class="breadcrumb-item"><a>Thêm mới</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-between align-items-center">
                <h1>Thêm mới sản phẩm</h1>
            </div>
            <div class="row">
                @include ("admin::product.form")
            </div>
        </div>
    </div>
@stop