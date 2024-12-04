<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
$servername = "localhost";
$username = "root"; // replace with your actual username
$password = ""; // replace with your actual password
$dbname = "appointment_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}

// Retrieve and sanitize form inputs
$full_name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$pwd = htmlspecialchars($_POST['password']);

// ... rest of your code ...
    // Check if email is already registered
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // Email already exists
        $message = "Error: The email address '$email' is already registered. Please use a different email.";
        echo $message;
    } else {
        // Hash the password before storing
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, pwd) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sss", $full_name, $email, $hashedPwd);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to website.php after successful registration
            header("Location: login.php");
            exit(); // Ensure no further code is executed after the redirection
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>

    <div class="signup-container">
        <h2>Sign Up</h2>
        
        <?php 
        $success_message = ''; // Initialize the variable as an empty string
        if (isset($_POST['submit'])) { // Check if the form has been submitted
            // Your sign-up logic goes here
            // If the sign-up is successful, set the $success_message variable
            $success_message = 'You have successfully signed up!';
        }
        ?>
        
        <?php if ($success_message): ?>
            <div class="success-message">
                <?php echo $success_message; ?>
                
            </div>
        <?php endif; ?>

        <form action="signup.php" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required>
            
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            
            <button type="submit" name="submit">Sign Up</button>
        </form>
        
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>