<?php

namespace App\Http\Controllers;

use App\Models\userDuAnThucHien;
use Illuminate\Http\Request;

class userDuAnThucHienController extends Controller
{
    public function duanthuchien() {
        $modelDuAnThucHien = new userDuAnThucHien();
        $DuAnThucHien = $modelDuAnThucHien->getDuAnThucHien();
        return view('User.duanthuchien',compact('DuAnThucHien'));
    }
}
