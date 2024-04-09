<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class duanthuchien extends Model
{
    use HasFactory;
    protected $table = 'duanthuchien';

    public function gettAllDATH(){
        return DB::table('duanthuchien')->paginate(10); 
    } 

    public function getDetail($MaDuAn) {
        return DB::select('SELECT * FROM duanthuchien WHERE MaDuAn=?', [$MaDuAn]);
    }

    public function searchDATH($TieuDe, $MoTa){
        return $search = duanthuchien::query()
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

    public function addDATH($data){
        DB::insert('INSERT INTO duanthuchien (TieuDe, AnhDaiDien, MoTa) values(?, ?, ?)', 
        $data);
    }

    public function updateDATH($data, $MaDuAn) {
        $data[]=$MaDuAn;
        return DB::update('UPDATE duanthuchien SET TieuDe =?, AnhDaiDien =?, MoTa =? WHERE MaDuAn =?', 
        $data);
    }

    public function deleteDATH($MaDuAn) {
        return DB::delete("DELETE FROM duanthuchien WHERE MaDuAn=?", [$MaDuAn]);
    }
}
