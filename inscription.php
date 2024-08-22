<?php
$titrePage = "Inscription";
$metaDescription = "Créez un compte sur notre site en remplissant le formulaire d'inscription.";
$message = '';  // Initialisation de la variable $message
require_once 'components/header.php';
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = $conn->real_escape_string($_POST['nom_utilisateur']);
    $email = $conn->real_escape_string($_POST['email']);
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES ('$nom_utilisateur', '$email', '$mot_de_passe')";

    if ($conn->query($sql) === TRUE) {
        header("Location: connexion.php");
        exit();
    } else {
        $message = '<div class="message error">Erreur : ' . $sql . '<br>' . $conn->error . '</div>';
    }
}

$conn->close();
?>

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

<?php
require_once 'components/footer.php';
?>
