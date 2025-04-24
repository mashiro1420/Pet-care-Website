<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMTrangThaiModel extends Model
{
    use HasFactory;
    protected $fillable = ['id'];
    protected $table = 'dm_trangthai';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function ChamSoc()
    {
        return $this->belongsTo(ChamSocModel::class, 'id_trang_thai');
    }
    public function TrongCoi()
    {
        return $this->belongsTo(TrongCoiModel::class, 'id_trang_thai');
    }
}
