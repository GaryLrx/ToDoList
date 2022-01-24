<?php
    //CONNEXION BDD
        $connexion = mysqli_connect('sql11.freesqldatabase.com','sql11456765','htdJ3P1wti','sql11456765');

        if($connexion){ }
        else{
            mysqli_connect_errno();
            mysqli_connect_error();
        }

?>