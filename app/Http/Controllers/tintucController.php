<?php

namespace App\Http\Controllers;

use App\Models\tintuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class tintucController extends Controller
{
    private $tintuc;
    public function __construct(){
        $this -> tintuc = new tintuc();
    }

    public function index()
    {
        $tintuc = new tintuc();
        $tintucList = $this -> tintuc -> gettAllTT();
        $TieuDe = '';
        $MoTa = '';
        return view('Admin.TinTuc.tintuc', compact('tintucList', 'TieuDe', 'MoTa'));
    }

    public function search(Request $request)
    {
        $TieuDe = $request->input('TieuDe');
        $MoTa = $request->input('MoTa');
    
        $tintucList = $this->tintuc->searchTT($TieuDe, $MoTa);
        return view('Admin.TinTuc.tintuc', compact('tintucList', 'TieuDe', 'MoTa'));
    }

    public function create()
    {
        $title="Thêm tin tức";

        return view('Admin.TinTuc.addTT', compact('title'));
    }

    public function postCreate(Request $request) {
        $request->validate([
            'TieuDe' => 'required|min:5|unique:tintuc',
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
            $file_name_new = './assets/img/Tin tức/' . $file_name;
        }

        // if($request->hasFile('AnhDaiDien')){
        //     $file = $request->file('AnhDaiDien');
        //     $file_name = $file->getClientOriginalName();
        //     $file_name_new = './assets/img/Tin tức/' . $file_name;
        // }

        $dataInsert = [
            $request -> TieuDe,
            $file_name_new,
            $request -> MoTa,
        ];

        $this->tintuc->addTT($dataInsert);

        return redirect()->route('admin.tt-index')->with('msg', 'Thêm tin tức thành công');
    }

    public function getEdit(Request $request, $MaTinTuc = 0) {
        $title = "Cập nhật tin tức";
        
        if (!empty($MaTinTuc)) {
            $ttDetail = $this->tintuc->getDetail($MaTinTuc);
            if (!empty($ttDetail[0])) {
                $request->session()->put('MaTinTuc', $MaTinTuc);
                $ttDetail = $ttDetail[0];
                $oldImagePath = public_path($ttDetail->AnhDaiDien);
            } else {
                return redirect()->route('admin.tt-index')->with('msg', 'Sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('admin.tt-index')->with('msg', 'Liên kết không tồn tại');
        }
    
        return view('Admin.TinTuc.editTT', compact('title', 'ttDetail'));
    }

    public function postEdit(Request $request, $MaTinTuc=0) {
        $MaTinTuc = session('MaTinTuc');
        if(empty($MaTinTuc)){
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
            $file_name_new = './assets/img/Tin tức/' . $file_name;
        } else {
            $file_name_new = $oldImagePath;
        }

        $dataUpdate = [
            $request -> TieuDe,
            $file_name_new,
            $request -> MoTa,
        ];

        $this->tintuc->updateTT($dataUpdate, $MaTinTuc);

        return redirect()->route('admin.tt-index')->with('msg', 'Cập nhật tin tức thành công');
    }

    public function delete($MaTinTuc=0) {
        if(!empty($MaTinTuc)){
            $ttDetail = $this->tintuc->getDetail($MaTinTuc);
            if(!empty($ttDetail[0])){
                $deleteStatus = $this->tintuc->deleteTT($MaTinTuc);
                if($deleteStatus){
                    $msg = "Xóa tin tức thành công";
                }else{
                    $msg = "Bạn không thể xóa tin tức lúc này! Vui lòng thử lại sau.";
                }
            }else{
                $msg = "Tin tức không tồn tại";
            }

        }else {
            $msg = "Liên kết không tồn tại";
        }

        return redirect()->route('admin.tt-index')->with('msg', $msg);
    }
}
