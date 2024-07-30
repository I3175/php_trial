<?php
session_start();

if (!isset($_SESSION['username']) && (!isset($_COOKIE['username']) || $_COOKIE['username'] !== 'admin')) {
    $_SESSION['error_message'] = 'Bạn cần đăng nhập để có thể truy cập trang này';
    header('Location: index.php');
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : $_COOKIE['username'];
$time = date('d/m/Y H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Success</title>
</head>
<body>
    <p>Đăng nhập thành công!</p>
    <p>Chào mừng bạn, <?php echo htmlspecialchars($username); ?></p>
    <p>Thời gian hiện tại đang login: <?php echo $time; ?></p>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
