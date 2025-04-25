<?php

namespace App\Http\Controllers;

use App\Models\DMDichVuModel;
use App\Models\DMGiaModel;
use App\Models\DMGiongThuCungModel;
use App\Models\DMLoaiThuCungModel;
use App\Models\DMKhuyenMaiModel;
use App\Models\DMLoaiKhachHangModel;
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
        $query = DMGiaModel::query()->select('*', 'dm_gia.id as id')->leftJoin('dm_dichvu', 'dm_gia.id_dich_vu', '=', 'dm_dichvu.id');
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
    //DMGiongThuCung Controller
    public function viewDMGiongThuCung(Request $request)
    {
        $data = [];
        $query = DMGiongThuCungModel::query()->select('*','dm_giongthucung.id as id')->leftJoin('dm_loaithucung', 'dm_giongthucung.id_loai_thu_cung', '=', 'dm_loaithucung.id');
        $data['loai_thu_cungs'] = DMLoaiThuCungModel::all();
        $data['giong_thu_cungs'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_giong_thu_cung.quan_ly_dmgiongthucung', $data);
    }
    public function viewThemDMGiongThuCung(Request $request)
    {
        $data = [];
        $data['loai_thu_cungs'] = DMLoaiThuCungModel::all();
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_giong_thu_cung.them_dmgiongthucung', $data);
    }
    public function viewSuaDMGiongThuCung(Request $request)
    {
        $data = [];
        $data['giong_thu_cung'] = DMGiongThuCungModel::find($request->id);
        $data['loai_thu_cungs'] = DMLoaiThuCungModel::all();
        return view('Quan_ly_danh_muc.Quan_ly_dm_giong_thu_cung.sua_dmgiongthucung', $data);
    }
    //DMKhuyenMai Controller
    public function viewDMKhuyenMai(Request $request)
    {
        $data = [];
        $query = DMKhuyenMaiModel::query()->select('*');
        $data['khuyen_mais'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_khuyen_mai.quan_ly_dmkhuyenmai', $data);
    }
    public function viewThemDMKhuyenMai(Request $request)
    {
        $data = [];
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_khuyen_mai.them_dmkhuyenmai', $data);
    }
    public function viewSuaDMKhuyenMai(Request $request)
    {
        $data = [];
        $data['khuyen_mai'] = DMKhuyenMaiModel::find($request->id);
        return view('Quan_ly_danh_muc.Quan_ly_dm_khuyen_mai.sua_dmkhuyenmai', $data);
    }
    //DMLoaiKhachHang Controller
    public function viewDMLoaiKhachHang(Request $request)
    {
        $data = [];
        $query = DMLoaiKhachHangModel::query()->select('*');
        $data['loai_khach_hangs'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_khach_hang.quan_ly_dmloaikhachhang', $data);
    }
    public function viewThemDMLoaiKhachHang(Request $request)
    {
        $data = [];
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_khach_hang.them_dmloaikhachhang', $data);
    }
    public function viewSuaDMLoaiKhachHang(Request $request)
    {
        $data = [];
        $data['loai_khach_hang'] = DMLoaiKhachHangModel::find($request->id);
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_khach_hang.sua_dmloaikhachhang', $data);
    }
}
