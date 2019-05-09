@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
                        <li class="breadcrumb-item"><a>Thêm mới</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-between align-items-center">
                <h1>Thêm mới danh mục</h1>
            </div>
            <div class="row">
                @include ("admin::category.form")
            </div>
        </div>
    </div>
@stop