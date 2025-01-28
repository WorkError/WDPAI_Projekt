<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>
    <div class="container">
        <h1>Your Profile</h1>
        <form method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($user->getFirstName()) ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($user->getLastName()) ?>" required>

            <label for="nickname">Nickname:</label>
            <input type="text" id="nickname" name="nickname" value="<?= htmlspecialchars($user->getNickname()) ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" required>

            <label for="birth_date">Date of Birth:</label>
            <input type="date" id="birth_date" name="birth_date" value="<?= htmlspecialchars($user->getDateOfBirth()) ?>" required>

            <button type="submit">Update Profile</button>
        </form>
        <a href="/main">Back to Main Page</a>
    </div>
</body>
</html>
