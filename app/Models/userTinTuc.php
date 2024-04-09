<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userTinTuc extends Model
{
    use HasFactory;

    public function getTinTuc(){
        return DB::table('tintuc')->paginate(12); 
    }

}
