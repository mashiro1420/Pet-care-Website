<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHangModel extends Model
{
    use HasFactory;
protected $fillable = ['id', 'id_loai_khach_hang'];
    protected $table = 'ql_khachhang';
    protected $primaryKey = 'id';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps = false;
    public function LoaiKhach()
    {
        return $this->belongsTo(DMLoaiKhachHangModel::class,'id_loai_khach_hang');
    }
    public function TaiKhoan()
    {
        return $this->hasOne(TaiKhoanModel::class,'id_khach_hang');
    }
    public function ChamSoc()
    {
        return $this->belongsTo(ChamSocModel::class, 'id_khach_hang');
    }
    public function TrongCoi()
    {
        return $this->belongsTo(TrongCoiModel::class, 'id_khach_hang');
    }
    public function HoiVien()
    {
        return $this->belongsTo(HoiVienModel::class, 'id_khach_hang');
    }
}
