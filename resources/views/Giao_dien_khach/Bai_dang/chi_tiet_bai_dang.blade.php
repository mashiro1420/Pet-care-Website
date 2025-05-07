<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $bai_dang->tieu_de }} - PetCare</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="icon" href="/imgs/paw-solid.svg" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/chi_tiet_bai_dang.css') }}">
</head>

<body>
  @include('navbar_user')

  <div class="post-container">
    <h1 class="post-title">{{ $bai_dang->tieu_de }}</h1>

  <div class="post-meta mb-3">
    <p><strong>Ngày đăng:</strong> {{ \Carbon\Carbon::parse($bai_dang->ngay_dang)->format('d/m/Y H:i') }}</p>
    <p><strong>Lượt xem:</strong> {{ $bai_dang->luot_xem }} | <strong>Lượt thích:</strong> {{ $bai_dang->luot_thich }}</p>
    <p><strong>Loại nội dung:</strong> {{ $bai_dang->ten_loai ?? 'Chưa phân loại' }}</p>
    <p><strong>Nhân viên đăng:</strong> {{ $bai_dang->ho_ten ?? 'Không rõ' }} (ID: {{ $bai_dang->id_nhan_vien }})</p>
  </div>

  
  
  @if($bai_dang->tom_tat)
  <div class="mb-3">
    <h5>Tóm tắt:</h5>
    <h6>{{ $bai_dang->tom_tat }}</h6>
  </div>
  @endif
  
  <div class="post-content">
    <h5>Nội dung chi tiết:</h5>
    <?php echo $bai_dang->noi_dung ?>
    {{-- {!! nl2br(e($bai_dang->noi_dung)) !!} --}}
  </div>

  @if($bai_dang->hinh_anh)
    <img src="{{ $bai_dang->hinh_anh }}" alt="Hình ảnh chi tiết" class="post-image mb-3">
  @endif

  @if($bai_dang->link_video)
  <div class="mb-4">
    <h5>Video liên quan:</h5>
    <div class="ratio ratio-16x9">
      <?php echo $bai_dang->link_video ?>
      </div>
    </div>
  @endif
  
  <div class="d-flex align-items-center gap-3 mt-3">
    <a id="likeButton" class="btn btn-outline-danger btn-sm" type="button" href="{{ route('xl_thich',['id'=>$bai_dang->bd_id]) }}">
      <i class="bi bi-hand-thumbs-up"></i> Thích (<span id="likeCount">{{ $bai_dang->luot_thich }}</span>)
    </a>
  </div>


    <a href="{{ route('baidang_user') }}" class="btn btn-back mt-4">
      <i class="bi bi-arrow-left me-1"></i>Quay lại danh sách
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
