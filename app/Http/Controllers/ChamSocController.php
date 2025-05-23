<?php

namespace App\Http\Controllers;

use App\Mail\XacNhanDatLichMail;
use App\Models\ChamSocModel;
use App\Models\CSDichVuModel;
use App\Models\CSDichVuThemModel;
use App\Models\CSThanhToanModel;
use App\Models\DMDichVuModel;
use App\Models\DMLoaiThuCungModel;
use App\Models\DMTrangThaiModel;
use App\Models\KhachHangModel;
use App\Models\TaiKhoanModel;
use App\Models\DMGiongThuCungModel;
use App\Models\DMKhuyenMaiModel;
use App\Models\HoiVienModel;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChamSocController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data = [];
        $query = ChamSocModel::query()->select('*', 'ql_chamsoc.id as cs_id','dm_trangthai.id as trang_thai')
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_chamsoc.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_chamsoc.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_chamsoc.id_giong')
            ->leftJoin('ql_taikhoan', 'ql_taikhoan.tai_khoan', '=', 'ql_chamsoc.id_nhan_vien');
        if($request->has('search_khachhang')&& !empty($request->search_khachhang)){
            $query = $query->where('ho_ten', 'like', '%'.$request->search_khachhang.'%');
            $data['search_khachhang'] = $request->search_khachhang;
        }
        if($request->has('search_trangthai')&& !empty($request->search_trangthai)){
            $query = $query->where('id_trang_thai',$request->search_trangthai);
            $data['search_trangthai'] = $request->search_trangthai;
        }
        if($request->filled('search_tu_cs')||$request->filled('search_den_cs')){
            if(empty($request->search_tu_cs)) $search_tu_cs = date("Y-m-d");
            else $search_tu_cs = $request->search_tu_cs;
            if(empty($request->search_den_cs)) $search_den_cs =  date("Y-m-d");
            else $search_den_cs = $request->search_den_cs;
            $query = $query->whereBetween('ngay', [$search_tu_cs,$search_den_cs]);
            $data['search_tu_cs'] = $request->search_tu_cs;
            $data['search_den_cs'] = $request->search_den_cs;
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
        $query = ChamSocModel::query()->select('*', 'ql_chamsoc.id as id')
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_chamsoc.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_chamsoc.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_chamsoc.id_giong')
            ->leftJoin('ql_taikhoan', 'ql_taikhoan.tai_khoan', '=', 'ql_chamsoc.id_nhan_vien')
            ->leftJoin('ql_thanhtoanchamsoc','ql_chamsoc.id','=','ql_thanhtoanchamsoc.id_cham_soc')
            ->where('email', session('tai_khoan'));
        $data['cham_socs'] = $query->orderBy('ngay','desc')->paginate(5);
        $data['count'] = 0;
        return view('Giao_dien_khach.Dat_lich_cham_soc.khach_hang_lich_cham_soc', $data);
    }
    public function viewDatLich(Request $request)
    {
        $data = [];
        $data['loai_thu_cungs'] = DMLoaiThuCungModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::select('*','dm_loaithucung.id as loai_id','dm_giongthucung.id as id')
            ->leftJoin('dm_loaithucung','dm_giongthucung.id_loai_thu_cung','=','dm_loaithucung.id')->get();
        return view('Giao_dien_khach.Dat_lich_cham_soc.dat_lich_cham_soc', $data);
    }
    public function viewChiTietAdmin(Request $request)
    {
        $data = [];
        $data['cham_soc'] = ChamSocModel::query()->select(
            'ql_chamsoc.*',
            'ql_chamsoc.id as cs_id',
            'dm_trangthai.ten_trang_thai as ten_trang_thai',
            'dm_giongthucung.ten_giong_thu_cung',
            'ql_khachhang.ho_ten as ten_khach_hang',
            'ql_taikhoan.ten_nhan_vien',
            'ql_thanhtoanchamsoc.tong_tien'
        )
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_chamsoc.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_chamsoc.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_chamsoc.id_giong')
            ->leftJoin('ql_taikhoan', 'ql_taikhoan.tai_khoan', '=', 'ql_chamsoc.id_nhan_vien')
            ->leftJoin('ql_thanhtoanchamsoc', 'ql_thanhtoanchamsoc.id_cham_soc', '=', 'ql_chamsoc.id')
            ->where('ql_chamsoc.id', $request->id)
            ->first();
        $dich_vu_them = CSDichVuThemModel::where('id_cham_soc', $request->id)->get();
        $dich_vu_mac_dinh = CSDichVuModel::all();
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
        $data['dich_vus'] = DMDichVuModel::where('hien',1)->where('loai',1)->get();
        return view('Quan_ly_cham_soc.chi_tiet_admin', $data);
    }
    public function viewChiTietUser(Request $request)
    {
        $data = []; 
        $data['cham_soc'] = ChamSocModel::query()->select(
            'ql_chamsoc.*',
            'ql_chamsoc.id as cs_id',
            'dm_trangthai.ten_trang_thai as ten_trang_thai',
            'dm_giongthucung.ten_giong_thu_cung',
            'ql_khachhang.ho_ten as ten_khach_hang',
            'ql_taikhoan.ten_nhan_vien',
            'ql_thanhtoanchamsoc.tong_tien'
        )
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_chamsoc.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_chamsoc.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_chamsoc.id_giong')
            ->leftJoin('ql_taikhoan', 'ql_taikhoan.tai_khoan', '=', 'ql_chamsoc.id_nhan_vien')
            ->leftJoin('ql_thanhtoanchamsoc', 'ql_thanhtoanchamsoc.id_cham_soc', '=', 'ql_chamsoc.id')
            ->where('ql_chamsoc.id', $request->id)
            ->first();
        $dich_vu_them = CSDichVuThemModel::where('id_cham_soc', $request->id)->get();
        $data['dich_vu_them'] = [];
        foreach ($dich_vu_them as $item) {
            $data['dich_vu_them'][] = $item->id_dich_vu;
        }
        // dd($data['dich_vu_them']);
        $data['dich_vus'] = DMDichVuModel::where('hien',1)->where('loai',1)->get();
        return view('Giao_dien_khach.Dat_lich_cham_soc.chi_tiet_user', $data);
    }
    public function viewThanhToan(Request $request)
    {
        $data = [];
        $data['cham_soc'] = ChamSocModel::query()->select('*', 'ql_chamsoc.id as cs_id')
            ->leftJoin('ql_khachhang', 'ql_khachhang.id', '=', 'ql_chamsoc.id_khach_hang')
            ->leftJoin('dm_trangthai', 'dm_trangthai.id', '=', 'ql_chamsoc.id_trang_thai')
            ->leftJoin('dm_giongthucung', 'dm_giongthucung.id', '=', 'ql_chamsoc.id_giong')
            ->leftJoin('ql_taikhoan', 'ql_taikhoan.tai_khoan', '=', 'ql_chamsoc.id_nhan_vien')
            ->find($request->id);
        $data['dich_vu_them'] = CSDichVuThemModel::query()->select('*')
            ->leftJoin('dm_dichvu', 'dvt_chamsoc.id_dich_vu','=', 'dm_dichvu.id')
            ->leftJoin('dm_gia','dvt_chamsoc.id_dich_vu','=','dm_gia.id_dich_vu')
            ->where('id_cham_soc',$request->id)
            ->get();
        foreach( $data['dich_vu_them'] as $item ){
            $data['id_dich_vu_them'][] = $item->id_dich_vu;
        }
        $data['count'] = 0;
        $data['thanh_toan'] = CSThanhToanModel::where('id_cham_soc', $request->id)->first();
        $data['trang_thais'] = DMTrangThaiModel::all();
        $data['giong_thu_cungs'] = DMGiongThuCungModel::all();
        $data['tai_khoans'] = TaiKhoanModel::all();
        $data['khach_hangs'] = KhachHangModel::all();
        $data['dich_vus'] = DMDichVuModel::where('hien',1)->where('loai',1)->get();
        $data['khuyen_mais'] = DMKhuyenMaiModel::all();
        return view('Quan_ly_cham_soc.thanh_toan', $data);
    }
    public function viewSuaLich(Request $request)
    {
        $data = [];
        $data['cham_soc'] = ChamSocModel::find($request->id);
        $data['loai_thu_cungs'] = DMLoaiThuCungModel::all();        
        $data['giong_thu_cungs'] = DMGiongThuCungModel::select('*','dm_loaithucung.id as loai_id','dm_giongthucung.id as id')
        ->leftJoin('dm_loaithucung','dm_giongthucung.id_loai_thu_cung','=','dm_loaithucung.id')->get();
        return view('Giao_dien_khach.Dat_lich_cham_soc.sua_lich_cham_soc', $data);
    }
    public function xlDatLich(Request $request)
    {
        $dat_lich = new ChamSocModel();

        $khach = KhachHangModel::where('email','=',session('tai_khoan'))->first();
        
        $thoi_gian = Carbon::createFromTimeString($request->thoi_gian);
        $bat_dau_gio = $thoi_gian->startOfHour()->toTimeString();
        $ket_thuc_gio = $thoi_gian->endOfHour()->toTimeString();
        $so_luong = ChamSocModel::where('ngay', $request->ngay)->whereBetween('thoi_gian',[$bat_dau_gio,$ket_thuc_gio])->get()->count();
        if($so_luong>5) return redirect()->route('khach_hang_lichchamsoc');
        $dat_lich->id_khach_hang = $khach->id;
        $dat_lich->id_trang_thai = 1;
        $dat_lich->ngay = $request->ngay;
        $dat_lich->thoi_gian = $request->thoi_gian;
        $dat_lich->id_giong = $request->giong;
        $dat_lich->ghi_chu = $request->ghi_chu;
        $dat_lich->save();
        
        $thong_tin = [
            'loai' => 1,
			'email' => $khach->email,
			'ho_ten' => $khach->ten_khach_hang,
            'sdt' => $khach->sdt,
            'ngay' => $request->ngay,
            'thoi_gian' => $request->thoi_gian,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu' => 'CS'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_hang_lichchamsoc');
    }
    public function xlSuaLich(Request $request)
    {
        // dd($request);
        $dat_lich = ChamSocModel::find($request->id);
        $dat_lich->ngay = $request->ngay;
        $dat_lich->thoi_gian = $request->thoi_gian;
        $dat_lich->id_giong = $request->giong;
        $dat_lich->ghi_chu = $request->ghi_chu;
        $dat_lich->save();
        $thong_tin = [
            'loai' => 2,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'ngay' => $request->ngay,
            'thoi_gian' => $request->thoi_gian,
            'ghi_chu' => $request->ghi_chu,
            'dich_vu' => 'CS'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_hang_lichchamsoc');
    }
    public function xlXacNhan(Request $request)
    {
        // dd($request);
        $dat_lich = ChamSocModel::find($request->id);
        $dat_lich->id_trang_thai = 2;
        $dat_lich->id_nhan_vien = session('tai_khoan');
        foreach ($request->dich_vu_them as $dich_vu) {
            $dich_vu_them = new CSDichVuThemModel();
            $dich_vu_them->id_cham_soc = $dat_lich->id;
            $dich_vu_them->id_dich_vu = $dich_vu;
            $dich_vu_them->save();
        }
        $dat_lich->save(); 
        return redirect()->route('chi_tiet_admin_cs', ['id' => $request->id]);

    }
    public function xlHoanThanh(Request $request)
    {
        // dd($request);
        $dat_lich = ChamSocModel::find($request->id);
        $dat_lich->id_trang_thai = 3;
        $dich_vu_them = CSDichVuThemModel::query()->select('*')
            ->leftJoin('dm_dichvu', 'dvt_chamsoc.id_dich_vu','=', 'dm_dichvu.id')
            ->leftJoin('dm_gia','dvt_chamsoc.id_dich_vu','=','dm_gia.id_dich_vu')
            ->where('id_cham_soc',$request->id)
            ->get();
        $gia = 0;
        foreach( $dich_vu_them as $item ){
            $data['dich_vu_them'][] = $item->id_dich_vu;
            $gia = $gia+$item->don_gia;
        }
        $thanh_toan = new CSThanhToanModel();
        $thanh_toan->id_cham_soc = $request->id;
        $thanh_toan->tong_tien = $gia;
        $thanh_toan->save();
        $thong_tin = [
            'loai' => 3,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'ngay' => $dat_lich->ngay,
            'thoi_gian' => $dat_lich->thoi_gian,
            'trang_thai' => DMTrangThaiModel::find(3)->ten_trang_thai,
            'ghi_chu' => $dat_lich->ghi_chu,
            'dich_vu' => 'CS'
		];
        $dat_lich->save();
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('chi_tiet_admin_cs', ['id' => $request->id]);
    }
    public function xlApDungKM(Request $request)
    {
        $thanh_toan = CSThanhToanModel::find($request->id);
        $khuyen_mai = DMKhuyenMaiModel::find($request->khuyen_mai);
        $thanh_toan->id_khuyen_mai = $request->khuyen_mai;
        if(empty($khuyen_mai->phan_tram)) $thanh_toan->tong_tien = $thanh_toan->tong_tien-$khuyen_mai->so_giam;
        else $thanh_toan->tong_tien = $thanh_toan->tong_tien-($thanh_toan->tong_tien/100*$khuyen_mai->phan_tram);
        $thanh_toan->save();
        return redirect()->route('thanh_toan_cs', ['id' => $thanh_toan->id_cham_soc]);
    }
    public function xlThanhToan(Request $request)
    {
        $cham_soc = ChamSocModel::find($request->id);
        $cham_soc->id_trang_thai = 4;
        $gia = CSThanhToanModel::where('id_cham_soc',$request->id)->first();
        if($request->danh_gia) $cham_soc->danh_gia = $request->danh_gia;
        else $cham_soc->danh_gia = 5;
        $hoi_vien = HoiVienModel::where('id_khach_hang',$cham_soc->id_khach_hang)->first();
        // dd($hoi_vien);
        if(!empty($hoi_vien)){
            $hoi_vien->diem_hoi_vien = $hoi_vien->diem_hoi_vien + 5;
            $hoi_vien->save();
        }
        $khach_hang = KhachHangModel::find($cham_soc->id_khach_hang);
        $khach_hang->so_lan_cham_soc = $khach_hang->so_lan_cham_soc+1;
        $khach_hang->save();
        $cham_soc->save();
        $thong_tin = [
            'loai' => 4,
			'email' => $cham_soc->KhachHang->email,
			'ho_ten' => $cham_soc->KhachHang->ten_khach_hang,
            'sdt' => $cham_soc->KhachHang->sdt,
            'ngay' => $cham_soc->ngay,
            'thoi_gian' => $cham_soc->thoi_gian,
            'trang_thai' => DMTrangThaiModel::find(3)->ten_trang_thai,
            'ghi_chu' => $cham_soc->ghi_chu,
            'gia' => $gia->tong_tien,
            'dich_vu' => 'CS'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('ql_chamsoc');
    }
    public function xlHuy(Request $request)
    {
        $dat_lich = ChamSocModel::find($request->id);
        $dat_lich->id_trang_thai = 5;
        $dat_lich->save();
        $thong_tin = [
            'loai' => 5,
			'email' => $dat_lich->KhachHang->email,
			'ho_ten' => $dat_lich->KhachHang->ten_khach_hang,
            'sdt' => $dat_lich->KhachHang->sdt,
            'dich_vu' => 'CS'
		];
        $this->xlGuiMailXacNhan($thong_tin);
        return redirect()->route('khach_hang_lichchamsoc');
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
