<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class khachhang extends Model
{
    use HasFactory;

    protected $table = 'khachhang';

    // public function gettAllKH(){
    //     $khachhang = DB::select('select * from khachhang');
    //     return  $khachhang;
    // }

    public function gettAllKH(){
        return DB::table('khachhang')->paginate(10); 
    }

    public function searchKH($TenKH, $DiaChi){
        return $search = khachhang::query()
            ->where(function($query) use ($TenKH, $DiaChi) {
                $query->where(function($query) use ($TenKH) {
                    if (!empty($TenKH)) {
                        $query->where('TenKH', 'LIKE', "%$TenKH%");
                    }
                })
                ->Where(function($query) use ($DiaChi) {
                    if (!empty($DiaChi)) {
                        $query->where('DiaChi', 'LIKE', "%$DiaChi%");
                    }
                });
            })
        ->paginate(10);
    }

    public function addKH($data){
        DB::insert('INSERT INTO khachhang (TenKH, DiaChi, SDT, Email) values(?, ?, ?, ?)', 
        $data);
    }

    public function getDetail($MaKH) {
        return DB::select('SELECT * FROM khachhang WHERE MaKH=?', [$MaKH]);
    }

    public function updateKH($data, $MaKH) {
        $data[]=$MaKH;
        return DB::update('UPDATE khachhang SET TenKH =?, DiaChi=?, SDT=?, Email=? WHERE MaKH =?', 
        $data);
    }

    public function deleteKH($MaKH) {
        return DB::delete("DELETE FROM khachhang WHERE MaKH=?", [$MaKH]);
    }
}
