<?php

// Database connection parameters
$host = "localhost"; // Database host (e.g., localhost)
$dbname = "appointment_system"; // Your database name
$username = "root"; // Your database username (default is 'root' for local setups)
$password = ""; // Your database password (leave empty for local setups)

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Uncomment the line below for testing the connection
echo "Connected successfully!";



// Check if required parameters are set
$full_name = isset($_GET['full_name']) ? htmlspecialchars($_GET['full_name']) : 'Not provided';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : 'Not provided';
$phone = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : 'Not provided';
$lesson_date = isset($_GET['lesson_date']) ? htmlspecialchars($_GET['lesson_date']) : 'Not provided';
$lesson_time = isset($_GET['lesson_time']) ? htmlspecialchars($_GET['lesson_time']) : 'Not provided';
$lesson_topic = isset($_GET['lesson_topic']) ? htmlspecialchars($_GET['lesson_topic']) : 'Not provided';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Scheduled Successfully</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #4CAF50;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            color: #333;
            font-size: 1.2rem;
        }
        .details {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f5e9;
            border: 1px solid #4CAF50;
            border-radius: 8px;
            font-size: 1.1rem;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #777;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Thank You for Scheduling Your Lesson!</h1>
        <p>Your appointment has been successfully submitted. Here are the details:</p>

        <div class="details">
            <p><strong>Full Name:</strong> <?= $full_name ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Phone:</strong> <?= $phone ?></p>
            <p><strong>Date:</strong> <?= $lesson_date ?></p>
            <p><strong>Time:</strong> <?= $lesson_time ?></p>
            <p><strong>Lesson Topic:</strong> <?= $lesson_topic ?></p>
        </div>

        <div class="footer">
            <p><a href="schedule.html">Schedule Another Lesson</a></p>
        </div>
    </div>

</body>
</html>
