<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMLoaiThuCungModel extends Model
{
    use HasFactory;
    protected $fillable = ['id'];
    protected $table = 'dm_loaithucung';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function Giong()
    {
        return $this->hasMany(DMGiongThuCungModel::class, 'id_loai_thu_cung');
    }
}
