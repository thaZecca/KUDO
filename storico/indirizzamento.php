<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: ../login/index.php');
    }else{
        if($_SESSION['ruolo']=='Dipendente') header('location: ../dipendente/index.php');
        else if($_SESSION['ruolo']=='Ridistributore') header('location: ../ridistributore/index.php');
        else header('location: ../amministratore/index.php');
    }
?>