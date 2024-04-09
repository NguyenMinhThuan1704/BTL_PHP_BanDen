<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="color: transparent;">Hóa đơn</title>
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        table {
            margin-top: 15px;
            width: 100%;
        }

        body {
            width: 900px;
            margin: 0 auto;
        }

        tr {
            line-height: 27px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        .ngay {
            font-style: italic;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .ban {
            font-style: italic;
            font-size: 15px;
            margin: 3px 0px;
        }

        .dam {
            font-weight: bold;
        }

        .le {
            margin-bottom: 4px;
            font-size: 15px;
        }

        .doi {
            width: 50%;
            float: left;
        }

        .ky {
            text-align: center;
            margin-top: 20px;
        }

        .ky1 {
            font-style: italic;
            text-align: center;
            margin-top: 5px;
        }
        .print-hidden a{
            color: white;
        }
        @media print {
            .print-hidden {
                display: none;
            }
        }
    </style>
</head>

<body>
    @if (session('msg'))
        <script>
            alert("{{ session('msg') }}");
        </script>
    @endif
    <section style="text-align: center; margin: 25px 0;">
        <h1>HÓA ĐƠN ĐẶT HÀNG</h1>
    </section>

    <div class="le dam">Tên đơn bán nhập hàng: NMT Decorative Lights</div>
    <div class="le">Mã số thuế: 123456789</div>
    <div class="le">Địa chỉ: Toàn thắng, Kim động , Hưng yên</div>
    <div class="le doi">Điện thoại: 0929.884.753</div>
    <div class="le doi">Số tài khoản: 123456789</div>
    <div class="le dam">Khách hàng: {{$hoadon->TenKH}}</div>
    <div class="le">Điện thoại: {{$hoadon->SDT}}</div>
    <div class="le">Địa chỉ: {{$hoadon->DiaChi}}</div>
    <div class="le">Email: {{$hoadon->Email}}</div>
    <div class="le doi">Số tài khoản: 526716147626186</div>
    <div class="le">Ghi chú: </div>
    <div class="le">Kiểu thanh toán: Thanh toán online bằng thẻ visa, master, ATM</div>

    <table>
        <tr style="background: #095b87; color: #fff;">
            <th style="width: 5%;">ID</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Giá nhập</th>
            <th>Tổng tiền</th>
        </tr>
        <tr>
        @if (!empty($data_CTHD_SP))
            @foreach ($data_CTHD_SP as $item)
            <tr style="text-align: center;">
                <td>{{$item->MaSanPham}}</td>
                <td>{{$item->TenSanPham}}</td>
                <td>
                    <img style="width: 100px;" src="{{ asset($item->AnhDaiDien)}}" alt="Ảnh đại diện">
                </td>
                <td>{{ number_format($item->GiaCTHDB, 0, ',', '.') }}</td>
                <td>{{$item->SoLuongCTHDB}}</td>
                <td>{{ number_format($item->TongGia, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan = "6">Không có khách hàng</td>
            </tr>
        @endif
        </tr>
        <tr> 
            <td colspan= "5" class="dam">Tổng tiền hóa đơn bán</td>
            <td class="dam">{{ number_format($hoadon->TongGia, 0, ',', '.') }}</td>
        </tr>
    </table>
    <div class="doi dam ky">Người mua hàng</div>
    <div class="doi dam ky">Người bán hàng</div>
    <div class="doi ky1">(Ký, ghi rõ họ tên)</div><div class="doi dam ky">Thuan</div>
    <button class="print-hidden btn btn-primary" style="float: inline-end;"><a href="{{ route('user.index') }}">Trang chủ</a></button>
</body>
<script>
    setTimeout(function() {
        window.print();
    }, 3000);
</script>

</html>