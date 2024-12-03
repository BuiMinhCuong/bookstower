<?php
session_start();

// Lưu trữ tài khoản (giả lập - cần lưu vào cơ sở dữ liệu trong thực tế)
$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];

// Xử lý đăng ký
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ??'';

    // Kiểm tra lỗi
    if (isset($users[$username])) {
        $error = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.";
    } elseif (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($phone)) {
        $error = "Vui lòng điền đầy đủ thông tin.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $error = "Số điện thoại phải gồm 10 chữ số.";
    } else {
        // Thêm tài khoản vào danh sách
        $users[$username] = [
            'fullname' => $fullname,
            'email' => $email,
            'password' => $password,
            'phone' => $phone
        ];
        $_SESSION['users'] = $users;

        // Chuyển đến thông báo thành công
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
        .register-container {
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
            text-align: left;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button.btn, a.btn {
            display: inline-block;
            background: #28a745;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        button.btn:hover, a.btn:hover {
            background: #218838;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .success-message {
            color: green;
            font-size: 16px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <?php if (isset($success) && $success): ?>
            <h2>Đã tạo tài khoản thành công!</h2>
            <p class="success-message">Bạn đã tạo tài khoản mới.</p>
            <a href="http://localhost/bookstower/clients/views/login.php" class="btn">Click để chuyển đến trang đăng nhập</a>
        <?php else: ?>
            <h2>Đăng ký</h2>
            <?php if (isset($error)): ?>
                <p class="error-message"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="fullname">Họ và tên:</label>
                <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Nhập email" required>
                
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
                
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                
                <button type="submit" class="btn">Đăng ký</button>
                <br>
                <a href="login.php">Đã có tài khoản? Đăng nhập tại đây</a>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
