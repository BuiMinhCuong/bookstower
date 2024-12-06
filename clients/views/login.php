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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #d1d7e6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
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

            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);

            width: 100%;
            max-width: 500px;
            text-align: center;
            animation: slideUp 0.7s ease-out;
            z-index: 1;
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
        @keyframes slideUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.4);
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;

        }

        .error-message {
            color: #f44336;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .success-message {
            color: #4caf50;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .links a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #555;
        }
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://via.placeholder.com/1500x900.png?text=Xin chào quý khách') center center/cover no-repeat;
            z-index: -1;
            opacity: 0.15;
            animation: backgroundMove 5s linear infinite;
        }
        @keyframes backgroundMove {
            0% { background-position: 0 0; }
            100% { background-position: -2000px 0; }
        }
        .input-group-text {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }
        .input-group-text:hover {
            background-color: #0056b3;
        }
        .form-control {
            transition: box-shadow 0.3s ease;
            border-radius: 10px;
        }
        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }
    }
    </style>
</head>

<body>
    <div class="background-animation"></div>

    <div class="login-container shadow-lg">
        <?php if (isset($success) && $success): ?>
            <h2 class="text-success">Đăng nhập thành công!</h2>
            <p class="success-message"><?= $welcomeMessage; ?></p>
        <?php else: ?>
            <h2 class="mb-4">Đăng nhập</h2>
            <?php if (isset($error)): ?>
                <p class="error-message"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form method="POST" action="">

                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

                <button type="submit" class="btn">Đăng Nhập</button>
                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>

            </form>
            <div class="links mt-3">
                <a href="register.php">Chưa có tài khoản? Đăng ký tại đây</a><br>
                <a href="forgot_password.php">Quên mật khẩu?</a>
                <a href="change_password.php">Đổi mật khẩu</a>
            </div>
        <?php endif; ?>
        <footer class="footer">
        <p>© 2024 BookStore. Tất cả quyền được bảo lưu.</p>
    </footer>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>