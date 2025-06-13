<?php
// connection.php should define $conn = mysqli_connect(...);
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs (basic)
    if (empty($email) || empty($password)) {
        echo "Please fill all fields.";
        exit;
    }
    // Query to get user by email
    $sql = "SELECT * FROM Recipient WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Check password
        if (password_verify($password, $user['Password'])) {
            // Login success
            echo "Welcome, " . htmlspecialchars($user['First_name']) . "!";
            // Redirect or start session if needed
            // session_start();
            // $_SESSION['user'] = $user;
            // header("Location: dashboard.php");
            // exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No account found with that email.";
    }

    mysqli_close($conn);
}
?>
bvhm<!DOCTYPE html>