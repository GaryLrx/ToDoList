<?php


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="projet de la To Do List en PHP">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style_modif.css">
    <title>To Do List - Modifications</title>
</head>
<body>
    <main>
        
            <div id="conteneur">
                <form action="modifiertaches.php?id=<?= $_GET['id'] ?>" method="POST">
                    <h2>Titre</h2>
                    <input type="text" name="titretache" id="">
                    <h2>Etat</h2>
                    <select name="Etat">
                        <option value="afaire">A faire</option>
                        <option value="encours">En cours</option>
                        <option value="terminée">Terminée</option>
                    </select>
                    <h2>Description</h2>
                    <input type="text" name="descriptiontache" id="">
                    <h2>Date Limite</h2>
                    <input type="date" name="limitetache" id="">
                    <input type="submit" value="Modifier">
                </form>
            </div>
       
        
    </main>
 
</body>
</html>