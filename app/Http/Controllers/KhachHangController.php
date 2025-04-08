<?php

namespace App\Http\Controllers;

use App\Models\DMLoaiKhachHangModel;
use App\Models\KhachHangModel;
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
        $data['khach_hangs'] = $query->paginate(5);
        $data['loai_khachs'] = DMLoaiKhachHangModel::all();
        $data['count']=0;
        return view('Quan_ly_khach_hang.quan_ly_khach_hang',$data);
    }
}
