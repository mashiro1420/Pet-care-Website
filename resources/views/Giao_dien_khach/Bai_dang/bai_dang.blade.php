<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PetCare - Bài đăng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="icon" href="imgs/paw-solid.svg" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bai_dang.css') }}">
</head>
<body>
  @include('navbar_user')

  <section class="container my-5">
    <h2 class="section-title">Bài đăng mới nhất</h2>

    <div class="row mt-4">
      @foreach($bai_dangs as $bai_dang)
        <div class="col-md-4 mb-4">
          <div class="card card-post h-100">
            <img src="{{ asset('Bai_dang_data/'.$bai_dang->thumbnail) ?? 'imgs/default-post.jpg' }}" class="card-img-top" alt="Ảnh bài đăng">
            <div class="card-body">
              <h5 class="card-title">{{ $bai_dang->tieu_de }}</h5>
              <p class="card-text text-truncate">{{ Str::limit($bai_dang->tom_tat, 100) }}</p>
              <div class="d-flex justify-content-between align-items-center small text-muted">
                <span><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($bai_dang->ngay_dang)->format('d/m/Y') }}</span>
                <span><i class="bi bi-eye"></i> {{ $bai_dang->luot_xem }} | <i class="bi bi-hand-thumbs-up"></i> {{ $bai_dang->luot_thich }}</span>
              </div>
              <div class="mt-3">
                <a href="{{ route('chi_tiet_baidang', ['id'=>$bai_dang->bd_id]) }}" class="btn btn-readmore btn-sm">
                  <i class="bi bi-eye me-1"></i> Xem chi tiết
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
      {{ $bai_dangs->links() }}
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
