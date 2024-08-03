<?php
include 'config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Employee WHERE Id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Xóa nhân viên thành công";
        header("Location: list.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
    exit();
}
?>
