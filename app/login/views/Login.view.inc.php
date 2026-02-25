<?php

require_once "../app/config/session.config.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body class="bg-body-secondary">
    <main class="container d-flex align-items-center justify-content-center py-5">
        <div class="card auth-card shadow-lg p-4 p-md-5">
            <div class="login-header">
                <h2 class="fw-bold">Welcome Back</h2>
                <p class="text-muted">Please enter your details to login</p>
            </div>

            <form action="../app/login/core/Login.inc.php" method="post">
                <div class="mb-4">
                    <label for="usernameOrEmail" class="form-label fw-semibold">Username or Email</label>
                    <input type="text" id="usernameOrEmail" name="usernameOrEmail" class="form-control"
                        placeholder="example@mail.com" required>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <label for="pwd" class="form-label fw-semibold">Password</label>
                        <a href="#" class="text-decoration-none small">Forgot?</a>
                    </div>
                    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="••••••••" required>
                </div>

                <div class="mb-3">
                    <button type="submit"
                        class="btn btn-warning btn-lg w-100 rounded-pill py-3 fw-bold shadow-sm btn-cart">
                        Login
                    </button>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted small">
                        Don't have an account?
                        <a href="register" class="text-decoration-none fw-bold">Sign Up</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>