<?php
    // DECONNEXION
        session_start();
        session_destroy();
        header('Location: index.html')

?>