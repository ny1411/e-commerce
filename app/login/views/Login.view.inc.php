<?php

require_once "../app/config/session.config.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <main class="form-container">
        <form action="../app/login/core/Login.inc.php" method="post">
            <div class="input-container">
                <label for="usernameOrEmail">Username or Email:</label>
                <input type="text" id="usernameOrEmail" name="usernameOrEmail" required>
            </div>
            <div class="input-container">
                <label for="pwd">Password:</label>
                <input type="password" id="pwd" name="pwd" required>
            </div>
            <button class="submit-btn" type="submit">Login</button>
    </main>
</body>

</html>