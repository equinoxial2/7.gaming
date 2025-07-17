<?php
require_once __DIR__ . '/db.php';
$db = get_db();
$password = password_hash('demo', PASSWORD_DEFAULT);
$db->exec("INSERT INTO users (pseudo, email, password, nom, prenom, niveau, points) VALUES ('demo', 'demo@example.com', '$password', 'Demo', 'User', 7, 1200)");
echo "BDD initialisée";
?>
