<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMGiongThuCungModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_loai_thu_cung'];
    protected $table = 'dm_giongthucung';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function LoaiThuCung()
    {
        return $this->belongsTo(DMLoaiThuCungModel::class, 'id_loai_thu_cung');
    }
    public function ChamSoc()
    {
        return $this->belongsTo(ChamSocModel::class, 'id_giong');
    }
    public function TrongCoi()
    {
        return $this->belongsTo(TrongCoiModel::class, 'id_giong');
    }
}
