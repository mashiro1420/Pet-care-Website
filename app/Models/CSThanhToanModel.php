<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSThanhToanModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_cham_soc'];
    protected $table = 'ql_thanhtoanchamsoc';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function ChamSoc()
    {
        return $this->hasOne(ChamSocModel::class, 'id_cham_soc');
    }
    public function KhuyenMai()
    {
        return $this->hasOne(KMChamSocModel::class, 'id_thanh_toan');
    }
}
