<?php
$mysqli = new mysqli("db", "user", "pass", "testdb");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Query vulnerável a SQL Injection
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $message = "<p style='color: green;'>Credenciais válidas. Acesso concedido.</p>";
    } else {
        $message = "<p style='color: red;'>Login ou senha incorretos.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Área Administrativa</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        Usuário: <input type="text" name="username"><br><br>
        Senha: <input type="password" name="password"><br><br>
        <input type="submit" value="Entrar">
    </form>

    <?php if (!empty($query)): ?>
        <h3>Query executada:</h3>
        <pre><?= htmlspecialchars($query) ?></pre>
    <?php endif; ?>

    <?= $message ?>
</body>
</html>
