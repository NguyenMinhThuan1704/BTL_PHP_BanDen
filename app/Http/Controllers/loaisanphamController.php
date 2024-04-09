<?php

namespace App\Http\Controllers;

use App\Models\loaisanpham;
use Illuminate\Http\Request;

class loaisanphamController extends Controller
{
    private $typeProduct;

    public function __construct(){
        $this -> typeProduct = new loaisanpham();
    }

    public function index()
    {

        // $statement =$this -> typeProduct -> statementLSP("select * from loaisanpham");
        // dd($statement);
        $TenLoaiSanPham = '';
        $NoiDung = '';
        $typeProduct = new loaisanpham();
        $typeProductList = $this -> typeProduct -> gettAllLSP();
        return view('Admin.LoaiSanPham.loaisanpham', compact('typeProductList', 'TenLoaiSanPham', 'NoiDung'));
    }

    public function search(Request $request)
    {
        $TenLoaiSanPham = $request->input('TenLoaiSanPham');
        $NoiDung = $request->input('NoiDung');
    
        $typeProductList = $this->typeProduct->searchLSP($TenLoaiSanPham, $NoiDung);
        return view('Admin.LoaiSanPham.loaisanpham', compact('typeProductList', 'TenLoaiSanPham', 'NoiDung'));
    }

    public function create()
    {
        $title="Thêm loại sản phẩm";

        return view('Admin.LoaiSanPham.addLSP', compact('title'));
    }

    public function postCreate(Request $request) {
        $request ->validate([
            'TenLoaiSanPham' => 'required|min:5|unique:loaisanpham',
            'NoiDung' => 'required|min:5',
        ], [
            'TenLoaiSanPham.required' => 'Tên loại sản phẩm bắt buộc phải nhập',
            'TenLoaiSanPham.min' => 'Tên loại sản phẩm phải có ít nhất 5 ký tự',
            'TenLoaiSanPham.unique' => 'Tên loại sản phẩm đã tồn tại trên hệ thống',
            'NoiDung.required' => 'Nội dung loại sản phẩm bắt buộc phải nhập',
            'NoiDung.min' => 'Nội dung loại sản phẩm phải có ít nhất 5 ký tự'
        ]);

        $dataInsert = [
            $request -> TenLoaiSanPham,
            $request -> NoiDung,
        ];

        $this->typeProduct->addLSP($dataInsert);

        return redirect()->route('admin.lsp-index')->with('msg', 'Thêm loại sản phẩm thành công');
    }

    public function getEdit(Request $request ,$MaLoaiSanPham=0) {
        $title="Cập nhật loại sản phẩm";
        
        if(!empty($MaLoaiSanPham)){
            $lspDetail = $this->typeProduct->getDetail($MaLoaiSanPham);
            if(!empty($lspDetail[0])){
                $request->session()->put('MaLoaiSanPham',$MaLoaiSanPham);
                $lspDetail = $lspDetail[0];
            }else{
                return redirect()->route('admin.lsp-index')->with('msg', 'Loại sản phẩm không tồn tại');
            }

        }else {
            return redirect()->route('admin.lsp-index')->with('msg', 'Liên kết không tồn tại');
        }

        return view('Admin.LoaiSanPham.editLSP', compact('title', 'lspDetail'));
    }

    public function postEdit(Request $request, $MaLoaiSanPham=0) {
        $MaLoaiSanPham = session('MaLoaiSanPham');
        if(empty($MaLoaiSanPham)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request ->validate([
            'TenLoaiSanPham' => 'required|min:5',
            'NoiDung' => 'required|min:5'
        ], [
            'TenLoaiSanPham.required' => 'Tên loại sản phẩm bắt buộc phải nhập',
            'TenLoaiSanPham.min' => 'Tên loại sản phẩm phải có ít nhất 5 ký tự',
            'NoiDung.required' => 'Nội dung loại sản phẩm bắt buộc phải nhập',
            'NoiDung.min' => 'Nội dung loại sản phẩm phải có ít nhất 5 ký tự'
        ]);

        $dataUpdate = [
            $request -> TenLoaiSanPham,
            $request -> NoiDung,
        ];

        $this->typeProduct->updateLSP($dataUpdate, $MaLoaiSanPham);

        return redirect()->route('admin.lsp-index')->with('msg', 'Cập nhật loại sản phẩm thành công');
    }

    public function delete($MaLoaiSanPham=0) {
        if(!empty($MaLoaiSanPham)){
            $lspDetail = $this->typeProduct->getDetail($MaLoaiSanPham);
            if(!empty($lspDetail[0])){
                $deleteStatus = $this->typeProduct->deleteLSP($MaLoaiSanPham);
                if($deleteStatus){
                    $msg = "Xóa loại sản phẩm thành công";
                }else{
                    $msg = "Bạn không thể xóa loại sản phẩm lúc này! Vui lòng thử lại sau.";
                }
            }else{
                $msg = "Loại sản phẩm không tồn tại";
            }

        }else {
            $msg = "Liên kết không tồn tại";
        }

        return redirect()->route('admin.lsp-index')->with('msg', $msg);
    }
    
}
