<?php

namespace App\Http\Controllers;

use App\Models\userLienHe;
use Illuminate\Http\Request;

class userLienHeController extends Controller
{
    public function lienhe() {
        $modelLienHe = new userLienHe();
        return view('User.lienhe');
    }
}
