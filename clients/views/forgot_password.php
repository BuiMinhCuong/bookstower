<?php
session_start();

// Lấy danh sách tài khoản (giả lập)
$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];

// Xử lý yêu cầu quên mật khẩu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $found = false;

    // Kiểm tra email trong danh sách
    foreach ($users as $username => $info) {
        if ($info['email'] === $email) {
            $found = true;
            $usernameFound = $username;
            $passwordFound = $info['password'];
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .forgot-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button.btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        button.btn:hover {
            background: #0056b3;
        }
        .message {
            margin-top: 15px;
            font-size: 14px;
        }
        button.btn, a.btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        button.btn:hover, a.btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <h2>Quên mật khẩu</h2>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <?php if ($found): ?>
                <p class="message">Tên đăng nhập: <strong><?= htmlspecialchars($usernameFound); ?></strong></p>
                <p class="message">Mật khẩu: <strong><?= htmlspecialchars($passwordFound); ?></strong></p>
                <button type="submit" class="btn"> <a href="http://localhost/bookstower/clients/views/login.php">Quay lại trang đăng nhập</a> </button>
            <?php else: ?>
                <p class="message">Email không tồn tại trong hệ thống.</p>
            <?php endif; ?>
        <?php else: ?>
            <form method="POST" action="">
                <label for="email">Nhập email đã đăng ký:</label>
                <input type="email" id="email" name="email" placeholder="Nhập email" required>
                <button type="submit" class="btn">Gửi yêu cầu</button>
            </form>
        <?php endif; ?>
        
    </div>
</body>
</html>
