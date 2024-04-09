<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Project_2/img/logoCPT.png">
    <link rel="stylesheet" href="{{ asset('assets/css/style_mainQT.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
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
                <a href="{{route('admin.tt-index')}}"><button class="active"><i class="fas fa-newspaper"></i> Tin tức</button></a>
                <a href="{{route('admin.dath-index')}}"><button><i class="fa-solid fa-folder-open"></i></i> Dự án thực hiện</button></a>
                <a href="{{route('admin.tk-index')}}"><button><i class="fas fa-user"></i> Tài khoản</button></a>
                <a href="{{route('admin.lsp-index')}}"><button><i class="fa-solid fa-chart-column"></i> Thống kê</button></a>
            </div>
            
            <div class="col-10 col-s-12 content">
                @if (session('msg'))
                    <script>
                        alert("{{ session('msg') }}");
                    </script>
                @endif
                <div class="col-12 col-s-12 content">
                    <div class="tabcontent">
                        <div class="title">
                            <i class="fas fa-newspaper"></i> Danh sách tin tức
                            
                        </div>
                        <!-- <div class="row">
                            <div class="col-5 col-s-12 padding-box">
                                <input type="text" id="search-tintuc" ng-model="tieudett" placeholder="Nhập tiêu đề tin tức...">
                            </div>
                            <div class="col-5 col-s-12 padding-box">
                                <input type="text" id="search-mota" ng-model="motatt" placeholder="Nhập mô tả tin tức...">
                            </div>
                            <div class="col-2 col-s-12 padding-box">
                                <button id="btnSearch"><i class="fas fas fa-search"></i> Tìm kiếm</button>
                            </div>
                        </div> -->
                        <div class="row" style="display: inherit;">
                            <form action="{{ route('admin.tt-search') }}" method="POST">
                                @csrf
                                <div class="col-5 col-s-12 padding-box">
                                    <input value="{{$TieuDe}}" type="text" name="TieuDe" placeholder="Nhập tiêu đề tin tức...">
                                </div>
                                <div class="col-5 col-s-12 padding-box">
                                    <input value="{{$MoTa}}" type="text" name="MoTa" placeholder="Nhập mô tả tin tức...">
                                </div>
                                <div class="col-2 col-s-12 padding-box">
                                    <button type="submit"><i class="fas fa-search"></i> Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                        <a href="{{route('admin.tt-create')}}" class="">
                            <button class="btn-form submit" style="background-color: rgba(44, 140, 15, 0.8); margin-left: 8px">Thêm tin tức</button>
                        </a>
                        <div class="row">
                            <div class="col-12 col-s-12 padding-box">
                                <table class="myTable">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Mã tin tức</th>
                                            <th>Tiêu đề</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Mô tả</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày chỉnh sửa</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if (!empty($tintucList))
                                            @foreach ($tintucList as $item)
                                                <tr style="text-align: center;">
                                                    <td>{{$item->MaTinTuc}}</td>
                                                    <td>{{$item->TieuDe}}</td>
                                                    <td>
                                                        <img src="{{ asset($item->AnhDaiDien)}}" alt="">
                                                    </td>
                                                    <td>{{$item->MoTa}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>{{$item->updated_at}}</td>
                                                    <td>
                                                        <a href="{{route('admin.tt-edit', ['MaTinTuc'=>$item->MaTinTuc])}}">
                                                            <i class="fas fa-edit" title="Sửa"></i>
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{route('admin.tt-delete', ['MaTinTuc'=>$item->MaTinTuc])}}">
                                                            <i class="fas fa-trash-alt" title="Xóa"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td clospan = "6">Không có tin tức</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                <div class="box-sum" style="display: flex;">
                                    <div class="box-right">
                                        {{$tintucList->links()}}
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