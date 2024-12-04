
<?php
// Include the database connection code
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appointment_system";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

}
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];

    // Query to insert the appointment data
    $query = "INSERT INTO appointments (appointment_date, appointment_time, patient_name, doctor_name) VALUES ('$appointment_date', '$appointment_time', '$patient_name', '$doctor_name')";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        // Appointment inserted successfully, display a success message
        echo 'Appointment submitted successfully';
    } else {
        // Error inserting appointment, display an error message
        echo 'Error submitting appointment: ' . $conn->error;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $lesson_date = htmlspecialchars($_POST['lesson_date']);
    $lesson_time = htmlspecialchars($_POST['lesson_time']);
    $lesson_topic = htmlspecialchars($_POST['lesson_topic']);


    header("Location: success.php?full_name=$full_name&email=$email&phone=$phone&lesson_date=$lesson_date&lesson_time=$lesson_time&lesson_topic=$lesson_topic");
    exit();
}
?>