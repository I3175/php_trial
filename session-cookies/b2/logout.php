<?php
session_start();
session_destroy();
setcookie('username', '', time() - 3600);

session_start();
$_SESSION['logout_message'] = 'Bạn đã đăng xuất khỏi hệ thống';
header('Location: index.php');
exit();
?>
