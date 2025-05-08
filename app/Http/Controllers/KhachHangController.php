<?php

namespace App\Http\Controllers;

use App\Models\DMLoaiKhachHangModel;
use App\Models\HoiVienModel;
use App\Models\KhachHangModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $query = KhachHangModel::query()->select('*');
        if($request->has('search_email')&& !empty($request->search_email)){
            $query = $query->where('email', 'like', '%'.$request->search_email.'%');
            $data['search_email'] = $request->search_email;
        }
        if($request->has('search_id')&& !empty($request->search_id)){
            $query = $query->where('sdt', 'like', '%'.$request->search_id.'%');
            $data['search_id'] = $request->search_id;
        }
        if($request->has('search_phone')&& !empty($request->search_phone)){
            $query = $query->where('sdt', 'like', '%'.$request->search_phone.'%');
            $data['search_phone'] = $request->search_phone;
        }
        if($request->has('search_name')&& !empty($request->search_name)){
            $query = $query->where('ho_ten', 'like', '%'.$request->search_name.'%');
            $data['search_name'] = $request->search_name;
        }
        if($request->has('search_customer')&& !empty($request->search_customer)){
            $query = $query->where('id_loai_khach_hang',$request->search_customer);
            $data['search_customer'] = $request->search_customer;
        }
        if($request->has('search_member')){
            $data['hoi_viens'] = HoiVienModel::paginate(5);
            $data['search_member'] = $request->search_member;
            // $query = HoiVienModel::leftJoin('ql_khachhang','ql_khachhang.id','=','ql_hoivien.id_khach_hang')
            // ->leftJoin('dm_loaikhachhang','dm_loaikhachhang.id','=','ql_hoivien.id_khachhang')
        }
        $data['khach_hangs'] = $query->paginate(5);
        $data['loai_khachs'] = DMLoaiKhachHangModel::all();
        $data['count']=0;
        return view('Quan_ly_khach_hang.quan_ly_khach_hang',$data);
    }
    public function viewQLHoiVien(Request $request)
    {
        $query = HoiVienModel:: select('*','ql_khachhang.id as khach_hang_id')
            ->leftJoin('ql_khachhang','ql_hoivien.id_khach_hang','=','ql_khachhang.id')
            ->leftJoin('dm_loaikhachhang','ql_hoivien.id_loai_khach_hang','=','dm_loaikhachhang.id');
        $data['hoi_viens'] = $query->paginate(5);
        $data['loai_khach_hangs'] = DMLoaiKhachHangModel::where('hoi_vien','=',1);
        $data['count'] = 0;
        return view('Quan_ly_khach_hang.quan_ly_hoi_vien',$data);
    }
    public function viewDKHoiVien(Request $request)
    {
        $data = [];
        return view('Quan_ly_khach_hang.quan_ly_hoi_vien',$data);
    }
    public function viewKhachHoiVien(Request $request)
    {
        $tai_khoan_hien_tai = TaiKhoanModel::find(session('tai_khoan'));
        $data['hoi_vien'] = HoiVienModel::where('id_khach_hang','=',$tai_khoan_hien_tai->KhachHang->id);
        if(empty($data['hoi_vien'])) return view('Giao_dien_khach.dang_ky_hoi_vien');
        else return view('Giao_dien_khach.khach_hoi_vien',$data);
    }

    public function xlDKHoiVien(Request $request)
    {
        $tai_khoan_hien_tai = TaiKhoanModel::find(session('tai_khoan'));
        $loai_khach_hang = DMLoaiKhachHangModel::where('ten_loai_khach','=','Hội viên mới');
        $khach_hang = $tai_khoan_hien_tai->KhachHang;
        $khach_hang->cccd = $request->cccd;
        $khach_hang->ngay_lam_cc = $request->ngay_lam_cc;
        $khach_hang->noi_lam_cc = $request->noi_lam_cc;
        $hoi_vien = new HoiVienModel();
        $hoi_vien->id_khach_hang = $khach_hang->id;
        $hoi_vien->diem_hoi_vien = 0;
        $hoi_vien->id_loai_khach_hang = $loai_khach_hang->id;
        $hoi_vien->save();
        $khach_hang->save();
        return redirect()->route('');
    }
    public function xlDKHoiVienTrucTiep(Request $request)
    {
        $loai_khach_hang = DMLoaiKhachHangModel::where('ten_loai_khach','=','Hội viên mới');
        $khach_hang = KhachHangModel::find($request->id_khach_hang);
        $khach_hang->cccd = $request->cccd;
        $khach_hang->ngay_lam_cc = $request->ngay_lam_cc;
        $khach_hang->noi_lam_cc = $request->noi_lam_cc;
        $hoi_vien = new HoiVienModel();
        $hoi_vien->id_khach_hang = $request->id_khach_hang;
        $hoi_vien->diem_hoi_vien = 0;
        $hoi_vien->id_loai_khach_hang = $loai_khach_hang->id;
        $hoi_vien->save();
        $khach_hang->save();
        return redirect()->route('ql_hoi_vien');
    }
    public function viewChiTietTaiKhoan(Request $request)
    {
        $data = [];
        return view('Giao_dien_khach.chi_tiet_tai_khoan', $data);
    }
}
