@extends('admin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Revenue</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">$65,650</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Đơn hàng</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ \App\Models\Transaction::count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Sản phẩm</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ \App\Models\Product::count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Employees</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">246</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="container"></div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h4>Liên hệ mới nhất</h4>
                    @foreach($contacts as $contact)
                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                        <div class="ticket-details col-md-9">
                            <div class="d-flex">
                                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{{ $contact->c_name }} :</p>
                                <p class="text-primary mr-1 mb-0">[#{{ $contact->id }}]</p>
                                <p class="mb-0 ellipsis">{{ $contact->c_subject }}</p>
                            </div>
                            <p class="text-gray ellipsis mb-2">{{ $contact->c_content }}</p>
                            <div class="row text-gray d-md-flex d-none">
                                <div class="col-12 d-flex">
                                    <small class="mb-0 mr-2 text-muted text-muted">Ngày tạo :</small>
                                    <small class="Last-responded mr-2 mb-0 text-muted text-muted">{{ $contact->created_at->format('H:m, d-m-Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Đơn hàng mới nhất</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactionNews as $tran)
                                <tr>
                                    <td>{{ $tran->id }}</td>
                                    <td>{{ isset($tran->user->name) ? $tran->user->name : '[N\A]' }}</td>
                                    <td>{{ $tran->tr_phone }}</td>
                                    <td>{{ number_format($tran->tr_total, 0, ',', '.') }} <small>VNĐ</small></td>
                                    <td>
                                        @if($tran->tr_status == 1)
                                            <a href="" class="badge badge-success">Đã xử lý</a>
                                        @else
                                            <a href="{{ route('admin.get.active.transaction',$tran->id) }}" class="badge badge-danger">Chờ xử lý</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h4>Top sản phẩm được mua nhiều</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Hình ảnh</th>
                                <th>Tên SP</th>
                                <th>Lượt mua</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($productPay))
                                @foreach($productPay as $pay)
                                    <tr>
                                        <td class="align-top">{{ $pay->id }}</td>
                                        <td class="align-top">
                                            <img class="no-radius" src="{{ pare_url_file($pay->pro_avatar) }}" alt="">
                                        </td>
                                        <td class="align-top">{{ $pay->pro_name }}</td>
                                        <td class="align-top">{{ $pay->pro_pay }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h4>Đánh giá mới nhất</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Thành viên</th>
                                <th>Sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Rating</th>
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
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('view.scripts')
    <script>
        let data = "{{ $dataMoney }}";

        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));

        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Doanh thu'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f} VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} VNĐ</b><br/>'
            },

            series: [
                {
                    name: "Doanh thu",
                    colorByPoint: true,
                    data: dataChart
                }
            ]
        });
    </script>
@endsection
