<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class tintuc extends Model
{
    use HasFactory;
    protected $table = 'tintuc';

    // public function gettAllTT(){
    //     $tintuc = DB::select('select * from tintuc');
    //     return  $tintuc;
    // }

    public function gettAllTT(){
        return DB::table('tintuc')->paginate(10); 
    } 

    public function searchTT($TieuDe, $MoTa){
        return $search = tintuc::query()
            ->where(function($query) use ($TieuDe, $MoTa) {
                $query->where(function($query) use ($TieuDe) {
                    if (!empty($TieuDe)) {
                        $query->where('TieuDe', 'LIKE', "%$TieuDe%");
                    }
                })
                ->Where(function($query) use ($MoTa) {
                    if (!empty($MoTa)) {
                        $query->where('MoTa', 'LIKE', "%$MoTa%");
                    }
                });
            })
        ->paginate(10);
    }

    public function getDetail($MaTinTuc) {
        return DB::select('SELECT * FROM tintuc WHERE MaTinTuc=?', [$MaTinTuc]);
    }

    public function addTT($data){
        DB::insert('INSERT INTO tintuc (TieuDe, AnhDaiDien, MoTa) values(?, ?, ?)', 
        $data);
    }

    public function updateTT($data, $MaTinTuc) {
        $data[]=$MaTinTuc;
        return DB::update('UPDATE tintuc SET TieuDe =?, AnhDaiDien =?, MoTa =? WHERE MaTinTuc =?', 
        $data);
    }

    public function deleteTT($MaTinTuc) {
        return DB::delete("DELETE FROM tintuc WHERE MaTinTuc=?", [$MaTinTuc]);
    }

}
