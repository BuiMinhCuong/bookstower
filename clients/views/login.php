<?php
session_start();

// Lấy danh sách tài khoản
$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Kiểm tra tài khoản
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $success = true;
        $welcomeMessage = "Chào mừng, " . htmlspecialchars($users[$username]['fullname']) . "! Email: " . htmlspecialchars($users[$username]['email']) . " - SĐT: " . htmlspecialchars($users[$username]['phone']);
        header("Location: http://localhost/bookstower/clients");
        exit;
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng. Lỗi";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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

        .login-container {
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

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button.btn,
        a.btn {
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

        button.btn:hover,
        a.btn:hover {
            background: #0056b3;
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

        .links {
            margin-top: 20px;
            font-size: 14px;
        }

        .links a {
            color: #007bff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <?php if (isset($success) && $success): ?>
            <h2>Đăng nhập thành công!</h2>
            <p class="success-message"><?= $welcomeMessage; ?></p>
        <?php else: ?>
            <h2>Đăng nhập</h2>
            <?php if (isset($error)): ?>
                <p class="error-message"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

                <button type="submit" class="btn">Đăng Nhập</button>
            </form>
            <div class="links">
                <a href="register.php">Chưa có tài khoản? Đăng ký tại đây</a><br>
                <a href="forgot_password.php">Quên mật khẩu?</a>
                <a href="change_password.php">Đổi mật khẩu</a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>