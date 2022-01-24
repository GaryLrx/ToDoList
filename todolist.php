<?php
    session_start();
    session_id();
        if($_SESSION){
            include('connexionbdd.php');
            $mail = $_SESSION['mailco'];
            $reqTaches = "SELECT * FROM taches INNER JOIN users ON taches.iduser = users.ID WHERE users.Mail = '$mail'";
            $resultat = mysqli_query($connexion, $reqTaches);
            $all = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
        }
        else{header('Location: index.html');}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page de la To Do List">
    <link rel="stylesheet" href="style_todolist.css">
    <title>To Do List</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <div class="gestion">
                <li><a href="profil.php"><img src="src/user-regular.svg" alt="Image d'une icone pour profil" id="profil"></a></li>
                <li><a href="deconnexion.php"><img src="src/door-open-solid.svg" alt="Image icone porte ouverte pour deconnexion" id="deco"></a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
    <div id="ajouttaches">
        <form action="ajouttaches.php" method="POST">
            <h2>Votre To Do List</h2>
            <div><input type="text" name="titretache" placeholder="Titre :"></div>
            <div>
                <select name="Etat">
                    <option value="afaire">A faire</option>
                    <option value="encours">En cours</option>
                    <option value="terminée">Terminée</option>
                </select>
            </div>
            <div><input type="text" name="descriptiontache" placeholder="Description :"></div>
            <div><input type="date" name="limitetache" placeholder="Date limite"></div>
            <div><input type="submit" value="Ajouter tâche"></div>
        </form>
    </div>

    <div id="taches">
        <div class="tacheHead">
                <p>Titre</p>
                <p>Etat</p>
                <p>Description</p>
                <p>Date Limite</p>     
        </div>
            <?php  
            foreach($all as $info){
                echo "<div class='tache'>";
                echo "<div id='titre'>".$info['Titre']."</div>";
                echo "<div id='etat'>".$info['Etat']."</div>";
                echo "<div id='decri'>".$info['DescriptionTache']."</div>";
                echo "<div id='date'>".$info['Datelimite']."</div>";
                echo "<form id='supp'>";
                echo "<div>";
                echo "<input type='submit' value='Supprimer'";
                echo "</div>";
                echo "</form>";

                echo "<div>";
                echo "<a href='modiftaches.php?id=".$info['ID']."' title='Redirection vers la page de modification' id='modifier'>Modifier</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>


    </div>
        
</main>
</body>
</html>
