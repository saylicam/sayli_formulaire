<?php
$titrePage = "Connexion";
$metaDescription = "Connectez-vous pour accéder à votre compte.";
$message = '';  // Initialisation de la variable $message
require_once 'components/header.php';
require_once 'includes/db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = $conn->real_escape_string($_POST['nom_utilisateur']);
    $sql = "SELECT id, nom_utilisateur, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($_POST['mot_de_passe'], $row['mot_de_passe'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nom_utilisateur'] = $row['nom_utilisateur'];
            header("Location: profil.php");
            exit();
        } else {
            $message = '<div class="message error">Mot de passe incorrect.</div>';
        }
    } else {
        $message = '<div class="message error">Nom d\'utilisateur incorrect.</div>';
    }
}

$conn->close();
?>

<div class="container">
    <h2>Connexion</h2>
    <?php echo $message; ?>
    <form method="post">
        Nom d'utilisateur: <input type="text" name="nom_utilisateur" required><br>
        Mot de passe: <input type="password" name="mot_de_passe" required><br>
        <input type="submit" value="Se connecter">
    </form>
</div>

<?php
require_once 'components/footer.php';
?>
