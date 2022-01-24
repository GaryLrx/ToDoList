<?php
    session_start();
    session_id();
        if($_SESSION){
            include('connexionbdd.php');
            


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
    <link rel="stylesheet" href="style_profil.css">
    <title>To Do List - Profil</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <div class="gestion">
                <li><a href="todolist.php"><img src="src/clipboard-list-solid.svg" alt="Image d'une icone  pour profil" id="profil"></a></li>
                <li><a href="deconnexion.php"><img src="src/door-open-solid.svg" alt="Image icone porte ouverte pour deconnexion" id="deco"></a></li>
            </div>
        </ul>
    </nav>
</header>

<main>
        <form action="profilupdate.php" method="POST">
            <h3>Changer votre mail</h3>
            <p>Ancien mail</p>
            <input type="text" name="mailup" >
            <p>Nouveau mail</p>
            <input type="text" name="mailup" >
            <h3>Changer votre Mot de passe</h3>
            <p>Ancien Mot de passe</p>
            <input type="text" name="motdepasseup" >
            <p>Nouveau Mot de passe</p>
            <input type="text" name="motdepasseup" >
            <h3>Ajouter une photo de profil</h3>
            <input type="file" name="fileup" >
            <input type="submit" value="Enregistrer">
        </form>
</main>
</body>
</html>