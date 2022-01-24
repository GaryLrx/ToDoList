<?php
    include('connexionbdd.php');
    $erreur = FALSE;

    
        // TITRE
            if(isset($_POST['titretache']) && trim($_POST['titretache'])){
                $titre =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['titretache'])));
            }
            else{
                $erreur .= "<p>Veuillez remplir le titre</p>";
            }
        
        // ETAT
            if(isset($_POST['Etat']) && trim($_POST['Etat'])){
                $etat =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['Etat'])));
            }
            else{
                $erreur .= "<p>Veuillez remplir l'Etat</p>";
            }
            
        // DESCRIPTION  
            if(isset($_POST['descriptiontache']) && trim($_POST['descriptiontache'])){
                $desc =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['descriptiontache'])));
            }
            else{
                $erreur .= "<p>Veuillez remplir une description</p>";
            }
            
        // DATE LIMITE    
            if(isset($_POST['limitetache']) && trim($_POST['limitetache'])){
                $date =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['limitetache'])));
            }
            else{
                $erreur .= "<p>Veuillez remplir une date limite</p>";
            }
echo $titre." ". $etat." ".$desc." ".$date;

        // ERREURS
            if(!$erreur){
                session_start();
                session_id();

                $email = $_SESSION['mailco'];
                $compte = $_SESSION['compteco'];
                echo $compte;
                $reqid = "SELECT ID FROM users WHERE Mail LIKE '$email'";
                
                $exec = mysqli_query($connexion, $reqid);
                $fetch1 = mysqli_fetch_all($exec);

                $idu = $fetch1[0][0];
            
                $req = "DELETE FROM taches WHERE Mail LIKE '$email' AND ID = '$id'";
                mysqli_query($co, $reqDeleteTache);
                
                $exec2 = mysqli_query($connexion, $req);

                var_dump($titre);
                echo "<p>Votre tâche à été supprimée avec succès</p>";
                header('Location: todolist.php');                 
                
            }
            else{
                echo $erreur;
                echo '<a href="todolist.php">Retour à l\'accueil</a>'; 
            }    

            
?>