<nav class="navigation_navbar">
    <ul>
        <li>
            <a href="index.php?page=0">
                <img class="image-logo" src="images/logo.png" alt="logo jeux olympiques" />
            </a>
        </li>
        <li>
            <a href="index.php?page=1">Évènements</a>
        </li>
        <li>
            <a href="index.php?page=2">Autres services</a>
        </li>
        <li>
            <?php
            if (isset($_SESSION['email'])) {
                echo ' <a href="index.php?page=6">Mon profil</a>';
            } else {
                echo '<a href="index.php?page=3">S\'inscrire</a>';
            }
            ?>
        </li>
        <li>
            <?php
            if (isset($_SESSION['email'])) {
                echo ' <a href="index.php?page=5">Se Déconnecter</a>';
            } else {
                echo '<a href="index.php?page=4">Se connecter</a>';
            }
            ?>

        </li>
        <?php
        if (!empty($_SESSION['email'])) {
            echo '<li>';
            echo "<p class='identification-nav'>" . $_SESSION['email'] . " / " . $_SESSION['role']."</p>";
            echo '</li>';
        }

        ?>
    </ul>
</nav>