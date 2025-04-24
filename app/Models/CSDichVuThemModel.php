<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSDichVuThemModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_dich_vu','id_cham_soc'];
    protected $table = 'dvt_chamsoc';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function DichVu()
    {
        return $this->hasOne(DMDichVuModel::class, 'id_dich_vu');
    }
    public function ChamSoc()
    {
        return $this->hasOne(ChamSocModel::class, 'id_cham_soc');
    }
}
