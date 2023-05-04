<?php
    session_start();
    if(!isset($_SESSION['username']) AND $_SESSION['ruolo']!='Dipendente') header('location: ../login/index.php');
    
    $host="localhost";
    $username="root";
    $password="";
    $db_nome="qq5ccx3u_kudo";

    $conn = new mysqli($host, $username, $password, $db_nome) or die($conn -> error);
    $conn -> select_db($db_nome) or die($conn -> error);
    
    $usernameRiscontro=$_SESSION['username'];
    $origine=$_POST['origineNC'];
    $causa=$_POST['causaNC'];
    
    if(!is_numeric($origine)){
        $qry = "INSERT INTO non_conformita(UserRiscontro, isInterna, Nome_Reparto, ID_Fornitore, Causa) VALUES('".$usernameRiscontro."', 1, '".$origine."', NULL, '".$causa."')";
    }
    else{
        $qry = "INSERT INTO non_conformita(UserRiscontro, isInterna, Nome_Reparto, ID_Fornitore, Causa) VALUES('".$usernameRiscontro."', 0, NULL, ".$origine.", '".$causa."')";
    }
    
    $conn -> query($qry);
    
    
    header('refresh: 0; url=./index.php');
    
?>