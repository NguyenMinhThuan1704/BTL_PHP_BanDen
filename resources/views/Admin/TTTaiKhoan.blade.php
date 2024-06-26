<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logoCPT.png">
    <link rel="stylesheet" href="{{ asset('assets/css/style_mainQT.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <script src="../assets/js/jquery-3.6.0.min.js"></script>    
    <script src="./js/click.js"></script>
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
        <div class="row">
            <div class="col-1 col-s-12 category">
                <button class="active" onclick="TongQuan()"><i class="fas fa-tachometer-alt"></i> Tổng quan</button>
                <button onclick="LoaiSanPham()"><i class="fas fa-boxes"></i> Loại sản phẩm</button>
                <button onclick="SanPham()"><i class="fas fa-barcode"></i> Sản phẩm</button>
                <button onclick="NhaCungCap()"><i class="fas fa-truck"></i> Nhà cung cấp</button>
                <button onclick="KhachHang()"><i class="fas fa-users"></i> Khách hàng</button>
                <button onclick="HoaDonNhap()"><i class="fas fa-file-import"></i> Hóa đơn nhập</button>
                <button onclick="HoaDonBan()"><i class="fas fa-shopping-cart"></i> Hóa đơn bán</button>
                <button onclick="TinTuc()"><i class="fas fa-newspaper"></i> Tin tức</button>
                <button onclick="TaiKhoan()"><i class="fas fa-user"></i> Tài khoản</button>
                <button onclick="ThongKe()"><i class="fa-solid fa-chart-column"></i> Thống kê</button>
                <!-- <button onclick="ThietLap()"><i class="fas fa-cogs"></i> Thiết lập</button> -->
            </div>
            <!-- <div class="bx-left" id="button-left">
                <a href="javascript:void(0)" class="closebtn" onclick="closeBTN()"><i
                        class="far fa-window-close"></i></a>
                <ul>
                    <li onclick="TongQuan()"><i class="fas fa-tachometer-alt"></i> Tổng quan</li>
                    <li onclick="LoaiSanPham()"><i class="fas fa-boxes"></i> Loại sản phẩm</li>
                    <li onclick="SanPham()"><i class="fas fa-barcode"></i> Sản phẩm</li>
                    <li onclick="NhaCungCap()"><i class="fas fa-truck"></i> Nhà cung cấp</li>
                    <li onclick="KhachHang()"><i class="fas fa-users"></i> Khách hàng</li>
                    <li onclick="TaiKhoan()"><i class="fas fa-user"></i> Tài khoản</li>
                    <li onclick="HoaDonNhap()"><i class="fas fa-file-import"></i> Hóa đơn nhập</li>
                    <li onclick="HoaDonBan()"><i class="fas fa-shopping-cart"></i> Hóa đơn bán</li>
                    <li onclick="TinTuc()"><i class="fas fa-newspaper"></i> Tin tức</li>
                    <li onclick="ThietLap()"><i class="fas fa-cogs"></i> Thiết lập</li>
                </ul>
            </div> -->
            <div class="col-11 col-s-12 content">
                <div class="col-12 col-s-12 content">
                    <div class="tabcontent">
                        <div class="title">
                            <i class="fas fa-user-alt"></i> Thông tin tài khoản
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-2 col-s-3 padding-box margin-bot">
                                <label for="name">Mã nhân viên:</label>
                            </div>
                            <div class="col-10 col-s-9 padding-box margin-bot">
                                <span id="manv">admin</span>
                            </div>
                            <div class="col-2 col-s-3 padding-box margin-bot">
                                <label for="name">Tên nhân viên:</label>
                            </div>
                            <div class="col-10 col-s-9 padding-box margin-bot">
                                <span id="tennv">Nguyễn Minh Thuận</span>
                            </div>
                            <div class="col-2 col-s-3 padding-box margin-bot">
                                <label for="name">Email:</label>
                            </div>
                            <div class="col-10 col-s-9 padding-box margin-bot">
                                <span id="emailnv">thuan@gmail.com</span>
                            </div>
                            <div class="col-2 col-s-3 padding-box margin-bot">
                                <label for="name">Số điện thoại:</label>
                            </div>
                            <div class="col-10 col-s-9 padding-box margin-bot">
                                <span id="sdtnv">0123456789</span>
                            </div>
                            <div class="col-2 col-s-3 padding-box margin-bot">
                                <label for="name">Quyền:</label>
                            </div>
                            <div class="col-10 col-s-9 padding-box margin-bot">
                                <span id="quyen">Quản lý</span>
                            </div>
                            <div class="col-2 col-s-3 padding-box margin-bot">
                                <label for="name">Mật khẩu:</label>
                            </div>
                            <div class="col-10 col-s-9 padding-box margin-bot">
                                <button class="btn-changepass"><i class="fas fa-retweet"></i> Đổi mật khẩu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script>
            var user = JSON.parse(localStorage.getItem('user'));
            if (!user) {
                window.location.href = "../admin/login.html";
            }

            LoadUser();
        </script> -->
    </section>
</body>

</html>