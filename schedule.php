<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Your Technology Lesson</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
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
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 32px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Schedule Your Technology Lesson</h1>
        <form action="success.php" method="POST">
            <div class="form-group">
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full_name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="lesson-date">Preferred Lesson Date:</label>
                <input type="date" id="lesson-date" name="lesson_date" required>
            </div>
            <div class="form-group">
                <label for="lesson-time">Preferred Lesson Time:</label>
                <select id="lesson-time" name="lesson_time" required>
                    <option value="">Select a time</option>
                    <option value="morning">Morning (9:00 AM - 12:00 PM)</option>
                    <option value="afternoon">Afternoon (1:00 PM - 4:00 PM)</option>
                    <option value="evening">Evening (5:00 PM - 7:00 PM)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lesson-topic">What would you like to learn?</label>
                <textarea id="lesson-topic" name="lesson_topic" placeholder="e.g., Basic computer skills, smartphone use, internet browsing, etc." required></textarea>
            </div>
            <button type="submit">Schedule My Lesson</button>
        </form>
    </div>

</body>
</html>