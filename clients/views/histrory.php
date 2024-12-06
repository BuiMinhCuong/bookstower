<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4CAF50;
            border-bottom: 2px solid #f1f1f1;
            margin-bottom: 12px;
            padding-bottom: 6px;
        }

        .history-content {
            font-size: 1.1rem;
            color: #333;
        }

        .history-table th {
            text-align: left;
            padding: 10px;
            background-color: #f8f9fa;
            border-bottom: 2px solid #e3e3e3;
        }

        .history-table td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #f1f1f1;
        }

        .history-table .total-price {
            font-weight: bold;
            color: #4CAF50;
        }

        .back-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 300px;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }

        .back-button span {
            display: inline-block;
            font-size: 1rem;
        }
    </style>
</head>
<body class="py-12 px-4">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-semibold text-center text-green-600 mb-6">Lịch Sử Mua Hàng</h1>

        <div class="card">
            <div class="card-header">Thông tin người mua</div>
            <div id="userInfo" class="history-content"></div>
        </div>

        <div class="card">
            <div class="card-header">Chi tiết đơn hàng</div>
            <table class="w-full history-table">
                <thead>
                    <tr>
                        <th class="text-left">Sản phẩm</th>
                        <th class="text-right">Giá</th>
                        <th class="text-center">Số lượng</th>
                    </tr>
                </thead>
                <tbody id="cartDetails"></tbody>
            </table>
        </div>
            <a class="back-button" href="http://localhost/bookstower/clients/?act=sanpham#">
                <span>Quay lại trang sản phẩm</span>

             </a>
        <button >
        </button>
    </div>

    <script>
        // Lấy thông tin từ sessionStorage
        const userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
        const cartData = JSON.parse(sessionStorage.getItem('cartData'));

        // Hiển thị thông tin người dùng
        if (userInfo) {
            document.getElementById('userInfo').innerHTML = `
                <p><strong>Họ và tên:</strong> ${userInfo.name}</p>
                <p><strong>Số điện thoại:</strong> ${userInfo.phone}</p>
                <p><strong>Email:</strong> ${userInfo.email}</p>
                <p><strong>Địa chỉ:</strong> ${userInfo.address}</p>
                <p><strong>Phương thức thanh toán:</strong> ${userInfo.paymentMethod}</p>
            `;
        }

        // Hiển thị chi tiết giỏ hàng
        const cartDetails = document.getElementById('cartDetails');
        let totalAmount = 0;

        if (cartData) {
            cartData.forEach(item => {
                totalAmount += item.price * item.quantity;
                cartDetails.innerHTML += `
                    <tr>
                        <td>${item.name}</td>
                        <td class="text-right">$${item.price}</td>
                        <td class="text-center">${item.quantity}</td>
                    </tr>
                `;
            });
        }

        // Hiển thị tổng tiền
        cartDetails.innerHTML += `
            <tr>
                <td colspan="2" class="text-right font-bold">Tổng tiền:</td>
                <td class="text-center font-bold total-price">$${totalAmount.toFixed(2)}</td>
            </tr>
        `;
    </script>
</body>
</html>
