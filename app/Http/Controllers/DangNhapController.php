<?php

namespace App\Http\Controllers;

use App\Models\KhachHangModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuenMatKhauMail;

class DangNhapController extends Controller
{
    public function viewDangNhap()
	{
			$data=[];
			$data['bao_loi'] = session('bao_loi');
			session()->put('bao_loi', '');
			return view('Dang_nhap.dang_nhap',$data);//
	}
    public function viewDangKy()
	{
			$data=[];
			$data['bao_loi'] = session('bao_loi');
			session()->put('bao_loi', '');
			return view('Dang_nhap.dang_ky',$data);//
	}
	public function viewQuenMK(Request $request)
	{
		return view('Dang_nhap.quen_mk');
	}
	public function viewXacNhan(Request $request)
	{
		return view('Dang_nhap.xac_nhan');
	}
    public function login(Request $request)
	{
		$tai_khoan = $request->tai_khoan;
		$mat_khau = md5($request->mat_khau);
		$nguoi_dung = TaiKhoanModel::find($tai_khoan);
		session()->put('bao_loi', '');
		if (empty($nguoi_dung)) {
				$request->session()->put('bao_loi', 'Tài khoản không tồn tại');
		} else {
				if ($nguoi_dung->mat_khau != $mat_khau) {
						$request->session()->put('bao_loi', 'Sai mật khẩu');
				} else {
						$request->session()->put('bao_loi', '');
						$request->session()->put('tai_khoan', $tai_khoan);
						$request->session()->put('quyen', $nguoi_dung->Quyen->ten_quyen);
				}
		}
		if (session('bao_loi') == '') {
			if(session('quyen') == 'Admin') return redirect()->route('ql_tk');
			// elseif(session('quyen') == 'Quản lý')return redirect()->route('ql_nv');
			// else return redirect()->route('ql_nv');
			
		} else {
				return redirect()->route('dang_nhap');
		}
	}
    public function logout(){
        session()->flush();
        return redirect()->route('dang_nhap');
    }
    public function signup(Request $request){
		$khach_hang = new KhachHangModel();
		$khach_hang->email = $request->email;
		$khach_hang->ho_ten = $request->ho_ten;
		$khach_hang->ngay_sinh = $request->ngay_sinh;
		$khach_hang->sdt = $request->sdt;
		$khach_hang->id_loai_khach_hang = 1;
		$khach_hang->save();
		$id_khach_hang = KhachHangModel::where('email',$request->email)->first()->id;
		$tai_khoan = new TaiKhoanModel();
		$tai_khoan->tai_khoan = $request->email;
		if($request->mat_khau != $request->mat_khau_lai){
			return session()->flash('Mật khẩu nhập lại không trùng với mật khẩu');
		}
		else $tai_khoan->mat_khau = md5($request->mat_khau);
		$tai_khoan->id_khach_hang = $id_khach_hang;
		$tai_khoan->id_quyen = 2;
		$tai_khoan->save();
		return redirect()->route('dang_nhap');
    }
	public function viewDoiMK(Request $request)
    {
        $data=[];
        $data['tai_khoan'] = TaiKhoanModel::find(session('tai_khoan'));
        return view('Dang_nhap.doi_mk',$data);
    }
	public function doi_mk(Request $request){
		if(!isset($request->quen)){
			$tai_khoan = TaiKhoanModel::find(session('tai_khoan'));
			if($tai_khoan->mat_khau != md5($request->mat_khau_cu)){
				return session()->flash('Mật khẩu cũ không đúng');
			}
		}
		else{
			$tai_khoan = TaiKhoanModel::find(session('email'));
		}
		if($request->mat_khau_moi != $request->mat_khau_lai){
			return session()->flash('Mật khẩu nhập lại không trùng với mật khẩu');
		}
		else $tai_khoan->mat_khau = md5($request->mat_khau_moi);
		$tai_khoan->save();
		session()->flush();
		return redirect()->route('dang_nhap');
    }
	public function xlGuiMail(Request $request)
	{
		$tai_khoan = TaiKhoanModel::find($request->email);
		if(empty($tai_khoan)){
		return redirect()->route('quen_mk')->with('bao_loi','Tài khoản không tồn tại');
		}
		else{
		$code = rand(100000,999999);
		$thong_tin = [
			'email' => $request->email,
			'code' => $code,
		];
		session()->put('code',$code);
		session()->put('email',$request->email);
		$result = Mail::to($request->email)->send(new QuenMatKhauMail($thong_tin));
		if($result){
			return redirect()->route('xac_nhan')->with('bao_loi','Gửi thành công');
			}	
		}
	}
	public function xlXacNhan(Request $request)
	{
		$code = $request->code;
		if($code == session('code')){
			session()->forget('code');
		return redirect()->route('doi_mk');
		}
		else{
		return redirect()->route('xac_nhan')->with('bao_loi','Sai mã xác nhận');
		}
	}
}
