<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thế Giới Ánh Sáng - Một thế giới đèn trang trí nội ngoại thất cao cấp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/main.css">    
    <script src="./assets/js/input.js"></script>
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>
</head>
<body>
    <div class="app">
        @if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
        @endif
        <div class="banner">
            <div class="banner-wrapper">
                <div class="banner-top" id="bannerTop">
                    <div class="banner-item">
                        <img src="./assets/img/Header/banner-1.jpg" alt="" class="banner-img">
                    </div>
                    <div class="banner-item">
                        <img src="./assets/img/Header/banner-2.jpg" alt="" class="banner-img">
                    </div>
                </div>

                <div class="banner-bot">
                <form action="{{ route('user.search') }}" method="GET" style="display: flex;">
                    <div class="banner_search">
                        <div class="search_item">
                            <div class="search-text">
                                <div class="search-text-wrap">
                                    <input type="text" name="search" class="pass" placeholder="Bạn cần tìm gì...">
                                    <i class="fa-solid fa-magnifying-glass search-icon">
                                    <button type="submit" style="display: none;"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <div class="banner_name">
                        <div class="banner_logo">
                            <img src="./assets/img/Header/banner-bot.png" alt="" class="logo">
                            <img src="./assets/img/Header/banner-bot-name.png" alt="" class="name">
                        </div>
                    </div>
                    <div class="banner_call">
                        <div class="hotline_zalo">
                            <a href="tel: 0342615519" class="hotline">0123 456 789</a>
                            <a href="https://chat.zalo.me/" class="zalo">0123 456 789</a>
                            <p>Hotline - Zalo</p>
                        </div>
                        <div class="cart">
                            <a href="{{route('user.giohang')}}" class="cart-link">
                                <i class="fas fa-shopping-bag cart-logo"></i>
                                <span class="cart-notice">{{ $cart-> totalQuantity }}</span>
                            </a>
                        </div>
                        <div class="user">
                            <a href="{{ route('admin.logout') }}" class="user-link">
                                <i class="fa-solid fa-user user-logo"></i>
                            </a>
                        </div>
                    </div>

                    <div class="banner_bars-btn">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="grid wide">
                <nav class="header__nav nav_pc">
                    <div class="header__logo-close">
                        <div class="header-title">
                            <a href="" class="header-title-link">
                                <img src="./assets/img/Header/banner-bot.png" alt="" class="header-title-img">
                            </a>
                        </div>
                        <div class="header-close">
                            <i class="fa-solid fa-xmark icon-close"></i>
                        </div>
                    </div>

                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a style="color: #ffbe00" href="{{route('user.index')}}">Trang chủ</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{route('user.gioithieu')}}">Giới thiệu</a>
                        </li>
                        <li class="header__nav-item menu-item">
                            <a href="{{route('user.dennoithat')}}">Đèn trang trí</a>
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="subnav">
                                @foreach ($LSP as $item)
                                <li class="subnav-item">
                                    <a href="{{route('user.getCategory', ['MaLoaiSanPham'=>$item->MaLoaiSanPham])}}">{{ $item->TenLoaiSanPham }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{route('user.khuyenmai')}}">Khuyến mãi</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{route('user.tintuc')}}">Tin tức</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{route('user.duanthuchien')}}">Dự án thực hiện</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="">Catalogue</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{route('user.lienhe')}}">Liên hệ  </a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </div>

        <div class="app__container grid wide">
            <div class="container-wrapper">                
                <div class="container">
                    <div class="row">
                        <div class="col l-12" style="display: flex; margin: 0; padding: 0;">
                            <div class="container-item col l-3 m-4 c-6">
                                <a href="" class="container-item-link">
                                    <div class="container-img">
                                        <img src="./assets/img/Header/phongkhach.jpg" alt="" class="container-item-img">
                                    </div>
                                    <div class="text-wrapper">
                                        <p class="container-item-text">
                                            Đèn Phòng Khách
                                            <span>Xem Sản Phẩm</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="container-item col l-3 m-4 c-6">
                                <a href="" class="container-item-link">
                                    <div class="container-img">
                                        <img src="./assets/img/Header/phongngu.jpg" alt="" class="container-item-img">
                                    </div>
                                    <div class="text-wrapper">
                                        <p class="container-item-text">
                                            Đèn Phòng Ngủ
                                            <span>Xem Sản Phẩm</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="container-item col l-3 m-4 c-6">
                                <a href="" class="container-item-link">
                                    <div class="container-img">
                                        <img src="./assets/img/Header/phongan.jpg" alt="" class="container-item-img">
                                    </div>
                                    <div class="text-wrapper">
                                        <p class="container-item-text">
                                            Đèn Phòng Ăn
                                            <span>Xem Sản Phẩm</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="container-item col l-3 m-4 c-6">
                                <a href="" class="container-item-link">
                                    <div class="container-img">
                                        <img src="./assets/img/Header/dencafe.jpg" alt="" class="container-item-img">
                                    </div>
                                    <div class="text-wrapper">
                                        <p class="container-item-text">
                                            Đèn Cafe
                                            <span>Xem Sản Phẩm</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="new__product" style="padding-top: 50px;">
                <div class="new__product-title">
                    <h3 class="title-h3">
                        <a href="">Sản phẩm mới</a>
                    </h3>
                </div>

                <div class="new__product-btl">
                    <i class="fa-solid fa-angle-left"></i>
                    <i class="fa-solid fa-angle-right btn-right"></i>
                </div>

                <div class="row new__product-item-wrapper den_moi">
                    @foreach ($sanPhamBanChayNhat as $item)
                        <div class="new__product-item col l-3 m-4 c-6">
                            <div class="new__product-img-wrapper">
                                <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                    <img src="{{ asset($item->AnhDaiDien)}}" alt="" class="new__product-img">
                                </a>
                            </div>

                            <div class="sale-hot">
                                <span>30%</span>
                            </div>

                            <div class="product__title">
                                <div class="product__title-name">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{ $item->TenSanPham }}">{{ $item->TenSanPham }}</a>
                                </div>
                                <div class="product__title-price">
                                    <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="item-title-add">
                                <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>         

<!-- ----------------------------Đèn chùm---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn chùm</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li>
                                <h3 class="title_h3">
                                    <a href="">Đèn Chùm Đồng</a>
                                </h3>
                            </li>
                            <li>
                                <h3 class="title_h3">
                                    <a href="">Đèn Chùm Pha Lê</a>
                                </h3>
                            </li>
                            <li>
                                <h3 class="title_h3">
                                    <a href="">Đèn Chùm Pha Lê Nến</a>
                                </h3>
                            </li>
                            <li>
                                <h3 class="title_h3">
                                    <a href="">Đèn Chùm Cổ Điển Châu Âu</a>
                                </h3>
                            </li>
                            <li>
                                <h3 class="title_h3">
                                    <a href="">Đèn Chùm Hiện Đại</a>
                                </h3>
                            </li>
                            <li>
                                <h3 class="title_h3">
                                    <a href="">Đèn Chùm Nghệ Thuật</a>
                                </h3>
                            </li>
                            <li>
                                <h3 class="title_h3">
                                    <a href="">Đèn Chùm Quạt Trần</a>
                                </h3>
                            </li>
                        </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/denchum0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_chum">
                        @foreach ($DenChum as $item)
                        <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                            <div class="new__product-img-wrapper item-product">
                                <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                    <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                </a>
                            </div>
    
                            <div class="sale-hot sale">
                                <span>30%</span>
                            </div>
    
                            <div class="product__title">
                                <div class="product__title-name">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                </div>
                                <div class="product__title-price">
                                    <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="item-title-add" >
                                <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn mâm ốp trần---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn mâm ốp trần</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-op-tran-dong" title="Đèn Ốp Trần Đồng">Đèn Ốp Trần Đồng</a></h3></li><li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-mam-ap-tran-pha-le" title="Đèn Mâm Áp Trần Pha Lê">Đèn Mâm Áp Trần Pha Lê</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-mam-led-tron" title="Đèn Mâm LED Tròn">Đèn Mâm LED Tròn</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-mam-led-vuong" title="Đèn Mâm LED Vuông">Đèn Mâm LED Vuông</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-mam-hien-dai" title="Đèn Mâm Hiện Đại">Đèn Mâm Hiện Đại</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-op-phong-khach-nho-phong-ngu" title="Đèn Ốp Phòng Khách Nhỏ, Phòng Ngủ">Đèn Ốp Phòng Khách Nhỏ, Phòng Ngủ</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-op-tran-go" title="Đèn Ốp Trần Gỗ">Đèn Ốp Trần Gỗ</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-op-tran-co-dien" title="Đèn Ốp Trần Cổ Điển">Đèn Ốp Trần Cổ Điển</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-op-tran-ban-cong" title="Đèn Ốp Ban Công - Hành Lang">Đèn Ốp Ban Công - Hành Lang</a></h3></li>
                        </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/denmam0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_mam">
                        @foreach ($DenMam as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn thả---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn thả</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-dong" title="Đèn Thả Đồng">Đèn Thả Đồng</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-thong-tang" title="Đèn Thả Thông Tầng">Đèn Thả Thông Tầng</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-pha-le" title="Đèn Thả Pha Lê">Đèn Thả Pha Lê</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-nghe-thuat" title="Đèn Thả Nghệ Thuật">Đèn Thả Nghệ Thuật</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-hien-dai" title="Đèn Thả Hiện Đại">Đèn Thả Hiện Đại</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-led-trang-tri" title="Đèn Thả LED Trang Trí">Đèn Thả LED Trang Trí</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-ban-an" title="Đèn Thả Bàn Ăn">Đèn Thả Bàn Ăn</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-thuy-tinh" title="Đèn Thả Thủy Tinh">Đèn Thả Thủy Tinh</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-quan-cafe" title="Đèn Thả Quán Cafe">Đèn Thả Quán Cafe</a></h3></li>
                        </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/dentha0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_tha">
                        @foreach ($DenTha as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn tường---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn tường</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-dong" title="Đèn Tường Đồng">Đèn Tường Đồng</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-pha-le" title="Đèn Tường Pha Lê">Đèn Tường Pha Lê</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-pha-le-nen" title="Đèn Tường Pha Lê Nến">Đèn Tường Pha Lê Nến</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-hien-dai" title="Đèn Tường Hiện Đại">Đèn Tường Hiện Đại</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-co-dien" title="Đèn Tường Cổ Điển">Đèn Tường Cổ Điển</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-led-trang-tri" title="Đèn Tường LED Trang Trí">Đèn Tường LED Trang Trí</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-phong-ngu" title="Đèn Tường Phòng Ngủ">Đèn Tường Phòng Ngủ</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-thuy-tinh" title="Đèn Tường Thủy Tinh">Đèn Tường Thủy Tinh</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-go" title="Đèn Tường Gỗ">Đèn Tường Gỗ</a></h3></li>
                            </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/dentuong0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_tuong">
                        @foreach ($DenTuong as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn chuyên dụng---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn chuyên dụng</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-ban-lam-viec-den-hoc" title="Đèn Bàn Làm Việc - Đèn Học">Đèn Bàn Làm Việc - Đèn Học</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-ngu-de-ban" title="Đèn Ngủ Để Bàn">Đèn Ngủ Để Bàn</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-cay-den-san" title="Đèn Cây - Đèn Sàn">Đèn Cây - Đèn Sàn</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-spotlight-tracklight" title="Đèn Spotlight - Tracklight">Đèn Spotlight - Tracklight</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-ray-nam-cham" title="Đèn Ray Nam Châm">Đèn Ray Nam Châm</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-pha-led" title="Đèn Pha LED">Đèn Pha LED</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-am-tuong-den-am-san" title="Đèn Âm Tường - Đèn Âm Sàn">Đèn Âm Tường - Đèn Âm Sàn</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-pha-ho-nuoc-non-bo" title="Đèn Pha Hồ Nước - Non Bộ">Đèn Pha Hồ Nước - Non Bộ</a></h3></li>
                        </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/denchuyendung0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_chuyen_dung">
                        @foreach ($DenChuyenDung as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn soi tranh gương---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn soi trang - gương</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-soi-tranh" title="Đèn Soi Tranh">Đèn Soi Tranh</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-roi-guong" title="Đèn Rọi Gương">Đèn Rọi Gương</a></h3></li>
                            </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/densoi0.png" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_soi">
                        @foreach ($DenSoi as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn led---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn downlight Led</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-led-am-tran" title="Đèn LED Âm Trần">Đèn LED Âm Trần</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-lon-gan-noi" title="Đèn Lon Gắn Nổi">Đèn Lon Gắn Nổi</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuyp-led-t5-t8" title="Đèn Tuýp LED T5, T8">Đèn Tuýp LED T5, T8</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-day-led" title="Đèn Dây LED - Chớp Nháy">Đèn Dây LED - Chớp Nháy</a></h3></li>
                            </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/denled0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_led">
                        @foreach ($DenLed as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn ngoại thất---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn ngoại thất</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-dong-ngoai-troi" title="Đèn Đồng Ngoài Trời">Đèn Đồng Ngoài Trời</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-hat-tuong-trang-tri" title="Đèn Hắt Tường Trang Trí">Đèn Hắt Tường Trang Trí</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-chong-tham" title="Đèn Tường Chống Thấm">Đèn Tường Chống Thấm</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-ngoai-troi" title="Đèn Thả Ngoài Trời">Đèn Thả Ngoài Trời</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-ngoai-troi" title="Đèn Tường Ngoài Trời">Đèn Tường Ngoài Trời</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tru-cong" title="Đèn Trụ Cổng">Đèn Trụ Cổng</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tru-san-vuon-thap" title="Đèn Trụ Sân Vườn Thấp">Đèn Trụ Sân Vườn Thấp</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tru-san-vuon-cao" title="Đèn Trụ Sân Vườn Cao">Đèn Trụ Sân Vườn Cao</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-roi-bai-co" title="Đèn Rọi Bãi Cỏ">Đèn Rọi Bãi Cỏ</a></h3></li>
                            </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/denngoaithat0.png" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_ngoai_that">
                        @foreach ($DenNgoaiThat as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn năng lượng mặt trời---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn năng lượng mặt trời</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-vach-tuong-solar" title="Đèn Vách Solar">Đèn Vách Solar</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tru-cong-solar" title="Đèn Trụ Cổng Solar">Đèn Trụ Cổng Solar</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tru-san-vuon-solar" title="Đèn Trụ Sân Vườn Solar">Đèn Trụ Sân Vườn Solar</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-duong-nang-luong-mat-troi" title="Đèn Đường Năng Lượng Mặt Trời">Đèn Đường Năng Lượng Mặt Trời</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-pha-solar" title="Đèn Pha Solar">Đèn Pha Solar</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-ghim-co-san-noi-treo-cay-solar" title="Đèn Ghim Cỏ - Sàn Nổi - Treo Cây Solar">Đèn Ghim Cỏ - Sàn Nổi - Treo Cây Solar</a></h3></li>
                            </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/dennangluong0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_nang_luong">
                        @foreach ($DenNangLuong as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn và phụ kiện---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Bóng đèn và phụ kiện</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/bong-led-bong-edison" title="Bóng Led - Bóng Edison">Bóng Led - Bóng Edison</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/phu-kien-den-trang-tri" title="Phụ Kiện Đèn Trang Trí">Phụ Kiện Đèn Trang Trí</a></h3></li>
                            </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/bd_pk0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_phu_kien">
                        @foreach ($BongDenPhuKien as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

<!-- ----------------------------Đèn trừng bày thanh lý---------------------------------- -->
            <div class="app__container-items">
                <div class="app__container-items-title">
                    <h2 class="title-h2"> 
                        <a href="">Đèn trưng bày thanh lý</a>
                    </h2>
                </div>
                <div class="row">
                    <div class="app__container-item-menu col l-2-4 m-3 c-0" style="padding-right: 0 !important">
                        <ul class="cate_1">
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-chum-thanh-ly" title="Đèn chùm thanh lý">Đèn chùm thanh lý</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-mam-thanh-ly" title="Đèn ốp trần thanh lý">Đèn ốp trần thanh lý</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tha-thanh-ly" title="Đèn thả thanh lý">Đèn thả thanh lý</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-tuong-thanh-ly" title="Đèn tường thanh lý">Đèn tường thanh lý</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-soi-tranh-thanh-ly" title="Đèn soi tranh thanh lý">Đèn soi tranh thanh lý</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-ngoai-troi-thanh-ly" title="Đèn ngoài trời thanh lý">Đèn ngoài trời thanh lý</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-ban-thanh-ly" title="Đèn bàn thanh lý">Đèn bàn thanh lý</a></h3></li>
                            <li><h3 class="title_h3"><a href="https://thegioianhsang.vn/den-led-ray-thanh-ly" title="Đèn led ray thanh lý">Đèn led ray thanh lý</a></h3></li>
                            </ul>

                        <a href="" class="menu-img">
                            <img src="./assets/img/Product/denthanhly0.jpg" alt="" class="avt-img">
                        </a>
                    </div>

                    <div class="app__container-item-product col l-2-8 c-12 den_thanh_ly">
                        @foreach ($DenThanhLy as $item)
                            <div class="col l-3 c-6 item-product-wrap" ng-repeat="x in listItem">
                                <div class="new__product-img-wrapper item-product">
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}">
                                        <img src="{{$item->AnhDaiDien}}" alt="" class="new__product-img item-product-img">
                                    </a>
                                </div>
        
                                <div class="sale-hot sale">
                                    <span>30%</span>
                                </div>
        
                                <div class="product__title">
                                    <div class="product__title-name">
                                        <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
                                    </div>
                                    <div class="product__title-price">
                                        <ul class="price-list">
                                        <li class="price-item">{{ number_format($item->GiaGiam, 0, ',', '.') }}đ</li>
                                        <li class="price-item">{{ number_format($item->Gia, 0, ',', '.') }}đ</li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="item-title-add" >
                                    <a href="{{ route('user.add', $item->MaSanPham) }}" class="item-title-link">Mua ngay</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>

        <div class="footer">
            <div class="grid wide row">
                <div class="footer__wrapper">
                    <div class="footer-left col l-6">
                        <p class="title-contact">CÔNG TY TNHH TTNT HƯNG THÀNH</p>

                        <ul class="footer-list">
                            <li>8 Tân Khai, Phường 4, Tân Bình, TP.HCM</li>
                            <li><a href="https://zalo.me/0938346493"><em></em></a><span style="font-size:16px;"><em></em></span><span style="font-size:16px;"><em>Hotline+Zalo 1:</em></span> <a href="tel:0937309879" rel="noreferrer nofollow" target="_blank"> 0937 309 879</a></li>
                            <li><span style="font-size:16px;"><em>Hotline+Zalo 2:</em></span> <a href="http://zalo.me/0989475868"> 0989 475 868</a></li>
                            <li><span style="font-size:16px;"><em>Hotline+Zalo 3:</em></span> <a href="http://zalo.me/0909266116"> 0909 266 116</a></li>
                            <li><i class="far fa-envelope"></i><a href="mailto:thuanpro9b@gmail.com">thuanpro9b@gmail.com</a></li>
                            <li><i>MST</i>0311977849</li>
                            <li><strong>Ngày thành lập:</strong> 22/09/2012</li>
                            <li><strong>Nơi đăng ký:</strong> Sở Kế hoạch &amp; đầu tư Hồ Chí Minh</li>
                            <li><strong>Người chịu trách nhiệm quản lý nội dung: </strong>Hồ Xuân Hưng</li>
                           </ul>
                    </div>

                    <div class="footer-right col l-6">
                        <div class="title-contact">HỖ TRỢ KHÁCH HÀNG</div>

                        <ul class="ul-footer">
                            <li>
                                <h6 class="title_h6">
                                    <a href="baohanh" title="Bảo hành">Bảo hành</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="quydinh" title="Quy định và hình thức thanh toán">Quy định và hình thức thanh toán</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="vanchuyen" title="Vận chuyển giao nhận">Vận chuyển giao nhận</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="doihang" title="Đổi trả hàng và hoàn tiền">Đổi trả hàng và hoàn tiền</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="baomat" title="Bảo mật thông tin">Bảo mật thông tin</a>
                                </h6>
                            </li>
                        </ul>

                        <div class="title-contact">Liên kết mạng xã hội</div>

                        <div class="sharefooter">
                            <a class="itemshare" href="https://www.facebook.com/DenTrangTri.TheGioiAnhSang" title="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a class="itemshare" href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=24104" title="instagram"><i class="fab fa-instagram"></i></a>
                            <a class="itemshare" href="https://www.youtube.com/channel/UChbLojWQp7lRgwkGUkI0fyQ?view_as=subscriber" title="youtube"><i class="fab fa-youtube"></i></a>
                            <a class="itemshare" href="" title="twitter"><i class="fab fa-twitter"></i></a>
                            <a class="itemshare" href="" title="pinterest"><i class="fab fa-pinterest-p"></i></a>
                        </div>

                        <div class="footer-img">
                            <img src="./assets/img/footer/img.png" alt="">
                            <img src="./assets/img/footer/img2.png" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="copyright"><span class="text-ffbe00">Bản Quyền @ 2021 Thế Giới Ánh Sáng  - Thế giới đèn trang trí nội ngoại thất cao cấp</span></div>
        </div>

        <div class="support__fix">
            <div>
                <a href="" class="support__fix-lh" style="background-image: url(./assets/img/Sp/phone-ico.png);"></a>
            </div>
            <div>
                <a href="" class="support__fix-lh" style="background-image: url(./assets/img/Sp/icon-zalo.png);"></a>
            </div>
            <div>
                <a href="" class="support__fix-lh" style="background-image: url(./assets/img/Sp/facebook-messenger.png);"></a>
            </div>
        </div>
    </div>

    <!-- <script src="./assets/js/main.js" ></script> -->
</body>
<script>
    //-------------- slide----------------------
    var bannerWrapper = document.querySelector('.banner-top');
    var bannerItems = document.querySelectorAll('.banner-item');
    var numberOfItems = bannerItems.length;
    // Index của slide đang hiển thị
    var currentIndex = 0;

    setInterval(function () {
        // Tăng index lên 1
        currentIndex = (currentIndex + 1) % numberOfItems;
        
        // Tính giá trị transform để lướt sang slide tiếp theo
        var transformValue = -currentIndex * 100 + '%';
        bannerWrapper.style.transform = 'translateX(' + transformValue + ')';
    }, 5000);

    //-------------------slider-new-product----------------
    const rightbtn = document.querySelector('.btn-right')
    const leftbtn = document.querySelector('.fa-angle-left')
    const newproductlength = document.querySelector('.new__product-item').offsetWidth
    const sildeWrapper = document.querySelector('.new__product-item-wrapper')

    rightbtn.addEventListener("click", function(){
        sildeWrapper.scrollLeft += newproductlength
    })

    leftbtn.addEventListener("click", function(){
        sildeWrapper.scrollLeft -= newproductlength
    })
</script>
</html>