<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nhân Viên</title>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $gender = $_POST['gender'];
        $salary = $_POST['salary'];
        $birthday = $_POST['birthday'];

        $sql = "UPDATE Employee SET name='$name', description='$description', gender='$gender', salary='$salary', birthday='$birthday' WHERE Id=$id";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Cập nhật nhân viên thành công";
            header("Location: list.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <div class="container">
        <h2>Sửa Nhân viên</h2>
        <form id="employeeForm" method="post" action="edit.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                <div class="invalid-feedback">Name không được để trống</div>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($row['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row['salary']; ?>">
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#employeeForm').on('submit', function(e) {
                var isValid = true;
                if ($('#name').val().trim() === '') {
                    $('#name').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#name').removeClass('is-invalid');
                }
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>