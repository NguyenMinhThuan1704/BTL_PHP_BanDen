<?php
 
namespace App\Http\Controllers;
 
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthController extends Controller
{
    public function register()
    {
        return view('Admin.register');
    }
 
    public function registerPost(Request $request)
    {
        $taikhoan = new taikhoan();
 
        $taikhoan->MaLoaiTK = 1;
        $taikhoan->TenTaiKhoan = $request->TenTaiKhoan;
        $taikhoan->password = Hash::make($request->password);
        $taikhoan->Email = $request->Email;
 
        $taikhoan->save();
 
        return redirect()->route('admin.login')->with('success', 'Đăng ký tài khoản thành công');
    }
 
    public function login()
    {
        return view('Admin.login');
    }
 
    public function loginPost(Request $request)
    {
        $credetials = [
            'TenTaiKhoan' => $request->TenTaiKhoan,
            'password' => $request->password,
        ];

        $remember = true;
 
        if (Auth::attempt($credetials, $remember, 'taikhoan')) {
            return redirect()->route('admin.tongquan')->with('success', 'Đăng nhập thành công');
            // return view('Admin.TongQuan')->with('success', 'Đăng nhập thành công');
        }
 
        return back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('admin.login');
    }
}