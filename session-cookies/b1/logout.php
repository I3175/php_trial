<?php
session_start();
session_destroy();
session_start();
$_SESSION['logout_message'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();
?>
