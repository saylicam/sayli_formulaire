<?php
$titrePage = "Accueil - Ilyas Nassiri";
$metaDescription = "Bienvenue sur le site de présentation d'Ilyas Nassiri, étudiant en développement web.";
require_once 'components/header.php';
?>

<main>
    <div class="container">
        <section>
            <h2>Bienvenue sur le site d'Ilyas Nassiri</h2>
            <p>Bonjour ! Je m'appelle Ilyas Nassiri, j'ai 22 ans et je suis actuellement étudiant en développement web. Ce site a été créé dans le cadre de mon examen final pour présenter mes compétences et vous permettre d'explorer les différents aspects de mon travail.</p>
        </section>

        <section>
            <h3>À propos de moi</h3>
            <p>Passionné par les technologies du web, j'ai décidé de poursuivre une carrière en tant que développeur web. Mes études m'ont permis d'acquérir des compétences solides en HTML, CSS, JavaScript, PHP, et MySQL, ainsi qu'une compréhension approfondie des principes de conception web et des meilleures pratiques.</p>
            <p>Mon objectif est de continuer à apprendre et à me perfectionner dans ce domaine passionnant, afin de devenir un expert en développement web capable de créer des sites et des applications web innovants et performants.</p>
        </section>

        <section>
            <h3>Mes Projets</h3>
            <p>Voici quelques projets sur lesquels j'ai travaillé récemment :</p>
            <ul>
                <li><strong>Projet 1 :</strong> Site de gestion de tâches en PHP/MySQL.</li>
                <li><strong>Projet 2 :</strong> Portfolio personnel utilisant HTML, CSS et JavaScript.</li>
                <li><strong>Projet 3 :</strong> Application de chat en temps réel avec Node.js et Socket.io.</li>
            </ul>
        </section>

        <section>
            <h3>Formulaire d'Inscription</h3>
            <p>Pour cet examen, j'ai développé un formulaire d'inscription et de connexion sécurisé en PHP. Vous pouvez essayer ces fonctionnalités via les liens ci-dessous :</p>
            <ul>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </section>

        <section>
            <h3>Contactez-moi</h3>
            <p>Si vous avez des questions ou souhaitez en savoir plus sur mes projets, n'hésitez pas à <a href="contact.php">me contacter</a>. Je serais ravi de discuter avec vous !</p>
        </section>
    </div>
</main>

<?php
require_once 'components/footer.php';
?>
