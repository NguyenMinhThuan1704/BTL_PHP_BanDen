<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class tongquan extends Model
{
    use HasFactory;
    public static function laySanPhamTheoChucNang($chucNang)
    {
        return DB::select('CALL sp_LaySanPhamTheoChucNang(?)', [$chucNang]);
    }
    public static function getDoanhThuNgay()
    {
        return DB::select('CALL GetDailyRevenue');
    }

    public static function getDoanhThuTuan()
    {
        return DB::select('CALL GetMonthlyRevenue');
    }

    public static function getDoanhThuThang()
    {
        return DB::select('CALL GetWeeklyRevenue');
    }

    public static function getDoanhThuNam()
    {
        return DB::select('CALL GetYearlyRevenue');
    }
}

