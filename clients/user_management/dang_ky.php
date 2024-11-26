<?php
include 'cau_hinh.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: dang_nhap.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<h2>Đăng ký tài khoản</h2>
<form method="POST">
    <label>Tên đăng nhập:</label>
    <input type="text" name="username" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <button type="submit">Đăng ký</button>
</form>
<a href="./dang_nhap.php">Đăng nhập</a>
