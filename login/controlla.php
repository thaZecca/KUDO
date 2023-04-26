<?php
    $host="localhost";
    $username="qq5ccx3u_root";
    $password="kudokudo2023";
    $db_nome="qq5ccx3u_kudo";
    $tab_nome="utente";

    $conn = new mysqli($host, $username, $password, $db_nome) or die($conn -> error);
    $conn -> select_db($db_nome) or die($conn -> error);

    //acquisizione username e password dal form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //protezione da sql injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = $conn -> real_escape_string($username);
    $password = $conn -> real_escape_string($password);
    
    $pass_sha1 = sha1($password);//stringa troppo lunga per essere confrontata con la password del database (4 cifre)
    $pass_confronto = substr($pass_sha1, 0, 4);//prendo le prime 4 cifre della password cifrata che userò per il confronto

    $query = "SELECT * FROM $tab_nome WHERE username = '$username' AND password = '$pass_confronto'";
    $result = $conn -> query($query);       
    $conta = $result -> num_rows;

    if($conta == 1){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $row = $result -> fetch_assoc();

        if($row['Ruolo'] == 'Ridistributore'){
            $_SESSION['ruolo']='Ridistributore';
        	header("Location: ../ridistributore/index.php");//pagina del ridistributore
        }else if($row['Ruolo'] == 'Dipendente'){
            $_SESSION['ruolo']='Dipendente';
        	header("Location: ../dipendente/index.php");//pagina del dipendente
        }else if($row['Ruolo'] == 'Amministratore'){
            $_SESSION['ruolo']='Amministratore';
        	header("Location: ../amministratore/index.php");//altre pagine che verranno
        }
    }else{
        echo '
        Identificazione non riuscita: nome utente o password errati <br>
        Torna alla pagina di <a href="index.php">login</a> <br>
        ';
        //header('location: ./index.php');
    }
?>
