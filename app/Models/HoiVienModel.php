<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoiVienModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_khach_hang','id_loai_khach_hang'];
    protected $table = 'ql_hoivien';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function KhachHang()
    {
        return $this->hasOne(KhachHangModel::class, 'id_khach_hang');
    }
    public function LoaiKhachHang()
    {
        return $this->belongsTo(DMLoaiKhachHangModel::class, 'id_loai_khach_hang');
    }
}
