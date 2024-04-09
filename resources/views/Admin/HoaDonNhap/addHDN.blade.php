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
                <a href="{{route('admin.sp-index')}}"><button ><i class="fas fa-barcode"></i> Sản phẩm</button></a>
                <a href="{{route('admin.ncc-index')}}"><button ><i class="fas fa-truck"></i> Nhà cung cấp</button></a>
                <a href="{{route('admin.kh-index')}}"><button ><i class="fas fa-users"></i> Khách hàng</button></a>
                <a href="{{route('admin.hdn-index')}}"><button class="active"><i class="fas fa-file-import"></i> Hóa đơn nhập</button></a>
                <a href="{{route('admin.hdb-index')}}"><button><i class="fas fa-shopping-cart"></i> Hóa đơn bán</button></a>
                <a href="{{route('admin.tt-index')}}"><button><i class="fas fa-newspaper"></i> Tin tức</button></a>
                <a href="{{route('admin.dath-index')}}"><button><i class="fa-solid fa-folder-open"></i></i> Dự án thực hiện</button></a>

                <a href="{{route('admin.tk-index')}}"><button><i class="fas fa-user"></i> Tài khoản</button></a>
                <a href="{{route('admin.lsp-index')}}"><button><i class="fa-solid fa-chart-column"></i> Thống kê</button></a>
            </div>
            <div class="col-10 col-s-12 content">
                <div class="col-12 col-s-12 content">
                    <div class="tabcontent">
                        <div class="title">
                            <i class="fas fas fa-boxes"></i> {{$title}}
                            <hr>
                        </div>

                        @if (session('msg'))
                            <script>
                                alert("{{ session('msg') }}");
                            </script>
                        @endif

                        @if ($errors->any())
                            <div>Dữ liệu nhập vào không hợp lệ. Vui lòng nhập lại</div>
                        @endif

                        <div class="row">
                            <div class="col-5 col-s-12 content">
                                <div style="font-size: 1.6rem; text-align: center;">Thông tin hóa đơn nhập:</div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-12 col-s-12 padding-box">
                                        <label for="txtright">Mã hóa đơn nhập:</label>
                                    </div>
                                    <div class="col-12 col-s-12 padding-box">
                                        <input type="text" id="MaSP"
                                            disabled value="Mã hóa đơn nhập tự động sinh!" style="background-color: #cecaca;">
                                    </div>
                                    <div class="col-12 col-s-12 padding-box">
                                        <label for="txtright">Nhà cung cấp:</label>
                                    </div>
                                    <div class="col-12 col-s-12 padding-box">
                                        <select name="MaNhaPhanPhoi">
                                            <option value="">--Chọn nhà cung cấp--</option>
                                            @foreach ($catsNCC as $cat)
                                                <option value="{{$cat->MaNhaPhanPhoi}}">{{$cat->TenNhaPhanPhoi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-s-12 padding-box">
                                        <label for="txtright">Nhân viên nhập:</label>
                                    </div>
                                    <div class="col-12 col-s-12 padding-box">
                                        <select name="MaTaiKhoan">
                                            <option value="">--Chọn nhân viên nhập--</option>
                                            @foreach ($catsTK as $cat)
                                                <option value="{{$cat->id}}">{{$cat->TenTaiKhoan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-s-12 padding-box">
                                        <label for="txtright">Kiểu thanh toán:</label>
                                    </div>
                                    <div class="col-12 col-s-12 padding-box">
                                        <select name="KieuThanhToan">
                                            <option value="">--Chọn kiểu thanh toán--</option>
                                            <option value="Thanh toán bằng tiền mặt">Thanh toán bằng tiền mặt</option>
                                            <option value="Thanh toán bằng chuyển khoản">Thanh toán bằng chuyển khoản</option>
                                        </select>
                                    </div>
                                    
                                    <button class="btn-form" type="submit" style="background-color: rgba(44, 140, 15, 0.8);"
                                        >Thêm hóa đơn nhập</button>
                                    <a href="{{route('admin.hdn-index')}}" class="btn btn-warning">
                                        Quay lại
                                    </a>
                                    @csrf
                                </form>
                            </div>
                            <div class="col-7 col-s-12 content">
                                <div style="font-size: 1.6rem; text-align: center;">Thông tin sản phẩm nhập:</div>
                                <div class="product__wrapper gio_hang">
                                    <div class="row grid wide" style="margin-top: 10px;">
                                    @if (!empty($hoadonnhap))
                                        @foreach ($hoadonnhap as $item)
                                        <div class="" style="width: 100%; padding-bottom: 5px; display: flex; margin: 10px 0;  border-bottom: 1px solid;">
                                            <div class="product__img">
                                                <a href="" class="product__img-link">
                                                    <img style="height: 100px;" src="{{ asset($item->AnhDaiDien) }}" alt="" class="img">
                                                </a>
                                            </div>
                                            <div class="col c-10 product__thongtin">
                                                <div class="name-cart">
                                                    <span>{{$item->TenSanPham}}</span>
                                                </div>

                                                <div><span>Mã sản phẩm : <b>{{$item->MaSanPham}}</b></span></div>

                                                <div class="price__wrapper">
                                                    <div class="row grid wide price__chitiet">
                                                    <div class="col c-5" style="display: flex;">
                                                        <span>Số lượng:</span>
                                                        <form action=" {{ route('admin.hdn-update-sp', $item->MaSanPham)}}" method="GET">
                                                            <input type="number" name="quantity" class="input_quantity" style="width: 50px; text-align: center;" value="{{$item->quantity}}"/>
                                                            <button style="width: 90px;" type="submit">Cập nhật</button>
                                                        </form>
                                                    </div>
                                                    <div class="col c-7" style="display: flex;">
                                                    <div class="price">
                                                        Giá bán : <span>{{ number_format($item->GiaGiam, 0, ',', '.') }}<sup>đ</sup></span>
                                                    </div>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi hóa đơn nhập không?')" href="{{ route ('admin.hdn-delete-sp', $item->MaSanPham) }}" class="delete">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <h4 style = "text-align: center; font-size: 26px;">Không có sản phẩm</h4>
                                    @endif
                                    </div>
                                </div>

                                @if($hdn->totalQuantity>0)
                                <a style="float:right" onclick="return confirm('Bạn có chắc muốn xóa hết sản phẩm này khỏi giỏ hàng không?')" href = "{{ route('admin.hdn-clear-sp') }}" class="btn btn-danger">Xóa hết giỏ hàng</a>

                                <div class="tongtien">
                                    <div class="tongtien__left">Tổng tiền hóa đơn nhập:</div>
                                    <div class="tongtien__right">
                                        <span id="totalPrice">{{ number_format($hdn->totalPrice, 0, ',', '.') }}<sup>đ</sup></span>
                                    </div>
                                </div>
                                <a href="{{ route('admin.sp-index') }}" class="btn btn-success">
                                    Chọn thêm sản phẩm khác
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                @else 
                                    <a href="{{ route('admin.sp-index') }}" class="btn btn-success">
                                        Chọn thêm sản phẩm khác
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>