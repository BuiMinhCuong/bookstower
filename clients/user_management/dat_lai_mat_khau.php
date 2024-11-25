<?php
include 'cau_hinh.php';

if (isset($_GET['token']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_GET['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    $sql = "UPDATE users SET password='$new_password', reset_token=NULL WHERE reset_token='$token'";
    if ($conn->query($sql) === TRUE) {
        echo "Mật khẩu đã được đặt lại! <a href='dang_nhap.php'>Đăng nhập</a>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<h2>Đặt lại mật khẩu</h2>
<form method="POST">
    <label>Mật khẩu mới:</label>
    <input type="password" name="new_password" required>
    <button type="submit">Đặt lại mật khẩu</button>
</form>
