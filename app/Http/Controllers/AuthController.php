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
        $request->validate([
            'TenTaiKhoan' => 'required|min:5|unique:taikhoan',
            'password' => 'required|min:5',
            'MatKhau' => 'required|same:password',
            'Email' => 'required|email|unique:taikhoan',
        ], [
            'TenTaiKhoan.required' => 'Tên tài khoản bắt buộc phải nhập',
            'TenTaiKhoan.min' => 'Tên tài khoản phải có ít nhất 5 ký tự',
            'TenTaiKhoan.unique' => 'Tên tài khoản đã tồn tại trên hệ thống',
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
            'MatKhau.required' => 'Bắt buộc phải nhập lại mật khẩu',
            'MatKhau.same' => 'Nhập lại mật khẩu không trùng khớp',
            'Email.required' => 'Email bắt buộc phải nhập',
            'Email.email' => 'Email không đúng định dạng',
            'Email.unique' => 'Email đã tồn tại trên hệ thống',
        ]);
        $taikhoan = new taikhoan();
 
        $taikhoan->MaLoaiTK = 1;
        $taikhoan->TenTaiKhoan = $request->TenTaiKhoan;
        $taikhoan->password = Hash::make($request->password);
        $taikhoan->MatKhau = $request->MatKhau;
        $taikhoan->Email = $request->Email;
 
        $taikhoan->save();
 
        return redirect()->route('admin.login')->with('msg', 'Đăng ký tài khoản thành công');
    }
 
    public function login()
    {
        return view('Admin.login');
    }
 
    public function loginPost(Request $request)
    {
        $credentials = [
            'TenTaiKhoan' => $request->TenTaiKhoan,
            'password' => $request->password,
        ];

        $remember = true;
 
        // if (Auth::attempt($credentials, $remember, 'taikhoan')) {
        //     // $user = Auth::guard('taikhoan')->user();
        //     // dd($user);
        //     return redirect()->route('admin.tongquan')->with('msg', 'Đăng nhập thành công');
        //     // return view('Admin.TongQuan')->with('success', 'Đăng nhập thành công');
        // }

        if (Auth::guard('taikhoan')->attempt($credentials, true)) {
            $user = Auth::guard('taikhoan')->user();
            // dd($user->MaLoaiTK, $user);
            if ($user->MaLoaiTK == 1) {
                // return redirect()->route('admin.tongquan')->with('msg', 'Đăng nhập thành công');
                if (Auth::attempt($credentials, $remember, 'taikhoan')) {
                    return redirect()->route('admin.tongquan')->with('msg', 'Đăng nhập thành công');
                }
            } elseif ($user->MaLoaiTK == 2 || $user->MaLoaiTK == 3 ) {
                return back()->with('msg', 'Tài khoản của bạn không có quyền truy cập trang admin');
            }
        }
 
        return back()->with('msg', 'Tài khoản hoặc mật khẩu không chính xác');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('admin.login');
    }
}