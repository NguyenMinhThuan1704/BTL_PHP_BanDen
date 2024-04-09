<?php

namespace App\Http\Controllers;

use App\Models\userDenNoiThat;
use Illuminate\Http\Request;

class userDenNoiThatController extends Controller
{
    public function dennoithat() {
        $modelDenNoiThat = new userDenNoiThat();
        return view('User.dennoithat');
    }
}
