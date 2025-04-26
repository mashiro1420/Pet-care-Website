<?php

namespace App\Http\Controllers;

use App\Models\CSDichVuModel;
use App\Models\TCDichVuModel;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function viewQuanLy( Request $request)
    {
        $queryChamSoc = CSDichVuModel::select('*','dm_dichvu.id as dich_vu_id')
        ->leftJoin('dm_dichvu','ql_dichvuchamsoc.id_dich_vu','=','dm_dichvu.id');
        $queryTrongCoi = TCDichVuModel::select('*','dm_dichvu.id as dich_vu_id')
        ->leftJoin('dm_dichvu','ql_dichvutrongcoi.id_dich_vu','=','dm_dichvu.id');
        $data['cham_socs'] = $queryChamSoc->get();
        $data['trong_cois'] = $queryTrongCoi->get();
        return view('Quan_ly_dich_vu.quan_ly_dich_vu', $data);
    }
    public function xlThemChamSoc( Request $request )
    {

    }
    public function xlThemTrongCoi( Request $request )
    {
        
    }
    public function xlXoaChamSoc( Request $request )
    {
        
    }
    public function xlXoaTrongCoi( Request $request )
    {
        
    }
}
