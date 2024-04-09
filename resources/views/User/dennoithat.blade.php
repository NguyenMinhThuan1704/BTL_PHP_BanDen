<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đèn trang trí nội thất</title>
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
                            <a style="color: #ffbe00" href="{{route('user.dennoithat')}}">Đèn trang trí</a>
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
                    <a href="" title="Đèn chùm">Đèn nội thất</a>
                  </li>
                </ul>
            </div>

            <div class="row grid wide">
                <div class="container__title">
                    <h2 style="text-align: justify;">
                        <span style="color:#f1c40f;">Các loại đèn trang trí nội thất thông dụng</span>
                    </h2>
                    <p style="text-align: justify;">
                        <strong>Đèn trang trí nội thất</strong> 
                        có nhiều loại và kiểu dáng, chế độ sáng khác nhau phù hợp với từng vị trí không gian nội thất như đèn chùm, ốp trần, thả,... cho nội thất phòng khách, phòng ngủ, phòng ăn, v.v.. Vì thế, khi lựa chọn loại đèn và kiểu dáng cho phù hợp không gian, bạn nên xem xét từng vị trí, độ cao trần, diện tích, v.v..<strong>
                        </strong>
                    </p>
                </div>

                <div class="new__product">
                    <div class="row new__product-item-wrapper">
                        <div class="new__product-item col l-3 c-6">
                            <div class="new__product-img-wrapper">
                                <a href="">
                                    <img src="./assets/img/New product/1.jpg" alt="" class="new__product-img">
                                </a>
                            </div>
    
                            <div class="sale-hot">
                                <span>30%</span>
                            </div>
    
                            <div class="product__title">
                                <div class="product__title-name">
                                    <a href="">Đèn ốp trần hiệu ứng ánh sáng hình ngôi sao mặt trăng D600mm DR-NC596</a>
                                </div>
                                <div class="product__title-price">
                                    <ul class="price-list">
                                        <li class="price-item">2.321.000đ</li>
                                        <li class="price-item">3.570.000đ</li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="item-title-add">
                                <a href="" class="item-title-link">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page col c-12">
                    <div class="pagination" style="display: flex; justify-content: center; font-size: 2rem;">
                      
                    </div>
                </div> 

                <div class="noidung">
                    <h2 style="text-align: justify;">1. Một số mẫu chi tiết, kiểu hình của đèn chùm phòng khách đẹp, giá rẻ thường gặp</h2>

                    <h3>Chi tiết phối màu sắc đặc biệt, chất liệu hiện đại:</h3>
                    
                    <p style="text-align: justify;">Thông thường, các chất liệu sử dụng sẽ tương đồng màu sắc bên ngoài với sản phẩm. Ví dụ như pha lê, thủy tinh, đá sẽ cho thấy vẻ ngoài màu trắng đục, chất liệu đồng sẽ đưa ra các gam đặc trưng là chất vàng tối. Như vậy, hầu hết màu sắc đèn sẽ thiên về tính trang nhã, gam màu cổ điển, thuần túy, trung tính. Cùng với đó, sản phẩm cũng đi kèm với nhược điểm về hình khối nặng nề, hoặc dễ vỡ do chất liệu tạo ra.</p>
                    
                    <p style="text-align: justify;">Tuy nhiên, <em>đèn chùm phòng khách chung cư</em> trong một số mẫu thiết kế đẹp, giá rẻ có sự thay đổi năng động hơn. Theo đó, đèn hoàn toàn có thể đem đến nhiều lựa chọn màu sắc, dải màu đáp ứng trải dài rộng ở khắp các khoảng màu tím, xanh lục, xanh dương,…với nhiều cấp độ gam sắc. Với lựa chọn này, chao đèn, khung đèn tập trung hướng tới việc sử dụng chất liệu mới như hợp kim hoặc nhựa cao cấp. Đây cũng là chất liệu nêu bật ưu thế khi định kết cấu dễ tạo khuôn dáng, đảm bảo tiêu chí trọng lượng nhẹ cho sản phẩm.</p>
                    
                    <h3>Chi tiết thể hiện xu hướng mới:</h3>
                    
                    <p style="text-align: justify;">Đèn chùm phòng khách cao cấp hướng tới giá trị hiện đại, đáp ứng tiêu chí vẻ đẹp sôi động của thành phố. Thêm vào đó, các tạo hình hiện đại cũng cho thấy chất cá tính và sự nổi bật riêng, phù hợp với tính cách của các gia chủ, đảm bảo vẻ đẹp tinh tế khác biệt. Do đó, sản phẩm rất được người mua dùng chú ý.</p>
                    
                    <p style="text-align: justify;">Các hình khối sáng tạo, hoa văn tinh giản, tập trung thể hiện hàm súc xu hướng scandinavian, rustic, hay phong cách công nghiệp, lối sống hiện đại là những chi tiết thường gặp trong sản phẩm. Như vậy, việc hoàn toàn lược bớt các yếu tố rườm rà, tập trung sâu vào các chi tiết đắt giá và khả năng nhấn sáng là cách đơn giản để sản phẩm bắt đúng thời đại.</p>
                    
                    <h3>Dáng thả dài tầm trung, gọn kết cấu:</h3>
                    
                    <p style="text-align: justify;">Mặt bằng chung các căn phòng khách nhà hiện đại đáp ứng không gian sinh hoạt tại TP.HCM, Hà Nội, thông thường, luôn có diện tích vừa đủ, khoảng cách sàn và trần không quá cao. Để đáp ứng tiêu chí này, thiết kế của đèn chùm phòng khách nhỏ đẹp, giá rẻ cũng thiên về các mẫu dáng dài tầm trung, kết cấu chặt chẽ, gọn gàng. Sản phẩm chủ yếu tập trung vào các kiểu hình phô trương nghệ thuật, nâng tầm giá trị trang trí cho không gian.</p>
                    
                    <p style="text-align: justify;">Đèn chùm phòng khách đơn giản vì thế sẽ định dạng các kiểu dáng hình học đặc biệt, các kết cấu hình ảnh cách điệu, các sắp đặt dạng chóa, bát ngọc hướng đến trục trung tâm. Trong đó, để hỗ trợ tạo hình, chất liệu gỗ, hoa giả, hợp kim, thủy tinh inox cao cấp là những lựa chọn vật liệu không thể thiếu.</p>
                    
                    <h2>2. Kinh nghiệm chọn mua đèn chùm hiện đại, cổ điển và tân cổ điển</h2>
                    
                    <p style="text-align: justify;">Chất lượng tỷ lệ thuận với giá thành. Do đó, cần cân nhắc kỹ để không chọn nhầm sản phẩm không đáp ứng tiêu chí khi mua dùng. Một số chất liệu sử dụng tương đối đắt đỏ, các mẫu tạo hình nặng nề, quá giàu giá trị nghệ thuật thường có chào giá tương đối cao. Nếu giảm bớt hai lựa chọn này, cộng với việc cân nhắc thêm về phong cách tổng thể chung khi trang trí nội thất phòng khách. Bạn chắc chắn sẽ chọn được sản phẩm thích hợp.</p>
                    
                    <p style="text-align: justify;">Khi lựa chọn mẫu sản phẩm đắt giá, nếu có thể, hãy loại bỏ địa chỉ qua nhiều lớp trung gian, lựa chọn nhà cung cấp tại xưởng, bạn sẽ có được mức chi phí chọn mua là thấp nhất.</p>
                    
                    <p style="text-align: justify;"><a href="">Đèn chùm</a> tương thích với tổng thể các luồng sáng khác nhau khác trong phòng khách sẽ mang lại hiệu quả sử dụng tốt hơn. Về lâu dài, gió, không khí độ ẩm ướt, nhiệt độ ánh sáng môi trường bên ngoài, và sự thay thế dễ dàng bóng đèn cũng là yếu tố cần xem xét để không gian không chỉ đẹp mà còn thực sự đảm bảo an toàn.</p>
                    
                    <h2>3. Địa chỉ cung cấp đèn chùm phòng khách tại TP.HCM, Hà Nội</h2>
                    
                    <p style="text-align: justify;"><a href="">Đèn chùm</a> phòng khách tại Thế Giới Ánh Sáng cung cấp giá trị sử dụng lâu bền, đáp ứng công năng dùng kiểu mẫu. Sản phẩm đẹp, giàu tính trang trí, nổi bật phong cách riêng cho không gian nhà hiện đại trong thành phố.</p>
                    
                    <p style="text-align: justify;">Đèn thiết kế các kết cấu tạo hình mới mẻ, bắt xu hướng, lựa chọn công nghệ sản xuất hợp thời, hoa văn biểu trưng, sắc nét. Đặc biệt, người mua cũng có nhiều hơn các lựa chọn màu sắc ánh sáng: trắng, vàng, xanh với nhiều dải cấp độ sáng, nhiều hình ảnh độc đáo, sáng tạo.</p>
                    
                    <p style="text-align: justify;"><u>Đèn chùm trang trí phòng khách</u> được Thế Giới Ánh Sáng bảo hành 1 năm đối với từng sản phẩm. Giá rẻ, niêm yết trong kho hàng chính đặt tại TP.HCM và Hà Nội. Khi chọn mua, khách hàng được giao tận nơi, miễn phí 100% công lắp đặt.</p>
                    
                    <p style="text-align: justify;">Website: thegioianhsang.vn</p></div>
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
</body>
</html>