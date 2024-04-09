<?php

namespace App\Http\Controllers;

use App\Models\userDetailProduct;
use Illuminate\Http\Request;

class userDetailProductController extends Controller
{

    public function getDetailProduct(Request $request, $MaSanPham = 0, $MaLoaiSanPham = 0) {
        $modelDetailProduct = new userDetailProduct();
        
        if (!empty($MaSanPham)) {
            $spDetail = $modelDetailProduct->getDetail($MaSanPham);
            if (!empty($spDetail[0])) {
                $request->session()->put('MaSanPham', $MaSanPham);
                $spDetail = $spDetail[0];
            } else {
                return redirect()->route('user.index')->with('msg', 'Sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('user.index')->with('msg', 'Liên kết không tồn tại');
        }

        if (!empty($MaLoaiSanPham)) {
            $listCungLoai = $modelDetailProduct -> getCungLoai($MaLoaiSanPham);
        } else {
            return redirect()->route('user.index')->with('msg', 'Liên kết không tồn tại');
        }
    
        return view('User.index_product', compact('spDetail', 'listCungLoai'));
    }
}
