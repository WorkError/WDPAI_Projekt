<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - WeWatch</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Register</h1>
            <form action="/register" method="POST">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="birth_date">Date of Birth:</label>
                <input type="date" id="birth_date" name="birth_date" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login">Login here</a>.</p>
        </div>
    </div>
</body>
</html>
