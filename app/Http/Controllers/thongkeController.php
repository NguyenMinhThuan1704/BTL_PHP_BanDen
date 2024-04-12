<?php

namespace App\Http\Controllers;

use App\Models\thongke;
use App\Models\taikhoan;
use App\Models\nhacungcap;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;

class thongkeController extends Controller
{
    public function index(Request $request)
    {
        $MaNhaPhanPhoi = '';
        $id = '';
        $TenKH = '';
        $ThongKeHDNPaginated = [];
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        $tuNgay = date('Y-m-d');
        $denNgay = date('Y-m-d');
        $tuNgayHDB = date('Y-m-d');
        $denNgayHDB = date('Y-m-d');

        $ThongKeHDN = collect(thongke::thongKeHoaDonNhap(0, 0, $tuNgay, $denNgay));
        $ThongKeHDB = collect(thongke::thongKeHoaDonBan($TenKH, $tuNgayHDB, $denNgayHDB));

        // Sử dụng paginate trên collection đã trả về
        $perPage = 10;
        $page = $request->input('page', 1);

        // Tạo paginator từ collection
        $ThongKeHDNPaginated = new LengthAwarePaginator(
            $ThongKeHDN->forPage($page, $perPage), 
            $ThongKeHDN->count(), // Tổng số lượng phần tử
            $perPage,
            $page, 
            ['path' => $request->url(), 'query' => $request->query()] // URL cho các liên kết trang
        );

        $ThongKeHDBPaginated = new LengthAwarePaginator(
            $ThongKeHDB->forPage($page, $perPage), 
            $ThongKeHDB->count(), // Tổng số lượng phần tử
            $perPage,
            $page, 
            ['path' => $request->url(), 'query' => $request->query()] // URL cho các liên kết trang
        );

        $soLuongTong = 0;
        $tongTienTong = 0;
        $soPhanTu = count($ThongKeHDN);

        foreach ($ThongKeHDN as $item) {
            $soLuongTong += $item->SoLuongCTHDN;
            $tongTienTong += floatval($item->TongTienCTHDN);
        }

        $soLuongTongHDB = 0;
        $tongTienTongHDB = 0;
        $soPhanTuHDB = count($ThongKeHDB);

        foreach ($ThongKeHDB as $item) {
            $soLuongTongHDB += $item->SoLuongCTHDB;
            $tongTienTongHDB += floatval($item->TongGia);
        }

        return view('Admin.ThongKe.ThongKe', 
        compact('catsNCC', 'catsTK', 
        'ThongKeHDNPaginated', 'MaNhaPhanPhoi', 'id', 'tuNgay', 'denNgay', 'soLuongTong', 'tongTienTong', 'soPhanTu', 
        'ThongKeHDBPaginated', 'TenKH', 'tuNgayHDB', 'denNgayHDB', 'soLuongTongHDB', 'tongTienTongHDB', 'soPhanTuHDB',));
    }

    public function thongke(Request $request)
    {
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        
        $MaNhaPhanPhoi = $request->input('MaNhaPhanPhoi');
        $id = $request->input('id');
        $TenKH = $request->input('TenKH');

        $tuNgay = $request->input('tuNgay');
        $denNgay = $request->input('denNgay');
        $tuNgayHDB = $request->input('tuNgayHDB');
        $denNgayHDB = $request->input('denNgayHDB');

        if (!$MaNhaPhanPhoi && !$id && !$TenKH && !$tuNgay && !$denNgay && !$tuNgayHDB && !$denNgayHDB) {
            $MaNhaPhanPhoi = session('MaNhaPhanPhoi');
            $id = session('id');
            $TenKH = session('TenKH');
            $tuNgay = session('tuNgay');
            $denNgay = session('denNgay');
            $tuNgayHDB = session('tuNgayHDB');
            $denNgayHDB = session('denNgayHDB');
        } else {
            $request->session()->put('MaNhaPhanPhoi', $MaNhaPhanPhoi);
            $request->session()->put('id', $id);
            $request->session()->put('TenKH', $TenKH);
            $request->session()->put('tuNgay', $tuNgay);
            $request->session()->put('denNgay', $denNgay);
            $request->session()->put('tuNgayHDB', $tuNgayHDB);
            $request->session()->put('denNgayHDB', $denNgayHDB);
        }

        if ($MaNhaPhanPhoi === null) {
            $MaNhaPhanPhoi = 0;
        }
        
        if ($id === null) {
            $id = 0;
        }

        if ($TenKH === null) {
            $TenKH = '';
        }

        $ThongKeHDN = collect(thongke::thongKeHoaDonNhap($id, $MaNhaPhanPhoi, $tuNgay, $denNgay));
        $ThongKeHDB = collect(thongke::thongKeHoaDonBan($TenKH, $tuNgayHDB, $denNgayHDB));

        // Sử dụng paginate trên collection đã trả về
        $perPage = 10;
        $page = $request->input('page', 1);

        // Tạo paginator từ collection
        $ThongKeHDNPaginated = new LengthAwarePaginator(
            $ThongKeHDN->forPage($page, $perPage), 
            $ThongKeHDN->count(), // Tổng số lượng phần tử
            $perPage, // Số lượng phần tử trên mỗi trang
            $page, // Trang hiện tại
            ['path' => $request->url(), 'query' => $request->query()] // URL cho các liên kết trang
        );

        $ThongKeHDBPaginated = new LengthAwarePaginator(
            $ThongKeHDB->forPage($page, $perPage), 
            $ThongKeHDB->count(), // Tổng số lượng phần tử
            $perPage, // Số lượng phần tử trên mỗi trang
            $page, // Trang hiện tại
            ['path' => $request->url(), 'query' => $request->query()] // URL cho các liên kết trang
        );

        $soLuongTong = 0;
        $tongTienTong = 0;
        $soPhanTu = count($ThongKeHDN);

        foreach ($ThongKeHDN as $item) {
            $soLuongTong += $item->SoLuongCTHDN;
            $tongTienTong += floatval($item->TongTienCTHDN);
        }

        $soLuongTongHDB = 0;
        $tongTienTongHDB = 0;
        $soPhanTuHDB = count($ThongKeHDB);

        foreach ($ThongKeHDB as $item) {
            $soLuongTongHDB += $item->SoLuongCTHDB;
            $tongTienTongHDB += floatval($item->TongGia);
        }

        // dd($ThongKeHDN, $soLuongTong, $tongTienTong, $soPhanTu);
        return view('Admin.ThongKe.ThongKe', 
        compact('catsNCC', 'catsTK', 
        'ThongKeHDNPaginated', 'MaNhaPhanPhoi', 'id', 'tuNgay', 'denNgay', 'soLuongTong', 'tongTienTong', 'soPhanTu', 
        'ThongKeHDBPaginated', 'TenKH', 'tuNgayHDB', 'denNgayHDB', 'soLuongTongHDB', 'tongTienTongHDB', 'soPhanTuHDB',));
    }
}
