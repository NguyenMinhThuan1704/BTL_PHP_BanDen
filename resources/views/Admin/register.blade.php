<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Thế Giới Ánh Sáng - Một thế giới đèn trang trí nội ngoại thất cao cấp </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/input.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"rel="stylesheet"/>
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>
    <style>
        a{
            color: black;
        }
        .container__left {
            transform: rotateY(0);
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="container_login grid wide">
            <h6 style="margin-top: 80px;" class="login__signup"><a href ="{{ route('admin.login') }}" style="cursor: pointer;">Đăng nhập</a><a style="text-decoration: underline; margin-left: 50px; cursor: pointer;">Đăng ký</a></h6>

            <label for="reg-log"></label>
            <div class="container__wrap">
                <div class="container__wrapper">
                    <div class="container__left">
                        <div class="container__left-wrap">
                            <h2 style="padding-top: 25px;">ĐĂNG KÝ</h2>
                            <form action="" method="POST">
                            @csrf
                                <div class="taikhoan">
                                    <p>Tài khoản:</p>
                                    <div style="border-bottom: 1px solid #949494;">
                                        <input type="text" name="TenTaiKhoan" class="taikhoan__user" placeholder="Vui lòng nhập tài khoản của bạn">
                                    </div>
                                    @error('TenTaiKhoan')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="matkhau">
                                    <p>Mật khẩu:</p>
                                    <div style="border-bottom: 1px solid #949494;" class="matkhau_wrap">
                                        <input type="password" name="MatKhau" class="matkhau_pass" placeholder="Vui lòng nhập mật khẩu của bạn">
                                        <i class="icon_eye fa-regular fa-eye"></i>
                                    </div>
                                    @error('MatKhau')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="matkhau">
                                    <p>Nhập lại mật khẩu:</p>
                                    <div style="border-bottom: 1px solid #949494;" class="matkhau_wrap">
                                        <input type="password" name="confirm_MatKhau" class="matkhau_pass" placeholder="Vui lòng nhập lại mật khẩu của bạn">
                                        <i class="icon_eye fa-regular fa-eye"></i>
                                    </div>
                                    @error('confirm_MatKhau')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="taikhoan">
                                    <p>Email:</p>
                                    <div style="border-bottom: 1px solid #949494;">
                                        <input type="text" name="Email" class="taikhoan__user" placeholder="Vui lòng email của bạn">
                                    </div>
                                    @error('Email')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <input type="text" name="MaLoaiTK" value="1" style="display: none;" class="taikhoan__user">
                                <div class="btn-wrap-login">
                                    <button type="submit" class="btn-login btn-dangnhap">
                                        Đăng ký
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>    
            </div>
        </div>
    </div>
</body>
</html> -->



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Register</h1>
                </div>
                <div class="card-body">
                @if (session('msg'))
                    <script>
                        alert("{{ session('msg') }}");
                    </script>
                @endif
                    <form action="{{ route('admin.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tài khoản</label>
                            <input type="text" name="TenTaiKhoan" class="form-control" id="TenTaiKhoan" placeholder="Nhập tài khoản của bạn..." required>
                        </div>
                        @error('TenTaiKhoan')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu của bạn..." required>
                        </div>
                        @error('password')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" name="MatKhau" class="form-control" id="password" placeholder="Nhập lại mật khẩu của bạn..." required>
                        </div>
                        @error('MatKhau')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="Email" class="form-control" id="email" placeholder="Nhập email của bạn..." required>
                        </div>
                        @error('Email')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                    <div class="mb-3">
                        <a href="{{ route('admin.login') }}" class="d-grid">
                            <button class="btn btn-primary">Login</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>