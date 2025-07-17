<?php
require_once __DIR__ . '/../db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo 'Utilisateur non connecté';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['profil_img'])) {
    $img = basename($_POST['profil_img']);
    $db = get_db();
    $stmt = $db->prepare('UPDATE users SET profil_img = ? WHERE id = ?');
    $stmt->execute([$img, $_SESSION['user_id']]);
    $_SESSION['profil_img'] = $img;
    header('Location: page_perso.php');
    exit;
}

echo 'Aucune image sélectionnée';
?>
