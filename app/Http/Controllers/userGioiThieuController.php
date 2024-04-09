<?php

namespace App\Http\Controllers;

use App\Models\userGioiThieu;
use Illuminate\Http\Request;

class userGioiThieuController extends Controller
{
    public function gioithieu() {
        $modelGioiThieu = new userGioiThieu();
        return view('User.gioithieu');
    }
}
