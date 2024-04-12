<?php

use Illuminate\Support\Facades\Route;
// USER
use App\http\Controllers\userHomeController;
use App\http\Controllers\userDetailProductController;
use App\http\Controllers\userCategoryController;
use App\http\Controllers\userGioiThieuController;
use App\http\Controllers\userDenNoiThatController;
use App\http\Controllers\userKhuyenMaiController;
use App\http\Controllers\userTinTucController;
use App\http\Controllers\userDuAnThucHienController;
use App\http\Controllers\userLienHeController;
use App\http\Controllers\userGioHangController;
use App\http\Controllers\userLoginController;
use App\http\Controllers\userSearchController;

use App\http\Controllers\hoaDonController;
use App\http\Controllers\hoadonnhapController;
use App\http\Controllers\AuthController;

use App\http\Controllers\testController;

// ADMIN
use App\http\Controllers\tongquanController;
use App\http\Controllers\loaisanphamController;
use App\http\Controllers\sanphamController;
use App\http\Controllers\nhacungcapController;
use App\http\Controllers\khachhangController;
use App\http\Controllers\tintucController;
use App\http\Controllers\duanthuchienController;
use App\http\Controllers\taikhoanController;
use App\http\Controllers\thongkeController;


// ----------------------------USER------------------------------------

Route::prefix('user')->name('user.')->group(function(){
    Route::get('/', [userHomeController::class,'index'])->name('index');
    Route::get('/ctsp/{MaSanPham}/{MaLoaiSanPham}', [userDetailProductController::class,'getDetailProduct'])->name('getDetailProduct');
    Route::get('/danhmuc/{MaLoaiSanPham}', [userCategoryController::class,'getCategory'])->name('getCategory');
    Route::get('/gioithieu', [userGioiThieuController::class,'gioithieu'])->name('gioithieu');
    Route::get('/dennoithat', [userDenNoiThatController::class,'dennoithat'])->name('dennoithat');
    Route::get('/khuyenmai', [userKhuyenMaiController::class,'khuyenmai'])->name('khuyenmai');
    Route::get('/tintuc', [userTinTucController::class,'tintuc'])->name('tintuc');
    Route::get('/duanthuchien', [userDuAnThucHienController::class,'duanthuchien'])->name('duanthuchien');
    Route::get('/lienhe', [userLienHeController::class,'lienhe'])->name('lienhe');
    Route::get('/giohang', [userGioHangController::class,'view'])->name('giohang');
    Route::get('/giohang/add/{sanpham}', [userGioHangController::class,'addToCart'])->name('add');
    Route::get('/giohang/update/{MaSanPham}', [userGioHangController::class,'updateCart'])->name('update');
    Route::get('/giohang/delete/{MaSanPham}', [userGioHangController::class,'deleteCart'])->name('delete');
    Route::get('/giohang/clear', [userGioHangController::class,'clearCart'])->name('clear');
    Route::post('/order', [hoaDonController::class, 'postCreate'])->name('order');
    Route::get('/loginUser', [userLoginController::class,'login'])->name('login');
    Route::post('/loginUser', [userLoginController::class, 'processLogin'])->name('processLogin');
    Route::post('/registerUser', [userLoginController::class, 'register'])->name('register');
    Route::get('/search', [userSearchController::class,'search'])->name('search');
});

// ----------------------------ADMIN------------------------------------
// Route::get('/admin/login', [tongquanController::class,'login'])->name('admin.login');
// Route::post('/admin/login', [tongquanController::class,'check_login']);
// Route::get('/admin/register', [tongquanController::class,'register'])->name('admin.register');
// Route::post('/admin/register', [tongquanController::class,'check_register']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/register', [AuthController::class, 'register'])->name('admin.register');
    Route::post('/admin/register', [AuthController::class, 'registerPost'])->name('admin.register');
    Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'loginPost'])->name('admin.login');
});

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', [testController::class, 'index']);
//     Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
// });

// Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
Route::prefix('admin')->name('admin.')->group(function(){
    Route::group(['middleware' => 'auth'], function () {
        // Route::get('/home', [testController::class, 'index']);
        Route::get('/tongquan', [tongquanController::class,'index'])->name('tongquan');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
        //--------------------------Loại sản phẩm----------------------------------
        Route::get('/lsp', [loaisanphamController::class,'index'])->name('lsp-index');
        Route::get('/lsp/create', [loaisanphamController::class,'create'])->name('lsp-create');
        Route::post('/lsp/create', [loaisanphamController::class,'postCreate'])->name('lsp-post-create');
        Route::get('/lsp/edit/{MaLoaiSanPham}', [loaisanphamController::class,'getEdit'])->name('lsp-edit');
        Route::post('/lsp/update', [loaisanphamController::class,'postEdit'])->name('lsp-post-edit');
        Route::get('/lsp/delete/{MaLoaiSanPham}', [loaisanphamController::class,'delete'])->name('lsp-delete');
        Route::match(['get', 'post'], '/lsp/search', [loaisanphamController::class,'search'])->name('lsp-search');
    
        // ----------------------------Sản phẩm------------------------------------
        Route::get('/sp', [sanphamController::class,'index'])->name('sp-index');
        Route::get('/sp/create', [sanphamController::class,'create'])->name('sp-create');
        Route::post('/sp/create', [sanphamController::class,'postCreate'])->name('sp-post-create');
        Route::get('/sp/edit/{MaSanPham}', [sanphamController::class,'getEdit'])->name('sp-edit');
        Route::post('/sp/update', [sanphamController::class,'postEdit'])->name('sp-post-edit');
        Route::get('/sp/delete/{MaSanPham}', [sanphamController::class,'delete'])->name('sp-delete');
        Route::match(['get', 'post'], '/sp/search', [sanphamController::class,'search'])->name('sp-search');
    
        // ----------------------------Nhà cung cấp--------------------------------
        Route::get('/ncc', [nhacungcapController::class,'index'])->name('ncc-index');
        Route::get('/ncc/create', [nhacungcapController::class,'create'])->name('ncc-create');
        Route::post('/ncc/create', [nhacungcapController::class,'postCreate'])->name('ncc-post-create');
        Route::get('/ncc/edit/{MaNhaPhanPhoi}', [nhacungcapController::class,'getEdit'])->name('ncc-edit');
        Route::post('/ncc/update', [nhacungcapController::class,'postEdit'])->name('ncc-post-edit');
        Route::get('/ncc/delete/{MaNhaPhanPhoi}', [nhacungcapController::class,'delete'])->name('ncc-delete');
        Route::match(['get', 'post'], '/ncc/search', [nhacungcapController::class,'search'])->name('ncc-search');
    
        // ----------------------------Khách hàng----------------------------------
        Route::get('/kh', [khachhangController::class,'index'])->name('kh-index');
        Route::get('/kh/create', [khachhangController::class,'create'])->name('kh-create');
        Route::post('/kh/create', [khachhangController::class,'postCreate'])->name('kh-post-create');
        Route::get('/kh/edit/{MaKH}', [khachhangController::class,'getEdit'])->name('kh-edit');
        Route::post('/kh/update', [khachhangController::class,'postEdit'])->name('kh-post-edit');
        Route::get('/kh/delete/{MaKH}', [khachhangController::class,'delete'])->name('kh-delete');
        Route::match(['get', 'post'], '/kh/search', [khachhangController::class,'search'])->name('kh-search');
    
        // ----------------------------Hóa đơn nhập--------------------------------
        Route::get('/hdn', [hoadonnhapController::class,'index'])->name('hdn-index');
        Route::get('/hdn/create', [hoadonnhapController::class,'create'])->name('hdn-create');
        Route::post('/hdn/create', [hoadonnhapController::class,'postCreate'])->name('hdn-post-create');
        Route::get('/hdn/delete_hdn/{MaHoaDonNhap}', [hoadonnhapController::class,'deleteHDN_hdn'])->name('hdn-delete');
        Route::get('/hdn/add/{sanpham}', [hoadonnhapController::class,'addToHDN'])->name('hdn-add-sp');
        Route::get('/hdn/update/{MaSanPham}', [hoadonnhapController::class,'updateHDN'])->name('hdn-update-sp');
        Route::get('/hdn/delete/{MaSanPham}', [hoadonnhapController::class,'deleteHDN'])->name('hdn-delete-sp');
        Route::get('/hdn/clear', [hoadonnhapController::class,'clearHDN'])->name('hdn-clear-sp');
        Route::get('/hdn/{MaHoaDonNhap}', [hoadonnhapController::class,'showDetail'])->name('hdn-detail');
        Route::get('/hdn/search', [hoadonnhapController::class,'search'])->name('hdn-search');
        Route::get('/hdb/inHDN/{MaHoaDonNhap}', [hoadonnhapController::class,'inHDN_Admin'])->name('hdn-inHDN-admin');
        // Route::match(['get', 'post'], '/hdn/search', [hoadonnhapController::class,'search'])->name('hdn-search');
    
    
        // ----------------------------Hóa đơn bán---------------------------------
        Route::get('/hdb', [hoaDonController::class,'index'])->name('hdb-index');
        Route::get('/hdb/{MaHoaDon}', [hoaDonController::class,'showDetail'])->name('hdb-detail');
        Route::get('/hdb/delete/{MaHoaDon}', [hoaDonController::class,'deleteHDB'])->name('hdb-delete');
        // Route::get('/hdb/inHDB/{MaHoaDon}', [hoaDonController::class,'inHDB_Admin'])->name('hdb-inHDB-admin');
        Route::get('/hdb/inHDB/{hoadon}', [hoaDonController::class,'inHDB_User'])->name('hdb-inHDB-user');
        Route::match(['get', 'post'], '/hdb/search', [hoaDonController::class,'search'])->name('hdb-search');
    
        // ----------------------------Tin tức-------------------------------------
        Route::get('/tt', [tintucController::class,'index'])->name('tt-index');
        Route::get('/tt/create', [tintucController::class,'create'])->name('tt-create');
        Route::post('/tt/create', [tintucController::class,'postCreate'])->name('tt-post-create');
        Route::get('/tt/edit/{MaTinTuc}', [tintucController::class,'getEdit'])->name('tt-edit');
        Route::post('/tt/update', [tintucController::class,'postEdit'])->name('tt-post-edit');
        Route::get('/tt/delete/{MaTinTuc}', [tintucController::class,'delete'])->name('tt-delete');
        Route::match(['get', 'post'], '/tt/search', [tintucController::class,'search'])->name('tt-search');
    
         // ----------------------------Dự án thực hiện-------------------------------------
         Route::get('/dath', [duanthuchienController::class,'index'])->name('dath-index');
         Route::get('/dath/create', [duanthuchienController::class,'create'])->name('dath-create');
         Route::post('/dath/create', [duanthuchienController::class,'postCreate'])->name('dath-post-create');
         Route::get('/dath/edit/{MaDuAn}', [duanthuchienController::class,'getEdit'])->name('dath-edit');
         Route::post('/dath/update', [duanthuchienController::class,'postEdit'])->name('dath-post-edit');
         Route::get('/dath/delete/{MaDuAn}', [duanthuchienController::class,'delete'])->name('dath-delete');
        Route::match(['get', 'post'], '/dath/search', [duanthuchienController::class,'search'])->name('dath-search');
    
        // ----------------------------Tài khoản-----------------------------------
        Route::get('/tk', [taikhoanController::class,'index'])->name('tk-index');
        Route::get('/tk/create', [taikhoanController::class,'create'])->name('tk-create');
        Route::post('/tk/create', [taikhoanController::class,'postCreate'])->name('tk-post-create');
        Route::get('/tk/edit/{id}', [taikhoanController::class,'getEdit'])->name('tk-edit');
        Route::post('/tk/update', [taikhoanController::class,'postEdit'])->name('tk-post-edit');
        Route::get('/tk/delete/{id}', [taikhoanController::class,'delete'])->name('tk-delete');
        Route::match(['get', 'post'], '/tk/search', [taikhoanController::class,'search'])->name('tk-search');
    });


    // ----------------------------Thống kê------------------------------------
    Route::get('/tke', [thongkeController::class,'index'])->name('tke-index');
    Route::match(['get', 'post'], '/tke/searchHDN', [thongkeController::class,'thongke'])->name('thongkeHDN');
    Route::match(['get', 'post'], '/tke/searchHDB', [thongkeController::class,'thongke'])->name('thongkeHDB');

});

