<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiDangModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_loai_noi_dung','id_nhan_vien'];
    protected $table = 'ql_baidang';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function NhanVien()
    {
        return $this->hasOne(TaiKhoanModel::class, 'id_nhan_vien');
    }
    public function LoaiNoiDung()
    {
        return $this->hasOne(DMLoaiNoiDungModel::class, 'id_loai_noi_dung');
    }
}
