<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style_mainQT.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>
    
    <title>Quản lý cửa hàng bán đèn trang trí</title>
    <style>
        .hdb_title {
            padding: 0 !important;
        }
    </style>
</head>

<body>
    <section class="header">
        <a href="javascript:void(0);" class="icon" onclick="openBTN()">
            <i class="fas fa-bars"></i>
        </a>
        <div class="box-login" id="box-t">
            Xin chào, <span id="ten_nv">{{ Auth::user()->TenTaiKhoan }}</span> <i class="fas fa-sort-down"></i>
            <div class="box-login-bottom" id="box-b">
                <button onclick="TTTaiKhoan()"><i class="fas fa-user-alt"></i> Tài khoản</button>
                <a href="{{ route('admin.logout') }}"><button><i class="fas fa-sign-out-alt"></i> Đăng xuất</button></a>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="row" style="width: 100% !important;">
            <div class="col-2 col-s-12 category">
                <a href="{{route('admin.tongquan')}}"><button><i class="fas fa-tachometer-alt"></i> Tổng quan</button></a>
                <a href="{{route('admin.lsp-index')}}"><button ><i class="fas fa-boxes"></i> Loại sản phẩm</button></a>
                <a href="{{route('admin.sp-index')}}"><button><i class="fas fa-barcode"></i> Sản phẩm</button></a>
                <a href="{{route('admin.ncc-index')}}"><button><i class="fas fa-truck"></i> Nhà cung cấp</button></a>
                <a href="{{route('admin.kh-index')}}"><button ><i class="fas fa-users"></i> Khách hàng</button></a>
                <a href="{{route('admin.hdn-index')}}"><button class="active"><i class="fas fa-file-import"></i> Hóa đơn nhập</button></a>
                <a href="{{route('admin.hdb-index')}}"><button ><i class="fas fa-shopping-cart"></i> Hóa đơn bán</button></a>
                <a href="{{route('admin.tt-index')}}"><button><i class="fas fa-newspaper"></i> Tin tức</button></a>
                <a href="{{route('admin.dath-index')}}"><button><i class="fa-solid fa-folder-open"></i></i> Dự án thực hiện</button></a>
                <a href="{{route('admin.tk-index')}}"><button><i class="fas fa-user"></i> Tài khoản</button></a>
                <a href="{{route('admin.tke-index')}}"><button><i class="fa-solid fa-chart-column"></i> Thống kê</button></a>
            </div>
            <div class="col-10 col-s-12 content">
                <div class="col-12 col-s-12 content">
                    <div class="tabcontent">
                        <div class="title">
                            <i class="fas fas fa-boxes"></i> {{$title}} {{$hoadonnhap->MaHoaDonNhap}}
                            <hr>
                        </div>

                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-12 col-s-12 padding-box" style="font-size: 1.8rem; text-align: center;">Thông tin sản phẩm</div>
                            <div class="col-12 col-s-12 padding-box">
                                <table class="myTable">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if (!empty($data_CTHDN_SP))
                                            @foreach ($data_CTHDN_SP as $item)
                                                <tr style="text-align: center;">
                                                    <td>{{$item->TenSanPham}}</td>
                                                    <td>
                                                        <img src="{{ asset($item->AnhDaiDien)}}" alt="Ảnh đại diện">
                                                    </td>
                                                    <td>{{ number_format($item->GiaNhap, 0, ',', '.') }}</td>
                                                    <td>{{$item->SoLuongCTHDN}}</td>
                                                    <td>{{ number_format($item->TongTienCTHDN, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan = "5">Không có sản phẩm</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-s-12 padding-box hdb_title" style="font-size: 1.8rem; text-align: center;">Thông tin hóa đơn</div>
                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <label for="txtright">Tên nhà cung cấp:</label>
                            </div>
                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <input type="text" disabled value="{{ $hoadonnhap->catNCC->TenNhaPhanPhoi ?? 'Không có dữ liệu' }}">
                            </div>
                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <label for="txtright">Nhân viên nhập:</label>
                            </div>
                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <input type="text" disabled value="{{ $hoadonnhap->catTK->TenTaiKhoan ?? 'Không có dữ liệu' }}">
                            </div>

                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <label for="txtright">Kiểu thanh toán:</label>
                            </div>
                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <input type="text" disabled value="{{ $hoadonnhap->KieuThanhToan ?? 'Không có dữ liệu' }}">
                            </div>
                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <label for="txtright">Tổng tiền hóa đơn nhập:</label>
                            </div>
                            <div class="col-12 col-s-12 padding-box hdb_title">
                                <input type="text" disabled value="{{ number_format($hoadonnhap->TongTien, 0, ',', '.') ?? 'Không có dữ liệu' }}">
                            </div>
                        </div>

                        <div class="row">
                            <a href="{{ route('admin.hdn-inHDN-admin', $hoadonnhap->MaHoaDonNhap) }}" class="btn btn-primary col-5 col-s-12 padding-box" style="margin: 30px 43px;" style="color: white; padding: 6px 14px;">In hóa đơn</a>
                            <a href="{{ route('admin.hdn-index')}}" class="btn btn-primary col-5 col-s-12 padding-box" style="margin: 30px 43px;" style="color: white; padding: 6px 14px;">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>