<?php

namespace App\Http\Controllers;

use App\Models\hoadonnhap;
use App\Models\chitiethoadonnhap;
use App\Models\taikhoan;
use App\Models\nhacungcap;
use App\Models\SanPham;
use Illuminate\Http\Request;

class hoadonnhapController extends Controller
{
    private $hoadonnhap;
    
    public function __construct(){
        $this -> hoadonnhap = new hoadonnhap();
    }

    public function index()
    {   
        $hoadonnhap = new hoadonnhap();
        $hoadonnhapList = $this -> hoadonnhap -> getAllHDN();
        $MaHoaDonNhap = '';
        $MaNhaPhanPhoi = '';
        $id = '';
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        return view('Admin.HoaDonNhap.hoadonnhap', compact('hoadonnhapList', 'catsNCC', 'catsTK', 'MaHoaDonNhap','MaNhaPhanPhoi', 'id'));
    }

    public function inHDN_Admin($MaHoaDonNhap) {
        $hoadonnhap = Hoadonnhap::with('catNCC', 'catTK')->findOrFail($MaHoaDonNhap);

        $data_CTHDN_SP = ChiTietHoaDonNhap::join('sanpham', 'chitiethoadonnhap.MaSanPham', '=', 'sanpham.MaSanPham')
        ->where('chitiethoadonnhap.MaHoaDonNhap', $MaHoaDonNhap)
        ->select('chitiethoadonnhap.*', 'sanpham.*')
        ->get();

        // dd($data_CTHDN_SP, $hoadonnhap);
        
        return view('admin.HoaDonNhap.inHDN', compact('hoadonnhap', 'data_CTHDN_SP'));
    }

    public function searchHDN(Request $request) {
        return view('Admin.TTTaiKhoan');
    }

    public function showDetail($MaHoaDonNhap)
    {
        $title="Chi tiết hóa đơn bán";

        $hoadonnhap = Hoadonnhap::with('catNCC', 'catTK')->findOrFail($MaHoaDonNhap);

        $data_CTHDN_SP = chitiethoadonnhap::join('sanpham', 'chitiethoadonnhap.MaSanPham', '=', 'sanpham.MaSanPham')
        ->where('chitiethoadonnhap.MaHoaDonNhap', $MaHoaDonNhap)
        ->select('chitiethoadonnhap.*', 'sanpham.*')
        ->get();
        
        return view('admin.HoaDonNhap.hdnDetail', compact('title', 'hoadonnhap', 'data_CTHDN_SP'));
    }

    public function create(hoadonnhap $hdn)
    {
        $hoadonnhap = $hdn->items;
        // dd($hdn);
        $title="Thêm hóa đơn nhập";
        $catsNCC = nhacungcap::orderBy('MaNhaPhanPhoi', 'ASC')->select('MaNhaPhanPhoi', 'TenNhaPhanPhoi')->get();
        $catsTK = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        return view('Admin.Hoadonnhap.addHDN', compact('title', 'catsNCC', 'catsTK', 'hoadonnhap', 'hdn'));
    }

    public function deleteHDN_hdn($MaHoaDonNhap) {
        $deleteHDN = hoadonnhap::deletehdn_hdn($MaHoaDonNhap);
        return redirect()->route('admin.hdn-index')->with('msg', 'Xóa đơn hàng nhập và chi tiết đơn hàng nhập thành công');
    }

    public function addToHDN($sanpham, hoadonnhap $hdn) {
        $product = SanPham::where('MaSanPham', $sanpham)->first();
        
        $quantity=request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        // dd($product ,$quantity);
        $hdn -> add($product, $quantity);
        // dd($hdn -> items);
        return redirect()->route('admin.hdn-create')->with('msg', 'Thêm sản phẩm vào hóa đơn nhập thành công');
    }

    public function updateHDN($MaSanPham, hoadonnhap $hdn) {
        $quantity=request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $hdn->updatehdn($MaSanPham, $quantity);
        return redirect()->route('admin.hdn-create');
    }

    public function deleteHDN($MaSanPham, hoadonnhap $hdn) {
        $hdn->deletehdn($MaSanPham);
        return redirect()->route('admin.hdn-create')->with('msg', 'Xóa sản phẩm khỏi hóa đơn nhâp thành công');
    }

    public function clearHDN(hoadonnhap $hdn) {
        $hdn->clearhdn();
        return redirect()->route('admin.hdn-create')->with('msg', 'Xóa toàn bộ sản phẩm khỏi hóa đơn nhâp thành công');
    }

    public function postCreate(Request $request, hoadonnhap $hdn) {
        $request ->validate([
            'MaNhaPhanPhoi' => 'required',
            'MaTaiKhoan' => 'required',
            'KieuThanhToan' => 'required',
        ], [
            'MaNhaPhanPhoi.required' => 'Nhà phân phối bắt buộc phải chọn',
            'MaTaiKhoan.required' => 'Nhân viên nhập bắt buộc phải chọn',
            'KieuThanhToan.required' => 'Kiểu thanh toán bắt buộc phải chọn'
        ]);

        $dlsp = $hdn->items;

        // dd($dlsp[2]);

        $MaNhaPhanPhoi = $request -> MaNhaPhanPhoi;
        $MaTaiKhoan = $request -> MaTaiKhoan;
        $KieuThanhToan = $request -> KieuThanhToan;

        // dd($MaNhaPhanPhoi, $MaTaiKhoan, $KieuThanhToan);

        $hoadonnhap = new hoadonnhap();
        $hoadonnhap->MaNhaPhanPhoi = $MaNhaPhanPhoi;
        $hoadonnhap->MaTaiKhoan = $MaTaiKhoan;
        $hoadonnhap->KieuThanhToan = $KieuThanhToan;
        $hoadonnhap->save();

        
        foreach ($dlsp as $item) {
            $chitiet = new chitiethoadonnhap();
            $chitiet->MaHoaDonNhap = $hoadonnhap->MaHoaDonNhap;
            $chitiet->MaSanPham = $item->MaSanPham;
            $chitiet->SoLuongCTHDN = $item->quantity;
            $chitiet->GiaNhap = $item->GiaGiam * 0.8;
            $chitiet->TongTienCTHDN = $item->quantity * ($item->GiaGiam * 0.8);
            $chitiet->save();
        }

        $hoadonnhap->TongTien = $hoadonnhap->chiTietHoaDonNhap->sum('TongTienCTHDN');
        $hoadonnhap->save();

        return redirect()->route('admin.hdn-index')->with('msg', 'Thêm hóa đơn nhập thành công');
    }
}
