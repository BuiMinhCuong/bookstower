<?php
include 'cau_hinh.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: dang_nhap.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo "<h2>Chào mừng, " . $user['username'] . "!</h2>";
    echo "<p>Email: " . $user['email'] . "</p>";
} else {
    echo "Người dùng không tồn tại!";
}
?>
<a href="./dang_xuat.php">Đăng xuất</a>
