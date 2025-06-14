<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<h2>Données reçues :</h2><ul>";
    foreach ($_POST as $cle => $valeur) {
        echo "<li><strong>$cle</strong> : " . htmlspecialchars($valeur) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucune donnée reçue.";
}
