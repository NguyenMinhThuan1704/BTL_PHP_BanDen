<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userCategory
{
    use HasFactory;
    public $LSP = [];

    // protected $table = 'sanpham';

    public function __construct() {
        $this->LSP = $this->getLSP();
    }

    public function getLSP() {
        return DB::select('SELECT * FROM loaisanpham');
    }

    public function getCategoryById($MaLoaiSanPham) {
        return  DB::table('loaisanpham')->where('MaLoaiSanPham', $MaLoaiSanPham)->first();
    }

    public function getCungLoai($MaLoaiSanPham) {
        return DB::table('sanpham')
                    ->where('MaLoaiSanPham', $MaLoaiSanPham)
                    ->paginate(12);
    }
}
