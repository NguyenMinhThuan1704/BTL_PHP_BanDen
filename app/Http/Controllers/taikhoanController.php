<?php

namespace App\Http\Controllers;

use App\Models\taikhoan;
use App\Models\loaitaikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class taikhoanController extends Controller
{
    private $taikhoan;
    protected $fillable = [
        'id', 
        'MaLoaiTK',
        'TenTaiKhoan',
        'password',
        'Email',
    ];

    public function __construct(){
        $this -> taikhoan = new taikhoan();
    }

    public function index()
    {
        $cats = loaitaikhoan::orderBy('MaLoaiTK', 'ASC')->select('MaLoaiTK', 'TenLoaiTK')->get();
        $TenTaiKhoan = '';
        $MaLoaiTK = '';
        
        $taikhoanList = taikhoan::orderBy('id', 'ASC') -> search() -> paginate(10);
        // Giải mã mật khẩu từ mỗi dòng dữ liệu
        // foreach ($taikhoanList as $taikhoan) {
        //     $taikhoan->decrypted_password = Crypt::decryptString($taikhoan->password);
        // }
        return view('Admin.TaiKhoan.taikhoan', compact('taikhoanList', 'cats', 'TenTaiKhoan', 'MaLoaiTK'));
    }

    public function search(Request $request)
    {
        $cats = loaitaikhoan::orderBy('MaLoaiTK', 'ASC')->select('MaLoaiTK', 'TenLoaiTK')->get();
        $TenTaiKhoan = $request->input('TenTaiKhoan');
        $MaLoaiTK = $request->input('MaLoaiTK');

        if (!$TenTaiKhoan && !$MaLoaiTK) {
            $TenTaiKhoan = session('TenTaiKhoan');
            $MaLoaiTK = session('MaLoaiTK');
        } else {
            $request->session()->put('TenTaiKhoan', $TenTaiKhoan);
            $request->session()->put('MaLoaiTK', $MaLoaiTK);
        }

        $taikhoanList = $this->taikhoan->searchTK($TenTaiKhoan, $MaLoaiTK);

        return view('Admin.TaiKhoan.taikhoan', compact('taikhoanList', 'cats', 'TenTaiKhoan', 'MaLoaiTK'));
    }

    public function create()
    {
        $title="Thêm tài khoản";

        $cats = loaitaikhoan::orderBy('MaLoaiTK', 'ASC')->select('MaLoaiTK', 'TenLoaiTK')->get();

        return view('Admin.TaiKhoan.addTK', compact('title', 'cats'));
    }

    public function postCreate(Request $request) {
        $request ->validate([
            'MaLoaiTK' => 'required',
            'TenTaiKhoan' => 'required|min:5|unique:taikhoan',
            'password' => 'required|min:5',
            'Email' => 'required|email',
        ], [
            'MaLoaiTK.required' => 'Loại tài khoản bắt buộc phải chọn',
            'TenTaiKhoan.required' => 'Tên tài khoản bắt buộc phải nhập',
            'TenTaiKhoan.min' => 'Tên tài khoản phải có ít nhất 5 ký tự',
            'TenTaiKhoan.unique' => 'Tên tài khoản đã tồn tại trên hệ thống',
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
            'Email.required' => 'Email bắt buộc phải nhập',
            'Email.email' => 'Email không đúng định dạng'
        ]);

        $dataInsert = [
            $request -> MaLoaiTK,
            $request -> TenTaiKhoan,
            $request -> password,
            $request -> Email,
        ];

        $this->taikhoan->addTK($dataInsert);

        return redirect()->route('admin.tk-index')->with('msg', 'Thêm tài khoản thành công');
    }

    public function getEdit(Request $request, $id = 0) {
        $title = "Cập nhật tài khoản";

        $cats = loaitaikhoan::orderBy('MaLoaiTK', 'ASC')->select('MaLoaiTK', 'TenLoaiTK')->get();
        
        if (!empty($id)) {
            $tkDetail = $this->taikhoan->getDetail($id);
            if (!empty($tkDetail[0])) {
                $request->session()->put('id', $id);
                $tkDetail = $tkDetail[0];
            } else {
                return redirect()->route('admin.tk-index')->with('msg', 'Tài khoản không tồn tại');
            }
        } else {
            return redirect()->route('admin.tk-index')->with('msg', 'Liên kết không tồn tại');
        }
    
        return view('Admin.TaiKhoan.editTK', compact('title', 'tkDetail', 'cats'));
    }

    public function postEdit(Request $request, $id=0) {
        $id = session('id');
        if(empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request ->validate([
            'MaLoaiTK' => 'required',
            'TenTaiKhoan' => 'required|min:5',
            'password' => 'required|min:5',
            'Email' => 'required|email',
        ], [
            'MaLoaiTK.required' => 'Loại tài khoản bắt buộc phải chọn',
            'TenTaiKhoan.required' => 'Tên tài khoản bắt buộc phải nhập',
            'TenTaiKhoan.min' => 'Tên tài khoản phải có ít nhất 5 ký tự',
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
            'Email.required' => 'Email bắt buộc phải nhập',
            'Email.email' => 'Email không đúng định dạng'
        ]);

        $dataUpdate = [
            $request -> MaLoaiTK,
            $request -> TenTaiKhoan,
            $request -> password,
            $request -> Email,
        ];

        $this->taikhoan->updateTK($dataUpdate, $id);

        return redirect()->route('admin.tk-index')->with('msg', 'Cập nhật tài khoản thành công');
    }

    public function delete($id=0) {
        if(!empty($id)){
            $tkDetail = $this->taikhoan->getDetail($id);
            if(!empty($tkDetail[0])){
                $deleteStatus = $this->taikhoan->deleteTK($id);
                if($deleteStatus){
                    $msg = "Xóa tài khoản thành công";
                }else{
                    $msg = "Bạn không thể xóa tài khoản lúc này! Vui lòng thử lại sau.";
                }
            }else{
                $msg = "Tài khoản không tồn tại";
            }

        }else {
            $msg = "Liên kết không tồn tại";
        }

        return redirect()->route('admin.tk-index')->with('msg', $msg);
    }
}
