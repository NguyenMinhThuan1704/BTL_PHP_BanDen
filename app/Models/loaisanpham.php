<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;



class loaisanpham extends Model
{
    use HasFactory;

    protected $table='loaisanpham';

    // protected $fillable = ['TenLoaiSanPham', 'NoiDung'];

    // public function gettAllLSP(){
    //     $product = DB::select('select * from loaisanpham');
    //     return  $product;
    // }

    public function gettAllLSP(){
        return DB::table('loaisanpham')->paginate(10); 
    }

    public function searchLSP($TenLoaiSanPham, $NoiDung){
        return $search = loaisanpham::query()
            ->where(function($query) use ($TenLoaiSanPham, $NoiDung) {
                $query->where(function($query) use ($TenLoaiSanPham) {
                    if (!empty($TenLoaiSanPham)) {
                        $query->where('TenLoaiSanPham', 'LIKE', "%$TenLoaiSanPham%");
                    }
                })
                ->Where(function($query) use ($NoiDung) {
                    if (!empty($NoiDung)) {
                        $query->where('NoiDung', 'LIKE', "%$NoiDung%");
                    }
                });
            })
        ->paginate(10);
    }

    public function addLSP($data){
        DB::insert('INSERT INTO loaisanpham (TenLoaiSanPham, NoiDung) values(?, ?)', 
        $data);
    }

    public function getDetail($MaLoaiSanPham) {
        return DB::select('SELECT * FROM loaisanpham WHERE MaLoaiSanPham=?', [$MaLoaiSanPham]);
    }

    public function updateLSP($data, $MaLoaiSanPham) {
        $data[]=$MaLoaiSanPham;
        // $data=array_merge($data,[$id]);
        return DB::update('UPDATE loaisanpham SET TenLoaiSanPham =?, NoiDung =? WHERE MaLoaiSanPham =?', 
        $data);
    }

    public function deleteLSP($MaLoaiSanPham) {
        return DB::delete("DELETE FROM loaisanpham WHERE MaLoaiSanPham=?", [$MaLoaiSanPham]);
    }

    public function statementLSP($sql) {
        return DB::statement($sql);
    }
}
