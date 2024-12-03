<?php
include './cau_hinh.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: tro_lai_trang_chu.php");
            exit;
        } else {
            echo "Sai mật khẩu!";
        }
    } else {
        echo "Email không tồn tại!";
    }
}
?>

<h2>Đăng nhập</h2>
<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <button type="submit">Đăng nhập</button>
</form>
<a href="./dang_ky.php">Đăng ký tài khoản</a>
<a href="./quen_mat_khau.php">Quên mật khẩu</a>
