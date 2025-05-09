<?php

namespace App\Http\Controllers;

use App\Exports\BaoCaoExport;
use App\Models\BaiDangModel;
use App\Models\ChamSocModel;
use App\Models\TrongCoiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class BaoCaoController extends Controller
{
    public function viewBaoCao(Request $request)
    {
        $data['cham_soc_nam'] = [0,0,0,0,0,0,0,0,0,0,0,0];
        $data['cham_soc_tuan'] = [0,0,0,0,0,0,0];
        $data['trong_coi_nam'] = [0,0,0,0,0,0,0,0,0,0,0,0];
        $data['trong_coi_tuan'] = [0,0,0,0,0,0,0];
        $data['danh_gia_tuan'] = [0,0,0,0,0];
        $data['danh_gia_thang'] = [0,0,0,0,0];
        $data['danh_gia_nam'] = [0,0,0,0,0];
        $data['bai_dang_nam'] = [0,0,0,0,0,0,0,0,0,0,0,0];
        $data['bai_dang_tuan'] = [0,0,0,0,0,0,0];
        $data['doanh_thu_nam'] = [0,0,0,0,0,0,0,0,0,0,0,0];
        $data['doanh_thu_tuan'] = [0,0,0,0,0,0,0];
        $nam_hien_tai = Carbon::now()->year;
        $dau_tuan = Carbon::now()->startOfWeek();
        $cuoi_tuan = Carbon::now()->endOfWeek();
        $dau_thang = Carbon::now()->startOfMonth();
        $cuoi_thang = Carbon::now()->endOfMonth();
        $dau_nam = Carbon::create($nam_hien_tai, 1, 1)->startOfDay();
        $cuoi_nam = Carbon::create($nam_hien_tai, 12, 31)->endOfDay();
        $cham_socs = ChamSocModel::join('ql_thanhtoanchamsoc','ql_thanhtoanchamsoc.id_cham_soc','=','ql_chamsoc.id')->get();
        foreach ($cham_socs as $cham_soc){
            $ngay = Carbon::create($cham_soc->ngay);
            $trong_nam = $ngay->betweenIncluded($dau_nam, $cuoi_nam);
            $trong_tuan = $ngay->betweenIncluded($dau_tuan, $cuoi_tuan);
            $trong_thang = $ngay->betweenIncluded($dau_thang, $cuoi_thang);
            if($trong_nam){
                $thang = $ngay->month;
                $data['cham_soc_nam'][$thang-1]+=1;
                $data['danh_gia_nam'][$cham_soc->danh_gia-1]+=1;
                $data['doanh_thu_nam'][$thang-1]+=$cham_soc->tong_tien;
            }
            if($trong_tuan){
                $thu = $ngay->dayOfWeekIso;
                $data['cham_soc_tuan'][$thu-1]+=1;
                $data['danh_gia_tuan'][$cham_soc->danh_gia-1]+=1;
                $data['doanh_thu_tuan'][$thu-1]+=$cham_soc->tong_tien;
            }
            if($trong_thang) $data['danh_gia_thang'][$cham_soc->danh_gia-1]+=1;
        }
        $trong_cois = TrongCoiModel::join('ql_thanhtoantrongcoi','ql_thanhtoantrongcoi.id_trong_coi','=','ql_trongcoi.id')->get();
        foreach ($trong_cois as $trong_coi){
            $ngay = Carbon::create($trong_coi->den_ngay);
            $trong_nam = $ngay->betweenIncluded($dau_nam, $cuoi_nam);
            $trong_tuan = $ngay->betweenIncluded($dau_tuan, $cuoi_tuan);
            if($trong_nam){
                $thang = $ngay->month;
                $data['trong_coi_nam'][$thang-1]+=1;
                $data['danh_gia_nam'][$trong_coi->danh_gia-1]+=1;
                $data['doanh_thu_nam'][$thang-1]+=$trong_coi->tong_tien;
            }
            if($trong_tuan){
                $thu = $ngay->dayOfWeekIso;
                $data['trong_coi_tuan'][$thu-1]+=1;
                $data['danh_gia_tuan'][$trong_coi->danh_gia-1]+=1;
                $data['doanh_thu_tuan'][$thu-1]+=$trong_coi->tong_tien;
            }
            if($trong_thang) $data['danh_gia_thang'][$trong_coi->danh_gia-1]+=1;
        }
        $bai_dangs = BaiDangModel::all();
        foreach ($bai_dangs as $bai_dang){
            $ngay = Carbon::create($bai_dang->ngay_dang);
            $trong_nam = $ngay->betweenIncluded($dau_nam, $cuoi_nam);
            $trong_tuan = $ngay->betweenIncluded($dau_tuan, $cuoi_tuan);
            $trong_thang = $ngay->betweenIncluded($dau_thang, $cuoi_thang);
            if($trong_nam){
                $thang = $ngay->month;
                $data['bai_dang_nam'][$thang-1]+=1;
            }
            if($trong_tuan){
                $thu = $ngay->dayOfWeekIso;
                $data['bai_dang_tuan'][$thu-1]+=1;
            }
        }
        session()->put('du_lieu', $data);
        return view('Bao_cao_thong_ke.bao_cao_thong_ke', $data);
    }
    public function export(Request $request){
        if(!empty($request->nam)){
            $data['Dịch vụ chăm sóc'] = [0,0,0,0,0,0,0,0,0,0,0,0];
            $data['Dịch vụ trông coi'] = [0,0,0,0,0,0,0,0,0,0,0,0];
            $data['Số lượng bài đăng'] = [0,0,0,0,0,0,0,0,0,0,0,0];
            $data['Doanh thu năm'] = [0,0,0,0,0,0,0,0,0,0,0,0];
        }
        // $data['cham_soc_tuan'] = [0,0,0,0,0,0,0];
        // $data['trong_coi_tuan'] = [0,0,0,0,0,0,0];
        // $data['danh_gia_tuan'] = [0,0,0,0,0];
        // $data['danh_gia_thang'] = [0,0,0,0,0];
        // $data['danh_gia_nam'] = [0,0,0,0,0];
        // $data['bai_dang_tuan'] = [0,0,0,0,0,0,0];
        // $data['doanh_thu_tuan'] = [0,0,0,0,0,0,0];
        $dau_nam = Carbon::create($request->nam, 1, 1)->startOfDay();
        $cuoi_nam = Carbon::create($request->nam, 12, 31)->endOfDay();
        $cham_socs = ChamSocModel::join('ql_thanhtoanchamsoc','ql_thanhtoanchamsoc.id_cham_soc','=','ql_chamsoc.id')->get();
        foreach ($cham_socs as $cham_soc){
            $ngay = Carbon::create($cham_soc->ngay);
            $trong_nam = $ngay->betweenIncluded($dau_nam, $cuoi_nam);
            if($trong_nam){
                $thang = $ngay->month;
                $data['Dịch vụ chăm sóc'][$thang-1]+=1;
                // $data['danh_gia_nam'][$cham_soc->danh_gia-1]+=1;
                $data['Doanh thu năm'][$thang-1]+=$cham_soc->tong_tien;
            }
            // if($trong_tuan){
            //     $thu = $ngay->dayOfWeekIso;
            //     $data['cham_soc_tuan'][$thu-1]+=1;
            //     $data['danh_gia_tuan'][$cham_soc->danh_gia-1]+=1;
            //     $data['doanh_thu_tuan'][$thu-1]+=$cham_soc->tong_tien;
            // }
            // if($trong_thang) $data['danh_gia_thang'][$cham_soc->danh_gia-1]+=1;
        }
        $trong_cois = TrongCoiModel::join('ql_thanhtoantrongcoi','ql_thanhtoantrongcoi.id_trong_coi','=','ql_trongcoi.id')->get();
        foreach ($trong_cois as $trong_coi){
            $ngay = Carbon::create($trong_coi->den_ngay);
            $trong_nam = $ngay->betweenIncluded($dau_nam, $cuoi_nam);
            // $trong_tuan = $ngay->betweenIncluded($dau_tuan, $cuoi_tuan);
            if($trong_nam){
                $thang = $ngay->month;
                $data['Dịch vụ trông coi'][$thang-1]+=1;
                // $data['danh_gia_nam'][$trong_coi->danh_gia-1]+=1;
                $data['Doanh thu năm'][$thang-1]+=$trong_coi->tong_tien;
            }
            // if($trong_tuan){
            //     $thu = $ngay->dayOfWeekIso;
            //     $data['trong_coi_tuan'][$thu-1]+=1;
            //     $data['danh_gia_tuan'][$trong_coi->danh_gia-1]+=1;
            //     $data['doanh_thu_tuan'][$thu-1]+=$trong_coi->tong_tien;
            // }
            // if($trong_thang) $data['danh_gia_thang'][$trong_coi->danh_gia-1]+=1;
        }
        $bai_dangs = BaiDangModel::all();
        foreach ($bai_dangs as $bai_dang){
            $ngay = Carbon::create($bai_dang->ngay_dang);
            $trong_nam = $ngay->betweenIncluded($dau_nam, $cuoi_nam);
            // $trong_tuan = $ngay->betweenIncluded($dau_tuan, $cuoi_tuan);
            // $trong_thang = $ngay->betweenIncluded($dau_thang, $cuoi_thang);
            if($trong_nam){
                $thang = $ngay->month;
                $data['Số lượng bài đăng'][$thang-1]+=1;
            }
            // if($trong_tuan){
            //     $thu = $ngay->dayOfWeekIso;
            //     $data['bai_dang_tuan'][$thu-1]+=1;
            // }
        }
        array_push($data['Dịch vụ chăm sóc'],array_sum($data['Dịch vụ chăm sóc']));
        array_push($data['Dịch vụ trông coi'],array_sum($data['Dịch vụ trông coi']));
        array_push($data['Doanh thu năm'],array_sum($data['Doanh thu năm']));
        array_push($data['Số lượng bài đăng'],array_sum($data['Số lượng bài đăng']));
        // dd($data);
        return Excel::download(new BaoCaoExport($data), 'export_report.xlsx');
    }
}
