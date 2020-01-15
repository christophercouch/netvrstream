<?php
session_start();

$conn = new mysqli('192.168.254.102', 'admin', '1admin@netVR', 'netvrstream1');

if (isset($_GET['verifyToken'])) {
    $verifyToken = $_GET['verifyToken'];
    $sql = "SELECT * FROM users WHERE verifyToken='$verifyToken' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET status=2 WHERE verifyToken='$verifyToken'";

        if (mysqli_query($conn, $query)) {
            $_SESSION['ID'] = $user['ID'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['status'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            $_SESSION['playerName'] = $user['playerName'];
            header('location: verified.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}