@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a>Thành viên</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <div class="row justify-content-between align-items-center">
                <h1>Quản lý thành viên</h1>
                {{--<a href="{{ route('admin.get.create.category') }}" class="btn btn-success"><i class="menu-icon mdi mdi-plus"></i>Thêm mới</a>--}}
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
                            <th>Tên thành viên</th>
                            <th>E-mail</th>
                            <th>Số điện thoại</th>
                            <th>Ảnh đại diện</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td class="align-top">{{ $user->id }}</td>
                                        <td class="align-top">{{ $user->name }}</td>
                                        <td class="align-top">{{ $user->email }}</td>
                                        <td class="align-top">{{ $user->phone }}</td>
                                        <td class="align-top"></td>
                                        <td class="align-top">
                                            <a href="{{ route('admin.get.action.product',['delete',$user->id]) }}" title="Xoá"><i class="menu-icon mdi mdi-delete btn btn-xs btn-danger"></i></a>
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