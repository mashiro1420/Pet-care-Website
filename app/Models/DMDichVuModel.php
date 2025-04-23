<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMDichVuModel extends Model
{
  use HasFactory;
  protected $fillable = ['id', 'ten_dich_vu'];
  protected $table = 'dm_dichvu';
  protected $primaryKey = 'id';
  protected $keytype = 'int';
  public $incrementing = true;
  public $timestamps = false;
  // public function KhachHang()
  // {
  //   return $this->hasMany(KhachHangModel::class, 'id_loai_khach_hang');
  // }
}
