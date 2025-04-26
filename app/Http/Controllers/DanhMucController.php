<?php

namespace App\Http\Controllers;

use App\Models\DMDichVuModel;
use App\Models\DMGiaModel;
use App\Models\DMGiongThuCungModel;
use App\Models\DMLoaiThuCungModel;
use App\Models\DMKhuyenMaiModel;
use App\Models\DMLoaiKhachHangModel;
use Exception;
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
    public function xlThemDMDichVu(Request $request)
    {
        $dich_vu = new DMDichVuModel();
        $dich_vu->ten_dich_vu = $request->ten_dich_vu;
        $dich_vu->mo_ta = $request->mo_ta;
        $dich_vu->save();
        return redirect()->route('ql_dmdichvu');
    }
    public function xlSuaDMDichVu(Request $request)
    {
        $dich_vu = DMDichVuModel::find( $request->id );
        $dich_vu->ten_dich_vu = $request->ten_dich_vu;
        $dich_vu->mo_ta = $request->mo_ta;
        $dich_vu->save();
        return redirect()->route('ql_dmdichvu');
    }
    public function xlXoaMDichVu(Request $request)
    {
        $dich_vu = DMDichVuModel::find( $request->id );
        try {
            $dich_vu->delete();
            return redirect()->route('ql_dmdichvu');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmdichvu')->with('bao_loi',$e);
        }
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
    public function xlThemDMGia(Request $request)
    {
        $gia = new DMGiaModel();
        $gia->id_dich_vu = $request->ten_dich_vu;
        $gia->don_gia = $request->don_gia;
        $gia->save();
        return redirect()->route('ql_dmgia');
    }
    public function xlSuaDMGia(Request $request)
    {
        $gia = DMGiaModel::find( $request->id );
        $gia->id_dich_vu = $request->ten_dich_vu;
        $gia->don_gia = $request->don_gia;
        $gia->save();
        return redirect()->route('ql_dmgia');
    }
    public function xlXoaMGia(Request $request)
    {
        $gia = DMGiaModel::find( $request->id );
        try {
            $gia->delete();
            return redirect()->route('ql_dmgia');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmgia')->with('bao_loi',$e);
        }
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
    public function xlThemDMGiongThuCung(Request $request)
    {
        $giong = new DMGiongThuCungModel();
        $giong->id_loai_thu_cung = $request->ten_loai_thu_cung;
        $giong->ten_giong_thu_cung = $request->ten_giong_thu_cung;
        $giong->save();
        return redirect()->route('ql_dmgiongthucung');
    }
    public function xlSuaDMGiongThuCung(Request $request)
    {
        $giong = DMGiongThuCungModel::find( $request->id );
        $giong->id_loai_thu_cung = $request->ten_loai_thu_cung;
        $giong->ten_giong_thu_cung = $request->ten_giong_thu_cung;
        $giong->save();
        return redirect()->route('ql_dmgiongthucung');
    }
    public function xlXoaMGiongThuCung(Request $request)
    {
        $giong = DMGiongThuCungModel::find( $request->id );
        try {
            $giong->delete();
            return redirect()->route('ql_dmgiongthucung');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmgiongthucung')->with('bao_loi',$e);
        }
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
    public function xlThemDMKhuyenMai(Request $request)
    {
        $khuyen_mai = new DMKhuyenMaiModel();
        $khuyen_mai->ten_khuyen_mai = $request->ten_khuyen_mai;
        $khuyen_mai->ten_khuyen_mai_thu_cung = $request->ten_khuyen_mai_thu_cung;
        $khuyen_mai->save();
        return redirect()->route('ql_dmkhuyenmai');
    }
    public function xlSuaDMKhuyenMai(Request $request)
    {
        $khuyen_mai = DMKhuyenMaiModel::find( $request->id );
        $khuyen_mai->id_loai_thu_cung = $request->ten_loai_thu_cung;
        $khuyen_mai->ten_khuyen_mai_thu_cung = $request->ten_khuyen_mai_thu_cung;
        $khuyen_mai->save(); 
        return redirect()->route('ql_dmkhuyenmai');
    }
    public function xlXoaMKhuyenMai(Request $request)
    {
        $khuyen_mai = DMKhuyenMaiModel::find( $request->id );
        try {
            $khuyen_mai->delete();
            return redirect()->route('ql_dmkhuyenmai');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmkhuyenmai')->with('bao_loi',$e);
        }
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
