<?php
session_start();

// If the user is already logged in, redirect to the index page
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simulated user data (In real applications, use a database)
    $stored_username = "user";
    $stored_password = "password"; // Note: Use hashed passwords in real applications

    // Collecting input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validating credentials
    if ($username === $stored_username && $password === $stored_password) {
        // Set session variables for the logged-in user
        $_SESSION['user_id'] = 1; // Example user ID
        $_SESSION['user_name'] = $username;

        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WhatsApp Clone</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="signup.php">Sign Up here</a></p>
</body>
</html>
