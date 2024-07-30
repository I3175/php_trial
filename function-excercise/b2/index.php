<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Count</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-10">
        <h1 class="mt-5">Count Words</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
            <div class="form-group">
                <label for="inputText">Enter text:</label>
                <textarea class="form-control" id="inputText" name="inputText" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </form>

        <?php
        function countWords($str)
        {
            $str = strtolower($str);
            $str = preg_replace('/[^a-z0-9\s]/', '', $str); // Chỉ giữ lại chữ cái, số và khoảng trắng
            $words = explode(' ', $str);
            $wordCount = [];
            foreach ($words as $word) {
                if ($word) { // Kiểm tra từ không rỗng
                    if (isset($wordCount[$word])) {
                        $wordCount[$word]++;
                    } else {
                        $wordCount[$word] = 1;
                    }
                }
            }
            return $wordCount;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputText = $_POST["inputText"];
            $wordCount = countWords($inputText);

            echo '<table class="table table-striped mt-5">';
            echo '<thead><tr><th>Word</th><th>Count</th></tr></thead>';
            echo '<tbody>';
            foreach ($wordCount as $word => $count) {
                echo "<tr><td>$word</td><td>$count</td></tr>";
            }
            echo '</tbody></table>';
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
