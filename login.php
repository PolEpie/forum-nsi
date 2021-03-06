<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Header habituel -->
    <title>Forum</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;400&display=swap" rel="stylesheet">
    <link href="index.css" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/54f3b59379.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="index.php"><h1>Forum</h1></a>
    </header>

    <div class="container">
        <?php
        if (isset($_GET['err']) and $_GET['err'] == 1) {
            echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                    Le compte n\'existe pas ou le mot de passe n\'est pas bon.
                </div>';
        }
        ?>
        <form action="form/login.php" method="post">
            <div class="flex-center">
                <h2>Connexion</h2>
                <div>
                    <label for="username"><b>Nom d'Utilisateur</b></label>
                    <input type="text" placeholder="Votre nom d'utilisateur" name="username" required <?php if (isset($_GET['u'])) {echo 'value="'.$_GET['u'].'"';} ?>>
                </div>

                <div>
                    <label for="password"><b>Mot de passe</b></label>
                    <input type="password" placeholder="Votre mot de passe" name="password" required>
                </div>

                <button type="submit" class="button">Continuer</button>

            </div>
        </form>
        <br>
        <hr>
        <div class="flex-center">
            <h2>Pas de compte ?</h2>

            <a href="signin.php" class="button">Inscription</a>

        </div>
    </div>
</body>
</html>
