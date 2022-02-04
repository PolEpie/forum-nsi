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

        <?php
        if (isset($_GET['err']) and $_GET['err'] == 1) {
            echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                    Le sujet exite déja
                </div>';
        } elseif (isset($_GET['err']) and $_GET['err'] == 2) {
            echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                    Merci de vous connecter
                </div>';
        }
        ?>

        <button id="myBtn" class="button">Nouveau sujet</button>

        <!-- The Modal -->
        <div id="modal-new-topic" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <form action="form/add-topic.php" method="post" class="flex-center">
                    <h3>Nouveau sujet</h3>
                    <div>
                        <label for="topic"><b>Nom du Sujet</b></label>
                        <input type="text" placeholder="Ex: La NSI" name="topic" required>
                    </div>
                    <button type="submit">Créer</button>
                </form>
            </div>

        </div>

        <table>
            <tr>
                <th>Sujet</th>
                <th>Dernier Message</th>
                <th>Date du dernier message</th>
            </tr>
            <?php
                require_once "database.php";
                $query_topics = MySQLQuery("select * from topics;");
                $result = $query_topics->fetchAll();
                if (count($result) > 0) {
                    foreach ($result as $topic) {
                        $name = $topic["name"];
                        echo '<tr onclick="document.location = \'messages.php?topic=' . $name . '\';">
                            <td>'.$name.'</td>
                            <td></td>
                            <td></td>
                        </tr>';
                    }
                } else {
                    echo '<tr>
                        <td></td>
                        <td>Aucun sujet posté</td>
                        <td></td>
                    </tr>';
                }
            ?>
        </table>
    </div>


    <script>
        var modal = document.getElementById("modal-new-topic");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
