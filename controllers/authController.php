<?php
require_once 'sendEmails.php';
session_start();
$playerName = "";
$email = "";
$status = "1";
$errors = [];
$isBroadcast = "1";

$conn = new mysqli('192.168.254.102', 'admin', '1admin@netVR', 'netvrstream1');

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['playerName'])) {
        $errors['playerName'] = 'Player Name required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $playerName = $_POST['playerName'];
    $email = $_POST['email'];
    $verifyToken = bin2hex(random_bytes(50)); // generate unique token
    $streamKey = bin2hex(random_bytes(32)); // generate broadcast stream token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    // Check if playerName already exists
    $sql = "SELECT * FROM users WHERE playerName='$playerName' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['playerName'] = "Player Name already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET playerName=?, email=?, verifyToken=?, streamKey=?, password=?, status=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssss', $playerName, $email, $verifyToken, $streamKey, $password, $status);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
            sendVerificationEmail($email, $verifyToken);

            $_SESSION['ID'] = $user_id;
            $_SESSION['playerName'] = $playerName;
            $_SESSION['email'] = $email;
            $_SESSION['streamKey'] = $streamKey;
            $_SESSION['status'] = $status;
            $_SESSION['type'] = 'alert-success';
            header('location: index.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}

// LOGIN

if (isset($_POST['login-btn'])) {
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if ($_POST['verifyToken'] =! '2') {
        $errors['verifyToken'] = 'Email verification required';
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifyToken = $_POST['verifyToken'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['ID'] = $user['ID'];
                $_SESSION['playerName'] = $user['playerName'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['streamKey'] = $user['streamKey'];
                $_SESSION['status'] = $user['status'];
                $_SESSION['type'] = 'alert-success';
                header('location: verified.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong email / password!";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}

  ?>