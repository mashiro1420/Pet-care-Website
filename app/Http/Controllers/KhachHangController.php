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
        $query = KhachHangModel::query()->select('*','ql_khachhang.id as khach_hang_id','dm_loaikhachhang.id as loai_id','ql_hoivien.id as hoi_vien_id')
        ->leftJoin('dm_loaikhachhang','dm_loaikhachhang.id','=','ql_khachhang.id_loai_khach_hang')
        ->leftJoin('ql_hoivien','ql_hoivien.id_khach_hang','=','ql_khachhang.id');
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
        if($request->has('search_member')&& !empty($request->search_member)){
            $query = $query->whereNotNull('ql_hoivien.id');
            $data['search_member'] = $request->search_member;
            // $query = HoiVienModel::leftJoin('ql_khachhang','ql_khachhang.id','=','ql_hoivien.id_khach_hang')
            // ->leftJoin('dm_loaikhachhang','dm_loaikhachhang.id','=','ql_hoivien.id_khachhang')
        }
        $data['khach_hangs'] = $query->paginate(5);
        $data['loai_khachs'] = DMLoaiKhachHangModel::all();
        $data['count']=0;
        return view('Quan_ly_khach_hang.quan_ly_khach_hang',$data);
    }
    public function viewChiTietKhachHang(Request $request)
    {
        $data = []; 
        $data['khach_hang'] = KhachHangModel::query()->select('*','ql_khachhang.id as khach_hang_id','dm_loaikhachhang.id as loai_id','ql_hoivien.id as hoi_vien_id')
        ->leftJoin('dm_loaikhachhang','dm_loaikhachhang.id','=','ql_khachhang.id_loai_khach_hang')
        ->leftJoin('ql_hoivien','ql_hoivien.id_khach_hang','=','ql_khachhang.id')->find($request->id);
        return view('Quan_ly_khach_hang.chi_tiet_kh', $data);   
    }
    public function viewChiTietTaiKhoan(Request $request)
    {
        $data = [];
        $data['khach_hang'] = KhachHangModel::query()->select('*','ql_khachhang.id as khach_hang_id','dm_loaikhachhang.id as loai_id','ql_hoivien.id as hoi_vien_id')
        ->leftJoin('dm_loaikhachhang','dm_loaikhachhang.id','=','ql_khachhang.id_loai_khach_hang')
        ->leftJoin('ql_hoivien','ql_hoivien.id_khach_hang','=','ql_khachhang.id')
        ->leftJoin('ql_taikhoan','ql_taikhoan.id_khach_hang','=','ql_khachhang.id')
        ->where('tai_khoan',session('tai_khoan'))->first();
        $data['muc'] = [50,150,300];
        return view('Giao_dien_khach.chi_tiet_tai_khoan', $data);
    }

    public function xlDKHoiVien(Request $request)
    {
        $loai_khach_hang = DMLoaiKhachHangModel::where('ten_loai_khach','=','Hội viên mới')->first();
        $khach_hang = KhachHangModel::find($request->id_khach_hang);
        $khach_hang->cccd = $request->cccd;
        $khach_hang->ngay_lam_cc = $request->ngay_lam_cc;
        $khach_hang->noi_lam_cc = $request->noi_lam_cc;
        $khach_hang->id_loai_khach_hang = $loai_khach_hang->id;
        $hoi_vien = new HoiVienModel();
        $hoi_vien->id_khach_hang = $request->id_khach_hang;
        $hoi_vien->diem_hoi_vien = 0;
        $hoi_vien->save();
        $khach_hang->save();
        return redirect()->back();
    }
    public function xlCapNhatTaiKhoan(Request $request)
    {
        $khach_hang = KhachHangModel::find($request->id_khach_hang);
        $khach_hang->ho_ten = $request->ho_ten;
        $khach_hang->sdt = $request->sdt;
        $khach_hang->email = $request->email;
        $khach_hang->ngay_sinh = $request->ngay_sinh;
        if(!empty($request->cccd)&&!empty($request->ngay_lam_cc)&&!empty($request->noi_lam_cc)){
            $khach_hang->cccd = $request->cccd;
            $khach_hang->ngay_lam_cc = $request->ngay_lam_cc;
            $khach_hang->noi_lam_cc = $request->noi_lam_cc;
        }
        $khach_hang->save();
        return redirect()->back();
    }
}
