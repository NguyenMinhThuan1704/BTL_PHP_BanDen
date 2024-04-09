<?php

namespace App\Http\Controllers;

use App\Models\userCategory;
use Illuminate\Http\Request;

class userCategoryController extends Controller
{
    public function getCategory(Request $request, $MaLoaiSanPham = 0, userCategory $LSP) {
        $categoryName = '';
        // dd($LSP->LSP);
        $modelCategory = new userCategory();

        if (!empty($MaLoaiSanPham)) {
            $listCungLoai = $modelCategory->getCungLoai($MaLoaiSanPham);
            $category = $modelCategory->getCategoryById($MaLoaiSanPham);
            if ($category) {
                $categoryName = $category->TenLoaiSanPham;
            }
        } else {
            return redirect()->route('user.index')->with('msg', 'Liên kết không tồn tại');
        }
    
        return view('User.danhmucsp', compact('listCungLoai', 'categoryName'));
    }
}
