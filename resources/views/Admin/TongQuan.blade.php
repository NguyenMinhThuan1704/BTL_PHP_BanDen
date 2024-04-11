<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/assets/css/style_mainQT.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/giohang.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/assets/js/admin.js') }}"></script>
    <script src="{{ asset('/assets/js/bieudo.js') }}"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>
    <title>Quản lý cửa hàng bán đèn trang trí</title>
</head>

<body>
    @if (session('msg'))
        <script>
            alert("{{ session('msg') }}");
        </script>
    @endif
    <section class="header" style="background-color: #ffbe00;" >
        <a href="javascript:void(0);" class="icon" onclick="openBTN()">
            <i class="fas fa-bars"></i>
        </a>
        <div class="box-login" id="box-t">
            Xin chào, <span id="ten_nv">{{ Auth::user()->TenTaiKhoan }}</span> <i class="fas fa-sort-down"></i>
            <div class="box-login-bottom" id="box-b">
                <button><i class="fas fa-user-alt"></i> Tài khoản</button>
                <a href="{{ route('admin.logout') }}"><button><i class="fas fa-sign-out-alt"></i> Đăng xuất</button></a>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="row all" style="width: 100% !important;">
            <div class="col-2 col-s-12 category">
                <a href="{{route('admin.tongquan')}}"><button class="active"><i class="fas fa-tachometer-alt"></i> Tổng quan</button></a>
                <a href="{{route('admin.lsp-index')}}"><button ><i class="fas fa-boxes"></i> Loại sản phẩm</button></a>
                <a href="{{route('admin.sp-index')}}"><button><i class="fas fa-barcode"></i> Sản phẩm</button></a>
                <a href="{{route('admin.ncc-index')}}"><button><i class="fas fa-truck"></i> Nhà cung cấp</button></a>
                <a href="{{route('admin.kh-index')}}"><button><i class="fas fa-users"></i> Khách hàng</button></a>
                <a href="{{route('admin.hdn-index')}}"><button><i class="fas fa-file-import"></i> Hóa đơn nhập</button></a>
                <a href="{{route('admin.hdb-index')}}"><button><i class="fas fa-shopping-cart"></i> Hóa đơn bán</button></a>
                <a href="{{route('admin.tt-index')}}"><button><i class="fas fa-newspaper"></i> Tin tức</button></a>
                <a href="{{route('admin.dath-index')}}"><button><i class="fa-solid fa-folder-open"></i></i> Dự án thực hiện</button></a>
                <a href="{{route('admin.tk-index')}}"><button><i class="fas fa-user"></i> Tài khoản</button></a>
                <a href="{{route('admin.tke-index')}}"><button><i class="fa-solid fa-chart-column"></i> Thống kê</button></a>
            </div>
            <div class="col-10 col-s-12 col-m-12 Details">
                <div class="col-12 col-s-12 col-m-12 overview Page">
                    <div class="col-12 col-s-12 col-m-12 overview1">
                        <span class="col-12 col-s-12 col-m-12">KẾT QUẢ KINH DOANH TRONG NGÀY</span>
                        <div class="tabcontent">
                            <div class="row">
                                <div class="col-4 col-s-12 padding-box">
                                    <div class="box" style="background-color: #9abc32;">
                                        <div class="box-left"><i class="fas fa-signal"></i></div>
                                        <div class="box-right">Doanh thu trong ngày:</div>
                                        <span>{{ number_format($doanhthungay[0]->DoanhThu) }}đ</span>
                                    </div>
                                </div>
                                <div class="col-4 col-s-12 padding-box">
                                    <div class="box" style="background-color: #6FB3E0;">
                                        <div class="box-left"><i class="fas fa-cloud"></i></div>
                                        <div class="box-right">
                                            Số đơn hàng bán: {{ number_format($doanhthungay[0]->SoDonHangBan) }}<span></span>
                                        </div>
                                        <div class="box-right">
                                            Số sản phẩm đã bán: {{ number_format($doanhthungay[0]->SoSanPhamBan) }}<span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-s-12 padding-box">
                                    <div class="box" style="background-color: #D53F;">
                                        <div class="box-left"><i class="fas fa-undo-alt"></i></div>
                                        <div class="box-right">Số đơn hàng nhập: {{ number_format($doanhthungay[0]->SoDonHangNhap) }}<span></span></div>
                                        <div class="box-right">Số sản phẩm mới nhập: {{ number_format($doanhthungay[0]->SoSanPhamNhap) }}<span></span></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="chooseover">
                            <label for="txt_over">Tổng quan về thống kê </label>
                            <select onchange="Thongke()" id="txt_over" style="outline: none">
                                <option value="tuan">Theo tuần</option>
                                <option value="thang">Theo tháng</option>
                                <option value="nam">Theo năm</option>
                              
                            </select>
                        </div>
                        <div class="col-12 col-s-12 col-m-12 sales">
                            <div id="chartContainerTuan" style="height:400px;width: 60%; margin: auto;" > </div>
                        </div>
                        <div class="col-12 col-s-12 col-m-12 sales_week">
                            <div class="money_week week1">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <span>Doanh thu tuần này<br><span>{{ number_format($doanhthutuan[0]->DoanhThu) }}đ</span></span>
                            </div>
                            <div class="product_week week1">
                                <i class="fa-solid fa-file-lines"></i>
                                <span>Đơn hàng bán: {{ number_format($doanhthutuan[0]->SoDonHangBan) }}<span></span><br>
                                <span>Sản phẩm bán: {{ number_format($doanhthutuan[0]->SoSanPhamBan) }}<span></span><br>
                            </div>
                            <div class="return_week week1">
                                <i class="fa-solid fa-arrow-rotate-left"></i>
                                <span>Số đơn hàng nhập: {{ number_format($doanhthutuan[0]->SoDonHangNhap) }}<span></span><br>
                                <span>Số sản phẩm mới nhập: {{ number_format($doanhthutuan[0]->SoSanPhamNhap) }}<span></span><br>
                            </div>
                        </div>
                        <div class="col-12 col-s-12 col-m-12 sales">
                            <div id="chartContainerthang" style="height:400px;width: 100%" > </div>
                        </div>
                        <div class="col-12 col-s-12 col-m-12 sales_week">
                            <div class="money_week week1">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <span>Doanh thu tháng này<br><span>{{ number_format($doanhthuthang[0]->DoanhThu) }}đ</span></span>
                            </div>
                            <div class="product_week week1">
                                <i class="fa-solid fa-file-lines"></i>
                                <span>Đơn hàng bán: {{ number_format($doanhthuthang[0]->SoDonHangBan) }}<span></span><br>
                                <span>Sản phẩm bán: {{ number_format($doanhthuthang[0]->SoSanPhamBan) }}<span></span><br>
                            </div>
                            <div class="return_week week1">
                                <i class="fa-solid fa-arrow-rotate-left"></i>
                                <span>Số đơn hàng nhập: {{ number_format($doanhthuthang[0]->SoDonHangNhap) }}<span></span><br>
                                <span>Số sản phẩm mới nhập: {{ number_format($doanhthuthang[0]->SoSanPhamNhap) }}<span></span><br>
                            </div>
                        </div>
                        <div class="col-12 col-s-12 col-m-12 sales">
                            <div id="chartContainer" style="height:400px;width: 100%" > </div>
                        </div>
                        <div class="col-12 col-s-12 col-m-12 sales_week">
                            <div class="money_week week1">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <span>Doanh thu năm này<br><span>{{ number_format($doanhthunam[0]->DoanhThu) }}đ</span></span>
                            </div>
                            <div class="product_week week1">
                                <i class="fa-solid fa-file-lines"></i>
                                <span>Đơn hàng bán: {{ number_format($doanhthunam[0]->SoDonHangBan) }}<span></span><br>
                                <span>Sản phẩm bán: {{ number_format($doanhthunam[0]->SoSanPhamBan) }}<span></span><br>
                            </div>
                            <div class="return_week week1">
                                <i class="fa-solid fa-arrow-rotate-left"></i>
                                <span>Số đơn hàng nhập: {{ number_format($doanhthunam[0]->SoDonHangNhap) }}<span></span><br>
                                <span>Số sản phẩm mới nhập: {{ number_format($doanhthunam[0]->SoSanPhamNhap) }}<span></span><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-s-12 padding-box">
                                <div class="box2" style="border: 1px solid #E8B110;">
                                    <div class="box2-top" style="border-bottom: 1px solid #E8B110;">
                                        <i class="fas fa-boxes"></i> Sản phẩm bán chạy nhất
                                    </div>
                                    <div class="box2-bot">
                                        @foreach ($sanPhamBanChayNhat as $item)
                                        <div class="" style="padding: 0; margin-top: 12px; display: flex;">
                                            <div class="product__img" >
                                                <a class="product__img-link">
                                                    <img src="{{ asset($item->AnhDaiDien)}}" alt="{{ $item->TenSanPham }}" class="img">
                                                </a>
                                            </div>
                                            <div class="col c-10 product__thongtin">
                                                <div class="name-cart">
                                                    <span>{{ $item->TenSanPham }}</span>
                                                </div>
                                                <div><span>Mã sản phẩm : <b>{{ $item->MaSanPham }}</b></span></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-s-12 padding-box">
                                <div class="box2" style="border: 1px solid #E8B110;">
                                    <div class="box2-top" style="border-bottom: 1px solid #E8B110;">
                                        <i class="fas fa-boxes"></i> Sản phẩm mới nhất
                                    </div>
                                    <div class="box2-bot">
                                        @foreach ($sanPhamMoiNhat as $item)
                                        <div class="" style="padding: 0; margin-top: 12px; display: flex;">
                                            <div class="product__img" >
                                                <a class="product__img-link">
                                                    <img src="{{ asset($item->AnhDaiDien)}}" alt="{{ $item->TenSanPham }}" class="img">
                                                </a>
                                            </div>
                                            <div class="col c-10 product__thongtin">
                                                <div class="name-cart">
                                                    <span>{{ $item->TenSanPham }}</span>
                                                </div>
                                                <div><span>Mã sản phẩm : <b>{{ $item->MaSanPham }}</b></span></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>