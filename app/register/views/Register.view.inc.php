<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>

<body class="bg-body-secondary">
    <main class="container d-flex align-items-center justify-content-center py-5">
        <div class="card auth-card shadow-lg p-4 p-md-5">
            <div class="login-header text-center">
                <h2 class="fw-bold">Create Account</h2>
                <p class="text-muted">Join us today to start shopping</p>
            </div>

            <form action="../app/register/core/Register.inc.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="exampe123"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com"
                        required>
                </div>

                <div class="mb-4">
                    <label for="pwd" class="form-label fw-semibold">Password</label>
                    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="••••••••" required>
                    <div class="form-text">Must be at least 8 characters.</div>
                </div>

                <div class="mb-4 p-3 rounded-3 bg-light border">
                    <div class="form-check form-switch d-flex align-items-center justify-content-between p-0">
                        <label class="form-check-label fw-semibold" for="role-admin">
                            Register as Admin
                        </label>
                        <input class="form-check-input ms-0" type="checkbox" role="switch" id="role-admin"
                            name="role-admin" value="admin" style="width: 3em; height: 1.5em; cursor: pointer;">
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit"
                        class="btn btn-warning btn-lg w-100 rounded-pill py-3 fw-bold shadow-sm btn-cart">
                        Register Now
                    </button>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted small">Already have an account? <a href="login.php"
                            class="text-decoration-none fw-bold">Login here</a></p>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>