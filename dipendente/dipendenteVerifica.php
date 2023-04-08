<?php
    session_start();
    if(isset($_SESSION['username'])) header('location: ..\login\index.php');

    $host="localhost";
    $username="qq5ccx3u_root";
    $password="kudokudo2023";
    $db_nome="qq5ccx3u_kudo";
    $tab_nome="utente";

    $conn = new mysqli($host, $username, $password, $db_nome) or die($conn -> error);
    $conn -> select_db($db_nome) or die($conn -> error);

    $qry="SELECT ID_NC
          FROM non_conformita JOIN utente ON (UserCorrezione=Username)
          WHERE Username='".$_SESSION['username']."' AND isCorretta=0";

    $res = $conn -> query($qry);
    $num = $res -> num_rows;

    for($i=0; $i<$num; $i++){
        $row = $res -> fetch_assoc();
        if(isset($_POST[''.$row['ID_NC']])) $conn -> query("");
    }

?>