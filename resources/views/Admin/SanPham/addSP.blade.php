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
                <a href="{{route('admin.sp-index')}}"><button class="active"><i class="fas fa-barcode"></i> Sản phẩm</button></a>
                <a href="{{route('admin.ncc-index')}}"><button ><i class="fas fa-truck"></i> Nhà cung cấp</button></a>
                <a href="{{route('admin.kh-index')}}"><button ><i class="fas fa-users"></i> Khách hàng</button></a>
                <a href="{{route('admin.hdn-index')}}"><button><i class="fas fa-file-import"></i> Hóa đơn nhập</button></a>
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
                            <div class="alert alert-success">{{session('msg')}}</div>
                        @endif

                        @if ($errors->any())
                            <div>Dữ liệu nhập vào không hợp lệ. Vui lòng nhập lại</div>
                        @endif

                        <div class="row">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Mã sản phẩm:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="text" id="MaSP"
                                        disabled value="Mã sản phẩm tự động sinh!" style="background-color: #cecaca;">
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Loại sản phẩm:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <select name="MaLoaiSanPham" id="TenLoaiSanPham">
                                        <option value="">--Chọn loại sản phẩm--</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{$cat->MaLoaiSanPham}}">{{$cat->TenLoaiSanPham}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Tên sản phẩm:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="text" id="TenSanPham" name="TenSanPham" placeholder="Nhập tên sản phẩm..."
                                    value="{{old('TenSanPham')}}">
                                    @error('TenSanPham')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Ảnh đại diện:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input style="height: 50px;" type="file" id="AnhDaiDien" name="AnhDaiDien" class="form-control" placeholder="Nhập hình ảnh sản phẩm...">
                                    <img id="previewImage" src="#" alt="Ảnh đại diện" style="max-width: 200px; display: none;">
                                    @error('AnhDaiDien')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Giá:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="number" id="Gia" name="Gia" placeholder="Nhập giá của sản phẩm..."
                                    value="{{old('Gia')}}">
                                    @error('Gia')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Giá giảm:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="number" id="GiaGiam" name="GiaGiam" placeholder="Nhập giá sau khi giảm của sản phẩm..."
                                    value="{{old('GiaGiam')}}">
                                    @error('GiaGiam')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Số lượng:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="number" id="SoLuong" name="SoLuong" placeholder="Nhập số lượng..."
                                    value="{{old('SoLuong')}}">
                                    @error('SoLuong')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <!-- <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Trạng thái:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label><input type="radio" name="TrangThai" value="1" checker>Public</label>
                                    <label><input type="radio" name="TrangThai" value="0" checker>Private</label>
                                </div> -->
                                <button class="btn-form" type="submit" style="background-color: rgba(44, 140, 15, 0.8);"
                                    >Thêm tài khoản</button>
                                <a href="{{route('admin.sp-index')}}" class="btn btn-warning">
                                    Quay lại
                                </a>
                                @csrf
                            </form>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    document.getElementById('AnhDaiDien').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
            document.getElementById('previewImage').style.display = 'block';
        }
        reader.readAsDataURL(file);
    });
</script>
</html>