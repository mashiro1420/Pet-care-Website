<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMKhuyenMaiModel extends Model
{
    use HasFactory;
    protected $fillable = ['id'];
    protected $table = 'dm_khuyenmai';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function KMChamSoc()
    {
        return $this->hasMany(KMChamSocModel::class, 'id_khuyen_mai');
    }
    public function KMTrongCoi()
    {
        return $this->hasMany(KMTrongCoiModel::class, 'id_khuyen_mai');
    }
}
