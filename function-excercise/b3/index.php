<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days in Month</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-10 mt-5">
        <h1>Days in Month</h1>
        <?php
        function daysInMonth($month) {
            // Mảng lưu trữ số ngày tương ứng với các tháng
            $daysInMonths = [
                1 => 31,  // Tháng 1
                2 => 28,  // Tháng 2 (không xét năm nhuận)
                3 => 31,  // Tháng 3
                4 => 30,  // Tháng 4
                5 => 31,  // Tháng 5
                6 => 30,  // Tháng 6
                7 => 31,  // Tháng 7
                8 => 31,  // Tháng 8
                9 => 30,  // Tháng 9
                10 => 31, // Tháng 10
                11 => 30, // Tháng 11
                12 => 31  // Tháng 12
            ];

            // Kiểm tra xem tháng có hợp lệ không
            if (isset($daysInMonths[$month])) {
                return $daysInMonths[$month];
            } else {
                return "Invalid month";
            }
        }

        // Ví dụ sử dụng
        $month = 6;
        $days = daysInMonth($month);
        ?>

        <div class="alert alert-info mt-3">
            <?php echo "Month: $month"; ?><br>
            <?php echo "Days: $days"; ?>
        </div>

        <!-- Thêm mã HTML để nhập tháng và hiển thị số ngày -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
            <div class="form-group">
                <label for="monthInput">Enter month (1-12):</label>
                <input type="number" class="form-control" id="monthInput" name="monthInput" min="1" max="12" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputMonth = $_POST["monthInput"];
            $daysInInputMonth = daysInMonth($inputMonth);

            echo '<div class="alert alert-info mt-3">';
            echo "Month: $inputMonth<br>";
            echo "Days: $daysInInputMonth";
            echo '</div>';
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
