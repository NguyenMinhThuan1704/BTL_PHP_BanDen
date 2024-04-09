<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class nhacungcap extends Model
{
    use HasFactory;

    protected $table='nhaphanphoi';

    public function gettAllNCC(){
        return DB::table('nhaphanphoi')->paginate(10); 
    }

    public function searchNCC($TenNhaPhanPhoi, $DiaChi){
        return $search = nhacungcap::query()
            ->where(function($query) use ($TenNhaPhanPhoi, $DiaChi) {
                $query->where(function($query) use ($TenNhaPhanPhoi) {
                    if (!empty($TenNhaPhanPhoi)) {
                        $query->where('TenNhaPhanPhoi', 'LIKE', "%$TenNhaPhanPhoi%");
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

    public function addNCC($data){
        DB::insert('INSERT INTO nhaphanphoi (TenNhaPhanPhoi, DiaChi, SoDienThoai, MoTa) values(?, ?, ?, ?)', 
        $data);
    }

    public function getDetail($MaNhaPhanPhoi) {
        return DB::select('SELECT * FROM nhaphanphoi WHERE MaNhaPhanPhoi=?', [$MaNhaPhanPhoi]);
    }

    public function updateNCC($data, $MaNhaPhanPhoi) {
        $data[]=$MaNhaPhanPhoi;
        // $data=array_merge($data,[$id]);
        return DB::update('UPDATE nhaphanphoi SET TenNhaPhanPhoi =?, DiaChi =?, SoDienThoai =?, MoTa =? WHERE MaNhaPhanPhoi =?', 
        $data);
    }

    public function deleteNCC($MaNhaPhanPhoi) {
        return DB::delete("DELETE FROM nhaphanphoi WHERE MaNhaPhanPhoi=?", [$MaNhaPhanPhoi]);
    }
}
