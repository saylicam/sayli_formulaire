<?php
session_start();

if (!isset($_SESSION['nom_utilisateur'])) {
    header("location: connexion.php");
    exit;
}

require_once 'includes/db.php';

$nom_utilisateur = $_SESSION['nom_utilisateur'];
$sql = "SELECT nom_utilisateur, email FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
} else {
    echo "Erreur lors de la récupération des informations utilisateur.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Profil</h2>
        <p>Nom d'utilisateur: <?php echo htmlspecialchars($nom_utilisateur); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p><a href="deconnexion.php">Se déconnecter</a></p>
    </div>
</body>
</html>
