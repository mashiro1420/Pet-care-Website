<?php

namespace App\Http\Controllers;

use App\Models\DMDichVuModel;
use App\Models\DMGiaModel;
use App\Models\DMGiongThuCungModel;
use App\Models\DMLoaiThuCungModel;
use App\Models\DMKhuyenMaiModel;
use App\Models\DMLoaiKhachHangModel;
use App\Models\DMQuyenModel;
use App\Models\DMTrangThaiModel;
use App\Models\DMLoaiNoiDungModel;
use Carbon\Carbon;
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
        $data['gia'] = DMGiaModel::where( 'id_dich_vu','=',2 )->first();
        return view('Quan_ly_danh_muc.Quan_ly_dm_dich_vu.sua_dmdichvu', $data);
    }
    public function xlThemDMDichVu(Request $request)
    {
        $dich_vu = new DMDichVuModel();
        $gia = new DMGiaModel();
        $dich_vu->ten_dich_vu = $request->ten_dich_vu;
        $dich_vu->mo_ta = $request->mo_ta;
        $dich_vu->hien = $request->hien;
        $dich_vu->loai = $request->loai;
        $dich_vu->save();
        $dich_vu_moi = DMDichVuModel::orderBy('id','desc')->first();
        $gia->id_dich_vu = $dich_vu_moi->id;
        $gia->don_gia = $request->don_gia;
        $gia->save();
        return redirect()->route('ql_dmdichvu');
    }
    public function xlSuaDMDichVu(Request $request)
    {
        $dich_vu = DMDichVuModel::find( $request->id );
        $gia = DMGiaModel::where( 'id_dich_vu','=',$request->id )->first();
        $dich_vu->ten_dich_vu = $request->ten_dich_vu;
        $dich_vu->mo_ta = $request->mo_ta;
        $gia->don_gia = $request->don_gia;
        $dich_vu->hien = $request->hien;
        $dich_vu->loai = $request->loai;
        $gia->save();
        $dich_vu->save();
        return redirect()->route('ql_dmdichvu');
    }
    public function xlXoaMDichVu(Request $request)
    {
        $dich_vu = DMDichVuModel::find( $request->id );
        $gia = DMGiaModel::where( 'id_dich_vu','=',$request->id );
        try {
            $gia->delete();
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
    //DMGiongThuCung Controller
    public function viewDMGiongThuCung(Request $request)
    {
        $data = [];
        $query = DMGiongThuCungModel::query()->select('*','dm_giongthucung.id as id')
            ->leftJoin('dm_loaithucung', 'dm_giongthucung.id_loai_thu_cung', '=', 'dm_loaithucung.id');
        if($request->has('search_giong')&& !empty($request->search_giong)){
            $query = $query->where('ten_giong_thu_cung', 'like', '%'.$request->search_giong.'%');
            $data['search_giong'] = $request->search_giong;
        }
        if($request->has('search_loai')&& !empty($request->search_loai)){
            $query = $query->where('id_loai_thu_cung', '=', $request->search_loai);
            $data['search_loai'] = $request->search_loai;
        }
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
    public function xlXoaDMGiongThuCung(Request $request)
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
        if($request->has('search_ten')&& !empty($request->search_ten)){
            $query = $query->where('ten_khuyen_mai', 'like', '%'.$request->search_ten.'%');
            $data['search_ten'] = $request->search_ten;
        }
        if($request->has('search_trangthai')&& !empty($request->search_trangthai)){
            $query = $query->where('trang_thai', '=', $request->search_trangthai=='active'?1:0);
            $data['search_trangthai'] = $request->search_trangthai;
        }
        if($request->filled('search_phan_tram_tu')||$request->filled('search_phan_tram_den')){
            if(empty($request->search_phan_tram_tu)) $search_phan_tram_tu = 0;
            else $search_phan_tram_tu = $request->search_phan_tram_tu;
            if(empty($request->search_phan_tram_den)) $search_phan_tram_den = 100;
            else $search_phan_tram_den = $request->search_phan_tram_den;
            $query = $query->whereBetween('phan_tram', [$search_phan_tram_tu,$search_phan_tram_den]);
            $data['search_phan_tram_tu'] = $request->search_phan_tram_tu;
            $data['search_phan_tram_den'] = $request->search_phan_tram_den;
        }
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
        $khuyen_mai->noi_dung = $request->noi_dung;
        $khuyen_mai->phan_tram = $request->phan_tram;
        $khuyen_mai->so_giam = $request->so_giam;
        $khuyen_mai->trang_thai = $request->trang_thai;
        $khuyen_mai->tu_ngay = $request->tu_ngay;
        $khuyen_mai->den_ngay = $request->den_ngay;
        $khuyen_mai->save();
        return redirect()->route('ql_dmkhuyenmai');
    }
    public function xlSuaDMKhuyenMai(Request $request)
    {
        $khuyen_mai = DMKhuyenMaiModel::find( $request->id );
        $khuyen_mai->ten_khuyen_mai = $request->ten_khuyen_mai;
        $khuyen_mai->noi_dung = $request->noi_dung;
        $khuyen_mai->phan_tram = $request->phan_tram;
        $khuyen_mai->so_giam = $request->so_giam;
        $khuyen_mai->tu_ngay = $request->tu_ngay;
        $khuyen_mai->den_ngay = $request->den_ngay;
        $khuyen_mai->trang_thai = $request->trang_thai;
        $khuyen_mai->save(); 
        return redirect()->route('ql_dmkhuyenmai');
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
    public function xlThemDMLoaiKhachHang(Request $request)
    {
        $loai_khach_hang = new DMLoaiKhachHangModel();
        $loai_khach_hang->ten_loai_khach = $request->ten_loai_khach;
        $loai_khach_hang->hoi_vien = $request->hoi_vien;
        $loai_khach_hang->save();
        return redirect()->route('ql_dmloaikhachhang');
    }
    public function xlSuaDMLoaiKhachHang(Request $request)
    {
        $loai_khach_hang = DMLoaiKhachHangModel::find( $request->id );
        $loai_khach_hang->ten_loai_khach = $request->ten_loai_khach;
        $loai_khach_hang->hoi_vien = $request->hoi_vien;
        $loai_khach_hang->save(); 
        return redirect()->route('ql_dmloaikhachhang');
    }
    public function xlXoaDMLoaiKhachHang(Request $request)
    {
        $loai_khach_hang = DMLoaiKhachHangModel::find( $request->id );
        try {
            $loai_khach_hang->delete();
            return redirect()->route('ql_dmloaikhachhang');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmloaikhachhang')->with('bao_loi',$e);
        }
    }
    //DMLoaiThuCung Controller
    public function viewDMLoaiThuCung(Request $request)
    {
        $data = [];
        $query = DMLoaiThuCungModel::query()->select('*');
        $data['loai_thu_cungs'] = $query->orderBy('id','asc')->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_thu_cung.quan_ly_dmloaithucung', $data);
    }
    public function viewThemDMLoaiThuCung(Request $request)
    {
        $data = [];
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_thu_cung.them_dmloaithucung', $data);
    }
    public function viewSuaDMLoaiThuCung(Request $request)
    {
        $data = [];
        $data['loai_thu_cung'] = DMLoaiThuCungModel::find($request->id);
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_thu_cung.sua_dmloaithucung', $data);
    }
    public function xlThemDMLoaiThuCung(Request $request)
    {
        $loai_thu_cung = new DMLoaiThuCungModel();
        $loai_thu_cung->ten_loai_thu_cung = $request->ten_loai_thu_cung;
        $loai_thu_cung->save();
        return redirect()->route('ql_dmloaithucung');
    }
    public function xlSuaDMLoaiThuCung(Request $request)
    {
        $loai_thu_cung = DMLoaiThuCungModel::find( $request->id );
        $loai_thu_cung->ten_loai_thu_cung = $request->ten_loai_thu_cung;
        $loai_thu_cung->save(); 
        return redirect()->route('ql_dmloaithucung');
    }
    public function xlXoaDMLoaiThuCung(Request $request)
    {
        $loai_thu_cung = DMLoaiThuCungModel::find( $request->id );
        try {
            $loai_thu_cung->delete();
            return redirect()->route('ql_dmloaithucung');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmloaithucung')->with('bao_loi',$e);
        }
    }
    //DMQuyen Controller
    public function viewDMQuyen(Request $request)
    {
        $data = [];
        $query = DMQuyenModel::query()->select('*');
        $data['quyens'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_quyen.quan_ly_dmquyen', $data);
    }
    public function viewThemDMQuyen(Request $request)
    {
        $data = [];
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_quyen.them_dmquyen', $data);
    }
    public function viewSuaDMQuyen(Request $request)
    {
        $data = [];
        $data['quyen'] = DMQuyenModel::find($request->id);
        return view('Quan_ly_danh_muc.Quan_ly_dm_quyen.sua_dmquyen', $data);
    }
    public function xlThemDMQuyen(Request $request)
    {
        $quyen = new DMQuyenModel();
        $quyen->ten_quyen = $request->ten_quyen;
        $quyen->mo_ta = $request->mo_ta;
        $quyen->save();
        return redirect()->route('ql_dmquyen');
    }
    public function xlSuaDMQuyen(Request $request)
    {
        $quyen = DMQuyenModel::find( $request->id );
        $quyen->ten_quyen = $request->ten_quyen;
        $quyen->mo_ta = $request->mo_ta;
        $quyen->save(); 
        return redirect()->route('ql_dmquyen');
    }
    public function xlXoaDMQuyen(Request $request)
    {
        $quyen = DMQuyenModel::find( $request->id );
        try {
            $quyen->delete();
            return redirect()->route('ql_dmquyen');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmquyen')->with('bao_loi',$e);
        }
    }
    //DMTrangThai Controller
    public function viewDMTrangThai(Request $request)
    {
        $data = [];
        $query = DMTrangThaiModel::query()->select('*');
        $data['trang_thais'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_trang_thai.quan_ly_dmtrangthai', $data);
    }
    public function viewThemDMTrangThai(Request $request)
    {
        $data = [];
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_trang_thai.them_dmtrangthai', $data);
    }
    public function viewSuaDMTrangThai(Request $request)
    {
        $data = [];
        $data['trang_thai'] = DMTrangThaiModel::find($request->id);
        return view('Quan_ly_danh_muc.Quan_ly_dm_trang_thai.sua_dmtrangthai', $data);
    }
    public function xlThemDMTrangThai(Request $request)
    {
        $trang_thai = new DMTrangThaiModel();
        $trang_thai->ten_trang_thai = $request->ten_trang_thai;
        $trang_thai->save();
        return redirect()->route('ql_dmtrangthai');
    }
    public function xlSuaDMTrangThai(Request $request)
    {
        $trang_thai = DMTrangThaiModel::find( $request->id );
        $trang_thai->ten_trang_thai = $request->ten_trang_thai;
        $trang_thai->save(); 
        return redirect()->route('ql_dmtrangthai');
    }
    public function viewDMLoaiNoiDung(Request $request)
    {
        $data = [];
        $query = DMLoaiNoiDungModel::query()->select('*');
        $data['loai_noi_dungs'] = $query->paginate(5);
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_noi_dung.quan_ly_dmloainoidung', $data);
    }
    public function viewThemDMLoaiNoiDung(Request $request)
    {
        $data = [];
        $data['bao_loi'] = session('bao_loi');
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_noi_dung.them_dmloainoidung', $data);
    }
    public function viewSuaDMLoaiNoiDung(Request $request)
    {
        $data = [];
        $data['loai_noi_dung'] = DMLoaiNoiDungModel::find($request->id);
        return view('Quan_ly_danh_muc.Quan_ly_dm_loai_noi_dung.sua_dmloainoidung', $data);
    }
    public function xlThemDMLoaiNoiDung(Request $request)
    {
        $loai_noi_dung = new DMLoaiNoiDungModel();
        $loai_noi_dung->ten_loai_noi_dung = $request->ten_loai_noi_dung;
        $loai_noi_dung->save();
        return redirect()->route('ql_dmloainoidung');
    }
    public function xlSuaDMLoaiNoiDung(Request $request)
    {
        $loai_noi_dung = DMLoaiNoiDungModel::find( $request->id );
        $loai_noi_dung->ten_loai_noi_dung = $request->ten_loai_noi_dung;
        $loai_noi_dung->save(); 
        return redirect()->route('ql_dmloainoidung');
    }
    public function xlXoaDMLoaiNoiDung(Request $request)
    {
        $loai_noi_dung = DMLoaiNoiDungModel::find( $request->id );
        try {
            $loai_noi_dung->delete();
            return redirect()->route('ql_dmloainoidung');
        }
        catch (Exception $e) {
            return redirect()->route('ql_dmloainoidung')->with('bao_loi',$e);
        }
    }
}
