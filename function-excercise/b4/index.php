<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra Palindrome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-10 mt-5">
        <h1>Kiểm tra Palindrome</h1>

        <!-- Form nhập chuỗi -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
            <div class="form-group">
                <label for="inputString">Nhập chuỗi:</label>
                <input type="text" class="form-control" id="inputString" name="inputString" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Kiểm tra</button>
        </form>

        <?php
        // Hàm kiểm tra chuỗi có phải là palindrome hay không
        function isPalindrome($string) {
            // Loại bỏ khoảng trắng và chuyển về chữ thường
            $string = strtolower(str_replace(' ', '', $string));
            // Kiểm tra xem chuỗi có bằng chuỗi ngược lại của nó hay không
            return $string == strrev($string);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputString = $_POST["inputString"];
            $result = isPalindrome($inputString);
            
            if ($result) {
                echo '<div class="alert alert-success mt-3">';
                echo "Chuỗi '$inputString' là chuỗi palindrome.";
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger mt-3">';
                echo "Chuỗi '$inputString' không phải là chuỗi palindrome.";
                echo '</div>';
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
