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
                <a href="{{route('admin.hdn-index')}}"><button><i class="fas fa-file-import"></i> Hóa đơn nhập</button></a>
                <a href="{{route('admin.hdb-index')}}"><button><i class="fas fa-shopping-cart"></i> Hóa đơn bán</button></a>
                <a href="{{route('admin.tt-index')}}"><button ><i class="fas fa-newspaper"></i> Tin tức</button></a>
                <a href="{{route('admin.dath-index')}}"><button class="active"><i class="fa-solid fa-folder-open"></i></i> Dự án thực hiện</button></a>

                <a href="{{route('admin.tk-index')}}"><button><i class="fas fa-user"></i> Tài khoản</button></a>
                <a href="{{route('admin.tke-index')}}"><button><i class="fa-solid fa-chart-column"></i> Thống kê</button></a>
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
                                    <label for="txtright">Mã dự án thực hiện:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="text" id="MaTinTuc"
                                    disabled value="Mã dự án thực hiện tự động sinh!" style="background-color: #cecaca;">
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <label for="txtright">Tiêu đề:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="text" id="TieuDe" name="TieuDe" placeholder="Nhập tiêu đề dự án thực hiện..."
                                    value="{{old('TieuDe')}}">
                                    @error('TieuDe')
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
                                    <label for="txtright">Mô tả:</label>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <input type="text" id="MoTa" name="MoTa" placeholder="Nhập mô tả dự án thực hiện.."
                                    value="{{old('MoTa')}}">
                                    @error('MoTa')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <button class="btn-form" type="submit" style="background-color: rgba(44, 140, 15, 0.8);"
                                    >Thêm dự án thực hiện</button>
                                <a href="{{route('admin.dath-index')}}" class="btn btn-warning">
                                    Quay lại
                                </a>
                                @csrf
                            </form>
                        </div>
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