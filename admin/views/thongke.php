<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê bán hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
           
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .card {
            margin-bottom: 20px;
        }

        .chart-container {
            width: 80%;
            height: 400px;
        }

        .table-container {
            margin-top: 30px;
        }

        .comparison {
            font-size: 0.9em;
        }

        .comparison.text-success {
            color: green;
        }

        .comparison.text-danger {
            color: red;
        }
    </style>
</head>
<body>

<div class="container ">
    <h2 class="text-center">Thống kê bán hàng</h2>

    <!-- Tab chọn loại thống kê -->
    <ul class="nav nav-tabs" id="chartTabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#yearChart">Theo năm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#monthChart">Theo tháng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#weekChart">Theo tuần</a>
        </li>
    </ul>

    <!-- Nội dung Tab -->
    <div class="tab-content mt-3">
        <!-- Biểu đồ theo năm -->
        <div class="tab-pane fade show active" id="yearChart">
            <div class="chart-container">
                <canvas id="yearChartCanvas"></canvas>
            </div>
        </div>
        <!-- Biểu đồ theo tháng -->
        <div class="tab-pane fade" id="monthChart">
            <div class="chart-container">
                <canvas id="monthChartCanvas"></canvas>
            </div>
        </div>
        <!-- Biểu đồ theo tuần -->
        <div class="tab-pane fade" id="weekChart">
            <div class="chart-container">
                <canvas id="weekChartCanvas"></canvas>
            </div>
        </div>
    </div>

    <!-- Bảng thống kê đơn hàng -->
    <div class="table-container">
        <h3>Danh sách đơn hàng</h3>
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng giá trị</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>hieu</td>
                    <td>01/01/2024</td>
                    <td>Truyện 1</td>
                    <td>2</td>
                    <td>1.500.000 đ</td>
                </tr>
                <tr>
                    <td>cuong</td>
                    <td>03/01/2024</td>
                    <td>STRuyện 2</td>
                    <td>1</td>
                    <td>1.000.000 đ</td>
                </tr>
                <tr>
                    <td>hien</td>
                    <td>05/01/2024</td>
                    <td>Gumdam 2</td>
                    <td>3</td>
                    <td>2.400.000 đ</td>
                </tr>
                <tr>
                    <td>hau</td>
                    <td>10/01/2024</td>
                    <td>Gundam 1</td>
                    <td>5</td>
                    <td>3.750.000 đ</td>
                </tr>
                <tr>
                    <td>hieu</td>
                    <td>15/01/2024</td>
                    <td></td>
                    <td>4</td>
                    <td>4.000.000 đ</td>
                </tr>
                <tr>
                    <td>hien</td>
                    <td>18/01/2024</td>
                    <td>Sản phẩm A</td>
                    <td>6</td>
                    <td>4.500.000 đ</td>
                </tr>
                <tr>
                    <td>hau</td>
                    <td>20/01/2024</td>
                    <td>Sản phẩm C</td>
                    <td>2</td>
                    <td>1.600.000 đ</td>
                </tr>
                <tr>
                    <td>hieu</td>
                    <td>25/01/2024</td>
                    <td>Sản phẩm B</td>
                    <td>1</td>
                    <td>1.000.000 đ</td>
                </tr>
                <!-- Thêm nhiều đơn hàng ở đây -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dữ liệu cứng cho biểu đồ theo năm
    const yearData = {
        labels: ['2020', '2021', '2022', '2023', '2024'],
        datasets: [{
            label: 'Doanh thu theo năm',
            data: [50000000, 70000000, 100000000, 120000000, 150000000], // 5 giá trị cứng cho doanh thu năm
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Dữ liệu cứng cho biểu đồ theo tháng
    const monthData = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Doanh thu theo tháng',
            data: [4000000, 4500000, 5000000, 6000000, 7000000, 6500000, 8000000, 7500000, 9000000, 9500000, 10500000, 11000000], // 12 giá trị cứng cho doanh thu mỗi tháng
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    // Dữ liệu cứng cho biểu đồ theo tuần
    const weekData = {
        labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4', 'Tuần 5', 'Tuần 6', 'Tuần 7', 'Tuần 8', 'Tuần 9', 'Tuần 10', 'Tuần 11', 'Tuần 12', 'Tuần 13', 'Tuần 14', 'Tuần 15', 'Tuần 16', 'Tuần 17', 'Tuần 18', 'Tuần 19', 'Tuần 20'],
        datasets: [{
            label: 'Doanh thu theo tuần',
            data: [1000000, 1200000, 1400000, 1600000, 1800000, 1900000, 2000000, 2100000, 2200000, 2300000, 2400000, 2500000, 2600000, 2700000, 2800000, 2900000, 3000000, 3100000, 3200000, 3300000], // 20 giá trị cứng cho doanh thu mỗi tuần
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }]
    };

    // Khởi tạo biểu đồ theo năm
    const yearChartCtx = document.getElementById('yearChartCanvas').getContext('2d');
    new Chart(yearChartCtx, {
        type: 'bar',
        data: yearData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(value);
                        }
                    }
                }
            }
        }
    });

    // Khởi tạo biểu đồ theo tháng
    const monthChartCtx = document.getElementById('monthChartCanvas').getContext('2d');
    new Chart(monthChartCtx, {
        type: 'line',
        data: monthData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(value);
                        }
                    }
                }
            }
        }
    });

    // Khởi tạo biểu đồ theo tuần
    const weekChartCtx = document.getElementById('weekChartCanvas').getContext('2d');
    new Chart(weekChartCtx, {
        type: 'line',
        data: weekData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(value);
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>
