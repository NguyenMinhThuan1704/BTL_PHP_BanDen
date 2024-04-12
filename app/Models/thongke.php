<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class thongke extends Model
{
    use HasFactory;
    protected $table = 'hoadonnhap';
    public static function thongKeHoaDonNhap($id, $MaNhaPhanPhoi, $tuNgay, $denNgay)
    {
        return DB::select('CALL sp_hoadonnhap_thong_ke(?, ?, ?, ?)', [$id, $MaNhaPhanPhoi, $tuNgay, $denNgay]);
    }
    public static function thongKeHoaDonBan($TenKH, $tuNgayHDB, $denNgayHDB)
    {
        return DB::select('CALL sp_hoadonban_thong_ke(?, ?, ?)', [$TenKH, $tuNgayHDB, $denNgayHDB]);
    }
    public function catNCC()
    {
        return $this->hasOne(nhacungcap::class, 'MaNhaPhanPhoi', 'MaNhaPhanPhoi');
    }

    public function catTK()
    {
        return $this->hasOne(taikhoan::class, 'id', 'id');
    }
}
