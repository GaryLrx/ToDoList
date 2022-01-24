
<?php
    $erreur = FALSE;
        
        // MAIL 
            if(isset($_POST['mailco']) && trim($_POST['mailco'])){
                $mail =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['mailco'])));
            }
            else{
                $erreur .= "<p> Le champ mail est vide </p>";
            }
        
        
        // COMPTE 
        if(isset($_POST['compteco']) && trim($_POST['compteco'])){
            $compte =  htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['compteco'])));
        }
        else{
            $erreur .= "<p> Le champ compte est vide </p>";
        }
        
        // MOT DE PASSE 
            if(isset($_POST['motdepasseco']) && trim($_POST['motdepasseco'])){
                $mdp=  hash('sha256',htmlspecialchars(trim(mysqli_real_escape_string($connexion, $_POST['motdepasseco']))));
            }
            else{
                $erreur .= "<p> Le champ mot de passe est vide </p>";
            }
        
        
        // ERREURS
            if(!$erreur){
                session_start();
                session_id();

                $_SESSION['mailco'] = $_POST['mailco'];
                $_SESSION['compteco'] = $_POST['compteco'];
                $_SESSION['motdepasseco'] = $_POST['motdepasseco'];
                
                include('connexionbdd.php');
                $req = ("SELECT count(*) FROM users WHERE Mail LIKE '$mail' AND Motdepasse LIKE '$mdp'");
                
                $resultat = mysqli_query($connexion, $req);
                $all = mysqli_fetch_all($resultat);

                header('Location: todolist.php');  
            }
            else{
                echo $erreur;
            } 
            
            echo '<a href="index.html">Retour à l\'accueil</a>';
?>
