<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm bài đăng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="{{ asset('imgs/paw-solid.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>
  @include('navbar')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Thêm bài đăng</h3>
      <a href="{{url('ql_baidang')}}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Quay lại
      </a>
    </div>

    <div class="card">
      <div class="card-body p-4">
        <form action="{{ url('xl_them_baidang') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label required-field">Tiêu đề</label>
                <input type="text" class="form-control" name="nhan_vien" placeholder="Nhập tiêu đề" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="thumb_nail" class="form-label required-field">Thumbnail</label>
                <input type="file" class="form-control" name="thumb_nail" required>
              </div>
            </div> 
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="ngay_dang" class="form-label required-field">Ngày đăng</label>
                <input type="date" class="form-control" name="ngay_dang" required> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trang_thai" class="form-label required-field">Trạng thái</label>
                <select class="form-select" name="trang_thai" required>              
                  <option value="1">Mở</option>
                  <option value="0">Khóa</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="loai_noi_dung" class="form-label required-field">Loại nội dung</label>
                  <select class="form-select" name="loai_noi_dung" required>
                    @foreach ($loai_noi_dungs as $loai_noi_dung)
                      <option value="{{ $loai_noi_dung->id }}">{{ $loai_noi_dung->ten_loai_noi_dung }}</option>
                    @endforeach
                  </select> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nhan_vien" class="form-label required-field">Nhân viên đăng bài</label>
                <input type="text" class="form-control" name="nhan_vien" placeholder="Nhập tên nhân viên đăng bài" required>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="link_video" class="form-label">Link video (nếu có)</label>
                <input type="text" class="form-control" name="link_video" placeholder="Nhập link video">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="hinh_anh" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh_anh" multiple>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="bai_dang" class="form-label required-field">Tóm tắt</label>
                <textarea class="form-control" name="bai_dang" id="" cols="30" rows="10" required></textarea>
              </div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <div class="mb-3">
                  <label for="noi_dung" class="form-label required-field">Nội dung</label>
                  <textarea id="noi_dung" name="noi_dung" class="form-control" required></textarea>
              </div>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-end gap-2 mt-4">
            <button type="reset" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-repeat me-1"></i>Đặt lại
            </button>
            <button type="submit" class="btn btn-warning">
              <i class="bi bi-plus-circle me-1"></i>Thêm bài đăng
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js" integrity="sha512-bib7srucEhHYYWglYvGY+EQb0JAAW0qSOXpkPTMgCgW8eLtswHA/K4TKyD4+FiXcRHcy8z7boYxk0HTACCTFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    tinymce.init({
        selector: '#noi_dung',  // Chỉ định phần tử sẽ chuyển thành TinyMCE editor
        plugins: 'image link lists textcolor',  // Các plugin cho TinyMCE
        toolbar: 'undo redo | bold italic underline| fontsize fontfamily | alignleft aligncenter alignright | link image | bullist numlist outdent indent | removeformat | fontselect fontsizeselect forecolor', // Các công cụ trên thanh công cụ
        menubar: true,  // Bật thanh menu
        image_upload_url: '/path-to-upload-image',  // Đường dẫn API để tải lên hình ảnh
        file_picker_types: 'image',  // Chỉ cho phép chọn hình ảnh
        height: 800  // Chiều cao của editor
    });
</script>

</body>

</html>