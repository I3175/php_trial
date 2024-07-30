<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: login-success.php');
    exit();
}

$message = '';
$username = '';
$password = '';
if (isset($_SESSION['logout_message'])) {
    $message = $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'camnh' && $password === '123456') {
        $_SESSION['username'] = $username;
        header('Location: login-success.php');
        exit();
    } else {
        $message = 'Invalid username or password';
        $username = '';
        $password = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required>
        <input type="password" name="password" placeholder="Password" value="<?php echo htmlspecialchars($password); ?>" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
