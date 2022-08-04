<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

</head>

<body>

    {{-- @php
        dd($data);
    @endphp --}}
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#dcf0f8"
        style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
        <tbody>
            <tr>
                <td align="center" valign="top"
                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">

                    <table border="0" cellpadding="0" cellspacing="0" width="600" style="margin-top:15px">
                        <tbody>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" style="line-height:0">
                                        <tbody>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="bottom" id="m_8610127934742313635headerImage">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td valign="top" bgcolor="#FFFFFF" width="100%" style="padding:0">
                                                    <div style="color:#fff;font-size:11px">Tổng giá trị đơn hàng là
                                                        {{ $data['total'] }} </div>
                                                    <a style="border:medium none;text-decoration:none;color:#007ed3"
                                                        href="http://tiki.vn/?utm_source=transactional+email&amp;utm_medium=email&amp;utm_term=logo&amp;utm_campaign=new+order"
                                                        target="_blank"
                                                        data-saferedirecturl="https://www.google.com/url?q=http://tiki.vn/?utm_source%3Dtransactional%2Bemail%26utm_medium%3Demail%26utm_term%3Dlogo%26utm_campaign%3Dnew%2Border&amp;source=gmail&amp;ust=1647253055519000&amp;usg=AOvVaw1cB9m3vof6o7E85bpwlg2e">
                                                        <img alt="Tiki.vn"
                                                            src="https://lh3.google.com/u/0/d/1Pj9rGdmdl26V114FgFGUwOxKWf5QdJ58=w1396-h696-iv1"
                                                            style="border:none;outline:none;text-decoration:none;display:inline;height:auto"
                                                            class="CToWUd">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr style="background:#fff">
                                <td align="left" width="600" height="auto" style="padding:15px">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Chào quý khách,</p>
                                                    <p>Mobile24h gửi đến quý khách hóa đơn điện tử
                                                    </p>
                                                    <p><b>Lưu ý:</b></p>
                                                    {{-- <ul>
                                                    <li>Từ ngày 8/1/2018, TIKI CHUYỂN SANG PHÁT HÀNH HÓA ĐƠN ĐIỆN TỬ,
                                                        tìm hiểu thêm <a
                                                            href="https://vcdn.tikicdn.com/assets/files/hoadon-tiki.pdf"
                                                            target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://vcdn.tikicdn.com/assets/files/hoadon-tiki.pdf&amp;source=gmail&amp;ust=1647253055519000&amp;usg=AOvVaw191lNqXP9vcBoagdZ1Fr-s">Tại
                                                            đây</a> </li>
                                                    <li>Hóa đơn cho các sản phẩm của nhà cung cấp khác Tiki sẽ được xuất
                                                        trong vòng 14 ngày kể từ thời điểm nhận hàng và không phát sinh
                                                        yêu cầu đổi trả.</li>
                                                </ul> --}}
                                                    <h3
                                                        style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                                                        Thông tin đơn hàng
                                                        <span
                                                            style="font-size:12px;color:#777;text-transform:none;font-weight:normal">


                                                            {{ $data['time_order'] }}

                                                        </span>
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                    <table cellspacing="0" cellpadding="0" border="0"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th align="left" width="50%"
                                                                    style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold">
                                                                    Thông tin thanh toán</th>
                                                                <th align="left" width="50%"
                                                                    style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold">
                                                                    Địa chỉ giao hàng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top"
                                                                    style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                                    <a href="mailto:thangkhovipro@gmail.com"
                                                                        target="_blank">{{ $data['email'] }}</a>
                                                                    <br> {{ $data['phone'] }}

                                                                </td>
                                                                <td valign="top"
                                                                    style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                                    {{ $data['address'] }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3
                                                        style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                                                        Thông tin hóa đơn:
                                                    </h3>
                                                </td>
                                            </tr>

                                            <tr>
                                                <table class="table-success" width="600 ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Tên Hàng Hóa</th>
                                                            <th scope="col">Số Lượng</th>
                                                            <th scope="col">Giá </th>
                                                            <th scope="col">Thành Tiền </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $stt = 1;
                                                        @endphp
                                                        @foreach ($order_items as $item)
                                                            <tr style="text-align: center">
                                                                <th scope="row">{{ $stt }}</th>
                                                                <td>{{ $item->product->name }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>{{ $item->product->latest_price }}</td>
                                                                <td>{{ \App\Helpers\client_helper::format_price($item->product->latest_price * $item->quantity) }}
                                                                </td>

                                                            </tr>
                                                            @php
                                                                $stt++;
                                                            @endphp
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                    <div>
                                                        <p><span style="color:#1dade7"><strong>Tổng Tiền
                                                                    :
                                                                    {{ \App\Helpers\client_helper::format_price($data['total']) }}</strong></span>
                                                        </p>
                                                        <p><span style="color:#1dade7"><strong>Quý Khách Vui Lòng Chuẩn
                                                                    Bị Số Tiền Như Trên Để Nhận Hàng</strong></span>
                                                        </p>

                                                        <ul>



                                                            <li><strong>Tên khách hàng: {{ $data['name'] }}</strong>
                                                            </li>
                                                            <li><strong>Phương thức Thanh Toán:

                                                                    {{ $data['payment_method'] == 0 ? 'Nhận Hàng Giao Tiền' : 'Thanh Toán Online' }}</strong>

                                                            </li>

                                                            <li><strong style="">Mã hóa đơn của quý khách:
                                                                    {{ $data['order_token'] }} - Quý Khách có thể dùng
                                                                    mã này để kiểm tra ở trong trang web của chúng
                                                                    tôi</strong>
                                                            </li>

                                                        </ul>


                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p
                                                        style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                        Xem thêm
                                                        <a href="http://hotro.tiki.vn/hc/vi/?utm_source=transactional+email&amp;utm_medium=email&amp;utm_term=logo&amp;utm_campaign=new+order"
                                                            title="Các câu hỏi thường gặp " target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=http://hotro.tiki.vn/hc/vi/?utm_source%3Dtransactional%2Bemail%26utm_medium%3Demail%26utm_term%3Dlogo%26utm_campaign%3Dnew%2Border&amp;source=gmail&amp;ust=1647253055519000&amp;usg=AOvVaw2QkHUm1ms96sgbLKRD85ST"><strong>các
                                                                câu hỏi thường
                                                                gặp</strong>.</a>
                                                    </p>
                                                    {{-- <p
                                                    style="margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                    Truy cập <a href="http://hotro.tiki.vn"
                                                        style="color:#099202;text-decoration:none" target="_blank"
                                                        data-saferedirecturl="https://www.google.com/url?q=http://hotro.tiki.vn&amp;source=gmail&amp;ust=1647253055519000&amp;usg=AOvVaw3iSS2bq4XxHYRwBqcNE5LP"><strong>hotro.tiki.vn</strong></a>,
                                                    hoặc gọi số điện thoại
                                                    <strong style="color:#099202">1900 6035</strong> (8-21h cả T7,CN)
                                                    để gặp nhân viên chăm sóc khách hàng khi quý khách cần hỗ trợ.
                                                </p> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br>
                                                    <p
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">
                                                        Mobile24h cảm ơn quý khách,
                                                        <br>
                                                    </p>
                                                    <p
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;text-align:right">
                                                        <strong style="color:#1dade7">Mobile24H</strong><br>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>

            </tr>
        </tbody>
    </table>
</body>

</html>
