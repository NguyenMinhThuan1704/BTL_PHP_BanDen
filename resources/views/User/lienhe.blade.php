<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/giohang.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/input.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-free-6.3.0-web/css/all.min.css') }}">
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
                            <a style="color: #ffbe00" href="{{route('user.lienhe')}}">Liên hệ</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="container grid wide">

            <div class="row grid wide wrapper" style="justify-content: space-between; margin: 30px 0;">
                <div class="col c-6" style="background-color: #fff; height: auto;">
                    <div class="content">
                        <div class="title-text">
                            <span>Form liên hệ</span>
                        </div>
                    </div>

                    <div class="row thongtin" style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
                        <div class="c-12 thongtin_title">
                            <p>Họ và tên (*):</p>
                            <div class="form-group" id="input-name">
                                <input type="text" class="form-control name" placeholder="Họ và tên (*)" >
                            </div>
                        </div>

                        <div class="c-12 thongtin_title">
                            <p>Số điện thoại (*):</p>
                            <div class="form-group" id="input-phone">
                                <input class="form-control phone" type="text" placeholder="Số điện thoại (*)">
                            </div>
                        </div>

                        <div class="c-12 thongtin_title">
                            <p>Địa chỉ (*):</p>
                            <div class="form-group" id="input-address">
                                <input class="form-control address" type="text" placeholder="Địa chỉ">
                            </div>
                        </div>

                        <div class="c-12 thongtin_title">
                            <p>Email:</p>
                            <div class="form-group" id="input-email">
                                <input class="form-control email" type="text" placeholder="Email">
                            </div>
                        </div>

                        <div class="thongtin_title">
                            <p>Nội dung:</p>
                            <div class="form-group" id="input-email" style="height: auto !important;">
                                <textarea name="content" type="text" class="form-control form-group form-controll p-2" id="content" rows="5"></textarea>
                            </div>
                        </div>

                        <button class="btn__shopping--cart">
                            <i class="fa-solid fa-arrow-right"></i>
                            Gửi liên hệ
                          </button>
                    </div>
                </div>
                
                <div class="col c-6" style="background-color: #fff;">
                    <div class="title-text">
                        <span>Thông tin liên hệ</span>
                    </div>

                    <div class="col-contact content-contact">

                        <p style="text-align:center"><span style="font-size:30px;"><span style="color:#ff0000"><strong>THẾ GIỚI ÁNH SÁNG</strong></span></span></p>
                        
                        <p><span style="font-size:14px;"><strong>Văn phòng :&nbsp;</strong> 8 Tân Khai, P.4, Tân Bình, TP.HCM (Sau trường THPT Nguyễn Thường Hiền)</span></p>
                        
                        <p><span style="font-size:14px;"><strong></strong></span></p>
                        
                        <p><span style="font-size:14px;"><strong>Điện thoại :</strong> <a href="tel:(028) 6684 0229">(028) 6684 0229</a> - <a href="tel:(028) 2245 8144">(028) 2245 8144</a></span></p>
                        
                        <p><span style="font-size:14px;"><strong>Hotline+Zalo 1:</strong> <a href="tel:0937309879" rel="noreferrer nofollow" target="_blank">0937 309 879 ( Ms. Loan)</a></span></p>
                        
                        <p><span style="font-size:14px;"><strong>Hotline+Zalo 2:</strong> <a href="http://zalo.me/0989475868">0989 475 868&nbsp;(Ms. Hương)</a></span></p>
                        
                        <p><span style="font-size:14px;"><strong>Email:</strong> hungthanh@thegioianhsang.vn</span></p>
                        
                        <p><span style="font-size:14px;"><strong>Website:</strong> <strong>www.thegioianhsang.vn</strong></span></p>
                        
                        <p><span style="font-size:14px;">Với tiêu chí làm thỏa mãn nhu cầu hoàn thiện giá trị thẩm mỹ cho các công trình kiến trúc, xây dựng , chúng tôi đặt tính chuyên nghiệp, sự uy tín, tận tâm lên hàng đầu để phục vụ khách hàng.</span></p>
                        
                        <p><span style="font-size:14px;">Chúng tôi cam kết mang đến cho Quý khách hàng những sản phẩm có chất lượng tốt nhất, hiện đại nhất bằng chính sự trân trọng, niềm tin và trách nhiệm của mình với kim chỉ nam hành động Kinh doanh gắn liền với Uy tín, Chất lượng .</span></p>
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