<?php
require_once __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo   = trim($_POST['pseudo'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $email_confirm = trim($_POST['email_confirm'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');

    // validations simples
    $errors = [];
    if ($email !== $email_confirm) {
        $errors[] = "Les emails ne correspondent pas.";
    }
    if ($password !== $password_confirm) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }
    if (empty($pseudo) || empty($email) || empty($password)) {
        $errors[] = "Pseudo, email et mot de passe requis.";
    }

    if ($errors) {
        echo '<h2>Erreurs lors de l\'inscription :</h2><ul>';
        foreach ($errors as $e) {
            echo '<li>' . htmlspecialchars($e) . '</li>';
        }
        echo '</ul>';
        exit;
    }

    $db = get_db();
    $stmt = $db->prepare('INSERT INTO users (pseudo, email, password, nom, prenom) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([
        $pseudo,
        $email,
        password_hash($password, PASSWORD_DEFAULT),
        $nom,
        $prenom
    ]);
    echo "Inscription réussie ! <a href='connection.html'>Se connecter</a>";
} else {
    echo 'Aucune donnée reçue.';
}
?>
