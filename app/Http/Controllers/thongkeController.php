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
    public function index()
    {
        $MaNhaPhanPhoi = '';
        $id = '';
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        // dd($catsNCC, $catsTK);
        return view('Admin.ThongKe.ThongKe', compact('catsNCC', 'catsTK', 'MaNhaPhanPhoi', 'id'));
    }

    public function thongkeHDN(Request $request)
    {
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        $MaNhaPhanPhoi = $request->input('MaNhaPhanPhoi');
        $id = $request->input('id');

        $tuNgay = $request->input('tuNgay');
        $denNgay = $request->input('denNgay');

        $tuNgayDateTime = date_create_from_format('Y-m-d H:i:s', $tuNgay);
        $denNgayDateTime = date_create_from_format('Y-m-d H:i:s', $denNgay);

        // Kiểm tra và điều chỉnh giá trị của giờ nếu vượt quá 12 giờ
        if ($tuNgayDateTime && $tuNgayDateTime->format('H') >= 12) {
            $tuNgayDateTime->modify('-12 hours');
        }
        if ($denNgayDateTime && $denNgayDateTime->format('H') >= 12) {
            $denNgayDateTime->modify('-12 hours');
        }

        $tuNgay = $tuNgayDateTime ? $tuNgayDateTime->format('Y-m-d H:i:s') : null;
        $denNgay = $denNgayDateTime ? $denNgayDateTime->format('Y-m-d H:i:s') : null;

        if (!$MaNhaPhanPhoi && !$id) {
            $MaNhaPhanPhoi = session('MaNhaPhanPhoi');
            $id = session('id');
        } else {
            $request->session()->put('MaNhaPhanPhoi', $MaNhaPhanPhoi);
            $request->session()->put('id', $id);
        }

        $ThongKeHDN = collect(thongke::thongKeHoaDonNhap($id, $MaNhaPhanPhoi, $tuNgay, $denNgay));

        // Sử dụng paginate trên collection đã trả về
        $perPage = 10; // Số lượng phần tử trên mỗi trang
        $page = $request->input('page', 1); // Trang hiện tại, mặc định là trang 1

        // Tạo paginator từ collection
        $ThongKeHDNPaginated = new LengthAwarePaginator(
            $ThongKeHDN->forPage($page, $perPage), // Dữ liệu của trang hiện tại
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
        compact('catsNCC', 'catsTK', 'MaNhaPhanPhoi', 'id', 'ThongKeHDNPaginated', 'soLuongTong', 'tongTienTong', 'soPhanTu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(thongke $thongke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(thongke $thongke)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, thongke $thongke)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(thongke $thongke)
    {
        //
    }
}
