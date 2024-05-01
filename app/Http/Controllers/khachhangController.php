<?php

namespace App\Http\Controllers;

use App\Models\khachhang;
use App\Models\taikhoan;
use Illuminate\Http\Request;

class khachhangController extends Controller
{
    private $khachhang;
    
    public function __construct(){
        $this -> khachhang = new khachhang();
    }

    public function index()
    {
        $khachhang = new khachhang();
        $khachhangList = $this -> khachhang -> gettAllKH();
        $TenKH = '';
        $DiaChi = '';
        return view('Admin.KhachHang.khachhang', compact('khachhangList', 'TenKH', 'DiaChi'));
    }

    public function search(Request $request)
    {
        $TenKH = $request->input('TenKH');
        $DiaChi = $request->input('DiaChi');
    
        $khachhangList = $this->khachhang->searchKH($TenKH, $DiaChi);
        return view('Admin.KhachHang.khachhang', compact('khachhangList', 'TenKH', 'DiaChi'));
    }

    public function create()
    {
        $title="Thêm khách hàng";

        $cats_tk = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();

        return view('Admin.KhachHang.addKH', compact('title', 'cats_tk'));
    }

    public function postCreate(Request $request) {
        $request ->validate([
            'id' => 'required',
            'TenKH' => 'required|min:5|unique:khachhang',
            'DiaChi' => 'required|min:5',
            'SDT' => 'required|numeric|digits:10',
            'Email' => 'required|email',
        ], [
            'id.required' => 'Tài khoản bắt buộc phải chọn',
            'TenKH.required' => 'Tên khách hàng bắt buộc phải nhập',
            'TenKH.min' => 'Tên khách hàng phải có ít nhất 5 ký tự',
            'TenKH.unique' => 'Tên khách hàng đã tồn tại trên hệ thống',
            'DiaChi.required' => 'Địa chỉ khách hàng bắt buộc phải nhập',
            'DiaChi.min' => 'Địa chỉ khách hàng phải có ít nhất 5 ký tự',
            'SDT.required' => 'Số điện thoại khách hàng bắt buộc phải nhập',
            'SDT.numeric' => 'Số điện thoại khách hàng phải là số',
            'SDT.digits' => 'Số điện thoại khách hàng phải có đúng 10 chữ số',
            'Email.required' => 'Email khách hàng bắt buộc phải nhập',
            'Email.email' => 'Email khách hàng không đúng định dạng'
        ]);

        $dataInsert = [
            $request -> id,
            $request -> TenKH,
            $request -> DiaChi,
            $request -> SDT,
            $request -> Email,
        ];

        $this->khachhang->addKH($dataInsert);

        return redirect()->route('admin.kh-index')->with('msg', 'Thêm khách hàng thành công');
    }

    public function getEdit(Request $request ,$MaKH=0) {
        $title="Cập nhật khách hàng";

        $cats_tk = taikhoan::orderBy('id', 'ASC')->select('id', 'TenTaiKhoan')->get();
        
        if(!empty($MaKH)){
            $khDetail = $this->khachhang->getDetail($MaKH);
            if(!empty($khDetail[0])){
                $request->session()->put('MaKH',$MaKH);
                $khDetail = $khDetail[0];
            }else{
                return redirect()->route('admin.kh-index')->with('msg', 'Loại sản phẩm không tồn tại');
            }

        }else {
            return redirect()->route('admin.kh-index')->with('msg', 'Liên kết không tồn tại');
        }

        return view('Admin.KhachHang.editKH', compact('title', 'khDetail', 'cats_tk'));
    }

    public function postEdit(Request $request, $MaKH=0) {
        $MaKH = session('MaKH');
        if(empty($MaKH)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request ->validate([
            'id' => 'required',
            'TenKH' => 'required|min:5|',
            'DiaChi' => 'required|min:5',
            'SDT' => 'required|numeric|digits:10',
            'Email' => 'required|email',
        ], [
            'id.required' => 'Tài khoản bắt buộc phải chọn',
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

        $dataUpdate = [
            $request -> id,
            $request -> TenKH,
            $request -> DiaChi,
            $request -> SDT,
            $request -> Email,
        ];

        $this->khachhang->updateKH($dataUpdate, $MaKH);

        return redirect()->route('admin.kh-index')->with('msg', 'Cập nhật khách hàng thành công');
    }

    public function delete($MaKH=0) {
        if(!empty($MaKH)){
            $khDetail = $this->khachhang->getDetail($MaKH);
            if(!empty($khDetail[0])){
                $deleteStatus = $this->khachhang->deleteKH($MaKH);
                if($deleteStatus){
                    $msg = "Xóa khách hàng thành công";
                }else{
                    $msg = "Bạn không thể xóa khách hàng lúc này! Vui lòng thử lại sau.";
                }
            }else{
                $msg = "Khách hàng không tồn tại";
            }

        }else {
            $msg = "Liên kết không tồn tại";
        }

        return redirect()->route('admin.kh-index')->with('msg', $msg);
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
    public function show(khachhang $khachhang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(khachhang $khachhang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, khachhang $khachhang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(khachhang $khachhang)
    {
        //
    }
}
