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
    <?php
        session_start();
    ?>
    <header>
        <a href="index.php"><h1>Forum</h1></a>
        <div>
            <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="logout.php">' . $_SESSION['username'] . ' | Déconnexion<i class="fas fa-sign-out-alt"></i></a>';
                } else {
                    echo '<a href="login.php">Connexion / Inscription<i class="fas fa-sign-in-alt"></i></a>';
                }
            ?>
        </div>
    </header>

    <div class="container">
        <table>
            <tr>
                <th>Sujet</th>
                <th>Dernier Message</th>
                <th>Date du dernier message</th>
            </tr>
            <tr>
                <td>La NSI</td>
                <td>Test</td>
                <td>Hier à 20h</td>
            </tr>
            <tr>
                <td>La NSI</td>
                <td>Test</td>
                <td>Hier à 20h</td>
            </tr>
            <tr>
                <td>La NSI</td>
                <td>Test</td>
                <td>Hier à 20h</td>
            </tr>
            <tr>
                <td>La NSI</td>
                <td>Test</td>
                <td>Hier à 20h</td>
            </tr>
            <tr>
                <td>La NSI</td>
                <td>Test</td>
                <td>Hier à 20h</td>
            </tr>
        </table>
    </div>
    
</body>
</html>
