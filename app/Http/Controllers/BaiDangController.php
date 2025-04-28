<?php

namespace App\Http\Controllers;

use App\Models\BaiDangModel;
use App\Models\DMLoaiNoiDungModel;
use File;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;

class BaiDangController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $query = BaiDangModel::select('*');
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
        return view('Quan_ly_bai_dang.them_bai_dang', $data);
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
        $nhan_vien = session('tai_khoan');
        $bai_dang = new BaiDangModel();
        $bai_dang->tieu_de = $request->tieu_de;
        if ($request->hasFile('thumbnail')) {
            $this->upload_file($request->thumbnail);
            $bai_dang->thumbnail = $request->thumbnail;
        }
        $bai_dang->tom_tat = $request->tom_tat;
        $bai_dang->noi_dung = $request->noi_dung;
        $bai_dang->ngay_dang = $request->ngay_dang;
        $bai_dang->id_loai_noi_dung  = $request->loai_noi_dung ;
        $bai_dang->id_nhan_vien  = $nhan_vien;
        if ($request->hasFile('hinh_anh')) {
            $this->upload_file($request->hinh_anh);
            $bai_dang->hinh_anh = $request->hinh_anh;
        }
        if ($request->hasFile('link_video')) {
            $this->upload_file($request->link_video);
            $bai_dang->link_video = $request->link_video;
        }
        $bai_dang->save();
    }
    public function xlSua(Request $request)
    {
        $bai_dang = BaiDangModel::find($request->id);
        $bai_dang->tieu_de = $request->tieu_de;
        if ($request->hasFile('thumbnail')) {
            $this->upload_file($request->thumbnail);
            $bai_dang->thumbnail = $request->thumbnail;
        }
        $bai_dang->tom_tat = $request->tom_tat;
        $bai_dang->noi_dung = $request->noi_dung;
        $bai_dang->id_loai_noi_dung  = $request->loai_noi_dung ;
        if ($request->hasFile('hinh_anh')) {
            $this->upload_file($request->hinh_anh);
            $bai_dang->hinh_anh = $request->hinh_anh;
        }
        if ($request->hasFile('link_video')) {
            $this->upload_file($request->link_video);
            $bai_dang->link_video = $request->link_video;
        }
        $bai_dang->trang_thai = $request->trang_thai;
        $bai_dang->save();
    }
    protected function upload_file(File $file)
    {
        $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        $file->move('Hop_dong_data', $filename);
        return $filename;
    }
    public function xlThich(Request $request)
    {
        $bai_dang = BaiDangModel::find($request->id);
        $bai_dang->luot_thich +=1;
        $bai_dang->save();
    }
    public function xlDangLai(Request $request)
    {
        $bai_dang = BaiDangModel::find($request->id);
        $bai_dang->trang_thai = $request->trang_thai;
        $bai_dang->ngay_dang = date('Y-m-d H:i:s');
        $bai_dang->save();
    }
}
