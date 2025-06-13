<?php
include 'connection.php'; // This should connect to your DB using $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $first_name     = trim($_POST['first_name']);
    $last_name      = trim($_POST['last_name']);
    $email          = trim($_POST['email']);
    $dob            = $_POST['dob'];
    $phone_number   = trim($_POST['phone_number']);
    $password       = $_POST['password'];

    // Validate inputs
    if (empty($first_name) || empty($last_name) || empty($email) || empty($dob) || empty($phone_number) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Recipient (First_name, Last_name, Email, Dob, phone_number, Password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $dob, $phone_number, $hashed_password);

    // Execute and check result
    if ($stmt->execute()) {
        header("Location: login.php"); // Redirect to login page after success
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>