<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <?php include 'partials/header.php'; ?>
    <div class="container">
        <div class="current-details">
            <h1>Your Profile</h1>
            <div class="details-box">
                <p><strong>First Name:</strong> <span><?= htmlspecialchars($user->getFirstName()) ?></span></p>
                <p><strong>Last Name:</strong> <span><?= htmlspecialchars($user->getLastName()) ?></span></p>
                <p><strong>Nickname:</strong> <span><?= htmlspecialchars($user->getNickname()) ?></span></p>
                <p><strong>Email:</strong> <span><?= htmlspecialchars($user->getEmail()) ?></span></p>
            </div>
        </div>
        <hr>
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
        <div class="back-button">
            <a href="/main">Back to Main Page</a>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
</div>
</body>
</html>
