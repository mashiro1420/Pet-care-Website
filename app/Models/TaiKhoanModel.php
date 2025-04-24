<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoanModel extends Model
{
    use HasFactory;
    protected $fillable = ['tai_khoan', 'id_khach_hang','id_quyen'];
    protected $table = 'ql_taikhoan';
    protected $primaryKey = 'tai_khoan';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps = false;
    public function Quyen()
    {
        return $this->belongsTo(DMQuyenModel::class,'id_quyen');
    }
    public function KhachHang()
    {
        return $this->belongsTo(KhachHangModel::class,'id_khach_hang');
    }
    public function ChamSoc()
    {
        return $this->belongsTo(ChamSocModel::class, 'id_nhan_vien');
    }
    public function TrongCoi()
    {
        return $this->belongsTo(TrongCoiModel::class, 'id_nhan_vien');
    }
}
