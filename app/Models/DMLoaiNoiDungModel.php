<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMLoaiNoiDungModel extends Model
{
    use HasFactory;
    protected $fillable = ['id'];
    protected $table = 'dm_loainoidung';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function BaiDang()
    {
        return $this->belongsTo(BaiDangModel::class, 'id_loai_noi_dung');
    }
}
