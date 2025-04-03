<?php

namespace App\Http\Controllers;

use App\Models\DMQuyenModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $query = TaiKhoanModel::query()->select('*')->leftJoin('ql_khachhang','ql_taikhoan.id_khach_hang','=','ql_khachhang.id');
        if($request->has('search_account')&& !empty($request->search_account)){
            $query = $query->where('tai_khoan', 'like', '%'.$request->search_account.'%');
            $data['search_account'] = $request->search_account;
        }
        if($request->has('search_role')&& !empty($request->search_role)){
            $query = $query->where('id_quyen', $request->search_role);
            $data['search_role'] = $request->search_role;
        }
        if($request->has('search_name')&& !empty($request->search_name)){
            $query = $query->where('ho_ten', 'like', '%'.$request->search_name.'%')->orWhere('ten_nhan_vien', 'like', '%'.$request->search_name.'%');
            $data['search_name'] = $request->search_name;
        }
        if($request->has('search_customer')&& !empty($request->search_customer)){
            if($request->search_customer==1) $query = $query->whereNull('id_khach_hang');
            else $query = $query->whereNotNull('id_khach_hang');
            $data['search_customer'] = $request->search_customer;
        }
        if($request->has('search_status')&& !empty($request->search_status)){
            if($request->search_status == 'active') $query = $query->where('trang_thai',1);
            else $query = $query->where('trang_thai',0);
            $data['search_status'] = $request->search_status;
        }
        $data['tai_khoans'] = $query->get();
        $data['quyens'] = DMQuyenModel::all();
        $data['count']=0;
        return view('Quan_ly_tai_khoan.quan_ly_tai_khoan',$data);
    }
    public function viewThem()
    {
        $data=[];
        $data['quyens'] = DMQuyenModel::all();
        return view('Quan_ly_tai_khoan.them_tai_khoan',$data);
    }
    public function viewSua(Request $request)
    {
        $data=[];
        $data['tai_khoan'] = TaiKhoanModel::find($request->id);
        $data['quyens'] = DMQuyenModel::whereNot('ten_quyen','Khách hàng')->get();
        return view('Quan_ly_tai_khoan.sua_tai_khoan',$data);
    }
    public function xlThem(Request $request){
        $tai_khoan = new TaiKhoanModel();
        $tai_khoan->tai_khoan = $request->tai_khoan;
        if($request->mat_khau!=$request->mat_khau_lai) return session()->flash('Mật khẩu nhập lại không đúng');
        $tai_khoan->mat_khau=md5($request->mat_khau);
        $tai_khoan->ten_nhan_vien = $request->ten_nhan_vien;
        $tai_khoan->id_quyen = $request->id_quyen;
        $tai_khoan->save();
        return redirect()->route('ql_tk');
    }
    public function xlSua(Request $request){
        $tai_khoan =TaiKhoanModel::find($request->tai_khoan);
        if(empty($tai_khoan->id_khach_hang)){
            $tai_khoan->ten_nhan_vien = $request->ten_nhan_vien;
            $tai_khoan->id_quyen = $request->id_quyen;
        }
        $tai_khoan->trang_thai = $request->trang_thai;
        $tai_khoan->save();
        return redirect()->route('ql_tk');
    }
}
