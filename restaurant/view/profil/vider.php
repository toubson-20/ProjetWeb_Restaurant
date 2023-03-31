<?php

session_start();

if ($_POST['value'] == true) {
    $_SESSION['panierAcceuil'] = "";
    echo '<script>alert("ok")</script>';
}
