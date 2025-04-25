<?php

namespace App\Http\Controllers;

use App\Models\DMDichVuModel;
use App\Models\DMGiaModel;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    //DMDichVu Controller
    public function viewDMDichVu(Request $request)
    {
        $data = [];
        $query = DMDichVuModel::query()->select('*');
        $data['dich_vus'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_dich_vu.quan_ly_dmdichvu', $data);
    }
    public function viewThemDMDichVu(Request $request)
    {
        $data = [];
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_dich_vu.them_dmdichvu', $data);
    }
    public function viewSuaDMDichVu(Request $request)
    {
        $data = [];
        $data['dich_vu'] = DMDichVuModel::find($request->id);
        return view('Quan_ly_danh_muc.Quan_ly_dm_dich_vu.sua_dmdichvu', $data);
    }
    //DMGia Controller
    public function viewDMGia(Request $request)
    {
        $data = [];
        $query = DMGiaModel::query()->select('*')->leftJoin('dm_dichvu', 'dm_gia.id_dich_vu', '=', 'dm_dichvu.id');
        $data['gias'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_gia.quan_ly_dmgia', $data);
    }
    public function viewThemDMGia(Request $request)
    {
        $data = [];
        $data['dich_vus'] = DMDichVuModel::all();
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_gia.them_dmgia', $data);
    }
    public function viewSuaDMGia(Request $request)
    {
        $data = [];
        $data['gia'] = DMGiaModel::find($request->id);
        $data['dich_vus'] = DMDichVuModel::all();
        return view('Quan_ly_danh_muc.Quan_ly_dm_gia.sua_dmgia', $data);
    }
}
