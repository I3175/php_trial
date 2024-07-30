<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<p>Cần đăng nhập để thực hiện chức năng này</p>";
    header('Refresh: 5; url=login.php', true, 303);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Success</title>
</head>
<body>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
