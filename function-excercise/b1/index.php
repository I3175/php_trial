<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-10">
    <h1>Count Word</h1>
    <?php
    function countWords($str)
    {
        $str = strtolower($str);
        $str = preg_replace('/[^a-z0-9\s]/', '', $str); // Chỉ giữ lại chữ cái, số và khoảng trắng

        // Bước 2: Tách chuỗi thành các từ riêng biệt
        $words = explode(' ', $str);

        // Bước 3: Tạo một mảng kết hợp để đếm số lần xuất hiện của mỗi từ
        $wordCount = [];
        foreach ($words as $word) {
            if (isset($wordCount[$word])) {
                $wordCount[$word]++;
            } else {
                $wordCount[$word] = 1;
            }
        }

        // hiển thị kết quả của từng từ
        echo "Array </br> (</br>";
        foreach ($wordCount as $word => $count) {
            echo "&emsp;&emsp;[$word] => $count </br>";
        }
        echo ")";
    }

    $str = "Write a function countWords($str) that takes any string of characters and finds the number of times each string occurs.  
    This is a test string.";
    $result = countWords($str);

    // render ra màn hình
    print_r($result);
    ?>
    </div>
    
</body>

</html>