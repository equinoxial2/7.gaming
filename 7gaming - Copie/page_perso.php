<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page perso</title>
    <link rel="stylesheet" href="page_perso.css">
</head>

<body>
    <img class="logo" src="7-gaming.png" alt="logo site">


    <div class="menu">
        <button><a href="7gaming.html">Accueil</a></button>
        <button><a href="à_propos.html">À propos</a></button>
        <button><a href="service.html">Service</a></button>
        <button><a href="contact.html" target="_blank">Contact</a></button>
    </div>

    <?php
    session_start();

    // Simule les infos utilisateur (à remplacer par la BDD plus tard)
    $niveau = 7; // TODO: Récupérer depuis la BDD
    $points = 1200; // TODO: Récupérer depuis la BDD

    // Images de profil et conditions de déblocage
    $profils = [
        'profil1.png' => ['niveau' => 0, 'points' => 0],
        'profil2.png' => ['niveau' => 5, 'points' => 0],
        'profil3.png' => ['niveau' => 0, 'points' => 1000],
    ];

    // Image de profil actuelle (simulée)
    $img = isset($_SESSION['profil_img']) ? $_SESSION['profil_img'] : 'profil1.png';
    ?>

    <h2>Choisis ton image de profil</h2>
    <form method="post" action="choisir_profil.php">
        <?php foreach ($profils as $img_name => $cond): ?>
            <?php if ($niveau >= $cond['niveau'] && $points >= $cond['points']): ?>
                <label>
                    <input type="radio" name="profil_img" value="<?= $img_name; ?>" <?= ($img === $img_name) ? 'checked' : '' ?>>
                    <img src="images/profils/<?= $img_name; ?>" style="width:60px;height:60px;border-radius:50%;margin:5px;">
                </label>
            <?php endif; ?>
        <?php endforeach; ?>
        <br>
        <button type="submit">Choisir cette image</button>
    </form>

    <div class="profil-container">
        <p>Image de profil actuelle :</p>
        <img class="profil-img" src="images/profils/<?= $img; ?>" alt="Profil utilisateur" style="width:80px;height:80px;border-radius:50%;">
    </div>





</body>

</html>