<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Nhân Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include 'config.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $gender = $_POST['gender'];
        $salary = $_POST['salary'];
        $birthday = $_POST['birthday'];

        $sql = "INSERT INTO Employee (name, description, gender, salary, birthday)
            VALUES ('$name', '$description', '$gender', '$salary', '$birthday')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Thêm mới nhân viên thành công";
            header("Location: list.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <div class="container">
        <h2>Thêm mới Nhân viên</h2>
        <form id="employeeForm" method="post" action="create.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
                <div class="invalid-feedback">Name không được để trống</div>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary">
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
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