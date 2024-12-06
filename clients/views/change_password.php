<?php
session_start();

// Lấy danh sách tài khoản
$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
$error = '';
$success = '';

// Xử lý đổi mật khẩu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Kiểm tra tài khoản
    if (!isset($users[$username])) {
        $error = "Tên đăng nhập không tồn tại.";
    } elseif ($users[$username]['password'] !== $old_password) {
        $error = "Mật khẩu cũ không chính xác.";
    } elseif ($new_password !== $confirm_password) {
        $error = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
    } else {
        // Cập nhật mật khẩu mới
        $users[$username]['password'] = $new_password;
        $_SESSION['users'] = $users;
        $success = "Mật khẩu đã được đổi thành công!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
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

        .change-password-container {
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
    <div class="change-password-container">
        <h2>Đổi mật khẩu</h2>
        <?php if ($error): ?>
            <p class="error-message"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success-message"><?= htmlspecialchars($success); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>

            <label for="old_password">Mật khẩu cũ:</label>
            <input type="password" id="old_password" name="old_password" placeholder="Nhập mật khẩu cũ" required>

            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới" required>

            <label for="confirm_password">Xác nhận mật khẩu mới:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Xác nhận mật khẩu mới" required>

            <button type="submit" class="btn">Đổi mật khẩu</button>
        </form>
        <div class="links">
            <a href="login.php">Quay lại trang đăng nhập</a>
        </div>
    </div>
</body>

</html>
