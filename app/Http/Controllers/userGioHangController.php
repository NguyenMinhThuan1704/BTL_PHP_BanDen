<?php

namespace App\Http\Controllers;

use App\Models\userGioHang;
use App\Models\SanPham;
use Illuminate\Http\Request;

class userGioHangController extends Controller
{

    public function addToCart($sanpham, userGioHang $cart) {
        $product = SanPham::where('MaSanPham', $sanpham)->first();

        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $cart -> add($product, $quantity);
        return redirect()->route('user.giohang')->with('msg', 'Thêm sản phẩm vào giỏ hàng thành công');
    }

    public function view(userGioHang $cart) {
        $modelGioHang = new userGioHang();
        $giohang = $cart->items;

        // dd($giohang, $cart);
        return view('User.giohang', compact('giohang', 'cart'));
    }

    public function updateCart($MaSanPham, userGioHang $cart) {
        $quantity=request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $cart->update($MaSanPham, $quantity);
        return redirect()->route('user.giohang');
        // return redirect()->route('user.giohang')->with('msg', 'Cập nhật sản phẩm thành công');
    }

    public function deleteCart($MaSanPham, userGioHang $cart) {
        $cart->delete($MaSanPham);
        return redirect()->route('user.giohang')->with('msg', 'Xóa sản phẩm khỏi giỏ hàng thành công');
    }

    public function clearCart(userGioHang $cart) {
        $cart->clear();
        return redirect()->route('user.giohang')->with('msg', 'Xóa toàn bộ sản phẩm khỏi giỏ hàng thành công');
    }
}
