<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSDichVuModel extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_dich_vu'];
    protected $table = 'ql_dichvuchamsoc';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function DichVu()
    {
        return $this->hasOne(DMDichVuModel::class, 'id_dich_vu');
    }

}
