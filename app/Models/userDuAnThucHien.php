<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userDuAnThucHien extends Model
{
    use HasFactory;

    public function getDuAnThucHien(){
        return DB::table('duanthuchien')->paginate(12); 
    }
}
