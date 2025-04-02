<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMLoaiKhachHangModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','ten_loai_khach'];
    protected $table = 'dm_loaikhachhang';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function KhachHang()
    {
        return $this->hasMany(KhachHangModel::class, 'id_loai_khach_hang');
    }
}
