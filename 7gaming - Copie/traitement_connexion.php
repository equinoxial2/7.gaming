<?php
require_once __DIR__ . '/../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $db = get_db();
    $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['profil_img'] = $user['profil_img'];
        header('Location: page_perso.php');
        exit;
    } else {
        echo 'Identifiants invalides';
    }
} else {
    echo 'Aucune donnée reçue';
}
?>
