<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <main class="form-container">
        <form action="../app/register/core/Register.inc.php" method="POST">
            <div class="input-container">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-container">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-container">
                <label for="pwd">Password:</label>
                <input type="password" id="pwd" name="pwd" required>
            </div>
            <div class="input-container">
                <label for="role">Are you signing up as admin?</label>
                <input type="checkbox" id="role-admin" name="role-admin" value="admin">
            </div>
            <button class="submit-btn" type="submit">Register</button>
        </form>
    </main>
</body>

</html>