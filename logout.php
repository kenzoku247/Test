<?php
    if (!isset($_SESSION['status'])) {
        session_unset(); // remove all session variables
        session_destroy(); // destroy the session
        header('Location: login.php');
    }
?>