<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
          body { font-family: DejaVu Sans, sans-serif; }
        </style>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
                
                
        <style>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h1 style="text-align: center">HÓA ĐƠN</h1>
<p>Họ tên: {{$order->full_name}}</p>
<p>Số điện thoại: {{$order->phone}}</p>
<p>Email: {{$order->email}}</p>
<p>Địa chỉ: {{$order->address_detail}}, {{$order->district}}, {{$order->conscious}}, {{$order->country}}</p>
<p>Ngày đặt hàng: {{$order->created_at}}</p>
<p style="font-weight: 700;">Thông tin cửa hàng:</p>
  <p>Tên cửa hàng: 3SachFood</p>
  <p>Địa chỉ: 234 Metro, Hưng Lợi, Ninh Kiều, Cần Thơ</p>
  <p>Cảm ơn quý khách đã tin dùng sản phẩm<p>

<table>
  <tr>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Giá</th>
  </tr>
  @foreach($list_order_detail as $order_detail)
  <tr>
    <td>{{$order_detail->pro_name}}</td>
    <td>{{$order_detail->pro_quantity}}</td>
    <td>{{number_format($order_detail->pro_price)}}vnđ</td>
  </tr>
  @endforeach
  
</table>
<h2 style="float: right">Tổng tiền: {{number_format($total)}}vnđ<h2>

</body>
</html>

