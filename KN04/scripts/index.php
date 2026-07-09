<?php
$users = ['admin' => 'sunshine'];
$error = ''; $success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    // SICHERHEITSLÜCKE: Kein Rate-Limiting, kein Account-Lockout
    if (isset($users[$username]) && $users[$username] === $password) {
        $success = true;
    } else { $error = 'Ungültiger Benutzername oder Passwort.'; http_response_code(401); }
}
?>
<!DOCTYPE html><html lang="de"><head><meta charset="UTF-8"><title>M183 Login</title></head>
<body><div class="box"><h2>Login</h2>
<?php if ($success): ?>
    <p class="success">✓ Login erfolgreich! Willkommen, <?= htmlspecialchars($_POST['username']) ?>.</p>
<?php else: ?>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="POST">
        <input type="text" name="username" value="admin" required>
        <input type="password" name="password" required>
        <button type="submit">Anmelden</button>
    </form>
<?php endif; ?>
</div></body></html>
