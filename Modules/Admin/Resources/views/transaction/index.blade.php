@extends('admin::layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a>Đơn hàng</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <div class="row justify-content-between align-items-center">
                <h1>Quản lý đơn hàng</h1>
                {{--<a href="{{ route('admin.get.create.category') }}" class="btn btn-success"><i class="menu-icon mdi mdi-plus"></i>Thêm mới</a>--}}
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction as $tran)
                            <tr class="table-tr" data-url="{{ route('admin.get.view.order',$tran->id) }}">
                                <td>{{ $tran->id }}</td>
                                <td>{{ isset($tran->user->name) ? $tran->user->name : '[N\A]' }}</td>
                                <td>{{ $tran->address }}</td>
                                <td>{{ $tran->tr_phone }}</td>
                                <td>{{ number_format($tran->tr_total, 0, ',', '.') }} <small>VNĐ</small></td>
                                <td>
                                    @if($tran->tr_status == 1)
                                        <a href="" class="badge badge-success">Đã xử lý</a>
                                    @else
                                        <a href="{{ route('admin.get.active.transaction',$tran->id) }}" class="badge badge-danger">Chờ xử lý</a>
                                    @endif
                                </td>
                                <td>{{ $tran->created_at->format('d-m-Y') }}</td>
                                <td class="align-top">
                                    <a href="" title="Xoá"><i class="menu-icon mdi mdi-delete btn btn-xs btn-danger"></i></a>
                                    {{--<a href="" title="Xoá"><i class="menu-icon mdi mdi-eye btn btn-xs btn-danger"></i></a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('view.scripts')
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function() {--}}
            {{--$('table.table').on("click", "tr.table-tr", function() {--}}
                {{--window.location = $(this).data("url");--}}
                {{--// event.preventDefault();--}}
                {{--// let $this = $(this);--}}
                {{--// let url = $this.attr('href');--}}
                {{--// $(".transaction_id").text('').text($this.attr('data-id'));--}}
                {{--//--}}
                {{--// $("#myModalOrder").modal('show');--}}

                {{--// $.ajax({--}}
                {{--//     url: url,--}}
                {{--// }).done(function (result) {--}}
                {{--//     console.log(result);--}}
                {{--//     if (result)--}}
                {{--//     {--}}
                {{--//         $("#md-content").html('').append(result);--}}
                {{--//     }--}}
                {{--// })--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endsection