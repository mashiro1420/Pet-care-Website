<?php

namespace App\Http\Controllers;

use App\Models\CSDichVuModel;
use App\Models\DMDichVuModel;
use App\Models\TCDichVuModel;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data = [];
        $query = CSDichVuModel::query()->select('*', 'ql_dichvuchamsoc.id as id')->leftJoin('dm_dichvu', 'ql_dichvuchamsoc.id_dich_vu', '=', 'dm_dichvu.id');
        $query1 = TCDichVuModel::query()->select('*', 'ql_dichvutrongcoi.id as id')->leftJoin('dm_dichvu', 'ql_dichvutrongcoi.id_dich_vu', '=', 'dm_dichvu.id');
        $data['dich_vu_cham_socs'] = $query->paginate(5);
        $data['dich_vu_trong_cois'] = $query1->paginate(5);
        $data['dich_vu_cham_soc'] = DMDichVuModel::find($request->id);
        $data['dich_vu_trong_coi'] = DMDichVuModel::find($request->id);
        $data['dm_dich_vu_css'] = DMDichVuModel::where('hien',1)->where('loai',1)->get();
        $data['dm_dich_vu_tcs'] = DMDichVuModel::where('hien',1)->where('loai',2)->get();
        return view('Quan_ly_dich_vu.quan_ly_dich_vu', $data);
    }
    public function xlThemChamSoc( Request $request )
    {
        $dich_vu = new CSDichVuModel();
        $dich_vu->id_dich_vu = $request->id_dich_vu_cs;
        $dich_vu->save();
        return redirect()->route('ql_dichvu');
    }
    public function xlThemTrongCoi( Request $request )
    {
        $dich_vu = new TCDichVuModel();
        $dich_vu->id_dich_vu = $request->id_dich_vu_tc;
        $dich_vu->save();
        return redirect()->route('ql_dichvu');
    }
    public function xlXoaChamSoc( Request $request )
    {
        $dich_vu = CSDichVuModel::find( $request->id);
        $dich_vu->delete();
        return redirect()->route('ql_dichvu');
    }
    public function xlXoaTrongCoi( Request $request )
    {
        $dich_vu = TCDichVuModel::find( $request->id);
        $dich_vu->delete();
        return redirect()->route('ql_dichvu');
    }
}
