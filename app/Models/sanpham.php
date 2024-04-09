<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';

    public function getAllSP(){
        return DB::table('sanpham')->paginate(10); 
    }

    public function searchSP($TenSanPham, $MaLoaiSanPham) {
        $products = sanpham::query()
            ->where('TenSanPham', 'LIKE', "%$TenSanPham%")
            ->when($MaLoaiSanPham, function ($query) use ($MaLoaiSanPham) {
                $query->where('MaLoaiSanPham', $MaLoaiSanPham);
            })
            ->paginate(10);
    
        return $products;
    }

    public function cat()
    {
        return $this->hasOne(loaisanpham::class, 'MaLoaiSanPham', 'MaLoaiSanPham');
    }

    public function scopeSearch($query) {
        if($key = request() -> key) {
            $query = $query -> where('TenLoaiSanPham', 'like', '%'.$key.'%');
        }
        return $query;
    }

    public function getDetail($MaSanPham) {
        return DB::select('SELECT * FROM sanpham WHERE MaSanPham=?', [$MaSanPham]);
    }

    public function addSP($data){
        DB::insert('INSERT INTO sanpham (MaLoaiSanPham, TenSanPham, AnhDaiDien, Gia, GiaGiam, SoLuong) values(?, ?, ?, ?, ?, ?)',
        $data);
    }

    public function updateSP($data, $MaSanPham) {
        $data[]=$MaSanPham;
        return DB::update('UPDATE sanpham SET MaLoaiSanPham =?, TenSanPham =?, AnhDaiDien =?, Gia =?, GiaGiam =? ,SoLuong =? WHERE MaSanPham =?', 
        $data);
    }

    public function deleteSP($MaSanPham) {
        return DB::delete("DELETE FROM sanpham WHERE MaSanPham=?", [$MaSanPham]);
    }
}
