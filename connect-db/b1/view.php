<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Nhân Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include 'config.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM Employee WHERE Id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No record found";
            exit();
        }
    } else {
        echo "Invalid request";
        exit();
    }
    ?>

    <div class="container">
        <h2>Chi tiết Nhân viên</h2>
        <p><strong>ID:</strong> <?php echo $row['Id']; ?></p>
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
        <p><strong>Salary:</strong> <?php echo $row['salary']; ?></p>
        <p><strong>Birthday:</strong> <?php echo $row['birthday']; ?></p>
        <p><strong>Created At:</strong> <?php echo $row['created_at']; ?></p>
        <a href="list.php" class="btn btn-primary">Quay lại danh sách</a>
    </div>

    <?php
    $conn->close();
    ?>

</body>

</html>