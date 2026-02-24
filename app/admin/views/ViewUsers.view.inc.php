<?php

require_once __DIR__ . "/../core/ViewUsers.inc.php";

$users = $_SESSION['all_users'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
</head>

<body>
    <main class="users-container">
        <h1>Manage Users</h1>
        <table id="all-users">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $item): ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars($item['username']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($item['email']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($item['user_role']) == '' ? 'user' : htmlspecialchars($item['user_role']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>