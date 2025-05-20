<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Báo cáo thống kê</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4cc9f0;
      --text-color: #2b2d42;
      --light-text: #8d99ae;
      --background-color: #f8f9fa;
      --card-bg: #ffffff;
      --border-radius: 12px;
      --box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
      --transition: all 0.3s ease;
    }

    body {
      font-family: 'Roboto', 'Segoe UI', sans-serif;
      background-color: var(--background-color);
      color: var(--text-color);
      line-height: 1.6;
    }

    /* Navbar styles */
    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: bold;
      color: #5D5D5D;
    }

    .nav-link {
      color: #5D5D5D;
      font-weight: 500;
    }

    .dropdown-menu {
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      border: none;
      padding: 10px;
    }

    .dropdown-item {
      padding: 8px 16px;
      color: var(--text-color);
      border-radius: 6px;
      transition: var(--transition);
    }

    .dropdown-item:hover {
      background-color: rgba(67, 97, 238, 0.1);
      color: var(--primary-color);
    }

    /* Button styles */
    .btn {
      border-radius: 8px;
      padding: 8px 16px;
      font-weight: 500;
      transition: var(--transition);
    }

    .btn-outline-dark {
      border-color: var(--text-color);
      color: var(--text-color);
    }

    .btn-outline-dark:hover {
      background-color: var(--text-color);
      color: white;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
    }

    /* Chart container styles */
    .section-title {
      color: var(--text-color);
      font-weight: 700;
      margin-bottom: 30px;
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -8px;
      width: 50px;
      height: 3px;
      background-color: var(--accent-color);
    }

    .chart-container {
      background-color: var(--card-bg);
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      padding: 20px;
      margin-bottom: 30px;
      transition: var(--transition);
      height: 100%;
      max-height: 450px;
      position: relative;
    }

    .chart-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .chart-container h2 {
      font-size: 1.2rem;
      color: var(--text-color);
      margin-bottom: 20px;
      font-weight: 600;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .chart-container {
        margin-bottom: 20px;
      }
    }


    /* Additional utility classes */
    .text-primary-custom {
      color: var(--primary-color);
    }

    .bg-primary-custom {
      background-color: var(--primary-color);
      color: white;
    }
  </style>
</head>

<body>
  @include('navbar')
  <div class="container py-5 fade-in">
    <div class="row mb-4">
      <div class="col-md-12 text-center">
        <h1 class="fw-bold text-primary-custom mb-2">Thống kê dịch vụ thú cưng</h1>
        <p class="text-muted">Dưới đây là các biểu đồ thống kê hệ thống theo ngày và tháng</p>
        <div class="d-flex justify-content-center">
          <hr class="w-25" />
        </div>
      </div>
    </div>
    <div class="col-12 d-flex justify-content-end gap-2 mb-4">
      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalExport" {{ empty($khach_hang->hoi_vien_id)?"":"hidden" }}>
        <i class="fa-solid fa-gears"></i>Xuất báo cáo
      </button>
    </div>
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-calendar-check me-2"></i>Lịch chăm sóc thú cưng theo ngày</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="carePerWeekChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-calendar-month me-2"></i>Lịch chăm sóc thú cưng theo tháng</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="carePerMonthChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-house-heart me-2"></i>Lịch trông coi thú cưng theo ngày</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="boardingPerWeekChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-calendar-range me-2"></i>Lịch trông coi thú cưng theo tháng</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="boardingPerMonthChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="chart-container">
          <h2><i class="bi bi-star-half me-2"></i>Đánh giá dịch vụ trong tuần</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="ratingChartWeek"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="chart-container">
          <h2><i class="bi bi-star-half me-2"></i>Đánh giá dịch vụ trong tháng</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="ratingChartMonth"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="chart-container">
          <h2><i class="bi bi-star-half me-2"></i>Đánh giá dịch vụ trong năm</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="ratingChartYear"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-journal-text me-2"></i>Số lượng bài đăng theo ngày</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="postsPerWeekChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-file-earmark-post me-2"></i>Số lượng bài đăng theo tháng</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="postsPerMonthChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-graph-up-arrow me-2"></i>Doanh thu theo ngày</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="revenuePerWeekChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-container">
          <h2><i class="bi bi-cash-coin me-2"></i>Doanh thu theo tháng</h2>
          <div style="height: 300px; position: relative;">
            <canvas id="revenuePerMonthChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- Modal export -->
 <div class="modal fade" id="modalExport" tabindex="-1" aria-labelledby="modalExportLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalExportLabel">Xuất báo cáo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('export_report') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="nam" class="form-label">Năm</label>
                <select name="nam" class="form-control">
                  <option value="" selected>--Chọn năm--</option>
                  @for($i = 2024;$i <= date("Y");$i++ )
                  <option value="{{$i}}">{{ $i }}</option>
                  @endFor
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="thang" class="form-label">Tháng</label>
                <select name="thang" class="form-control">
                  <option value="" selected>--Chọn tháng--</option>
                  @for($i = 1;$i <= 12;$i++ )
                  <option value="{{$i}}">Tháng {{ $i }}</option>
                  @endFor
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="tuan" class="form-label">Tuần</label>
                <select name="tuan" class="form-control">
                  <option value="" selected>--Chọn tuần--</option>
                  @for($i = 1;$i <= 12;$i++ )
                  <option value="{{$i}}">Tháng {{ $i }}</option>
                  @endFor
                </select>
              </div>
            </div>
            <div class="mb-3">
                <label for="cham_soc" class="form-label">Dữ liệu chăm sóc</label>
                <input type="checkbox"  style="width: 20px; height: 20px; margin-left: 10px" name="cham_soc" checked>
            </div>
            <div class="mb-3">
                <label for="trong_coi" class="form-label">Dữ liệu trông coi</label>
                <input type="checkbox"  style="width: 20px; height: 20px; margin-left: 10px" name="trong_coi" checked>
            </div>
            <div class="mb-3">
                <label for="danh_gia" class="form-label">Dữ liệu đánh giá</label>
                <input type="checkbox"  style="width: 20px; height: 20px; margin-left: 10px" name="danh_gia" checked>
            </div>
            <div class="mb-3">
                <label for="bai_dang" class="form-label">Dữ liệu bài đăng</label>
                <input type="checkbox"  style="width: 20px; height: 20px; margin-left: 10px" name="bai_dang" checked>
            </div>
            <div class="mb-3">
                <label for="doanh_thu" class="form-label">Dữ liệu doanh thu</label>
                <input type="checkbox"  style="width: 20px; height: 20px; margin-left: 10px" name="doanh_thu" checked>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Export</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="py-4 bg-light mt-5">
    <div class="container text-center">
      <p class="mb-0">© 2025 Hệ thống quản lý dịch vụ thú cưng. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const chartColors = {
        care: {
          bg: 'rgba(67, 97, 238, 0.6)',
          border: 'rgba(67, 97, 238, 1)'
        },
        boarding: {
          bg: 'rgba(76, 201, 240, 0.6)',
          border: 'rgba(76, 201, 240, 1)'
        },
        posts: {
          bg: 'rgba(247, 127, 0, 0.6)',
          border: 'rgba(247, 127, 0, 1)'
        },
        revenue: {
          bg: 'rgba(45, 212, 191, 0.6)',
          border: 'rgba(45, 212, 191, 1)'
        },
        rating: {
          bg: 'rgba(252, 163, 17, 0.6)',
          border: 'rgba(252, 163, 17, 1)'
        }
      };

      const createBarChart = (id, labels, data, label, colors) => {
        const ctx = document.getElementById(id);
        if (!ctx) return;

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: label,
              backgroundColor: colors.bg,
              borderColor: colors.border,
              borderWidth: 1,
              borderRadius: 4,
              data: data
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 1.5,
            plugins: {
              legend: {
                position: 'top',
              },
              tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                titleFont: {
                  size: 14,
                  weight: 'bold'
                },
                bodyFont: {
                  size: 13
                },
                padding: 12,
                cornerRadius: 6
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: {
                  drawBorder: false,
                  color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                  font: {
                    size: 12
                  }
                }
              },
              x: {
                grid: {
                  display: false
                },
                ticks: {
                  font: {
                    size: 12
                  }
                }
              }
            },
            animation: {
              duration: 2000,
              easing: 'easeOutQuart'
            }
          }
        });
      };

      const createLineChart = (id, labels, data, label, colors) => {
        const ctx = document.getElementById(id);
        if (!ctx) return;

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: label,
              borderColor: colors.border,
              backgroundColor: colors.bg,
              data: data,
              fill: true,
              tension: 0.4,
              pointBackgroundColor: colors.border,
              pointBorderColor: '#fff',
              pointBorderWidth: 2,
              pointRadius: 4,
              pointHoverRadius: 6
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'top',
              },
              tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                titleFont: {
                  size: 14,
                  weight: 'bold'
                },
                bodyFont: {
                  size: 13
                },
                padding: 12,
                cornerRadius: 6
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: {
                  drawBorder: false,
                  color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                  font: {
                    size: 12
                  }
                }
              },
              x: {
                grid: {
                  display: false
                },
                ticks: {
                  font: {
                    size: 12
                  }
                }
              }
            },
            animation: {
              duration: 2000,
              easing: 'easeOutQuart'
            }
          }
        });
      };

      const createHorizontalBarChart = (id, labels, data, label, colors) => {
        const ctx = document.getElementById(id);
        if (!ctx) return;

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: label,
              backgroundColor: colors.bg,
              borderColor: colors.border,
              borderWidth: 1,
              borderRadius: 4,
              data: data
            }]
          },
          options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'top',
              },
              tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                titleFont: {
                  size: 14,
                  weight: 'bold'
                },
                bodyFont: {
                  size: 13
                },
                padding: 12,
                cornerRadius: 6
              }
            },
            scales: {
              y: {
                grid: {
                  display: false
                },
                ticks: {
                  font: {
                    size: 12,
                    weight: 'bold'
                  }
                }
              },
              x: {
                beginAtZero: true,
                grid: {
                  drawBorder: false,
                  color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                  font: {
                    size: 12
                  }
                }
              }
            },
            animation: {
              duration: 2000,
              easing: 'easeOutQuart'
            }
          }
        });
      };

      // Data for charts
      const days = ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'];
      const months = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
      const stars = ['1 Sao', '2 Sao', '3 Sao', '4 Sao', '5 Sao'];
      const cham_soc_nam = @json($cham_soc_nam);
      const cham_soc_tuan = @json($cham_soc_tuan);
      const trong_coi_nam = @json($trong_coi_nam);
      const trong_coi_tuan = @json($trong_coi_tuan);
      const danh_gia_nam = @json($danh_gia_nam);
      const danh_gia_thang = @json($danh_gia_thang);
      const danh_gia_tuan = @json($danh_gia_tuan);
      const bai_dang_nam = @json($bai_dang_nam);
      const bai_dang_tuan = @json($bai_dang_tuan);
      const doanh_thu_nam = @json($doanh_thu_nam);
      const doanh_thu_tuan = @json($doanh_thu_tuan);

      // Create all charts
      createBarChart('carePerWeekChart', days, cham_soc_tuan, 'Số lượng đặt lịch', chartColors.care);
      createBarChart('carePerMonthChart', months, cham_soc_nam, 'Số lượng đặt lịch', chartColors.care);
      createBarChart('boardingPerWeekChart', days, trong_coi_tuan, 'Số lượng đặt lịch', chartColors.boarding);
      createBarChart('boardingPerMonthChart', months, trong_coi_nam, 'Số lượng đặt lịch', chartColors.boarding);
      createHorizontalBarChart('ratingChartWeek', stars, danh_gia_tuan, 'Số sao', chartColors.rating);
      createHorizontalBarChart('ratingChartMonth', stars, danh_gia_thang, 'Số sao', chartColors.rating);
      createHorizontalBarChart('ratingChartYear', stars, danh_gia_nam, 'Số sao', chartColors.rating);
      createLineChart('postsPerWeekChart', days, bai_dang_tuan, 'Bài đăng', chartColors.posts);
      createLineChart('postsPerMonthChart', months, bai_dang_nam, 'Bài đăng', chartColors.posts);
      createLineChart('revenuePerWeekChart', days, doanh_thu_tuan, 'Doanh thu (nghìn VND)', chartColors.revenue);
      createLineChart('revenuePerMonthChart', months, doanh_thu_nam, 'Doanh thu (nghìn VND)', chartColors.revenue);
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
  </script>
</body>
@include('error_notification')
</html>