 
<?php // Connexion à la base de données
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=bibliotheque", "root", "");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $sql = "SELECT * FROM administrateur WHERE pseudo = :pseudo AND mdp = :mdp";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pseudo' => $pseudo, 'mdp' => $mdp]);
    $administrateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($administrateur) {
        $_SESSION['administrateur'] = $administrateur;
        header('Location: login.php');
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}
?>
<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
            <h1>Connexion Administrateur</h1>
        <form method="POST" action="" style="center">
            <div>
                <label for="pseudo">Pseudo:</label>
                <input type="text" id="pseudo" name="pseudo" required>
            </div>
            <div>
                <label for="mdp">Mot de passe:</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>

        <?php if (isset($error)): ?>
            <p><?= $error ?></p>
        <?php endif; ?>
</body>
