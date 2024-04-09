<?php

namespace App\Http\Controllers;

use App\Models\tongquan;
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class tongquanController extends Controller
{
    public function index()
    {
        $doanhthungay = TongQuan::getDoanhThuNgay();
        $doanhthutuan = TongQuan::getDoanhThuTuan();
        $doanhthuthang = TongQuan::getDoanhThuThang();
        $doanhthunam = TongQuan::getDoanhThuNam();

        $sanPhamBanChayNhat = TongQuan::laySanPhamTheoChucNang(1);
        $sanPhamMoiNhat = TongQuan::laySanPhamTheoChucNang(4);
        return view('Admin.TongQuan', compact('doanhthungay', 'doanhthutuan', 'doanhthuthang', 'doanhthunam', 'sanPhamBanChayNhat', 'sanPhamMoiNhat'));
    }

    // public function login() {
    //     return view('Admin.login');
    // }

    // public function check_login() {
    //     request()->validate([
    //         'TenTaiKhoan' => 'required|exists:taikhoan',
    //         'password' => 'required',
    //     ]);

    //     $data = request() -> all('TenTaiKhoan', 'password');
    //     // dd($data);
    //     // $as = auth()->attempt($data, true, 'taikhoan');
    //     // dd($as);

    //     if(auth()->attempt($data, true, 'taikhoan')){
    //         return redirect()->route('admin.tongquan');
    //     } else {
    //         return redirect()->back()->with('msg', 'Tên đăng nhập hoặc mật khẩu không chính xác!');
    //     }

    //     return redirect()->back();
    // }

    // public function register() {
    //     return view('Admin.register');
    // }

    // public function check_register(Request $request) {
    //     $request->validate([
    //         'MaLoaiTK' => 'required',
    //         'TenTaiKhoan' => 'required|min:5|unique:taikhoan',
    //         'MatKhau' => 'required|min:5',
    //         'confirm_MatKhau' => 'required|same:MatKhau',
    //         'Email' => 'required|email|unique:taikhoan',
    //     ], [
    //         'MaLoaiTK.required' => 'Loại tài khoản bắt buộc phải chọn',
    //         'TenTaiKhoan.required' => 'Tên tài khoản bắt buộc phải nhập',
    //         'TenTaiKhoan.min' => 'Tên tài khoản phải có ít nhất 5 ký tự',
    //         'TenTaiKhoan.unique' => 'Tên tài khoản đã tồn tại trên hệ thống',
    //         'MatKhau.required' => 'Mật khẩu bắt buộc phải nhập',
    //         'MatKhau.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
    //         'confirm_MatKhau.required' => 'Bắt buộc phải nhập lại mật khẩu',
    //         'confirm_MatKhau.same' => 'Nhập lại mật khẩu không trùng khớp',
    //         'Email.required' => 'Email bắt buộc phải nhập',
    //         'Email.email' => 'Email không đúng định dạng',
    //         'Email.unique' => 'Email đã tồn tại trên hệ thống',
    //     ]);
    
    //     // $hashedPassword = bcrypt($request->MatKhau);
    
    //     // $dataInsert = [
    //     //     'MaLoaiTK' => $request->MaLoaiTK,
    //     //     'TenTaiKhoan' => $request->TenTaiKhoan,
    //     //     'MatKhau' => $hashedPassword, // Sử dụng mật khẩu đã mã hóa
    //     //     'Email' => $request->Email,
    //     // ];

    //     $dataInsert = [
    //         'MaLoaiTK' => $request->MaLoaiTK,
    //         'TenTaiKhoan' => $request->TenTaiKhoan,
    //         'MatKhau' => Hash::make($request->MatKhau),
    //         'Email' => $request->Email,
    //     ];
        
    
    //     TaiKhoan::create($dataInsert);
    
    //     return redirect()->route('admin.login')->with('msg', 'Đăng ký tài khoản thành công');
    // }

}
