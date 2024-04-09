<?php

namespace App\Http\Controllers;

use App\Models\userLogin;
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


class userLoginController extends Controller
{
    public function login() {
        return view('user.login');
    }

    public function processLogin(Request $request) {
        $username = $request->input('TenTaiKhoan');
        $password = $request->input('MatKhau');
        
        $user = userLogin::where('TenTaiKhoan', $username)->where('MatKhau', $password)->first();

        if ($user) {
            if ($user->MaLoaiTK == 1 || $user->MaLoaiTK == 2) {
                return redirect()->route('admin.tongquan')->with('msg', 'Chào mừng bạn đến với trang admin');
            } elseif ($user->MaLoaiTK == 3) {
                return redirect()->route('user.index')->with('msg', 'Chào mừng bạn đến với trang người dùng');
            }
        }

        return Redirect::back()->with('msg', 'Tên đăng nhập hoặc mật khẩu không chính xác!');
    }

    public function register(Request $request) {
        $request->validate([
            'MaLoaiTK' => 'required',
            'TenTaiKhoan' => 'required|min:5|unique:taikhoan',
            'MatKhau' => 'required|min:5',
            'confirm_MatKhau' => 'required|same:MatKhau',
            'Email' => 'required|email|unique:taikhoan',
        ], [
            'MaLoaiTK.required' => 'Loại tài khoản bắt buộc phải chọn',
            'TenTaiKhoan.required' => 'Tên tài khoản bắt buộc phải nhập',
            'TenTaiKhoan.min' => 'Tên tài khoản phải có ít nhất 5 ký tự',
            'TenTaiKhoan.unique' => 'Tên tài khoản đã tồn tại trên hệ thống',
            'MatKhau.required' => 'Mật khẩu bắt buộc phải nhập',
            'MatKhau.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
            'confirm_MatKhau.required' => 'Bắt buộc phải nhập lại mật khẩu',
            'confirm_MatKhau.same' => 'Nhập lại mật khẩu không trùng khớp',
            'Email.required' => 'Email bắt buộc phải nhập',
            'Email.email' => 'Email không đúng định dạng',
            'Email.unique' => 'Email đã tồn tại trên hệ thống',
        ]);

        $dataInsert = [
            'MaLoaiTK' => $request->MaLoaiTK,
            'TenTaiKhoan' => $request->TenTaiKhoan,
            // 'MatKhau' => Hash::make($request->MatKhau),
            'MatKhau' => $request->MatKhau,
            'Email' => $request->Email,
        ];
        
        TaiKhoan::create($dataInsert);
    
        return redirect()->route('user.login')->with('msg', 'Đăng ký tài khoản thành công');
    }
}
