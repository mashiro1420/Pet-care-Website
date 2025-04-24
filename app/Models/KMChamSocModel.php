<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KMChamSocModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_thanh_toan','id_khuyen_mai'];
    protected $table = 'km_chamsoc';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function ThanhToan()
    {
        return $this->belongsTo(CSThanhToanModel::class, 'id_thanh_toan');
    }
    public function KhuyenMai()
    {
        return $this->belongsTo(DMKhuyenMaiModel::class, 'id_khuyen_mai');
    }
}
