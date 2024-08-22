<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: connexion.php");
    exit();
}

require_once 'components/header.php';
require_once 'includes/db.php';

$id_utilisateur = $_SESSION['id'];
$sql = "SELECT nom_utilisateur, email FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utilisateur);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    header("Location: deconnexion.php");
    exit();
}

$stmt->close();
$conn->close();
?>

<div class="container">
    <h2>Profil de <?php echo htmlspecialchars($user['nom_utilisateur']); ?></h2>
    <p><strong>Nom d'utilisateur:</strong> <?php echo htmlspecialchars($user['nom_utilisateur']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><a href="deconnexion.php">Se déconnecter</a></p>
</div>

<?php
require_once 'components/footer.php';
?>
