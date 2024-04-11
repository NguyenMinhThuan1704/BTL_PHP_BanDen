<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logoCPT.png">
    <link rel="stylesheet" href="../assets/css/giohang.css">
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
                <a href="{{route('admin.sp-index')}}"><button><i class="fas fa-barcode"></i> Sản phẩm</button></a>
                <a href="{{route('admin.ncc-index')}}"><button><i class="fas fa-truck"></i> Nhà cung cấp</button></a>
                <a href="{{route('admin.kh-index')}}"><button><i class="fas fa-users"></i> Khách hàng</button></a>
                <a href="{{route('admin.hdn-index')}}"><button  class="active"><i class="fas fa-file-import"></i> Hóa đơn nhập</button></a>
                <a href="{{route('admin.hdb-index')}}"><button><i class="fas fa-shopping-cart"></i> Hóa đơn bán</button></a>
                <a href="{{route('admin.tt-index')}}"><button><i class="fas fa-newspaper"></i> Tin tức</button></a>
                <a href="{{route('admin.dath-index')}}"><button><i class="fa-solid fa-folder-open"></i></i> Dự án thực hiện</button></a>
                <a href="{{route('admin.tk-index')}}"><button><i class="fas fa-user"></i> Tài khoản</button></a>
                <a href="{{route('admin.tke-index')}}"><button><i class="fa-solid fa-chart-column"></i> Thống kê</button></a>
            </div>

            @if (session('msg'))
                <script>
                    alert("{{ session('msg') }}");
                </script>
            @endif

            <div class="col-10 col-s-12 content">
                <div class="col-12 col-s-12 content">
                    <div class="tabcontent">
                        <div class="title">
                            <i class="fas fa-shopping-cart"></i> Danh sách hóa đơn nhập
                            <hr>
                        </div>
                        <form action="{{route('admin.hdn-search')}}" method="GET">
                            <div class="row">
                                <div class="col-2 col-s-12 padding-box">
                                    <input type="text" value="{{ $MaHoaDonNhap }}" name="MaHoaDonNhap" placeholder="Nhập mã hóa đơn...">
                                </div>
                                <div class="col-4 col-s-12 padding-box">
                                    <select name="MaNhaPhanPhoi">
                                        <option value="">--Chọn nhà phân phối--</option>
                                        @foreach ($catsNCC as $catNCC)
                                            <option value="{{$catNCC->MaNhaPhanPhoi}}"
                                            {{ $MaNhaPhanPhoi == $catNCC->MaNhaPhanPhoi ? 'selected' : '' }}
                                            >{{ $catNCC->TenNhaPhanPhoi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 col-s-12 padding-box">
                                    <select name="id">
                                        <option value="">--Chọn nhân viên nhập--</option>
                                        @foreach ($catsTK as $catTK)
                                            <option value="{{$catTK->id}}"
                                            {{ $id == $catTK->id ? 'selected' : '' }}
                                            >{{ $catTK->TenTaiKhoan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2 col-s-12 padding-box">
                                    <button type="submit" id="btnSearch"><i class="fas fas fa-search"></i> Tìm kiếm</button>
                                </div>                           
                            </div>
                            @csrf
                        </form>
                        <a href="{{route('admin.hdn-create')}}" class="">
                            <button class="btn-form submit" style="background-color: rgba(44, 140, 15, 0.8); margin-left: 8px">Thêm hóa đơn nhập</button>
                        </a>
                        <div class="row">
                            <div class="col-12 col-s-12 padding-box">
                                <table class="myTable">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Mã hóa đơn nhập</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Nhân viên nhập</th>
                                            <th>Kiểu thanh toán</th>
                                            <th>Tổng tiền</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày chỉnh sửa</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if (!empty($hoadonnhapList))
                                            @foreach ($hoadonnhapList as $item)
                                                <tr style="text-align: center;">
                                                    <td>{{$item->MaHoaDonNhap}}</td>
                                                    <td>{{$item->TenNhaPhanPhoi}}</td>
                                                    <td>{{$item->TenTaiKhoan}}</td>
                                                    <td>{{$item->KieuThanhToan}}</td>
                                                    <td>{{ number_format($item->TongTien, 0, ',', '.') }}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>{{$item->updated_at}}</td>
                                                    <td>
                                                        <button class="btn btn-primary"><a href="{{ route('admin.hdn-detail', $item->MaHoaDonNhap) }}" style="color: white; padding: 6px 14px;">Detail</a></button>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa hóa đơn nhập không?')" href="{{route('admin.hdn-delete', ['MaHoaDonNhap'=>$item->MaHoaDonNhap])}}">
                                                            <i class="fas fa-trash-alt" title="Xóa"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan = "6">Không có khách hàng</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                <div class="box-sum" style="display: flex;">
                                    <div class="box-right">
                                        {{$hoadonnhapList->links()}}
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