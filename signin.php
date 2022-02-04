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
        <form action="signin-form.php" method="post">
            <div class="flex-center">
                <h2>Inscription</h2>
                <div>
                    <label for="uname"><b>Nom d'Utilisateur</b></label>
                    <input type="text" placeholder="Entrer un nom d'utilisateur" name="username" required>
                </div>

                <div>
                    <label for="psw"><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer un mot de passe" name="password" required>
                </div>

                <button type="submit" class="button">Continuer</button>

            </div>
        </form>
    </div>
</body>
</html>
