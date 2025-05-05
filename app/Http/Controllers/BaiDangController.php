<?php

namespace App\Http\Controllers;

use App\Models\BaiDangModel;
use App\Models\DMLoaiNoiDungModel;
use File;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BaiDangController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $query = BaiDangModel::select('*','ql_baidang.id as bd_id')
        ->leftJoin('ql_taikhoan','ql_taikhoan.tai_khoan','=','ql_baidang.id_nhan_vien')
        ->leftJoin('dm_loainoidung','dm_loainoidung.id','=','ql_baidang.id_loai_noi_dung');
        $data['loai_noi_dungs'] = DMLoaiNoiDungModel::all();
        $data['bai_dangs'] = $query->paginate('10');
        return view('Quan_ly_bai_dang.quan_ly_bai_dang', $data);
    }
    public function viewThem(Request $request)
    {
        $data['loai_noi_dungs']= DMLoaiNoiDungModel::all();
        return view('Quan_ly_bai_dang.them_bai_dang', $data);
    }
    public function viewSua(Request $request)
    {
        $data['bai_dang'] = BaiDangModel::find($request->id);
        $data['loai_noi_dungs']= DMLoaiNoiDungModel::all();
        return view('Quan_ly_bai_dang.sua_bai_dang', $data);
    }
    public function viewBaiDang(Request $request)
    {
        $bai_dang = BaiDangModel::find($request->id);
        $bai_dang->luot_xem +=1;
        $bai_dang->save();
        $data['bai_dang']=$bai_dang;
        return view('Quan_ly_bai_dang.chi_tiet_bai_dang', $data);
    }
    public function xlThem(Request $request)
    {
        // dd($request);
        $nhan_vien = session('tai_khoan');
        $bai_dang = new BaiDangModel();
        $bai_dang->tieu_de = $request->tieu_de;
        if ($request->hasFile('thumbnail')) {
            $filename = md5(time().rand(1,100) . $request->thumbnail->getClientOriginalName()) . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move('Bai_dang_data', $filename);
            $bai_dang->thumbnail = $filename;
        }
        $bai_dang->tom_tat = $request->tom_tat;
        $bai_dang->noi_dung = $request->noi_dung;
        // $bai_dang->ngay_dang = $request->ngay_dang;
        $bai_dang->id_loai_noi_dung  = $request->loai_noi_dung ;
        $bai_dang->id_nhan_vien  = $nhan_vien;
        if ($request->hasFile('hinh_anh')) {
            $filename = md5(time().rand(1,100) . $request->hinh_anh->getClientOriginalName()) . '.' . $request->hinh_anh->getClientOriginalExtension();
            $request->hinh_anh->move('Bai_dang_data', $filename);
            $bai_dang->hinh_anh = $request->hinh_anh;
        }
        $bai_dang->link_video = $request->link_video;

        $bai_dang->save();
        return redirect()->route('ql_baidang')->with('success','');
    }
    public function xlSua(Request $request)
    {
        $bai_dang = BaiDangModel::find($request->id);
        $bai_dang->tieu_de = $request->tieu_de;
        if ($request->hasFile('thumbnail')) {
            if(File::exists('Bai_dang_data/' . $bai_dang->thumbnail)){
                File::delete('Bai_dang_data/' . $bai_dang->thumbnail);
            }
            $filename = md5(time().rand(1,100) . $request->thumbnail->getClientOriginalName()) . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move('Bai_dang_data', $filename);
            $bai_dang->thumbnail = $filename;
        }
        $bai_dang->tom_tat = $request->tom_tat;
        $bai_dang->noi_dung = $request->noi_dung;
        $bai_dang->id_loai_noi_dung  = $request->loai_noi_dung ;
        if ($request->hasFile('hinh_anh')) {
            if(File::exists('Bai_dang_data/' . $bai_dang->hinh_anh)){
                File::delete('Bai_dang_data/' . $bai_dang->hinh_anh);
            }
            $filename = md5(time().rand(1,100) . $request->hinh_anh->getClientOriginalName()) . '.' . $request->hinh_anh->getClientOriginalExtension();
            $request->hinh_anh->move('Bai_dang_data', $filename);
            $bai_dang->hinh_anh = $request->hinh_anh;
        }
        $bai_dang->link_video = $request->link_video;
        $bai_dang->trang_thai = $request->trang_thai;
        $bai_dang->save();
        return redirect()->route('ql_baidang')->with('success','');
    }

    public function xlThich(Request $request)
    {
        $bai_dang = BaiDangModel::find($request->id);
        $bai_dang->luot_thich +=1;
        $bai_dang->save();
    }
    public function xlDangLai(Request $request)
    {
        $bai_dang = BaiDangModel::find($request->query('id'));
        $bai_dang->trang_thai = 1;
        $bai_dang->ngay_dang = date('Y-m-d H:i:s');
        $bai_dang->save();
        return redirect()->route('ql_baidang')->with('success','');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $file = $request->file('file');
        $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('public/Bai_dang', $filename);

        return response()->json([
            'location' => Storage::url($path)
        ]);
    }
}
