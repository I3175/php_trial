<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chia mảng thành các mảng con</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-10 mt-5">
        <h1>Chia mảng thành các mảng con</h1>

        <!-- Form nhập giá trị -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
            <div class="form-group">
                <label for="arrayInput">Nhập mảng (các phần tử cách nhau bởi dấu phẩy):</label>
                <input type="text" class="form-control" id="arrayInput" name="arrayInput" placeholder="1, 2, 3, 4, 5" required>
            </div>
            <div class="form-group mt-3">
                <label for="sizeInput">Nhập kích thước của các mảng con:</label>
                <input type="number" class="form-control" id="sizeInput" name="sizeInput" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Chia mảng</button>
        </form>

        <?php
        // Hàm cắt mảng thành các mảng con
        function group($array, $size) {
            $result = [];
            for ($i = 0; $i < count($array); $i += $size) {
                $result[] = array_slice($array, $i, $size);
            }
            return $result;
        }

        // Hàm hiển thị mảng
        function printArray($array) {
            echo '<pre>' . print_r($array, true) . '</pre>';
        }

        // Xử lý form khi người dùng gửi dữ liệu
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $arrayInput = $_POST["arrayInput"];
            $sizeInput = intval($_POST["sizeInput"]);

            // Chuyển đổi chuỗi nhập vào thành mảng
            $array = array_map('intval', explode(',', $arrayInput));
            
            // Gọi hàm group để cắt mảng
            $result = group($array, $sizeInput);

            // Hiển thị kết quả
            echo '<h2>Kết quả:</h2>';
            printArray($result);
        }
        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
