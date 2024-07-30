<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverse Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-10 mt-5">
        <h1>Đảo ngược chuỗi hoặc số</h1>

        <!-- Form nhập giá trị -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
            <div class="form-group">
                <label for="inputValue">Nhập chuỗi hoặc số:</label>
                <input type="text" class="form-control" id="inputValue" name="inputValue" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Đảo ngược</button>
        </form>

        <?php
        // Hàm đảo ngược chuỗi hoặc số
        function reverse($value) {
            // Chuyển đổi giá trị thành chuỗi
            $strValue = strval($value);
            
            // Kiểm tra nếu là số và là số âm
            if (is_numeric($value) && $value < 0) {
                // Loại bỏ dấu âm, đảo ngược chuỗi và thêm lại dấu âm
                $reversed = '-' . strrev(substr($strValue, 1));
            } else {
                // Đảo ngược chuỗi
                $reversed = strrev($strValue);
            }

            // Nếu là số thì chuyển lại thành số nguyên
            if (is_numeric($value)) {
                return intval($reversed);
            } else {
                return $reversed;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputValue = $_POST["inputValue"];
            $reversedValue = reverse($inputValue);
            
            echo '<div class="alert alert-info mt-3">';
            echo "Giá trị nhập vào: $inputValue<br>";
            echo "Giá trị sau khi đảo ngược: $reversedValue";
            echo '</div>';
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pZaXFhT0aLXI7oA+FtczW5eATdyPY/RYxTcMa31r5gJ0TWQlgOb3oD5sEr/uJPaX" crossorigin="anonymous"></script>
</body>

</html>
