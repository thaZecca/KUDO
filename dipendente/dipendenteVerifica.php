<?php
    session_start();
    if(isset($_SESSION['username'])) header('location: ..\login\index.php');

    $host="localhost";
    $username="qq5ccx3u_root";
    $password="kudokudo2023";
    $db_nome="qq5ccx3u_kudo";
    $tab_nome="utente";
    $user=$_SESSION['username'];

    $conn = new mysqli($host, $username, $password, $db_nome) or die($conn -> error);
    $conn -> select_db($db_nome) or die($conn -> error);

    $qry="SELECT ID_NC
          FROM non_conformita JOIN utente ON (UserCorrezione=Username)
          WHERE Username='".$user."' AND isCorretta=0";

    $res = $conn -> query($qry);
    $num = $res -> num_rows;

    for($i=0; $i<$num; $i++){
        $row = $res -> fetch_assoc();
        if(isset($_POST[''.$row['ID_NC']])) $conn -> query("UPDATE non_conformita SET isCorretta=1 WHERE ID_NC=".$row['ID_NC']);
    }

    $qry="SELECT ID_NC
          FROM non_conformita JOIN utente ON (UserVerifica=Username)
          WHERE Username='".$user."' AND isCorretta=1";

    $res = $conn -> query($qry);
    $num = $res -> num_rows;

    for($i=0; $i<$num; $i++){
        $row = $res -> fetch_assoc();
        if(isset($_POST[''.$row['ID_NC']])) $conn -> query("UPDATE non_conformita SET isVerificata=1 WHERE ID_NC=".$row['ID_NC']);
    }


    header('location: index.php');

?>