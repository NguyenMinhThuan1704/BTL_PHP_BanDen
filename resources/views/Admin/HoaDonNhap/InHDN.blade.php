<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="color: transparent;">Hóa đơn</title>
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>

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
    </style>
</head>

<body>
<section style="text-align: center; margin: 25px 0;">
        <h1>HÓA ĐƠN NHẬP HÀNG</h1>
    </section>

    <div class="le dam">Tên đơn vị nhập hàng: NMT Decorative Lights</div>
    <div class="le">Mã số thuế: 123456789</div>
    <div class="le">Địa chỉ: Toàn thắng, Kim động , Hưng yên</div>
    <div class="le doi">Điện thoại: 0929.884.753</div>
    <div class="le doi">Số tài khoản: 123456789</div>
    <div class="le dam">Nhân viên nhập: {{$hoadonnhap->catTK->TenTaiKhoan}}</div>
    <div class="le dam">Nhà cung cấp: {{$hoadonnhap->catNCC->TenNhaPhanPhoi}}</div>
    <div class="le">Điện thoại: {{$hoadonnhap->catNCC->SoDienThoai}}</div>
    <div class="le">Địa chỉ: {{$hoadonnhap->catNCC->DiaChi}}</div>
    <div class="le doi">Số tài khoản: 526716147626186</div>
    <div class="le">Ghi chú: </div>
    <div class="le">Kiểu thanh toán: {{$hoadonnhap->KieuThanhToan}}</div>

    <table>

        <tr style="background: #095b87; color: #fff;">
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá nhập</th>
            <th>Tổng tiền</th>
        </tr>
        @if (!empty($data_CTHDN_SP))
            @foreach ($data_CTHDN_SP as $item)
            <tr>
                <td>{{$item->MaCTHDN}}</td>
                <td>{{$item->TenSanPham}}</td>
                <td>{{$item->SoLuongCTHDN}}</td>
                <td>{{ number_format($item->GiaNhap, 0, ',', '.') }}</td>
                <td>{{ number_format($item->TongTienCTHDN, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan = "5">Không có sản phẩm</td>
            </tr>
        @endif
        <tr> 
            <td colspan= "4" class="dam">Tổng tiền hóa đơn nhập</td>
            <td class="dam">{{ number_format($hoadonnhap->TongTien, 0, ',', '.') }}</td>
        </tr>
    </table>
    <div class="doi dam ky">Nhân viên nhận hàng</div>
    <div class="doi dam ky">Người bán hàng</div>
    <div class="doi ky1">(Ký, ghi rõ họ tên)</div>
    <div class="doi ky1">(Ký, ghi rõ họ tên)</div>
</body>
<script>
    setTimeout(function() {
        window.print();
    }, 3000);
</script>
</html>