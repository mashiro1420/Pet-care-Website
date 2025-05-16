<?php

namespace App\Http\Controllers;

use App\Mail\XacNhanDatLichMail;
use App\Models\DMDichVuModel;
use App\Models\DMGiaModel;
use App\Models\DMKhuyenMaiModel;
use App\Models\DMLoaiThuCungModel;
use App\Models\KhachHangModel;
use App\Models\TCDichVuModel;
use App\Models\TCDichVuThemModel;
use App\Models\TCThanhToanModel;
use App\Models\TrongCoiModel;
use App\Models\DMGiongThuCungModel;
use App\Models\DMTrangThaiModel;
use App\Models\HoiVienModel;
use App\Models\TaiKhoanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TrongCoiController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data = [];
        $query = TrongCoiModel::query()->select('*', 'ql_trongcoi.id as tc_id', 'dm_trangthai.id as trang_thai')
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_trongcoi.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_trongcoi.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_trongcoi.id_giong');
        if($request->has('search_khachhang')&& !empty($request->search_khachhang)){
            $query = $query->where('ho_ten', 'like', '%'.$request->search_khachhang.'%');
            $data['search_khachhang'] = $request->search_khachhang;
        }
        if($request->has('search_trangthai')&& !empty($request->search_trangthai)){
            $query = $query->where('id_trang_thai',$request->search_trangthai);
            $data['search_trangthai'] = $request->search_trangthai;
        }
        if($request->filled('search_tu_tc')||$request->filled('search_den_tc')){
            if(empty($request->search_tu_tc)) $search_tu_tc = date("Y-m-d");
            else $search_tu_tc = $request->search_tu_tc;
            if(empty($request->search_den_tc)) $search_den_tc =  date("Y-m-d");
            else $search_den_tc = $request->search_den_tc;
            $query = $query->whereBetween('ngay', [$search_tu_tc,$search_den_tc]);
            $data['search_tu_tc'] = $request->search_tu_tc;
            $data['search_den_tc'] = $request->search_den_tc;
        }
        if($request->filled('search_tu_dat')||$request->filled('search_den_dat')){
            if(empty($request->search_tu_dat)) $search_tu_dat = date("Y-m-d");
            else $search_tu_dat = $request->search_tu_dat;
            if(empty($request->search_den_dat)) $search_den_dat =  date("Y-m-d");
            else $search_den_dat = $request->search_den_dat;
            $query = $query->whereBetween('ngay', [$search_tu_dat,$search_den_dat]);
            $data['search_tu_dat'] = $request->search_tu_dat;
            $data['search_den_dat'] = $request->search_den_dat;
        }
        if($request->has('search_danhgia')&& !empty($request->search_danhgia)){
            $query = $query->where('danh_gia',$request->search_danhgia);
            $data['search_danhgia'] = $request->search_danhgia;
        }
        $data['trong_cois'] = $query->paginate(5);
        $data['trang_thais'] = DMTrangThaiModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();
        $data['tai_khoans'] = TaiKhoanModel::all();
        $data['khach_hangs'] = KhachHangModel::all();
        $data['dich_vus'] = TCDichVuThemModel::all();
        return view('Quan_ly_trong_coi.quan_ly_dat_lich_trong_coi', $data);
    }
    public function viewKhachHang(Request $request)
    {
        $data = [];
        $query = TrongCoiModel::query()->select('*', 'ql_trongcoi.id as id')
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_trongcoi.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_trongcoi.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_trongcoi.id_giong')
            ->leftJoin('ql_thanhtoantrongcoi','ql_trongcoi.id','=','ql_thanhtoantrongcoi.id_trong_coi')
            ->where('email', session('tai_khoan'));
        $data['trong_cois'] = $query->paginate(5);
        return view('Giao_dien_khach.Dat_lich_trong_coi.khach_hang_lich_trong_coi', $data);
    }
    public function viewDatLich(Request $request)
    {
        $data = [];
        $data['loai_thu_cungs'] = DMLoaiThuCungModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::select('*','dm_loaithucung.id as loai_id','dm_giongthucung.id as id')
            ->leftJoin('dm_loaithucung','dm_giongthucung.id_loai_thu_cung','=','dm_loaithucung.id')->get();
        // dd( $data['giong_thu_cungs']);
        return view('Giao_dien_khach.Dat_lich_trong_coi.dat_lich_trong_coi', $data);
    }
    public function viewChiTietAdmin(Request $request)
    {
        $data = [];
        $data['trong_coi'] = TrongCoiModel::query()
            ->select(
                'ql_trongcoi.*',
                'ql_trongcoi.id as tc_id',
                'dm_trangthai.ten_trang_thai as ten_trang_thai',
                'dm_giongthucung.ten_giong_thu_cung',
                'ql_khachhang.ho_ten as ten_khach_hang',
                'ql_thanhtoantrongcoi.tong_tien'
            )
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_trongcoi.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_trongcoi.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_trongcoi.id_giong')
            ->leftJoin('ql_thanhtoantrongcoi', 'ql_thanhtoantrongcoi.id_trong_coi', '=', 'ql_trongcoi.id')
            ->where('ql_trongcoi.id', $request->id)
            ->first();
        $dich_vu_them = TCDichVuThemModel::where('id_trong_coi', $request->id)->get();
        $dich_vu_mac_dinh = TCDichVuModel::all();
        $data['dich_vu_them'] = [];
        foreach($dich_vu_mac_dinh as $item){
            $data['dich_vu_them'][] = $item->id_dich_vu;
        }
        foreach ($dich_vu_them as $item) {
            $data['dich_vu_them'][] = $item->id_dich_vu;
        }
        $data['trang_thais'] = DMTrangThaiModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();
        $data['tai_khoans'] = TaiKhoanModel::all();
        $data['khach_hangs'] = KhachHangModel::all();
        $data['dich_vus'] = DMDichVuModel::where('hien',1)->where('loai',2)->get();
        return view('Quan_ly_trong_coi.chi_tiet_admin', $data);
    }
    public function viewChiTietUser(Request $request)
    {
        $data = []; 
        $data['trong_coi'] = TrongCoiModel::query()
            ->select(
                'ql_trongcoi.*',
                'ql_trongcoi.id as tc_id',
                'dm_trangthai.ten_trang_thai as ten_trang_thai',
                'dm_giongthucung.ten_giong_thu_cung',
                'ql_khachhang.ho_ten as ten_khach_hang',
                'ql_thanhtoantrongcoi.tong_tien'
            )
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_trongcoi.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_trongcoi.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_trongcoi.id_giong')
            ->leftJoin('ql_thanhtoantrongcoi', 'ql_thanhtoantrongcoi.id_trong_coi', '=', 'ql_trongcoi.id')
            ->where('ql_trongcoi.id', $request->id)
            ->first();
        $dich_vu_them = TCDichVuThemModel::where('id_trong_coi', $request->id)->get();
        $data['dich_vu_them'] = [];
        foreach ($dich_vu_them as $item) {
            $data['dich_vu_them'][] = $item->id_dich_vu;
        }
        // dd($data['dich_vu_them']);
        $data['dich_vus'] = DMDichVuModel::where('hien',1)->where('loai',2)->get();
        return view('Giao_dien_khach.Dat_lich_trong_coi.chi_tiet_user', $data);
    }
    public function viewThanhToan(Request $request)
    {
        $data = [];
        $data['trong_coi'] = TrongCoiModel::query()->select('*', 'ql_trongcoi.id as tc_id')
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_trongcoi.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_trongcoi.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_trongcoi.id_giong')
            ->find($request->id);
        $data['dich_vu_them'] = TCDichVuThemModel::query()->select('*')
            ->leftJoin('dm_dichvu', 'dvt_trongcoi.id_dich_vu','=', 'dm_dichvu.id')
            ->leftJoin('dm_gia','dvt_trongcoi.id_dich_vu','=','dm_gia.id_dich_vu')
            ->where('id_trong_coi',$request->id)
            ->get();
        foreach( $data['dich_vu_them'] as $item ){
            $data['id_dich_vu_them'][] = $item->id_dich_vu;
        }
        $bat_dau = Carbon::createFromTimeString($data['trong_coi']->gio_nhan);
        $ket_thuc = Carbon::createFromTimeString($data['trong_coi']->gio_tra);
        $data['gia_trong'] = DMGiaModel::leftJoin('dm_dichvu','dm_dichvu.id','=','dm_gia.id_dich_vu')->where('ten_dich_vu','Trông giữ thú cưng (Nội trú) trên giờ')->first()->don_gia;
        $data['so_gio'] = $bat_dau->diffInHours($ket_thuc);
        $data['count'] = 1;
        $data['thanh_toan'] = TCThanhToanModel::where('id_trong_coi', $request->id)->first();
        $data['trang_thais'] = DMTrangThaiModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();
        $data['tai_khoans'] = TaiKhoanModel::all();
        $data['khach_hangs'] = KhachHangModel::all();
        $data['dich_vus'] = DMDichVuModel::where('hien',1)->where('loai',2)->get();
        $data['khuyen_mais'] = DMKhuyenMaiModel::all();
        return view('Quan_ly_trong_coi.thanh_toan', $data);
    }
    public function viewSuaLich(Request $request)
    {
        $data = [];
        $data['trong_coi'] = TrongCoiModel::find($request->id);
        $data['loai_thu_cungs'] = DMLoaiThuCungModel::all();        
        $data['giong_thu_cungs'] = DMGiongThuCungModel::select('*','dm_loaithucung.id as loai_id','dm_giongthucung.id as id')
        ->leftJoin('dm_loaithucung','dm_giongthucung.id_loai_thu_cung','=','dm_loaithucung.id')->get();
        // dd( $data['trong_coi']);
        return view('Giao_dien_khach.Dat_lich_trong_coi.sua_lich_trong_coi', $data);
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
        return redirect()->route('khach_hang_lichtrongcoi');
    }
    public function xlSuaLich(Request $request)
    {
        $dat_lich = TrongCoiModel::find($request->id);
        $dat_lich->tu_ngay = $request->tu_ngay;
        $dat_lich->den_ngay = $request->den_ngay;
        $dat_lich->id_giong = $request->giong;
        $dat_lich->ghi_chu = $request->ghi_chu;
        $dat_lich->save();
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
        return redirect()->route('khach_hang_lichtrongcoi');
    }
    public function xlXacNhan(Request $request)
    {
        $dat_lich = TrongCoiModel::find($request->id);
        $dat_lich->id_trang_thai = 2;
        $dat_lich->gio_nhan = date('Y-m-d H:i:s');
        foreach ($request->dich_vu_them as $dich_vu) {
            $dich_vu_them = new TCDichVuThemModel();
            $dich_vu_them->id_trong_coi = $dat_lich->id;
            $dich_vu_them->id_dich_vu = $dich_vu;
            $dich_vu_them->save();
        }
        $dat_lich->save(); 
        return redirect()->route('chi_tiet_admin_tc', ['id' => $request->id]);
    }
    public function xlHoanThanh(Request $request)
    {
        $dat_lich = TrongCoiModel::find($request->id);
        $dat_lich->id_trang_thai = 3;
        $dat_lich->gio_tra = date('Y-m-d H:i:s');
        $bat_dau = Carbon::createFromTimeString($dat_lich->gio_nhan);
        $ket_thuc = Carbon::createFromTimeString($dat_lich->gio_tra);
        $dat_lich->save();
        $gia_trong = DMGiaModel::leftJoin('dm_dichvu','dm_dichvu.id','=','dm_gia.id_dich_vu')->where('ten_dich_vu','Trông giữ thú cưng (Nội trú) trên giờ')->first()->don_gia;
        $so_gio = $bat_dau->diffInHours($ket_thuc);
        $dich_vu_them = TCDichVuThemModel::query()->select('*')
            ->leftJoin('dm_dichvu', 'dvt_trongcoi.id_dich_vu','=', 'dm_dichvu.id')
            ->leftJoin('dm_gia','dvt_trongcoi.id_dich_vu','=','dm_gia.id_dich_vu')
            ->where('id_trong_coi',$request->id)
            ->get();
        $gia = $gia_trong*$so_gio;
        foreach( $dich_vu_them as $item ){
            $data['dich_vu_them'][] = $item->id_dich_vu;
            $gia = $gia+$item->don_gia;
        }
        $thanh_toan = new TCThanhToanModel();
        $thanh_toan->id_trong_coi = $request->id;
        $thanh_toan->tong_tien = $gia;
        $thanh_toan->save();
        return redirect()->route('chi_tiet_admin_tc', ['id' => $request->id]);
    }
    public function xlApDungKM(Request $request)
    {
        $thanh_toan = TCThanhToanModel::find($request->id);
        $khuyen_mai = DMKhuyenMaiModel::find($request->khuyen_mai);
        $thanh_toan->id_khuyen_mai = $request->khuyen_mai;
        if(empty($khuyen_mai->phan_tram)) $thanh_toan->tong_tien = $thanh_toan->tong_tien-$khuyen_mai->so_giam;
        else $thanh_toan->tong_tien = $thanh_toan->tong_tien-($thanh_toan->tong_tien/100*$khuyen_mai->phan_tram);
        $thanh_toan->save();
        return redirect()->route('thanh_toan_tc', ['id' => $thanh_toan->id_trong_coi]);
    }
    public function xlThanhToan(Request $request)
    {
        $trong_coi = TrongCoiModel::find($request->id);
        $hoi_vien = HoiVienModel::where('id_khach_hang',$trong_coi->id_khach_hang)->first();
        $gia = TCThanhToanModel::where('id_trong_coi',$request->id)->first();
        if($request->danh_gia) $trong_coi->danh_gia = $request->danh_gia;
        else $trong_coi->danh_gia = 5;
        if(!empty($hoi_vien)){
            $hoi_vien->diem_hoi_vien = $hoi_vien->diem_hoi_vien + 10;
            $hoi_vien->save();
        }
        $trong_coi->id_trang_thai = 4;
        $trong_coi->save();
        $thong_tin = [
            'loai' => 4,
			'email' => $trong_coi->KhachHang->email,
			'ho_ten' => $trong_coi->KhachHang->ten_khach_hang,
            'sdt' => $trong_coi->KhachHang->sdt,
            'tu_ngay' => $request->tu_ngay,
            'den_ngay' => $request->den_ngay,
            'gio_nhan' => $request->gio_nhan,
            'gio_tra' => $request->gio_tra,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu_them' => $request->dich_vu_them,
            'gia' => $gia->tong_tien,
            'dich_vu' => 'TC'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('ql_trongcoi');
    }
    public function xlHuy(Request $request)
    {
        $dat_lich = TrongCoiModel::find($request->id);
        $dat_lich->id_trang_thai = 5;
        $dat_lich->save();
        $thong_tin = [
            'loai' => 5,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'dich_vu' => 'TC'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_hang_lichtrongcoi');
    }
    protected function xlGuiMailXacNhan(array $thong_tin)
    {
		$result = Mail::to($thong_tin['email'])->send(new XacNhanDatLichMail($thong_tin));
        if($result){
			session()->flash('bao_loi','Gửi thành công');
			}
		else session()->flash('bao_loi','Gửi không thành công');
    }
}
