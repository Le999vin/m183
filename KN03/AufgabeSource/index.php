<?php
$users = [
    'admin' => password_hash('geheim123', PASSWORD_ARGON2ID),
    'alice' => password_hash('passwort', PASSWORD_ARGON2ID),
];

session_set_cookie_params([
    'lifetime' => 900,
    'path' => '/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);

session_start();

if(isset($_POST['logout'])) {
    $_SESSION = [];
    if(ini_get('session.use_cookies')) {
        setcookie(session_name(), '', [
            'expires' => time() - 42000,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
    }
    session_destroy();
    header("location:./index.php");
    exit();
}

if(isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if(isset($users[$username]) && password_verify($password, $users[$username])) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['role'] = ($username === 'admin') ? 'admin' : 'user';
    } else {
        $login_error = 'Ungueltiger Benutzername oder falsches Passwort.';
    }
}

if(isset($_POST['speichern']) && isset($_SESSION['username'])) {
    $_SESSION['secret_message'] = $_POST['message'];
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Webseite</title>
    <!-- Füge hier deine CSS-Dateien oder Styles ein -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Willkommen auf meiner Webseite</h1>
    </header>

    <main>
        <section>
            <h2>Session-Daten:</h2>
            <pre><?php var_dump($_SESSION); ?></pre>
        </section>

        <?php if(!isset($_SESSION['username'])) { ?>
        <section>
            <h2>Login</h2>
            <form action="./index.php" method="post">
                <p>Benutzername: <input type="text" name="username" /></p>
                <p>Passwort: <input type="password" name="password" /></p>
                <p><input type="submit" name="login" value="login" /></p>
            </form>
            <?php if(isset($login_error)) { ?>
            <p><b>Fehler:</b> <?php echo htmlspecialchars($login_error, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php } ?>
            <p><b>Hinweis:</b> Demo-Logins: admin/geheim123 oder alice/passwort. Oben bei den Session-Daten sehen Sie, was nach dem Login in der Session gespeichert wird.</p>
        </section>
        <?php } else { ?>
        <section>
            <h2>Geheime Daten</h2>
            <form action="./index.php" method="post">
                <p>Geheimer Inhalt in Session: <input type="text" name="message" /></p>
                <p><input type="submit" name="speichern" value="speichern" /></p>
            </form>
            <p><b>Hinweis:</b> Sie können hier geheime Inhalte in der Session speichern. Ihr Kollege / Ihre Kollegin kann anschliessens schauen, ob er diese auch in seinem Browser angezeigt kriegt, wenn Sie Ihm / Ihr die Session-ID bekannt geben.</p>
        </section>
        <section>
            <h2>Logout</h2>
            <form action="./index.php" method="post">
                <p><input type="submit" name="logout" value="logout" /></p>
            </form>
        </section>
        <?php } ?>
    </main>

    <footer>
    </footer>

    <!-- Füge hier deine JavaScript-Dateien oder Skripte ein -->
    <script src="scripts.js"></script>
</body>
</html>
