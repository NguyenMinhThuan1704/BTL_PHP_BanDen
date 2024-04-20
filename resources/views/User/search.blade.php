<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dennoithat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/input.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://thegioianhsang.vn/application/upload/banner/the-gioi-anh-sang-mot-the-gioi-den-trang-tri-cao-cap.png" rel="icon"/>
</head>
<body>
    <div class="app">
        <div class="banner">
            <div class="banner-wrapper">
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
                </div>
                <div class="banner_name">
                    <div class="banner_logo">
                        <img src="{{ asset('assets/img/Header/banner-bot.png') }}" alt="" class="logo">
                        <img src="{{ asset('assets/img/Header/banner-bot-name.png') }}" alt="" class="name">
                    </div>
                </div>
                <div class="banner_call">
                    <div class="hotline_zalo">
                        <a href="tel: 0342615519" class="hotline">0342 615 519</a>
                        <a href="https://chat.zalo.me/" class="zalo">0342 615 519</a>
                        <p>Hotline - Zalo</p>
                    </div>
                    <div class="cart">
                            <a href="{{route('user.giohang')}}" class="cart-link">
                                <i class="fas fa-shopping-bag cart-logo"></i>
                                <span class="cart-notice">{{ $cart-> totalQuantity }}</span>
                            </a>
                        </div>
                    <div class="user">
                        <a href="{{ route('user.login') }}" class="user-link">
                            <i class="fa-solid fa-user user-logo"></i>
                        </a>
                    </div>
                </div>
                <div class="banner_bars-btn">
                    <i class="fa-solid fa-bars"></i>
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
                            <a href="{{route('user.index')}}">Trang chủ</a>
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
                            <a href="{{route('user.lienhe')}}">Liên hệ</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="container grid wide">
            <div class="new_title">
                <ul class="breadcrumb title-h2">
                  <li class="breadcrumb-item">
                    <a href="" title="Trang chủ">Trang chủ</a>
                  </li>
        
                  <li class="breadcrumb-item">
                    <a href="" title="">Nội dung tìm kiếm {{$searchTerm}}</a>
                  </li>
                </ul>
            </div>

            <div class="row grid wide">
                <div class="new__product">
                    <div class="row new__product-item-wrapper">
                      @foreach ($resultSearch as $item)
                        <div class="new__product-item col l-3 c-6">
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
                                    <a href="{{route('user.getDetailProduct', ['MaSanPham'=>$item->MaSanPham, 'MaLoaiSanPham' => $item->MaLoaiSanPham])}}" title="{{$item->TenSanPham}}">{{$item->TenSanPham}}</a>
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
                <div class="page col c-12">
                    <div class="pagination" style="display: flex; justify-content: center; font-size: 2rem;">
                      {{$resultSearch->appends(request()->query())->links()}}
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
                                    <a href="https://thegioianhsang.vn/ho-tro-khach-hang/bao-hanh/" title="Bảo hành">Bảo hành</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="https://thegioianhsang.vn/ho-tro-khach-hang/quy-dinh-va-hinh-thuc-thanh-toan/" title="Quy định và hình thức thanh toán">Quy định và hình thức thanh toán</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="https://thegioianhsang.vn/ho-tro-khach-hang/van-chuyen-giao-nhan/" title="Vận chuyển giao nhận">Vận chuyển giao nhận</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="https://thegioianhsang.vn/ho-tro-khach-hang/doi-tra-hang-va-hoan-tien/" title="Đổi trả hàng và hoàn tiền">Đổi trả hàng và hoàn tiền</a>
                                </h6>
                            </li>
                            <li>
                                <h6 class="title_h6">
                                    <a href="https://thegioianhsang.vn/ho-tro-khach-hang/bao-mat-thong-tin/" title="Bảo mật thông tin">Bảo mật thông tin</a>
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
                <a href="" class="support__fix-lh" style="background-image: url('{{ asset('assets/img/Sp/phone-ico.png') }}');"></a>
            </div>
            <div>
                <a href="" class="support__fix-lh" style="background-image: url('{{ asset('assets/img/Sp/icon-zalo.png') }}');"></a>
            </div>
            <div>
                <a href="" class="support__fix-lh" style="background-image: url('{{ asset('assets/img/Sp/facebook-messenger.png') }}');"></a>
            </div>
        </div>
    </div>
</body>
</html>