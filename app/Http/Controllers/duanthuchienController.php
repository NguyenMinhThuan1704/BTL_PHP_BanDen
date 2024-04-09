<?php

namespace App\Http\Controllers;

use App\Models\duanthuchien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class duanthuchienController extends Controller
{
    private $duanthuchien;
    public function __construct(){
        $this -> duanthuchien = new duanthuchien();
    }

    public function index()
    {
        $duanthuchien = new duanthuchien();
        $duanthuchienList = $this -> duanthuchien -> gettAllDATH();
        $TieuDe = '';
        $MoTa = '';
        return view('Admin.DuAnThucHien.duanthuchien', compact('duanthuchienList', 'TieuDe', 'MoTa'));
    }
    
    public function search(Request $request)
    {
        $TieuDe = $request->input('TieuDe');
        $MoTa = $request->input('MoTa');
    
        $duanthuchienList = $this->duanthuchien->searchDATH($TieuDe, $MoTa);
        return view('Admin.DuAnThucHien.duanthuchien', compact('duanthuchienList', 'TieuDe', 'MoTa'));
    }

    public function create()
    {
        $title="Thêm dự án thực hiện";

        return view('Admin.DuAnThucHien.addDATH', compact('title'));
    }

    public function postCreate(Request $request) {
        $request->validate([
            'TieuDe' => 'required|min:5|unique:duanthuchien',
            'AnhDaiDien' => 'required',
            'MoTa' => 'required|min:5',
        ], [
            'TieuDe.required' => 'Tiêu đề bắt buộc phải nhập',
            'TieuDe.min' => 'Tiêu đề phải có ít nhất 5 ký tự',
            'TieuDe.unique' => 'Tiêu đề đã tồn tại trên hệ thống',
            'AnhDaiDien.required' => 'Ảnh đại diện bắt buộc phải chọn',
            'MoTa.required' => 'Mô tả bắt buộc phải nhập',
            'MoTa.min' => 'Mô tả phải có ít nhất 5 ký tự',
        ]);

        if($request->has('AnhDaiDien')){
            $file = $request -> file('AnhDaiDien');
            $file_name= $file -> getClientOriginalName();
            $file_name_new = './assets/img/Dự án thực hiện/' . $file_name;
        }

        $dataInsert = [
            $request -> TieuDe,
            $file_name_new,
            $request -> MoTa,
        ];

        $this->duanthuchien->addDATH($dataInsert);

        return redirect()->route('admin.dath-index')->with('msg', 'Thêm dự án thực hiện thành công');
    }

    public function getEdit(Request $request, $MaDuAn = 0) {
        $title = "Cập nhật dự án thực hiện";
        
        if (!empty($MaDuAn)) {
            $dathDetail = $this->duanthuchien->getDetail($MaDuAn);
            if (!empty($dathDetail[0])) {
                $request->session()->put('MaDuAn', $MaDuAn);
                $dathDetail = $dathDetail[0];
                $oldImagePath = public_path($dathDetail->AnhDaiDien);
            } else {
                return redirect()->route('admin.dath-index')->with('msg', 'Dự án thực hiện không tồn tại');
            }
        } else {
            return redirect()->route('admin.dath-index')->with('msg', 'Liên kết không tồn tại');
        }
    
        return view('Admin.DuAnThucHien.editDATH', compact('title', 'dathDetail'));
    }

    public function postEdit(Request $request, $MaDuAn=0) {
        $MaDuAn = session('MaDuAn');
        if(empty($MaDuAn)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request->validate([
            'TieuDe' => 'required|min:5',
            'AnhDaiDien' => 'required',
            'MoTa' => 'required|min:5',
        ], [
            'TieuDe.required' => 'Tiêu đề bắt buộc phải nhập',
            'TieuDe.min' => 'Tiêu đề phải có ít nhất 5 ký tự',
            'AnhDaiDien.required' => 'Ảnh đại diện bắt buộc phải chọn',
            'MoTa.required' => 'Mô tả bắt buộc phải nhập',
            'MoTa.min' => 'Mô tả phải có ít nhất 5 ký tự',
        ]);

        if($request->has('AnhDaiDien')){
            $file = $request->file('AnhDaiDien');
            $file_name= $file->getClientOriginalName();
            $file_name_new = './assets/img/Dự án thực hiện/' . $file_name;
        } else {
            $file_name_new = $oldImagePath;
        }

        $dataUpdate = [
            $request -> TieuDe,
            $file_name_new,
            $request -> MoTa,
        ];

        $this->duanthuchien->updateDATH($dataUpdate, $MaDuAn);

        return redirect()->route('admin.dath-index')->with('msg', 'Cập nhật dự án thực hiện thành công');
    }

    public function delete($MaDuAn=0) {
        if(!empty($MaDuAn)){
            $dathDetail = $this->tintuc->getDetail($MaDuAn);
            if(!empty($dathDetail[0])){
                $deleteStatus = $this->duanthuchien->deleteDATH($MaDuAn);
                if($deleteStatus){
                    $msg = "Xóa dự án thực hiện thành công";
                }else{
                    $msg = "Bạn không thể xóa dự án thực hiện lúc này! Vui lòng thử lại sau.";
                }
            }else{
                $msg = "Dự án thực hiện không tồn tại";
            }

        }else {
            $msg = "Liên kết không tồn tại";
        }

        return redirect()->route('admin.dath-index')->with('msg', $msg);
    }
}
