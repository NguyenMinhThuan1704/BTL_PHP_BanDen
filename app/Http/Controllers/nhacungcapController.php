<?php

namespace App\Http\Controllers;

use App\Models\nhacungcap;
use Illuminate\Http\Request;

class nhacungcapController extends Controller
{
    private $supplier;
    public function __construct(){
        $this -> supplier = new nhacungcap();
    }

    public function index()
    {
        $supplier = new nhacungcap();
        $TenNhaPhanPhoi = '';
        $DiaChi = '';
        $supplierList = $this -> supplier -> gettAllNCC();
        return view('Admin.NhaCungCap.NhaCungCap', compact('supplierList','TenNhaPhanPhoi', 'DiaChi'));
    }

    public function search(Request $request)
    {
        $TenNhaPhanPhoi = $request->input('TenNhaPhanPhoi');
        $DiaChi = $request->input('DiaChi');
    
        $supplierList = $this->supplier->searchNCC($TenNhaPhanPhoi, $DiaChi);
        return view('Admin.NhaCungCap.nhacungcap', compact('supplierList', 'TenNhaPhanPhoi', 'DiaChi'));
    }

    public function create()
    {
        $title="Thêm nhà cung cấp";

        return view('Admin.NhaCungCap.addNCC', compact('title'));
    }

    public function postCreate(Request $request) {
        $request ->validate([
            'TenNhaPhanPhoi' => 'required|min:5|unique:nhaphanphoi',
            'DiaChi' => 'required|min:5',
            'SoDienThoai' => 'required|numeric|digits:10',
            'MoTa' => 'required|min:5',
        ], [
            'TenNhaPhanPhoi.required' => 'Tên nhà cung cấp bắt buộc phải nhập',
            'TenNhaPhanPhoi.min' => 'Tên nhà cung cấp phải có ít nhất 5 ký tự',
            'TenNhaPhanPhoi.unique' => 'Tên nhà cung cấp đã tồn tại trên hệ thống',
            'DiaChi.required' => 'Địa chỉ nhà cung cấp bắt buộc phải nhập',
            'DiaChi.min' => 'Địa chỉ nhà cung cấp phải có ít nhất 5 ký tự',
            'SoDienThoai.required' => 'Số điện thoại nhà cung cấp bắt buộc phải nhập',
            'SoDienThoai.numeric' => 'Số điện thoại nhà cung cấp phải là số',
            'SoDienThoai.digits' => 'Số điện thoại nhà cung cấp phải có đúng 10 chữ số',
            'MoTa.required' => 'Mô tả nhà cung cấp bắt buộc phải nhập',
            'MoTa.min' => 'Mô tả nhà cung cấp phải có ít nhất 5 ký tự',
        ]);

        $dataInsert = [
            $request -> TenNhaPhanPhoi,
            $request -> DiaChi,
            $request -> SoDienThoai,
            $request -> MoTa,
        ];

        $this->supplier->addNCC($dataInsert);

        return redirect()->route('admin.ncc-index')->with('msg', 'Thêm nhà cung cấp thành công');
    }

    public function getEdit(Request $request ,$MaNhaPhanPhoi=0) {
        $title="Cập nhật nhà cung cấp";
        
        if(!empty($MaNhaPhanPhoi)){
            $nccDetail = $this->supplier->getDetail($MaNhaPhanPhoi);
            if(!empty($nccDetail[0])){
                $request->session()->put('MaNhaPhanPhoi',$MaNhaPhanPhoi);
                $nccDetail = $nccDetail[0];
            }else{
                return redirect()->route('admin.ncc-index')->with('msg', 'Nhà cung cấp không tồn tại');
            }

        }else {
            return redirect()->route('admin.ncc-index')->with('msg', 'Liên kết không tồn tại');
        }

        return view('Admin.NhaCungCap.editNCC', compact('title', 'nccDetail'));
    }

    public function postEdit(Request $request, $MaNhaPhanPhoi=0) {
        $MaNhaPhanPhoi = session('MaNhaPhanPhoi');
        if(empty($MaNhaPhanPhoi)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request ->validate([
            'TenNhaPhanPhoi' => 'required|min:5',
            'DiaChi' => 'required|min:5',
            'SoDienThoai' => 'required|numeric|digits:10',
            'MoTa' => 'required|min:5',
        ], [
            'TenNhaPhanPhoi.required' => 'Tên nhà cung cấp bắt buộc phải nhập',
            'TenNhaPhanPhoi.min' => 'Tên nhà cung cấp phải có ít nhất 5 ký tự',
            'DiaChi.required' => 'Địa chỉ nhà cung cấp bắt buộc phải nhập',
            'DiaChi.min' => 'Địa chỉ nhà cung cấp phải có ít nhất 5 ký tự',
            'SoDienThoai.required' => 'Số điện thoại nhà cung cấp bắt buộc phải nhập',
            'SoDienThoai.numeric' => 'Số điện thoại nhà cung cấp phải là số',
            'SoDienThoai.digits' => 'Số điện thoại nhà cung cấp phải có đúng 10 chữ số',
            'MoTa.required' => 'Mô tả nhà cung cấp bắt buộc phải nhập',
            'MoTa.min' => 'Mô tả nhà cung cấp phải có ít nhất 5 ký tự',
        ]);

        $dataUpdate = [
            $request -> TenNhaPhanPhoi,
            $request -> DiaChi,
            $request -> SoDienThoai,
            $request -> MoTa,
        ];

        $this->supplier->updateNCC($dataUpdate, $MaNhaPhanPhoi);

        return redirect()->route('admin.ncc-index')->with('msg', 'Cập nhật nhà cung cấp thành công');
    }

    public function delete($MaNhaPhanPhoi=0) {
        if(!empty($MaNhaPhanPhoi)){
            $nccDetail = $this->supplier->getDetail($MaNhaPhanPhoi);
            if(!empty($nccDetail[0])){
                $deleteStatus = $this->supplier->deleteNCC($MaNhaPhanPhoi);
                if($deleteStatus){
                    $msg = "Xóa nhà cung cấp thành công";
                }else{
                    $msg = "Bạn không thể xóa nhà cung cấp lúc này! Vui lòng thử lại sau.";
                }
            }else{
                $msg = "Nhà cung cấp không tồn tại";
            }

        }else {
            $msg = "Liên kết không tồn tại";
        }

        return redirect()->route('admin.ncc-index')->with('msg', $msg);
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
    public function show(nhacungcap $nhacungcap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nhacungcap $nhacungcap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nhacungcap $nhacungcap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nhacungcap $nhacungcap)
    {
        //
    }
}
