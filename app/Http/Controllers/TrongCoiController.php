<?php

namespace App\Http\Controllers;

use App\Mail\XacNhanDatLichMail;
use App\Models\KhachHangModel;
use App\Models\TCDichVuThemModel;
use App\Models\TrongCoiModel;
use Illuminate\Http\Request;
use Mail;

class TrongCoiController extends Controller
{
    public function viewQuanLy(Request $request)
    {

    }
    public function viewKhachHang(Request $request)
    {
        
    }
    public function viewDatLich(Request $request)
    {
        
    }
    public function viewChiTiet(Request $request)
    {
        
    }
    public function viewSuaLich(Request $request)
    {
        
    }
    public function xlDatLich(Request $request)
    {
        $dat_lich = new TrongCoiModel();

        $khach = KhachHangModel::where('email','=',session('tai_khoan'))->first();
        $dat_lich->id_khach_hang = $khach->id;
        $dat_lich->id_trang_thai = 1;
        $dat_lich->tu_ngay = $request->tu_ngay;
        $dat_lich->den_ngay = $request->den_ngay;
        $dat_lich->id_giong = $request->giong;
        $dat_lich->ghi_chu = $request->ghi_chu;
        $dat_lich->save();
        $dat_lich_moi = TrongCoiModel::orderBy('id','desc')->first();
        foreach ($request->dich_vu_them as $dich_vu) {
            $dich_vu_them = new TCDichVuThemModel();
            $dich_vu_them->id_cham_soc = $dat_lich_moi->id;
            $dich_vu_them->id_dich_vu = $dich_vu;
            $dich_vu_them->save();
        }
        $thong_tin = [
            'loai' => 1,
			'email' => $khach->email,
			'ho_ten' => $khach->ten_khach_hang,
            'sdt' => $khach->sdt,
            'tu_ngay' => $request->tu_ngay,
            'den_ngay' => $request->den_ngay,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu_them' => $request->dich_vu_them,
            'dich_vu' => 'TC'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_dat_lich');
    }
    public function xlSuaLich(Request $request)
    {
        $dat_lich = TrongCoiModel::find($request->id);
        $dat_lich->ngay = $request->ngay;
        $dat_lich->thoi_gian = $request->thoi_gian;
        $dat_lich->id_giong = $request->giong;
        $dat_lich->ghi_chu = $request->ghi_chu;
        $dat_lich->save();
        $dich_vu_thems = TCDichVuThemModel::where('id_cham_soc','=', $request->id)->get();
        foreach ($dich_vu_thems as $dich_vu_them){
            $dich_vu_them->delete();
        }
        foreach ($request->dich_vu_them as $dich_vu) {
            $dich_vu_them = new TCDichVuThemModel();
            $dich_vu_them->id_cham_soc = $request->id;
            $dich_vu_them->id_dich_vu = $dich_vu;
            $dich_vu_them->save();
        }
        $thong_tin = [
            'loai' => 2,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'tu_ngay' => $request->tu_ngay,
            'den_ngay' => $request->den_ngay,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu_them' => $request->dich_vu_them,
            'dich_vu' => 'TC'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_dat_lich');
    }
    public function xlTiepNhan(Request $request)
    {
        $dat_lich = TrongCoiModel::find($request->id);
        $dat_lich->id_trang_thai = 2;
        $dat_lich->gio_nhan = $request->gio_nhan;
        $dat_lich->save();
        return redirect()->route('ql_datlichtrongcoi');
    }
    public function xlHoanThanh(Request $request)
    {
        $dat_lich = TrongCoiModel::find($request->id);
        $dat_lich->id_trang_thai = 2;
        $dat_lich->gio_tra = $request->gio_tra;
        $dat_lich->danh_gia = $request->danh_gia;
        $dat_lich->save(); 
        $thong_tin = [
            'loai' => 3,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'tu_ngay' => $request->tu_ngay,
            'den_ngay' => $request->den_ngay,
            'gio_nhan' => $request->gio_nhan,
            'gio_tra' => $request->gio_tra,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu_them' => $request->dich_vu_them,
            'dich_vu' => 'TC'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('ql_datlichtrongcoi');
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
