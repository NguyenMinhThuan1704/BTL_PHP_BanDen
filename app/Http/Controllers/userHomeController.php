<?php

namespace App\Http\Controllers;

use App\Models\userHome;
use Illuminate\Http\Request;

class userHomeController extends Controller
{

    public function index()
    {
        $modelHome = new userHome();

        $sanPhamBanChayNhat = $modelHome->laySanPhamTheoChucNang(5);

        $DenChum = $modelHome->getDen(2);
        $DenMam = $modelHome->getDen(3);
        $DenTha = $modelHome->getDen(4);
        $DenTuong = $modelHome->getDen(5);
        $DenChuyenDung = $modelHome->getDen(6);
        $DenSoi = $modelHome->getDen(7);
        $DenLed = $modelHome->getDen(8);
        $DenNgoaiThat = $modelHome->getDen(9);
        $DenNangLuong = $modelHome->getDen(10);
        $BongDenPhuKien = $modelHome->getDen(11);
        $DenThanhLy = $modelHome->getDen(12);
        
        return view('User.index_main', compact(
            'sanPhamBanChayNhat',
            'DenChum',
            'DenMam',
            'DenTha',
            'DenTuong',
            'DenChuyenDung',
            'DenSoi',
            'DenLed',
            'DenNgoaiThat',
            'DenNangLuong',
            'BongDenPhuKien',
            'DenThanhLy'
        ));
    }
}
