<?php
session_start();

if (isset($_SESSION['username']) || (isset($_COOKIE['username']) && $_COOKIE['username'] === 'admin')) {
    header('Location: login_success.php');
    exit();
}

$message = '';
if (isset($_SESSION['logout_message'])) {
    $message = $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
} elseif (isset($_SESSION['error_message'])) {
    $message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if (empty($username) || empty($password)) {
        $message = 'Không được để trống username hoặc password';
    } elseif ($username === 'admin' && $password === '123456') {
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('username', $username, time() + 30);
        } else {
            setcookie('username', '', time() - 3600);
        }

        header('Location: login_success.php');
        exit();
    } else {
        $message = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            background-color: #e0f7fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-form input {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-form button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #45a049;
        }
        .login-form p {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
            <button type="submit">LOGIN</button>
            <?php if ($message): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
