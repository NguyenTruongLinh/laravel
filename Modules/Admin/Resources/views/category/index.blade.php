@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a>Danh mục</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <div class="row justify-content-between align-items-center">
                <h1>Quản lý danh mục</h1>
                <a href="{{ route('admin.get.create.category') }}" class="btn btn-success"><i class="menu-icon mdi mdi-plus"></i>Thêm mới</a>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên danh sách</th>
                                <th>Title SEO</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( isset($categories) )
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->c_name }}</td>
                                        <td>{{ $category->c_title_seo }}</td>
                                        <td>
                                            <a href="" class="{{ $category->getStatus($category->c_active)['class'] }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.get.edit.category',$category->id) }}" title="Sửa"><i class="menu-icon mdi mdi-pencil btn btn-xs btn-primary"></i></a>
                                            <a href="{{ route('admin.get.action.category',['delete',$category->id]) }}" title="Xoá"><i class="menu-icon mdi mdi-delete btn btn-xs btn-danger"></i></a>
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