<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viết Hoa Chữ Cái Đầu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-10 mt-5">
        <h1>Viết Hoa Chữ Cái Đầu Của Các Từ</h1>

        <!-- Form nhập giá trị -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
            <div class="form-group">
                <label for="stringInput">Nhập chuỗi:</label>
                <input type="text" class="form-control" id="stringInput" name="stringInput" placeholder="Nhập chuỗi cần viết hoa" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Viết Hoa</button>
        </form>

        <?php
        // Hàm viết hoa chữ cái đầu tiên của các từ
        function capitalize($string) {
            $words = explode(' ', $string);
            $capitalizedWords = array_map(function($word) {
                return ucfirst(strtolower($word));
            }, $words);
            return implode(' ', $capitalizedWords);
        }

        // Xử lý form khi người dùng gửi dữ liệu
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputString = $_POST["stringInput"];
            
            // Gọi hàm capitalize để viết hoa chữ cái đầu
            $result = capitalize($inputString);

            // Hiển thị kết quả
            echo '<h2>Kết quả:</h2>';
            echo '<p>' . htmlspecialchars($result) . '</p>';
        }
        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
