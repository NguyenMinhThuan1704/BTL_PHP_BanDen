<?php

namespace App\Http\Controllers;

use App\Models\userTinTuc;
use Illuminate\Http\Request;

class userTinTucController extends Controller
{
    public function tintuc() {

        $modelTinTuc = new userTinTuc();
        $TinTuc = $modelTinTuc->getTinTuc();
        return view('User.tintuc',compact('TinTuc'));
    }
}
