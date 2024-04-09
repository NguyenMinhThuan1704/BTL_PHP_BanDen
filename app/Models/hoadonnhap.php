<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\nhacungcap;
use App\Models\taikhoan;

use DB;

class hoadonnhap extends Model
{
    use HasFactory;

    protected $table = 'hoadonnhap';
    protected $primaryKey = 'MaHoaDonNhap';
    protected $fillable = ['MaNhaPhanPhoi', 'MaTaiKhoan', 'KieuThanhToan', 'TongTien'];
    public $timestamps = false;

    public function chiTietHoaDonNhap()
    {
        return $this->hasMany(chitiethoadonnhap::class, 'MaHoaDonNhap');
    }

    // public function getAllHDN(){
    //     return DB::table('hoadonnhap')->paginate(10); 
    // }

    public function getAllHDN(){
        return DB::table('hoadonnhap')
                ->join('nhaphanphoi', 'hoadonnhap.MaNhaPhanPhoi', '=', 'nhaphanphoi.MaNhaPhanPhoi')
                ->join('taikhoan', 'hoadonnhap.MaTaiKhoan', '=', 'taikhoan.id')
                ->select('hoadonnhap.*', 'nhaphanphoi.TenNhaPhanPhoi', 'taikhoan.TenTaiKhoan')
                ->paginate(10); 
    }

    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct() {
        $this->items = session('hdn');
        // dd(session('hdn'));
        $this->totalPrice = $this->getTotalPrice();
        $this->totalQuantity = $this->getTotalQuantity();
    }

    public function add($product, $quantity = 1) {
        if(isset($this->items [$product->MaSanPham])) {
            $this->items[$product->MaSanPham]->quantity += $quantity;
        } else {
            $hdn_item = (object)[
                'MaSanPham' => $product -> MaSanPham,
                'TenSanPham' => $product -> TenSanPham,
                'GiaGiam' => $product -> GiaGiam ? $product -> GiaGiam : $product -> Gia,
                'AnhDaiDien' => $product -> AnhDaiDien,
                'quantity' => $quantity
            ];
            $this->items[$product -> MaSanPham] = $hdn_item;
            // dd($this->items);
        }
        session(['hdn' =>  $this->items]);
        // dd(session('hdn'));
    }

    public function updatehdn($MaSanPham, $quantity) {
        if(isset($this->items [$MaSanPham])) {
            $this->items[$MaSanPham]->quantity = $quantity;
        }
    }

    public function deletehdn($MaSanPham) {
        if(isset($this->items [$MaSanPham])) {
            unset($this->items [$MaSanPham]);
            session(['hdn' =>  $this->items]);
        }
    }

    public function clearhdn() {
        session(['hdn' =>  null]);
    }

    private function getTotalPrice() {
        $total = 0;
        if (is_array($this->items) || is_object($this->items)) {
            foreach ($this->items as $item) {
                $total += $item->quantity * $item->GiaGiam;
            }
        }
        return $total;
    }
    
    private function getTotalQuantity() {
        $total = 0;
        if (is_array($this->items) || is_object($this->items)) {
            foreach ($this->items as $item) {
                $total += $item->quantity;
            }
        }
        return $total;
    }
    
    public static function deletehdn_hdn($MaHoaDonNhap)
    {
        return DB::select('CALL sp_hoadonnhap_delete(?)', [$MaHoaDonNhap]);
    }
    
    public function catNCC()
    {
        return $this->hasOne(nhacungcap::class, 'MaNhaPhanPhoi', 'MaNhaPhanPhoi');
    }

    public function catTK()
    {
        return $this->hasOne(taikhoan::class, 'id', 'id');
    }

}

class chitiethoadonnhap extends Model
{
    protected $table = 'chitiethoadonnhap';
    protected $primaryKey = 'MaCTHDN';
    public $timestamps = false;

    protected $fillable = ['MaHoaDonNhap', 'MaSanPham', 'SoLuongCTHDN', 'GiaNhap', 'TongTienCTHDN'];

    public function hoaDonNhap()
    {
        return $this->belongsTo(hoadonnhap::class, 'MaHoaDonNhap');
    }
}
