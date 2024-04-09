<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Foundation\Auth\TaiKhoan as Authenticatable;
use DB;

class taikhoan extends Model implements Authenticatable
// class taikhoan extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $fillable = [
        'id', 'MaLoaiTK', 'TenTaiKhoan', 'password', 'Email', 
    ];

    public function getAllTK(){
        return DB::table('taikhoan')->paginate(10); 
    }

    public function searchTK($TenTaiKhoan, $MaLoaiTK) {
        $search = taikhoan::query()
            ->where('TenTaiKhoan', 'LIKE', "%$TenTaiKhoan%")
            ->when($MaLoaiTK, function ($query) use ($MaLoaiTK) {
                $query->where('MaLoaiTK', $MaLoaiTK);
            })
            ->paginate(10);
    
        return $search;
    }

    public function getDecryptedPasswordAttribute()
    {
        return decrypt($this->password);
    }

    public function cat()
    {
        return $this->hasOne(loaitaikhoan::class, 'MaLoaiTK', 'MaLoaiTK');
    }

    public function scopeSearch($query) {
        if($key = request() -> key) {
            $query = $query -> where('TenLoaiTK', 'like', '%'.$key.'%');
        }
        return $query;
    }

    public function getDetail($id) {
        return DB::select('SELECT * FROM taikhoan WHERE id=?', [$id]);
    }

    public function addTK($data){
        DB::insert('INSERT INTO taikhoan (MaLoaiTK, TenTaiKhoan, password, Email) values(?, ?, ?, ?)',
        $data);
    }

    public function updateTK($data, $id) {
        $data[]=$id;
        return DB::update('UPDATE taikhoan SET MaLoaiTK =?, TenTaiKhoan =?, password =?, Email =? WHERE id =?', 
        $data);
    }

    public function deleteTK($id) {
        return DB::delete("DELETE FROM taikhoan WHERE id=?", [$id]);
    }

    // Triển khai các phương thức của Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // Tên cột chứa ID người dùng
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); 
    }

    public function getAuthPassword()
    {
        return $this->password; 
    }

    public function getRememberToken()
    {
        return $this->remember_token; 
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; 
    }

    public function getRememberTokenName()
    {
        return 'password'; 
    }
}
