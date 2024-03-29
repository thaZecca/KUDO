<?php
    session_start();
    if(!isset($_SESSION['username']))   header('location: ..\login\index.php');

    $host="localhost";
    $username="root";
    $password="";
    $db_nome="qq5ccx3u_kudo";

    $conn = new mysqli($host, $username, $password, $db_nome) or die($conn -> error);
    $conn -> select_db($db_nome) or die($conn -> error);

    $idDaCorreggere=array();
    $idDaVerificare=array();

    $ris = $conn -> query('SELECT ID_NC FROM non_conformita WHERE UserCorrezione IS NULL');
    $num = $ris -> num_rows;

    for($i=0; $i<$num; $i++){
        $row = $ris -> fetch_assoc();
        $idDaCorreggere[]=$row['ID_NC'];
    }

    $ris = $conn -> query('SELECT ID_NC FROM non_conformita WHERE UserVerifica IS NULL AND isCorretta=1');
    $num = $ris -> num_rows;

    for($i=0; $i<$num; $i++){
        $row = $ris -> fetch_assoc();
        $idDaVerificare[]=$row['ID_NC'];
    }

    foreach($idDaCorreggere as $k => $v){
        if($_POST['scadCorr'.$v]!='' AND $_POST['asseCor'.$v]!='') 
            $conn -> query("UPDATE non_conformita SET UserCorrezione='".$_POST['asseCor'.$v]."', Azione_Correttiva='".$_POST['azcorr'.$v]."', DataScadenza='".$_POST['scadCorr'.$v]."' WHERE ID_NC=".$v);
    }
    echo '<br>';

    foreach($idDaVerificare as $k => $v){
        if($_POST['scadVer'.$v]!='' AND $_POST['asseVer'.$v]!='') 
            $conn -> query("UPDATE non_conformita SET UserVerifica='".$_POST['asseVer'.$v]."', DataScadenza='".$_POST['scadVer'.$v]."' WHERE ID_NC=".$v);
    }

    $qry="SELECT ID_NC, Azione_Correttiva
          FROM non_conformita
          WHERE isCorretta=1 AND isVerificata=1 AND isChiusa=0";

    $res = $conn -> query($qry);
    $num = $res -> num_rows;
    for($i=0; $i<$num; $i++){
        $row = $res -> fetch_assoc();
        if(isset($_POST[''.$row['ID_NC']])) $conn -> query("UPDATE non_conformita SET isChiusa=1 WHERE ID_NC=".$row['ID_NC']);
    }

    header('location: index.php');

?>