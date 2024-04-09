<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class HoaDon extends Model
{
    use HasFactory;

    protected $table = 'HoaDon';
    protected $primaryKey = 'MaHoaDon';
    public $timestamps = false;

    protected $fillable = ['TenKH', 'DiaChi', 'SDT', 'Email', 'TrangThai', 'TongGia'];

    public function getAllHDB(){
        return DB::table('HoaDon')->paginate(10); 
    }

    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'MaHoaDon');
    }

    public function searchHDB($MaHoaDon, $TenKH){
        return $search = hoadon::query()
            ->where(function($query) use ($MaHoaDon, $TenKH) {
                $query->where(function($query) use ($MaHoaDon) {
                    if (!empty($MaHoaDon)) {
                        $query->where('MaHoaDon', 'LIKE', "%$MaHoaDon%");
                    }
                })
                ->Where(function($query) use ($TenKH) {
                    if (!empty($TenKH)) {
                        $query->where('TenKH', 'LIKE', "%$TenKH%");
                    }
                });
            })
        ->paginate(10);
    }

    public static function deleteHDB($MaHoaDon)
    {
        return DB::select('CALL sp_hoadon_delete(?)', [$MaHoaDon]);
    }
}

class ChiTietHoaDon extends Model
{
    use HasFactory;

    protected $table = 'ChiTietHoaDon';
    protected $primaryKey = 'MaChiTietHoaDon';
    public $timestamps = false;

    protected $fillable = ['MaHoaDon', 'MaSanPham', 'SoLuongCTHDB', 'GiaCTHDB', 'TongGia'];

    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'MaHoaDon');
    }
}
