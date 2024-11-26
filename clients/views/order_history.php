<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .empty {
            text-align: center;
            font-style: italic;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Lịch sử đặt hàng & Giỏ hàng</h1>

    <!-- Giỏ hàng -->
    <h2>Sản phẩm trong giỏ hàng</h2>
    <table id="cart-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Các sản phẩm trong giỏ hàng sẽ được thêm vào đây -->
        </tbody>
    </table>
    <div style="text-align: right; font-size: 1.2rem; font-weight: bold;">
        Tổng tiền: <span id="total-price">0 VND</span>
    </div>
    <a href="http://localhost/bookstower/clients/views/sanpham.php">
        <button class="btn">Quay lại trang sản phẩm</button>
    </a>
    <a href="http://localhost/bookstower/clients/views/cart.php">
        <button id="checkout-btn" class="btn">thanh toán </button>
    </a>

    <!-- Lịch sử mua hàng -->
    <h2>Lịch sử đặt hàng</h2>
    <table id="history-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
                <th>Ngày mua</th>
            </tr>
        </thead>
        <tbody>
            <!-- Lịch sử mua hàng sẽ được thêm vào đây -->
        </tbody>
    </table>

    <script>
        // Hàm tải giỏ hàng từ localStorage
        function loadCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartTable = document.querySelector("#cart-table tbody");
    const totalPriceElement = document.getElementById("total-price");
    cartTable.innerHTML = ""; // Xóa nội dung cũ

    let totalAmount = 0; // Tổng tiền

    if (cart.length === 0) {
        totalPriceElement.innerText = "0 VND";
        cartTable.innerHTML = "<tr><td colspan='5' class='empty'>Giỏ hàng trống</td></tr>";
        return;
    }

    cart.forEach((item, index) => {
        totalAmount += item.price * item.quantity; // Cộng dồn giá tiền
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.name}</td>
            <td>${item.quantity}</td>
            <td>${(item.price * item.quantity).toLocaleString()} VND</td>
            <td><button class="btn delete-btn" data-index="${index}">Xóa</button></td>
        `;
        cartTable.appendChild(row);
    });

    // Cập nhật tổng tiền
    totalPriceElement.innerText = `${totalAmount.toLocaleString()} VND`;

    // Gắn sự kiện xóa cho từng nút
    const deleteButtons = document.querySelectorAll(".delete-btn");
    deleteButtons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const index = e.target.getAttribute("data-index");
            cart.splice(index, 1); // Xóa sản phẩm khỏi giỏ hàng
            localStorage.setItem("cart", JSON.stringify(cart)); // Cập nhật localStorage
            loadCart(); // Tải lại giỏ hàng
        });
    });
}

        // Hàm tải lịch sử mua hàng từ localStorage
       // Hàm tải lịch sử mua hàng từ localStorage với giới hạn
function loadHistory() {
    let history = JSON.parse(localStorage.getItem("history")) || [];
    const historyTable = document.querySelector("#history-table tbody");
    historyTable.innerHTML = ""; // Xóa nội dung cũ

    const historyLimit = 10; // Giới hạn số lượng lịch sử hiển thị 

    if (history.length === 0) {
        historyTable.innerHTML = "<tr><td colspan='6' class='empty'>Chưa có lịch sử mua hàng</td></tr>";
        return;
    }

    // Giới hạn số lượng mục hiển thị
    const limitedHistory = history.slice(0, historyLimit);

    limitedHistory.forEach((item, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.name}</td>
            <td>${item.quantity}</td>
            <td>${item.price.toLocaleString()} VND</td>
            <td>${(item.price * item.quantity).toLocaleString()} VND</td>
            <td>${item.date}</td>
        `;
        historyTable.appendChild(row);
    });
}

// Hàm xử lý thanh toán
function checkout() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (cart.length === 0) {
        alert("Giỏ hàng của bạn đang trống!");
        return;
    }

    // Lưu giỏ hàng vào sessionStorage
    sessionStorage.setItem('cartData', JSON.stringify(cart));

    let history = JSON.parse(localStorage.getItem("history")) || [];
    const currentDate = new Date();
    const formattedDate = currentDate.toLocaleDateString("vi-VN"); 
    const formattedTime = currentDate.toLocaleTimeString("vi-VN"); 

    // Chuyển sản phẩm từ giỏ hàng sang lịch sử mua hàng
    cart.forEach((item) => {
        history.unshift({ 
            ...item,
            date: `${formattedDate} ${formattedTime}`, // Ngày và giờ
        });
    });

    // Lưu lịch sử mua hàng vào localStorage
    localStorage.setItem("history", JSON.stringify(history));

    // Hiển thị thông báo thanh toán thành công mà không xóa giỏ hàng
    alert("Tiếp tục thanh toán!");

    // Cập nhật lại giỏ hàng và lịch sử
    loadCart(); // Giỏ hàng vẫn giữ nguyên
    loadHistory(); // Lịch sử mua hàng được cập nhật

    // Chuyển hướng đến trang thanh toán
    window.location.href = "http://localhost/bookstower/clients/views/cart.php";  // Đảm bảo đúng URL trang thanh toán
}

// Gắn sự kiện vào nút thanh toán
document.getElementById("checkout-btn").addEventListener("click", checkout);

        // Tải dữ liệu khi trang load
        loadCart();
        loadHistory();
    </script>
</body>
</html>
