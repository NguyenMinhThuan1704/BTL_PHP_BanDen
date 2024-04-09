<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="color: transparent;">.</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        table {
            margin-top: 15px;
            margin-bottom: 50px;
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        body {
            width: 1200px;
            height: auto;
            margin: 0 auto;
        }

        tr {
            line-height: 27px;
        }

        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding-left: 8px;
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

<body style="margin-bottom: 300px;">
    <section style="text-align: center; margin: 25px 0;">
        <h1>THỐNG KÊ HÓA ĐƠN NHẬP HÀNG</h1>
    </section>

    <div class="le dam">Tên đơn vị nhập hàng: NMT Decorative Lights</div>
    <div class="le">Mã số thuế: 123456789</div>
    <div class="le">Địa chỉ: Toàn thắng, Kim động , Hưng yên</div>
    <div class="le doi">Điện thoại: 0929.884.753</div>
    <div class="le doi">Số tài khoản: 123456789</div>
    <div class="le dam">Từ ngày: 01/10/2023</div>
    <div class="le dam">Đến này: 30/10/2023</div>
    <div class="le doi dam">Số lượng bản ghi: 2</div>
    <div class="le">Ghi chú: </div>
    <div class="le dam">Số lượng sản phẩm đã nhập: 200</div>
    <div class="le">Số tài khoản: 526716147626186</div>
    <div class="le">Kiểu thanh toán: Thanh toán trước</div>


    <table>
        <tr style="background: #095b87; color: #fff;">
            <th>Nhân viên</th>
            <th>Nhà phân phối</th>
            <th>Tên sản phẩm</th>
            <th style="text-align: center; padding: 0;">Số lượng</th>
            <th>Ngày tạo</th>
            <th style="text-align: center; padding: 0;">Tổng tiền</th>
        </tr>
        <tr>
            <td>Nguyễn Văn A</td>
            <td>Công ty A</td>
            <td>Đèn chùm 1</td>
            <td style="text-align: center; padding: 0;">100</td>
            <td>{{hdn.ngayTao}}</td>
            <td style="text-align: center; padding: 0;">100.000.000đ</td>
        
        </tr>
        <tr>
            <td>Nguyễn Văn B</td>
            <td>Công ty B</td>
            <td>Đèn chùm 2</td>
            <td style="text-align: center; padding: 0;">100</td>
            <td>{{hdn.ngayTao}}</td>
            <td style="text-align: center; padding: 0;">100.000.000đ</td>
        
        </tr>

        <tr> 
            <td colspan= "5" class="dam" style="text-align: center;">Tổng tiền hóa đơn nhập</td>
            <td class="dam">200.000.000đ</td>
        </tr>
    </table>

    <div class="doi dam ky">Người vận chuyển</div>
    <div class="doi dam ky">Người nhập hàng</div>
    <div class="doi ky1">(Ký, ghi rõ họ tên)</div>
    <div class="doi ky1">(Ký, ghi rõ họ tên)</div>
</body>

</html>