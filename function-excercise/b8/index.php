<!DOCTYPE html>
<html>
<head>
    <title>Kiểm tra Anagram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post">
                    <div class="mb-3">
                        <label for="string1" class="form-label">Nhập chuỗi 1:</label>
                        <input type="text" class="form-control" id="string1" name="string1">
                    </div>
                    <div class="mb-3">
                        <label for="string2" class="form-label">Nhập chuỗi 2:</label>
                        <input type="text" class="form-control" id="string2" name="string2">
                    </div>
                    <button type="submit" class="btn btn-primary">Kiểm tra</button>
                </form>
                <?php
                function checkAnagram($str1, $str2) {
                    // Loại bỏ khoảng trắng và chuyển đổi thành chữ thường
                    $str1 = strtolower(str_replace(' ', '', $str1));
                    $str2 = strtolower(str_replace(' ', '', $str2));

                    // Kiểm tra độ dài hai chuỗi
                    if (strlen($str1) !== strlen($str2)) {
                        return false;
                    }

                    // Sắp xếp các ký tự trong hai chuỗi
                    $sortedStr1 = str_split($str1);
                    sort($sortedStr1);
                    $sortedStr2 = str_split($str2);
                    sort($sortedStr2);

                    // So sánh hai chuỗi đã sắp xếp
                    return implode('', $sortedStr1) === implode('', $sortedStr2);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $string1 = $_POST['string1'];
                    $string2 = $_POST['string2'];

                    if (checkAnagram($string1, $string2)) {
                        echo "<div class='alert alert-success'>Hai chuỗi là anagram.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Hai chuỗi không phải là anagram.</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
