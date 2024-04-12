<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logoCPT.png">
    <link rel="stylesheet" href="../assets/css/giohang.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style_mainQT.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script>
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Quản lý cửa hàng bán đèn trang trí</title>
    <style>
        .red-text {
            color: red;
        }
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tab button:hover {
            background-color: #ddd;
        }

        .tab button.active {
            background-color: #ccc;
        }

        .tabcontent {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <section class="header">
        <!-- <aclass="icon">
            <i class="fas fa-bars"></i>
        </aclass=> -->
        <div class="box-login" id="box-t">
            Xin chào, <span id="ten_nv">{{ Auth::user()->TenTaiKhoan }}</span> <i class="fas fa-sort-down"></i>
            <div class="box-login-bottom" id="box-b">
                <button><i class="fas fa-user-alt"></i> Tài khoản</button>
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
                <a href="{{route('admin.tt-index')}}"><button><i class="fas fa-newspaper"></i> Tin tức</button></a>
                <a href="{{route('admin.dath-index')}}"><button><i class="fa-solid fa-folder-open"></i></i> Dự án thực hiện</button></a>
                <a href="{{route('admin.tk-index')}}"><button><i class="fas fa-user"></i> Tài khoản</button></a>
                <a href="{{route('admin.tke-index')}}"><button class="active"><i class="fa-solid fa-chart-column"></i> Thống kê</button></a>
            </div>
            
            <div class="col-10 col-s-12 tab">
                <button class="tablinks" onclick="openTab(event, 'Tab1')" id="defaultOpen">Thống kê hóa đơn nhập</button>
                <button class="tablinks" onclick="openTab(event, 'Tab2')">Thống kê hóa đơn bán</button>
                <!-- <button class="tablinks" onclick="openTab(event, 'Tab3')">Doanh thu</button> -->
            

                <div class="col-12 col-s-12 content">
                    <div id="Tab1" style="margin: 15px 0;" class="tabcontent">
                        <div class="title">
                            <i class="fa-solid fa-chart-column"></i> Thống kê hóa đơn nhập
                            <hr>
                        </div>
                        <form action="{{ route('admin.thongkeHDN') }}" method="POST" style="display: flex;">
                        @csrf
                            <div class="row" style="width: 100%; margin-right: 0; margin-left: 0;">
                                <div class="col-12 col-s-12 padding-box">
                                    <select name="id">
                                        <option value="0">--Chọn nhân viên nhập--</option>
                                        @foreach ($catsTK as $catTK)
                                            <option value="{{$catTK->id}}"
                                            {{ $id == $catTK->id ? 'selected' : '' }}
                                            >{{ $catTK->id }} - {{ $catTK->TenTaiKhoan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-s-12 padding-box">
                                    <select name="MaNhaPhanPhoi">
                                        <option value="0">--Chọn nhà phân phối--</option>
                                        @foreach ($catsNCC as $catNCC)
                                            <option value="{{$catNCC->MaNhaPhanPhoi}}"
                                            {{ $MaNhaPhanPhoi == $catNCC->MaNhaPhanPhoi ? 'selected' : '' }}
                                            >{{ $catNCC->MaNhaPhanPhoi }} - {{ $catNCC->TenNhaPhanPhoi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-1 col-s-12 padding-box">
                                    <label for="txtright">Từ ngày:</label>
                                </div>
                                <div class="col-11 col-s-12 padding-box">
                                    <input name="tuNgay" type="date" id="search-export-fr-hdn" value="{{ $tuNgay ?? session('tuNgay') }}">
                                </div>
                                <div class="col-1 col-s-12 padding-box">
                                    <label for="txtright">Đến ngày:</label>
                                </div>
                                <div class="col-11 col-s-12 padding-box">
                                    <input name="denNgay" type="date" id="search-export-to-hdn" value="{{ $denNgay ?? session('denNgay') }}">
                                </div>
                                <div class="col-4 col-s-12 padding-box" style="float: right;">
                                    <button type="submit" onclick="openTab(event, 'Tab1')"><i class="fas fas fa-search"></i> Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 col-s-12 padding-box">
                                <table class="myTable">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Nhân viên</th>
                                            <th>Nhà phân phối</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Ngày tạo</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if (!empty($ThongKeHDNPaginated))
                                            @foreach ($ThongKeHDNPaginated as $item)
                                                <tr style="text-align: center;">
                                                    <td>{{$item->TenTaiKhoan}}</td>
                                                    <td>{{$item->TenNhaPhanPhoi}}</td>
                                                    <td>{{$item->TenSanPham}}</td>
                                                    <td>{{$item->SoLuongCTHDN}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>{{ number_format($item->TongTienCTHDN, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan = "6">Không có dữ liệu</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                Số lượng bản ghi: <span>{!! $soPhanTu !!}</span>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                Số lượng sản phẩm đã nhập: <span>{!! $soLuongTong !!}</span>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                Tổng tiền: <span>{!! number_format($tongTienTong, 0, ',', '.') !!} đ</span>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                <div class="box-sum">
                                    <div class="box-right">
                                        {{$ThongKeHDNPaginated->links()}}
                                    </div>
                                    <div class="col-4 col-s-12" style="float: left;">
                                        <button id="inhoadonnhap">
                                            <a href="" style="color: #fff; text-decoration: none;">In thống kê hóa đơn nhập</a>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-s-12 content">
                    <div id="Tab2" class="tabcontent">
                        <div class="title">
                            <i class="fa-solid fa-chart-column"></i> Thống kê hóa đơn bán
                            <hr>
                        </div>
                        <form action="{{ route('admin.thongkeHDB') }}" method="POST" style="display: flex;">
                        @csrf
                            <div class="row" style="width: 100%; margin-right: 0; margin-left: 0;">
                                <div class="col-2 col-s-12 padding-box">
                                    <label for="txtright">Tên khách hàng:</label>
                                </div>
                                <div class="col-10 col-s-12 padding-box">
                                    <input type="text" name="TenKH" value="{{ $TenKH ?? session('TenKH') }}" placeholder="Nhập tên khách hàng...">
                                </div>
                                <div class="col-1 col-s-12 padding-box">
                                    <label for="txtright">Từ ngày:</label>
                                </div>
                                <div class="col-11 col-s-12 padding-box">
                                    <input name="tuNgayHDB" type="date" value="{{ $tuNgayHDB ?? session('tuNgayHDB') }}">
                                </div>
                                <div class="col-1 col-s-12 padding-box">
                                    <label for="txtright">Đến ngày:</label>
                                </div>
                                <div class="col-11 col-s-12 padding-box">
                                    <input name="denNgayHDB" type="date" value="{{ $denNgayHDB ?? session('denNgayHDB') }}">
                                </div>
                                <div class="col-4 col-s-12 padding-box">
                                    <button type="submit" onclick="openTab(event, 'Tab2')"><i class="fas fas fa-search"></i> Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 col-s-12 padding-box">
                                <table class="myTable">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Tên khách hàng</th>
                                            <th>Địa chỉ</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Ngày tạo</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if (!empty($ThongKeHDBPaginated))
                                            @foreach ($ThongKeHDBPaginated as $item)
                                                <tr style="text-align: center;">
                                                    <td>{{$item->TenKH}}</td>
                                                    <td>{{$item->DiaChi}}</td>
                                                    <td>{{$item->TenSanPham}}</td>
                                                    <td>{{$item->SoLuongCTHDB}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>{{ number_format($item->TongGia, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan = "6">Không có dữ liệu</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                Số lượng bản ghi: <span>{!! $soPhanTuHDB !!}</span>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                Số lượng sản phẩm đã nhập: <span>{!! $soLuongTongHDB !!}</span>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                Tổng tiền: <span>{!! number_format($tongTienTongHDB, 0, ',', '.') !!} đ</span>
                            </div>
                            <div class="col-12 col-s-12 padding-box">
                                <div class="box-sum">
                                    <div class="box-right">
                                        {{$ThongKeHDBPaginated->links()}}
                                    </div>
                                    <div class="col-4 col-s-12" style="float: left;">
                                        <button id="inhoadonban">
                                            <a href="" style="color: #fff; text-decoration: none;">In thống kê hóa đơn bán</a>
                                        </button>
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
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        // Ẩn tất cả các nội dung tab
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Xóa hiệu ứng active cho tất cả các nút tab
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Hiển thị nội dung tab hiện tại và thêm hiệu ứng active cho nút tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Gọi hàm openTab và truyền vào id của tab 1
        openTab(event, 'Tab1');
        // Lưu ý: Cần phải có tham số event khi gọi hàm openTab
    });

    function openTabByForm(tabName) {
        // Ẩn tất cả các nội dung tab
        var tabcontent = document.getElementsByClassName("tabcontent");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Xóa hiệu ứng active cho tất cả các nút tab
        var tablinks = document.getElementsByClassName("tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Hiển thị nội dung tab được chỉ định và thêm hiệu ứng active cho nút tab
        document.getElementById(tabName).style.display = "block";
        var currentTabButton = document.querySelector("[onclick='openTab(event, \"" + tabName + "\")']");
        currentTabButton.className += " active";
    }
</script>
</html>