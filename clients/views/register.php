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
    $phone = $_POST['phone'] ?? '';

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
    <title>Đăng ký tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            transform: scale(1);
            transition: transform 0.3s ease-in-out;
        }

        .register-container:hover {
            transform: scale(1.01);
        }

        h2 {
            font-size: 32px;
            color: #333;
            font-weight: 600;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: 2px solid #ddd;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="tel"]:focus {
            border-color: #4caf50;
            outline: none;
        }

        .btn {
            background: #007bff;
            color: white;
            padding: 16px;
            border-radius: 10px;
            font-size: 18px;
            border: none;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #388e3c;
        }

        .error-message {
            color: #f44336;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #555;
        }

        .footer a {
            color: #4caf50;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="register-container">
        <?php if (isset($success) && $success): ?>
            <h2>Chúc mừng! Bạn đã đăng ký thành công.</h2>
            <p class="success-message">Tạo tài khoản thành công. Bạn có thể đăng nhập ngay bây giờ!</p>
            <a href="login.php" class="btn">Đi đến đăng nhập</a>
        <?php else: ?>
            <h2 style=" text-align: center;">Đăng ký tài khoản</h2>
            <?php if (isset($error)): ?>
                <p class="error-message"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="input-container">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" required>
                </div>
                
                <div class="input-container">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email" required>
                </div>
                
                <div class="input-container">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
                </div>
                
                <div class="input-container">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                </div>
                
                <div class="input-container">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                </div>
                
                <button type="submit" class="btn">Đăng ký</button>
            </form>

            <div class="footer">
                <p><a href="login.php">Đăng nhập tài khoản<></a> <a href="forgot_password.php">Quên mật khẩu?</a>
                </p>
            </div>
        <?php endif; ?>
      
    </div>



    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
