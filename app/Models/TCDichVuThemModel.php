<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCDichVuThemModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_dich_vu','id_trong_coi'];
    protected $table = 'dvt_trongcoi';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function DichVu()
    {
        return $this->hasOne(DMDichVuModel::class, 'id_dich_vu');
    }
    public function TrongCoi()
    {
        return $this->hasOne(TrongCoiModel::class, 'id_trong_coi');
    }
}
