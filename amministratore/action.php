<?php
    if(isset($_POST['update'])){
        $conn = new mysqli('localhost', 'root', '', 'bcc');
        $r = $_POST['ruolo'];
        $u = $_POST['assegnazione'];
        $queryModifica = "UPDATE utente SET Ruolo = '$r' WHERE Username = '$u'";
        $conn -> query($queryModifica);
        $conn -> refresh(MYSQLI_REFRESH_TABLES);
    }
    header("Location: ./modifica.php");
?>
