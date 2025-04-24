<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamSocModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_khach_hang','id_trang_thai','id_nhan_vien','id_giong'];
    protected $table = 'ql_chamsoc';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function KhachHang()
    {
        return $this->hasOne(KhachHangModel::class, 'id_khach_hang');
    }
    public function TrangThai()
    {
        return $this->hasOne(DMTrangThaiModel::class, 'id_trang_thai');
    }
    public function NhanVien()
    {
        return $this->hasOne(TaiKhoanModel::class, 'id_nhan_vien');
    }
    public function Giong()
    {
        return $this->hasOne(DMGiongThuCungModel::class, 'id_giong');
    }
    public function ThanhToan()
    {
        return $this->belongsTo(CSThanhToanModel::class, 'id_cham_soc');
    }
}
