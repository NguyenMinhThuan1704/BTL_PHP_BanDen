<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userHome extends Model
{
    use HasFactory;

    // protected $table = 'sanpham';

    public static function laySanPhamTheoChucNang($chucNang)
    {
        return DB::select('CALL sp_LaySanPhamTheoChucNang(?)', [$chucNang]);
    }

    public function getDen($id) {
        return DB::select('SELECT * FROM sanpham WHERE MaLoaiSanPham=? limit 8', [$id]);
    }
}
