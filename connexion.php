<?php
require_once 'includes/db.php';

session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = $conn->real_escape_string($_POST['nom_utilisateur']);
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT id, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $row['mot_de_passe'])) {
            $_SESSION['nom_utilisateur'] = $nom_utilisateur;
            header("location: profil.php");
        } else {
            $message = '<div class="message error">Mot de passe incorrect.</div>';
        }
    } else {
        $message = '<div class="message error">Nom d\'utilisateur incorrect.</div>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?php echo $message; ?>
        <form method="post">
            Nom d'utilisateur: <input type="text" name="nom_utilisateur" required><br>
            Mot de passe: <input type="password" name="mot_de_passe" required><br>
            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>
