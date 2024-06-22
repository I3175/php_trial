<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        .login-container h2 {
            background-color: lightgreen;
            margin: -40px -40px 30px -40px;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-size: 24px;
        }
        .login-container input {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
        }
        .login-container button {
            background-color: lightgreen;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }
        .error {
            color: red;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Sign in</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p id="message"></p>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $username = $_POST['username'];
            $password = $_POST['password'];
    
            if ($username == 'admin' && $password == 'admin') {
                echo "<p>Welcome, $username</p>";
            } else {
                echo "<p style='color: red;'>Thông tin đăng nhập không chính xác. Xin hãy kiểm tra lại</p>";
            }
        }
    ?>
</body>
</html>