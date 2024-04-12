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
        $ThongKeHDNPaginated = [];
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        $tuNgay = date('Y-m-d 00:00:00');
        $denNgay = date('Y-m-d 23:59:59');

        $ThongKeHDN = collect(thongke::thongKeHoaDonNhap(0, 0, $tuNgay, $denNgay));

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

        $soLuongTong = 0;
        $tongTienTong = 0;
        $soPhanTu = count($ThongKeHDN);

        foreach ($ThongKeHDN as $item) {
            $soLuongTong += $item->SoLuongCTHDN;
            $tongTienTong += floatval($item->TongTienCTHDN);
        }

        return view('Admin.ThongKe.ThongKe', 
        compact('ThongKeHDNPaginated', 'catsNCC', 'catsTK', 'tuNgay', 'denNgay', 'MaNhaPhanPhoi', 'id', 'soLuongTong', 'tongTienTong', 'soPhanTu'));
    }

    public function thongkeHDN(Request $request)
    {
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        
        $MaNhaPhanPhoi = $request->input('MaNhaPhanPhoi');
        $id = $request->input('id');

        $tuNgay = $request->input('tuNgay');
        $denNgay = $request->input('denNgay');

        if (!$MaNhaPhanPhoi && !$id && !$tuNgay && !$denNgay) {
            $MaNhaPhanPhoi = session('MaNhaPhanPhoi');
            $id = session('id');
            $tuNgay = session('tuNgay');
            $denNgay = session('denNgay');
        } else {
            $request->session()->put('MaNhaPhanPhoi', $MaNhaPhanPhoi);
            $request->session()->put('id', $id);
            $request->session()->put('tuNgay', $tuNgay);
            $request->session()->put('denNgay', $denNgay);
        }

        if ($MaNhaPhanPhoi === null) {
            $MaNhaPhanPhoi = 0;
        }
        
        if ($id === null) {
            $id = 0;
        }

        $ThongKeHDN = collect(thongke::thongKeHoaDonNhap($id, $MaNhaPhanPhoi, $tuNgay, $denNgay));

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

        $soLuongTong = 0;
        $tongTienTong = 0;
        $soPhanTu = count($ThongKeHDN);

        foreach ($ThongKeHDN as $item) {
            $soLuongTong += $item->SoLuongCTHDN;
            $tongTienTong += floatval($item->TongTienCTHDN);
        }

        // dd($ThongKeHDN, $soLuongTong, $tongTienTong, $soPhanTu);
        return view('Admin.ThongKe.ThongKe', 
        compact('catsNCC', 'catsTK', 'MaNhaPhanPhoi', 'id', 'tuNgay', 'denNgay', 'ThongKeHDNPaginated', 'soLuongTong', 'tongTienTong', 'soPhanTu'));
    }
}
