<?php
    session_start();
    require_once "database.php";

    $topic = $_GET["topic"];

    $query_topic = MySQLQuery("select * from topics where name=?;", $topic);
    $result = $query_topic->fetchAll();
    if (count($result) == 0) {
        header("Location: index.php");
        exit;
    }
    $id_topic = $result[0]['id'];

?>

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
        <h2><?php echo $topic; ?></h2>
        <table>
            <tr>
                <th>Utilisateur</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            <?php
            require_once "database.php";
            $query_message = MySQLQuery("select * from messages join topics t on t.id = messages.id_topic join users u on u.id = messages.id_user where name=? ORDER BY date DESC;", $topic);
            $result = $query_message->fetchAll();
            if (count($result) > 0) {
                foreach ($result as $message) {
                    $user = $message["username"];
                    $text = $message["text"];
                    $date = $message["date"];
                    echo '<tr>
                            <td>'.$user.'</td>
                            <td>'.$text.'</td>
                            <td>'.$date.'</td>
                        </tr>';
                }
            } else {
                echo '<tr>
                        <td></td>
                        <td>Aucun message posté</td>
                        <td></td>
                    </tr>';
            }
            ?>
        </table>
        <hr>
        <form action="form/add-message.php" method="post">
            <h3>Nouveau message</h3>
            <div class="newmessage">
                <input type="text" placeholder="Ex: La NSI" name="text" required>
                <input type="hidden" <?php echo 'value="' . $id_topic . '"' ?> name="topic">
                <button type="submit">Poster</button>
            </div>

        </form>
    </div>

</body>
</html>
