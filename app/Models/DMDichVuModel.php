<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMDichVuModel extends Model
{
  use HasFactory;
  protected $fillable = ['id'];
  protected $table = 'dm_dichvu';
  protected $primaryKey = 'id';
  protected $keytype = 'int';
  public $incrementing = true;
  public $timestamps = false;
  public function CSDichVu()
  {
      return $this->belongsTo(CSDichVuModel::class, 'id_dich_vu');
  }
  public function TCDichVu()
  {
      return $this->belongsTo(TCDichVuModel::class, 'id_dich_vu');
  }
  public function CSDichVuThem()
  {
      return $this->belongsTo(CSDichVuThemModel::class, 'id_dich_vu');
  }
  public function TCDichVuThem()
  {
      return $this->belongsTo(TCDichVuThemModel::class, 'id_dich_vu');
  }
  public function Gia()
  {
    return $this->belongsTo(DMGiaModel::class, 'id_dich_vu');
  }
}
