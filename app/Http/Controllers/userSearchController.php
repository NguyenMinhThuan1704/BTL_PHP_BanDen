<?php

namespace App\Http\Controllers;

use App\Models\userSearch;
use Illuminate\Http\Request;
use DB;

class userSearchController extends Controller
{
    public function search(Request $request) {

        $searchTerm = $request->input('search');
        
        $resultSearch = DB::table('sanpham')
        ->where('TenSanPham', 'like', '%' . $searchTerm . '%')
        ->paginate(12);


        return view('User.search', compact( 'searchTerm', 'resultSearch'));
    }
}
