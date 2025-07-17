<?php
function get_db() {
    static $db = null;
    if ($db === null) {
        $path = __DIR__ . '/data/database.sqlite';
        $needInit = !file_exists($path);
        $db = new PDO('sqlite:' . $path);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($needInit) {
            $db->exec("CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                pseudo TEXT NOT NULL UNIQUE,
                email TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL,
                nom TEXT,
                prenom TEXT,
                niveau INTEGER DEFAULT 1,
                points INTEGER DEFAULT 0,
                profil_img TEXT DEFAULT 'profil1.png'
            )");
        }
    }
    return $db;
}
?>
