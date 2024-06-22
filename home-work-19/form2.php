<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registration Form</h2>
        <?php
        $firstName = $lastName = $email = $gender = "";
        $state = 1; // Default state value
        $hobbies = [];
        $firstNameErr = $lastNameErr = $emailErr = "";
        $submitted = false;

        $states = [
            1 => "Johor",
            2 => "Massachusetts",
            3 => "Washington"
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $state = $_POST['state'];
            $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];

            if (empty($firstName)) {
                $firstNameErr = "Firstname không được để trống";
            }
            if (empty($lastName)) {
                $lastNameErr = "Lastname không được để trống";
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email không được để trống";
            }

            if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr)) {
                $submitted = true;
            }
        }
        ?>
        <?php if ($submitted) : ?>
            <div class="alert alert-success" role="alert">
                Đăng ký thành công!
                <p>Thông tin của bạn:</p>
                <p>First name: <?= htmlspecialchars($firstName) ?></p>
                <p>Last name: <?= htmlspecialchars($lastName) ?></p>
                <p>Email: <?= htmlspecialchars($email) ?></p>
                <p>Gender: <?= htmlspecialchars($gender) ?></p>
                <p>State: <?= htmlspecialchars($state) ?> (<?= htmlspecialchars($states[$state]) ?>)</p>
                <p>Hobbies: <?= htmlspecialchars(implode(", ", $hobbies)) ?></p>
            </div>
        <?php else : ?>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="form-group">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($firstName) ?>">
                    <small class="error"><?= $firstNameErr ?></small>
                </div>
                <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?= htmlspecialchars($lastName) ?>">
                    <small class="error"><?= $lastNameErr ?></small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
                    <small class="error"><?= $emailErr ?></small>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?= $gender == 'Male' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?= $gender == 'Female' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" id="state" name="state">
                        <?php foreach ($states as $key => $value) : ?>
                            <option value="<?= $key ?>" <?= $state == $key ? 'selected' : '' ?>><?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hobbies</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="badminton" value="Badminton" <?= in_array('Badminton', $hobbies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="badminton">Badminton</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="football" value="Football" <?= in_array('Football', $hobbies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="football">Football</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="bicycle" value="Bicycle" <?= in_array('Bicycle', $hobbies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="bicycle">Bicycle</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save record</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>