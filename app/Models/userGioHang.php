<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userGioHang
{
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct() {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->getTotalPrice();
        $this->totalQuantity = $this->getTotalQuantity();
    }

    public function add($product, $quantity = 1) {
        if(isset($this->items [$product->MaSanPham])) {
            $this->items[$product->MaSanPham]->quantity += $quantity;
        } else {
            $cart_item = (object)[
                'MaSanPham' => $product -> MaSanPham,
                'TenSanPham' => $product -> TenSanPham,
                'GiaGiam' => $product -> GiaGiam ? $product -> GiaGiam : $product -> Gia,
                'AnhDaiDien' => $product -> AnhDaiDien,
                'quantity' => $quantity
            ];
            $this->items[$product -> MaSanPham] = $cart_item;
        }
        session(['cart' =>  $this->items]);
    }

    public function update($MaSanPham, $quantity) {
        if(isset($this->items [$MaSanPham])) {
            $this->items[$MaSanPham]->quantity = $quantity;
        }
    }

    public function delete($MaSanPham) {
        if(isset($this->items [$MaSanPham])) {
            unset($this->items [$MaSanPham]);
            session(['cart' =>  $this->items]);
        }
    }

    public function clear() {
        session(['cart' =>  null]);
    }

    private function getTotalPrice() {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item->quantity * $item->GiaGiam;
        }
        return $total;
    }

    private function getTotalQuantity() {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item->quantity;
        }
        return $total;
    }

    public function getLSP() {
        return DB::select('SELECT * FROM loaisanpham');
    }
}

