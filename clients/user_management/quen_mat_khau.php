<?php
include 'cau_hinh.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16));

    $sql = "UPDATE users SET reset_token='$token' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        $reset_link = "http://localhost/user_management/dat_lai_mat_khau.php?token=$token";
        echo "Link đặt lại mật khẩu: <a href='$reset_link'>$reset_link</a>";
    } else {
        echo "Email không tồn tại!";
    }
}
?>

<h2>Quên mật khẩu</h2>
<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    <button type="submit">Gửi link đặt lại mật khẩu</button>
</form>
<a href="dang_nhap.php">Quay lại đăng nhập</a>
