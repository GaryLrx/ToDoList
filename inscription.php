<?php
        include('connexionbdd.php');
        $erreur = FALSE;

        // NOM
            if(isset($_POST['nomins']) && trim($_POST['nomins'])){
                $nom = htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['nomins'])));
            }
            else{
                $erreur .= "<p>Le champ nom est vide</p>";
            }
        
        // PRENOM
            if(isset($_POST['prenomins']) && trim($_POST['prenomins'])){
                $prenom=  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['prenomins'])));
            }
            else{
                $erreur .= "<p> Le champ prenom est vide </p>";
            }
        
        // MAIL 
            if(isset($_POST['mailins']) && trim($_POST['mailins'])){
                $mail =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['mailins'])));
            }
            else{
                $erreur .= "<p> Le champ mail est vide </p>";
            }
        
        
        // COMPTE 
            if(isset($_POST['compteins']) && trim($_POST['compteins'])){
                $compte =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['compteins'])));
            }
            else{
                $erreur .= "<p> Le champ compte est vide </p>";
            }
        
        
        // MOT DE PASSE 
            if(isset($_POST['motdepasseins']) && trim($_POST['motdepasseins'])){
                $mdp=  hash('sha256',htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['motdepasseins']))));
            }
            else{
                $erreur .= "<p> Le champ mot de passe est vide </p>";
            }
        
        
        // ERREURS
            if(!$erreur){
                session_start();
                session_id();

                $_SESSION['mailins'] = $_POST['mailco'];
                $_SESSION['compteins'] = $_POST['compteco'];
                $_SESSION['motdepasseco'] = $_POST['motdepasseco'];
                
                $req = "INSERT INTO users(Nom, Prenom, Mail, Motdepasse, Compte) VALUES ('$nom','$prenom','$mail','$mdp','$compte')";
                
                mysqli_query($connexion, $req);

                echo "<p>Votre compte à été crée avec succès</p>";
                header('Location: todolist.php');                 
                   
            }
            else{
                echo $erreur;
                echo '<a href="index.html">Retour à l\'accueil</a>'; 
            }    
?>