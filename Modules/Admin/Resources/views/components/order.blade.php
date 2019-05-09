@if($orders)
    <table>
        <thead>
            <tr>
                <th class="product-th">Sản phẩm</th>
                <th class="quy-th">Số lượng</th>
                <th class="size-th">Size</th>
                <th class="total-th text-right">Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>
                    <img src="" alt="">
                </td>
                <td>{{ number_format($order->or_price, 0, ',', '.') }} <small>VNĐ</small></td>
                <td>{{ $order->or_qty }}</td>
                <td>{{ number_format($order->or_price * $order->or_qty, 0, ',', '.') }} <small>VNĐ</small></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif