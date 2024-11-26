<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-header {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .checkout-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-weight: bold;
        }

        .checkout-button:hover {
            background-color: #45a049;
        }

        .card-footer {
            font-size: 0.875rem;
            text-align: center;
            color: #555;
        }

        .cart-item-row {
            border-bottom: 1px solid #ddd;
        }

        .cart-item-row:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body class="bg-gray-100 py-12">
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-xl">
        <h1 class="text-3xl font-bold text-center mb-6">Trang Thanh Toán</h1>
        
        <!-- Giỏ hàng -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="card col-span-1">
                <div class="card-header">Thông tin giỏ hàng</div>
                <table class="w-full mb-4">
                    <thead>
                        <tr>
                            <th class="text-left">Sản phẩm</th>
                            <th class="text-right">Giá</th>
                            <th class="text-center">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody id="cartDetails">
                        <!-- Các sản phẩm sẽ được chèn vào đây -->
                    </tbody>
                </table>
                <hr>
                <div class="flex justify-between mt-4">
                    <span class="text-lg font-semibold">Tổng tiền:</span>
                    <span class="text-xl font-bold total-price" id="totalAmount">0</span>
                </div>
            </div>

            <div class="card col-span-1">
                <div class="card-header">Thông tin thanh toán</div>
                <form id="paymentForm">
                    <div class="mb-4">
                        <label for="name" class="block font-semibold">Họ và tên</label>
                        <input type="text" id="name" name="name" class="w-full p-2 border rounded-md" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="mb-4">
                        <label for="sdt" class="block font-semibold">Số điện thoại</label>
                        <input type="text" id="number" name="number" class="w-full p-2 border rounded-md" placeholder="Nhập số điện thoại" pattern="^\d{10}$" maxlength="10" required title="Vui lòng nhập đúng số điện thoại 10 chữ số">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block font-semibold">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border rounded-md" placeholder="Nhập email của bạn" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block font-semibold">Địa chỉ giao hàng</label>
                        <input type="text" id="address" name="address" class="w-full p-2 border rounded-md" placeholder="Nhập địa chỉ giao hàng" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold">Phương thức thanh toán</label>
                        <select id="paymentMethod" name="payment_method" class="w-full p-2 border rounded-md" required>
                            <option value="Credit Card">Thẻ tín dụng</option>
                            <option value="Cash on Delivery">Thanh toán khi nhận hàng</option>
                            <option value="Internet Banking">Internet Banking</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>
                    </div>

                    <!-- Giỏ hàng (ẩn dưới dạng dữ liệu) -->
                    <input type="hidden" id="cartData" name="cart_data">
                    <button type="submit" class="checkout-button">Thanh toán</button>
                </form>
            </div>
        </div>
        <div class="card-footer mt-6 text-sm">Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</div>
    </div>

    <script>

let cart = JSON.parse(localStorage.getItem('cart')) || [
   
];

// Lưu giỏ hàng vào localStorage khi có thay đổi
localStorage.setItem('cart', JSON.stringify(cart));

// Cập nhật giỏ hàng và tổng tiền
// Cập nhật giỏ hàng và tổng tiền
function updateCart() {
    let cart = JSON.parse(sessionStorage.getItem('cartData')) || [];
    let cartDetails = document.getElementById('cartDetails');
    let totalAmount = 0;

    cartDetails.innerHTML = '';

    // Duyệt qua các sản phẩm trong giỏ hàng và hiển thị
    cart.forEach(item => {
        totalAmount += item.price * item.quantity;
        cartDetails.innerHTML += `
            <tr>
                <td>${item.name}</td>
                <td class="text-right">${item.price.toLocaleString()} VND</td>
                <td class="text-center">${item.quantity}</td>
            </tr>
        `;
    });

    // Cập nhật tổng tiền
    document.getElementById('totalAmount').innerText = `${totalAmount.toLocaleString()} VND`;
}

updateCart();


// Xử lý sự kiện form submit
document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault();  
    
    const name = document.getElementById('name').value;
    const phone = document.getElementById('number').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const paymentMethod = document.getElementById('paymentMethod').value;

    // Lưu thông tin người dùng và giỏ hàng vào sessionStorage
    sessionStorage.setItem('userInfo', JSON.stringify({
        name: name,
        phone: phone,
        email: email,
        address: address,
        paymentMethod: paymentMethod
    }));

    sessionStorage.setItem('cartData', JSON.stringify(cart)); // Lưu giỏ hàng

 alert("Cảm ơn bạn đã thanh toán. Chúng tôi sẽ xử lý đơn hàng của bạn ngay lập tức!");

 window.location.href = 'http://localhost/bookstower/clients/views/histrory.php'; 

    document.querySelector('.container').style.display = 'none';
});
    </script>
</body>
</html>
