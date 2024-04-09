<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userDetailProduct extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    public function getDetail($MaSanPham) {
        return DB::select('SELECT * FROM sanpham WHERE MaSanPham=?', [$MaSanPham]);
    }

    public function getCungLoai($MaLoaiSanPham) {
        return DB::table('sanpham')
                    ->where('MaLoaiSanPham', $MaLoaiSanPham)
                    ->paginate(8);
    }

    // public function getCungLoai($MaLoaiSanPham) {
    //     return DB::select('SELECT * FROM sanpham WHERE MaLoaiSanPham=?', [$MaLoaiSanPham]);
    // }
}
