<?php

namespace App\Http\Controllers;

use App\Models\userKhuyenMai;
use Illuminate\Http\Request;

class userKhuyenMaiController extends Controller
{
    public function khuyenmai() {
        $modelKhuyenMai = new userKhuyenMai();
        return view('User.khuyenmai');
    }
}
