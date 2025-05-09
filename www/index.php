<?php
$mysqli = new mysqli("db", "user", "pass", "testdb");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = null;
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $query = "SELECT * FROM people WHERE name = '$name'";
    $result = $mysqli->query($query);
}
?>

<!DOCTYPE html>
<html>
<head><title>Consulta de Nome</title></head>
<body>
<h1>Buscar Pessoa</h1>
<form method="get">
  Nome: <input type="text" name="name">
  <input type="submit" value="Buscar">
</form>

<?php if ($result): ?>
  <h2>Resultado:</h2>
  <ul>
    <?php while ($row = $result->fetch_assoc()): ?>
      <li><?= htmlspecialchars($row['name']) ?> - <?= htmlspecialchars($row['email']) ?> - <?= htmlspecialchars($row['phone']) ?></li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
</body>
</html>
