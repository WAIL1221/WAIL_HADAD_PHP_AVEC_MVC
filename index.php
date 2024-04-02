<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Vue/style.css">
    <title>Mon Blog</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Wail Hadad Blog</h1>
        <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
    </header>
    <div class="content">
        <?php
        require 'Controleur/Controleur.php';
        try {
            $bdd = new PDO('mysql:host=localhost:3307;dbname=php_mvc;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT bil_id as id, bil_titre as titre, bil_contenu as contenu FROM T_BILLET ORDER BY bil_id DESC');

        while ($donnees = $reponse->fetch()) {
            echo '<div class="post">';
            echo '<h2 class="post-title">' . htmlspecialchars($donnees['titre']) . '</h2>';
            echo '<p class="post-content">' . nl2br(htmlspecialchars($donnees['contenu'])) . '</p>';
            echo '</div>';
        }

        $reponse->closeCursor();
        ?>
    </div>
</div>
<footer>
    <p>&copy; 2024 WAIL HADAD Blog.</p>
</footer>
</body>
</html>
