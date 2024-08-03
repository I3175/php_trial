<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'config.php';
session_start();

$success_message = "";
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

$sql = "SELECT * FROM Employee";
$result = $conn->query($sql);
?>

<div class="container">
    <?php if ($success_message) : ?>
        <div class="alert alert-success">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>
    <h2>Danh Sách Nhân viên</h2>
    <a href="create.php" class="btn btn-primary mb-3">Thêm mới Nhân viên</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Gender</th>
                <th>Salary</th>
                <th>Birthday</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row["Id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["salary"]; ?></td>
                        <td><?php echo $row["birthday"]; ?></td>
                        <td><?php echo $row["created_at"]; ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $row["Id"]; ?>" class="btn btn-info btn-sm">Chi tiết</a>
                            <a href="edit.php?id=<?php echo $row["Id"]; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="delete.php?id=<?php echo $row["Id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
?>
</body>
</html>


