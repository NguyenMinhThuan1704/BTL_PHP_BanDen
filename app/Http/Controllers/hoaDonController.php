<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\sanpham;
use Illuminate\Support\Facades\Session;
class HoaDonController extends Controller
{
    private $hoadon;
    
    public function __construct(){
        $this -> hoadon = new hoadon();
    }

    public function index()
    {
        $hoadon = new hoadon();
        $MaHoaDon = '';
        $TenKH = '';
        $hoadonList = $this -> hoadon -> getAllHDB();
        return view('Admin.HoaDonBan.hoadonban', compact('hoadonList', 'MaHoaDon', 'TenKH'));
    }

    public function showDetail($MaHoaDon)
    {
        $title="Chi tiết hóa đơn bán";

        $hoadon = HoaDon::findOrFail($MaHoaDon);

        $data_CTHD_SP = ChiTietHoaDon::join('sanpham', 'chitiethoadon.MaSanPham', '=', 'sanpham.MaSanPham')
        ->where('chitiethoadon.MaHoaDon', $MaHoaDon)
        ->select('chitiethoadon.*', 'sanpham.*')
        ->get();
        
        return view('admin.HoaDonBan.hdbDetail', compact('title', 'hoadon', 'data_CTHD_SP'));
    }

    public function inHDB_Admin($MaHoaDon) {
        $hoadon = HoaDon::findOrFail($MaHoaDon);

        $data_CTHD_SP = ChiTietHoaDon::join('sanpham', 'chitiethoadon.MaSanPham', '=', 'sanpham.MaSanPham')
        ->where('chitiethoadon.MaHoaDon', $MaHoaDon)
        ->select('chitiethoadon.*', 'sanpham.*')
        ->get();

        // dd($data_CTHD_SP);
        
        return view('admin.HoaDonBan.inHDB', compact('hoadon', 'data_CTHD_SP'));
    }

    public function inHDB_User(HoaDon $hoadon) {
        $mahd = $hoadon->MaHoaDon;

        $data_CTHD_SP = ChiTietHoaDon::join('sanpham', 'chitiethoadon.MaSanPham', '=', 'sanpham.MaSanPham')
        ->where('chitiethoadon.MaHoaDon', $mahd)
        ->select('chitiethoadon.*', 'sanpham.*')
        ->get();
        
        // dd($hoadon ,$data_CTHD_SP);
        
        return view('User.inHDB', compact('hoadon', 'data_CTHD_SP'));
    }

    public function search(Request $request)
    {
        $MaHoaDon = $request->input('MaHoaDon');
        $TenKH = $request->input('TenKH');
    
        $hoadonList = $this->hoadon->searchHDB($MaHoaDon, $TenKH);
        return view('Admin.HoaDonban.hoadonban', compact('hoadonList', 'MaHoaDon', 'TenKH'));
    }

    public function postCreate(Request $request) {
        // dd($request);
        // dd(session('user_id'));

        if (Session::has('user_id')) {
            // dd(session('user_id'));
            $request ->validate([
                'TenKH' => 'required|min:5',
                'DiaChi' => 'required|min:5',
                'SDT' => 'required|numeric|digits:10',
                'Email' => 'required|email',
            ], [
                'TenKH.required' => 'Tên khách hàng bắt buộc phải nhập',
                'TenKH.min' => 'Tên khách hàng phải có ít nhất 5 ký tự',
                'DiaChi.required' => 'Địa chỉ khách hàng bắt buộc phải nhập',
                'DiaChi.min' => 'Địa chỉ khách hàng phải có ít nhất 5 ký tự',
                'SDT.required' => 'Số điện thoại khách hàng bắt buộc phải nhập',
                'SDT.numeric' => 'Số điện thoại khách hàng phải là số',
                'SDT.digits' => 'Số điện thoại khách hàng phải có đúng 10 chữ số',
                'Email.required' => 'Email khách hàng bắt buộc phải nhập',
                'Email.email' => 'Email khách hàng không đúng định dạng'
            ]);
            $tenKH = $request->input('TenKH');
            $diaChi = $request->input('DiaChi');
            $sdt = $request->input('SDT');
            $email = $request->input('Email');

            $hoadon = new HoaDon();
            $hoadon->TenKH = $tenKH;
            $hoadon->DiaChi = $diaChi;
            $hoadon->SDT = $sdt;
            $hoadon->Email = $email;
            $hoadon->TrangThai = true;
            $hoadon->save();

            $giohang = $request->session()->get('giohang');

            foreach ($giohang as $item) {
                $chitiet = new ChiTietHoaDon();
                $chitiet->MaHoaDon = $hoadon->MaHoaDon;
                $chitiet->MaSanPham = $item->MaSanPham;
                $chitiet->SoLuongCTHDB = $item->quantity;
                $chitiet->GiaCTHDB = $item->GiaGiam;
                $chitiet->TongGia = $item->quantity * $item->GiaGiam;
                $chitiet->save();
            }

            $hoadon->TongGia = $hoadon->chiTietHoaDons->sum('TongGia');
            $hoadon->save();

            session(['cart' =>  null]);
            
            return redirect()->route('admin.hdb-inHDB-user', ['hoadon' => $hoadon->MaHoaDon])->with([
                'msg' => 'Đặt hàng thành công',
                'data' => compact('hoadon'),
            ]);
        } else {
            return redirect()->route('user.login')->with('msg', 'Cần đăng nhập trước khi đặt hàng!');;
        }
        
    }

    public function deleteHDB($MaHoaDon) {
        $deleteHDB = hoadon::deleteHDB($MaHoaDon);
        return redirect()->route('admin.hdb-index')->with('msg', 'Xóa đơn hàng và chi tiết đơn hàng thành công');
    }
}
