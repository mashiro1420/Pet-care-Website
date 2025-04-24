<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCThanhToanModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_trong_coi'];
    protected $table = 'ql_thanhtoantrongcoi';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function TrongCoi()
    {
        return $this->hasOne(TrongCoiModel::class, 'id_trong_coi');
    }
    public function KhuyenMai()
    {
        return $this->belongsTo(KMTrongCoiModel::class, 'id_thanh_toan');
    }
}
