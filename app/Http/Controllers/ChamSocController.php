<?php

namespace App\Http\Controllers;

use App\Mail\XacNhanDatLichMail;
use App\Models\ChamSocModel;
use App\Models\CSDichVuThemModel;
use App\Models\DMDichVuModel;
use App\Models\DMTrangThaiModel;
use App\Models\KhachHangModel;
use App\Models\TaiKhoanModel;
use App\Models\DMGiongThuCungModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChamSocController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data = [];
        $query = ChamSocModel::query()->select('*', 'ql_chamsoc.id as id')
            ->join('ql_khachhang', 'ql_khachhang.id', '=', 'ql_chamsoc.id_khach_hang')
            ->join('dm_trangthai', 'dm_trangthai.id', '=', 'ql_chamsoc.id_trang_thai')
            ->join('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_chamsoc.id_giong')
            ->join('ql_taikhoan', 'ql_taikhoan.tai_khoan', '=', 'ql_chamsoc.id_nhan_vien');
        $data['cham_socs'] = $query->paginate(5);
        $data['trang_thais'] = DMTrangThaiModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();
        $data['tai_khoans'] = TaiKhoanModel::all();
        $data['khach_hangs'] = KhachHangModel::all();
        $data['dich_vus'] = CSDichVuThemModel::all();
        return view('Quan_ly_cham_soc.quan_ly_dat_lich_cham_soc', $data);
    }
    public function viewKhachHang(Request $request)
    {
        $data = [];
        $data['cham_socs'] = ChamSocModel::orderBy('id','desc')->paginate(5);
        $data['trang_thais'] = DMTrangThaiModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();  
        $data['tai_khoans'] = TaiKhoanModel::all();
        $data['dich_vus'] = CSDichVuThemModel::all();
        return view('Giao_dien_khach.Dat_lich_cham_soc.khach_hang_lich_cham_soc', $data);
    }
    public function viewDatLich(Request $request)
    {
        $data = [];
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();
        return view('Giao_dien_khach.Dat_lich_cham_soc.dat_lich_cham_soc', $data);
    }
    public function viewChiTiet(Request $request)
    {
        $data = [];
        $data['cham_soc'] = ChamSocModel::find($request->id);
        $data['trang_thais'] = DMTrangThaiModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();
        $data['tai_khoans'] = TaiKhoanModel::all();
        $data['khach_hangs'] = KhachHangModel::all();
        $data['dich_vus'] = DMDichVuModel::all();
        return view('Quan_ly_cham_soc.chi_tiet', $data);
    }
    public function viewSuaLich(Request $request)
    {
        
    }
    public function xlDatLich(Request $request)
    {
        $dat_lich = new ChamSocModel();

        $khach = KhachHangModel::where('email','=',session('tai_khoan'))->first();
        $dat_lich->id_khach_hang = $khach->id;
        $dat_lich->id_trang_thai = 1;
        $dat_lich->ngay = $request->ngay;
        $dat_lich->thoi_gian = $request->thoi_gian;
        $dat_lich->id_giong = $request->giong;
        $dat_lich->ghi_chu = $request->ghi_chu;
        $dat_lich->save();
        $dat_lich_moi = ChamSocModel::orderBy('id','desc')->first();
        foreach ($request->dich_vu_them as $dich_vu) {
            $dich_vu_them = new CSDichVuThemModel();
            $dich_vu_them->id_cham_soc = $dat_lich_moi->id;
            $dich_vu_them->id_dich_vu = $dich_vu;
            $dich_vu_them->save();
        }
        $thong_tin = [
            'loai' => 1,
			'email' => $khach->email,
			'ho_ten' => $khach->ten_khach_hang,
            'sdt' => $khach->sdt,
            'ngay' => $request->ngay,
            'thoi_gian' => $request->thoi_gian,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu_them' => $request->dich_vu_them,
            'dich_vu' => 'CS'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_dat_lich');
    }
    public function xlSuaLich(Request $request)
    {
        $dat_lich = ChamSocModel::find($request->id);
        $dat_lich->ngay = $request->ngay;
        $dat_lich->thoi_gian = $request->thoi_gian;
        $dat_lich->id_giong = $request->giong;
        $dat_lich->ghi_chu = $request->ghi_chu;
        $dat_lich->save();
        $dich_vu_thems = CSDichVuThemModel::where('id_cham_soc','=', $request->id)->get();
        foreach ($dich_vu_thems as $dich_vu_them){
            $dich_vu_them->delete();
        }
        foreach ($request->dich_vu_them as $dich_vu) {
            $dich_vu_them = new CSDichVuThemModel();
            $dich_vu_them->id_cham_soc = $request->id;
            $dich_vu_them->id_dich_vu = $dich_vu;
            $dich_vu_them->save();
        }
        $thong_tin = [
            'loai' => 2,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'ngay' => $request->ngay,
            'thoi_gian' => $request->thoi_gian,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu_them' => $request->dich_vu_them,
            'dich_vu' => 'CS'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_dat_lich');
    }
    public function xlHoanThanh(Request $request)
    {
        $dat_lich = ChamSocModel::find($request->id);
        $dat_lich->id_trang_thai = 2;
        $dat_lich->danh_gia = $request->danh_gia;
        $dat_lich->save(); 
        $thong_tin = [
            'loai' => 3,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'ngay' => $request->ngay,
            'thoi_gian' => $request->thoi_gian,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu_them' => $request->dich_vu_them,
            'dich_vu' => 'CS'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('ql_datlichchamsoc');

    }
    protected function xlGuiMailXacNhan( $thong_tin)
    {
		$result = Mail::to($thong_tin->email)->send(new XacNhanDatLichMail($thong_tin));
        if($result){
			session()->flash('bao_loi','Gửi thành công');
			}
		else session()->flash('bao_loi','Gửi không thành công');
    }
}
