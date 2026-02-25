<?php

require_once __DIR__ . "/../core/ViewUsers.inc.php";

$users = $_SESSION['all_users'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Manage Users</title>
</head>

<body class="bg-body-secondary">
    <main class="container py-5">
        <div class="mb-4">
            <h1 class="fw-bold mb-0">Manage Users</h1>
            <p class="text-muted">Overview of registered accounts and their access levels.</p>
        </div>

        <div class="card manage-products-card shadow-sm overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" id="all-users">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3">User</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th class="text-end pe-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $item):
                            $role = empty($item['user_role']) ? 'user' : htmlspecialchars($item['user_role']);
                            $firstLetter = strtoupper(substr($item['username'], 0, 1));
                            ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-placeholder me-3">
                                            <?= $firstLetter ?>
                                        </div>
                                        <span class="fw-bold text-dark"><?= htmlspecialchars($item['username']) ?></span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted small"><?= htmlspecialchars($item['email']) ?></span>
                                </td>
                                <td>
                                    <span
                                        class="badge rounded-pill user-badge <?= ($role === 'admin') ? 'role-admin' : 'role-user' ?>">
                                        <?= strtoupper($role) ?>
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <span class="small text-success">
                                        <span
                                            class="p-1 bg-success border border-light rounded-circle d-inline-block me-1"></span>
                                        Active
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>