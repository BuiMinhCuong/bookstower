<div class="content">
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="border: 3px solid #000; box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                <div class="card-body">
                    <h4 class="box-title text-center">Phân Tích Tài Chính</h4>
                    <!-- Khung hình biểu đồ -->
                    <div style="width: 900px; height: 450px; margin: 0 auto; border: 2px solid #333; border-radius: 8px; padding: 20px;">
                        <canvas id="spacedBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dữ liệu cho biểu đồ cột
    const labels = ["Doanh thu", "Chi phí", "Lợi nhuận", "Tài sản", "Nợ phải trả"];
    const dataValues = [25, 12, 13, 105, 28]; // Giá trị cột (đơn vị: nghìn USD)

    const ctx = document.getElementById("spacedBarChart").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Giá trị (nghìn USD)",
                data: dataValues,
                backgroundColor: [
                    "rgba(54, 162, 235, 0.7)", // Màu xanh
                    "rgba(255, 99, 132, 0.7)", // Màu đỏ
                    "rgba(75, 192, 192, 0.7)", // Màu xanh lục
                    "rgba(153, 102, 255, 0.7)", // Màu tím
                    "rgba(255, 159, 64, 0.7)"  // Màu cam
                ],
                borderColor: [
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 99, 132, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                    "rgba(255, 159, 64, 1)"
                ],
                borderWidth: 1,
                barThickness: 100 // Làm cột to hơn
            }]
        },
        options: {
            // responsive: false, // Không tự động co giãn cố định 
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: "Chỉ tiêu"
                    },
                    barPercentage: 0.5, // Điều chỉnh độ rộng các cột (nhỏ hơn để cách xa)
                    categoryPercentage: 0.5 // Điều chỉnh khoảng cách giữa các cột
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Giá trị (nghìn USD)"
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: "top"
                }
            }
        }
    });
</script>

    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <!-- Các Widget giữ nguyên -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">$<span class="count">126000</span></div>
                                    <div class="stat-heading">Revenue</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Các widget khác không thay đổi -->
        </div>
        <!-- /Widgets -->
         

        <!-- Thay đổi bảng phân tích tài chính -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Phân Tích Tài Chính</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats financial-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Chỉ tiêu</th>
                                        <th>Tháng trước</th>
                                        <th>Tháng này</th>
                                        <th>Tăng/Giảm (%)</th>
                                        <th>Nhận xét</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="serial">1</td>
                                        <td>Doanh thu</td>
                                        <td>$20,000</td>
                                        <td>$25,000</td>
                                        <td><span class="badge badge-success">+25%</span></td>
                                        <td>Doanh thu tăng do chiến lược marketing hiệu quả.</td>
                                    </tr>
                                    <tr>
                                        <td class="serial">2</td>
                                        <td>Chi phí</td>
                                        <td>$10,000</td>
                                        <td>$12,000</td>
                                        <td><span class="badge badge-danger">+20%</span></td>
                                        <td>Tăng do chi phí quảng cáo và nhân sự.</td>
                                    </tr>
                                    <tr>
                                        <td class="serial">3</td>
                                        <td>Lợi nhuận</td>
                                        <td>$10,000</td>
                                        <td>$13,000</td>
                                        <td><span class="badge badge-success">+30%</span></td>
                                        <td>Lợi nhuận tăng nhờ doanh thu tăng vượt mức.</td>
                                    </tr>
                                    <tr>
                                        <td class="serial">4</td>
                                        <td>Tài sản</td>
                                        <td>$100,000</td>
                                        <td>$105,000</td>
                                        <td><span class="badge badge-success">+5%</span></td>
                                        <td>Tài sản tăng nhẹ nhờ đầu tư hiệu quả.</td>
                                    </tr>
                                    <tr>
                                        <td class="serial">5</td>
                                        <td>Nợ phải trả</td>
                                        <td>$30,000</td>
                                        <td>$28,000</td>
                                        <td><span class="badge badge-success">-6.67%</span></td>
                                        <td>Nợ giảm nhờ thanh toán đúng hạn.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-12 -->
        </div>
        <!-- /Phân Tích Tài Chính -->

        <!-- Các phần khác giữ nguyên -->
        <!-- Traffic, Orders, To Do List, và Live Chat -->
    </div> <!-- .animated -->
</div> <!-- /.content -->
