<?php
require_once 'includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = $conn->real_escape_string($_POST['nom_utilisateur']);
    $email = $conn->real_escape_string($_POST['email']);
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES ('$nom_utilisateur', '$email', '$mot_de_passe')";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page de connexion après une inscription réussie
        header("Location: connexion.php");
        exit(); // Assurez-vous d'arrêter le script après la redirection
    } else {
        $message = '<div class="message error">Erreur : ' . $sql . '<br>' . $conn->error . '</div>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <?php echo $message; ?>
        <form method="post">
            Nom d'utilisateur: <input type="text" name="nom_utilisateur" required><br>
            Email: <input type="email" name="email" required><br>
            Mot de passe: <input type="password" name="mot_de_passe" required><br>
            <input type="submit" value="S'inscrire">
        </form>
    </div>
</body>
</html>
