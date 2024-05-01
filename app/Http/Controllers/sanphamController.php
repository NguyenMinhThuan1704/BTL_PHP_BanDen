<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\loaisanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;


class sanphamController extends Controller
{
    private $product;
    
    public function __construct(){
        $this -> product = new sanpham();
    }

    public function index()
    {
        $TenSanPham = '';
        $MaLoaiSanPham = '';
        $productList = sanpham::orderBy('MaSanPham', 'ASC') -> search() -> paginate(10);
        $cats = loaisanpham::orderBy('MaLoaiSanPham', 'ASC')->select('MaLoaiSanPham', 'TenLoaiSanPham')->get();
        return view('Admin.SanPham.sanpham', compact('productList', 'cats', 'TenSanPham', 'MaLoaiSanPham'));
    }

    // public function index()
    // {
    //     $product = new sanpham();
    //     $productList = $this -> product-> search() -> getAllSP();
    //     return view('Admin.SanPham.sanpham', compact('productList'));
    // }

    public function search(Request $request)
    {
        $cats = loaisanpham::orderBy('MaLoaiSanPham', 'ASC')->select('MaLoaiSanPham', 'TenLoaiSanPham')->get();
        $TenSanPham = $request->input('TenSanPham');
        $MaLoaiSanPham = $request->input('MaLoaiSanPham');

        if (!$TenSanPham && !$MaLoaiSanPham) {
            $TenSanPham = session('TenSanPham');
            $MaLoaiSanPham = session('MaLoaiSanPham');
        } else {
            $request->session()->put('TenSanPham', $TenSanPham);
            $request->session()->put('MaLoaiSanPham', $MaLoaiSanPham);
        }

        $productList = $this->product->searchSP($TenSanPham, $MaLoaiSanPham);

        return view('Admin.SanPham.sanpham', compact('productList', 'cats', 'TenSanPham', 'MaLoaiSanPham'));
    }


    public function create()
    {
        $title="Thêm sản phẩm";

        $cats = loaisanpham::orderBy('MaLoaiSanPham', 'ASC')->select('MaLoaiSanPham', 'TenLoaiSanPham')->get();

        return view('Admin.SanPham.addSP', compact('title', 'cats'));
    }

    public function postCreate(Request $request) {
        $request ->validate([
            'MaLoaiSanPham' => 'required',
            'TenSanPham' => 'required|min:5|unique:sanpham',
            'AnhDaiDien' => 'required',
            'Gia' => 'required|numeric',
            'GiaGiam' => 'required|numeric',
            'SoLuong' => 'required|numeric'
        ], [
            'MaLoaiSanPham.required' => 'Loại sản phẩm bắt buộc phải chọn',
            'TenSanPham.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'TenSanPham.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự',
            'TenSanPham.unique' => 'Tên sản phẩm đã tồn tại trên hệ thống',
            'AnhDaiDien.required' => 'Ảnh đại diện bắt buộc phải chọn',
            'Gia.required' => 'Giá sản phẩm bắt buộc phải nhập',
            'Gia.numeric' => 'Giá sản phẩm phải là số',
            'GiaGiam.required' => 'Giá giảm sản phẩm bắt buộc phải nhập',
            'GiaGiam.numeric' => 'Giá giảm sản phẩm phải là số',
            'SoLuong.required' => 'Số lượng sản phẩm bắt buộc phải nhập',
            'SoLuong.numeric' => 'Số lượng sản phẩm phải là số',
        ]);

        if($request->has('AnhDaiDien')){
            $file = $request->file('AnhDaiDien');
            $file_name= $file->getClientOriginalName();
            // dd($file_name);
            $file_name_new = './assets/img/Product/' . $file_name;
            // $file->move(public_path('uploads/img'), $file_name_new);
        }
        // $request->merge(['AnhDaiDien' => $file_name]);
        // dd($request->all());

        $dataInsert = [
            $request -> MaLoaiSanPham,
            $request -> TenSanPham,
            $file_name_new,
            $request -> Gia,
            $request -> GiaGiam,
            $request -> SoLuong,
        ];

        $this->product->addSP($dataInsert);

        return redirect()->route('admin.sp-index')->with('msg', 'Thêm sản phẩm thành công');
    }

    public function getEdit(Request $request, $MaSanPham = 0) {
        $title = "Cập nhật sản phẩm";

        $cats = loaisanpham::orderBy('MaLoaiSanPham', 'ASC')->select('MaLoaiSanPham', 'TenLoaiSanPham')->get();
        
        if (!empty($MaSanPham)) {
            $spDetail = $this->product->getDetail($MaSanPham);
            if (!empty($spDetail[0])) {
                $request->session()->put('MaSanPham', $MaSanPham);
                $spDetail = $spDetail[0];
                // Lấy đường dẫn tệp ảnh cũ
                $oldImagePath = public_path($spDetail->AnhDaiDien);
                // if (File::exists($oldImagePath)) {
                //     $file_name = $spDetail->AnhDaiDien;
                // } else {
                //     $file_name = null;
                // }
            } else {
                return redirect()->route('admin.sp-index')->with('msg', 'Sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('admin.sp-index')->with('msg', 'Liên kết không tồn tại');
        }
    
        return view('Admin.SanPham.editSP', compact('title', 'spDetail', 'cats'));
    }

    public function postEdit(Request $request, $MaSanPham=0) {
        $MaSanPham = session('MaSanPham');
        if(empty($MaSanPham)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request ->validate([
            'MaLoaiSanPham' => 'required',
            'TenSanPham' => 'required|min:5',
            'AnhDaiDien' => 'required',
            'Gia' => 'required|numeric',
            'GiaGiam' => 'required|numeric',
            'SoLuong' => 'required|numeric'
        ], [
            'MaLoaiSanPham.required' => 'Mã loại sản phẩm bắt buộc phải chọn',
            'TenSanPham.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'TenSanPham.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự',
            'AnhDaiDien.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'Gia.required' => 'Giá sản phẩm bắt buộc phải nhập',
            'Gia.numeric' => 'Giá sản phẩm phải là số',
            'GiaGiam.required' => 'Giá giảm sản phẩm bắt buộc phải nhập',
            'GiaGiam.numeric' => 'Giá giảm sản phẩm phải là số',
            'SoLuong.required' => 'Số lượng sản phẩm bắt buộc phải nhập',
            'SoLuong.numeric' => 'Số lượng sản phẩm phải là số',
        ]);

        if($request->has('AnhDaiDien')){
            $file = $request->file('AnhDaiDien');
            $file_name= $file->getClientOriginalName();
            $file_name_new = './assets/img/Product/' . $file_name;
        } else {
            $file_name_new = $oldImagePath;
        }
        $request->merge(['AnhDaiDien' => $file_name]);

        $dataUpdate = [
            $request -> MaLoaiSanPham,
            $request -> TenSanPham,
            $file_name_new,
            $request -> Gia,
            $request -> GiaGiam,
            $request -> SoLuong,
        ];

        $this->product->updateSP($dataUpdate, $MaSanPham);

        return redirect()->route('admin.sp-index')->with('msg', 'Cập nhật sản phẩm thành công');
    }

    public function delete($MaSanPham=0) {
        if(!empty($MaSanPham)){
            $spDetail = $this->product->getDetail($MaSanPham);
            if(!empty($spDetail[0])){
                $deleteStatus = $this->product->deleteSP($MaSanPham);
                if($deleteStatus){
                    $msg = "Xóa sản phẩm thành công";
                }else{
                    $msg = "Bạn không thể xóa sản phẩm lúc này! Vui lòng thử lại sau.";
                }
            }else{
                $msg = "Sản phẩm không tồn tại";
            }

        }else {
            $msg = "Liên kết không tồn tại";
        }

        return redirect()->route('admin.sp-index')->with('msg', $msg);
    }
}
