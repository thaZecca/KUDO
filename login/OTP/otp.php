<?php
    session_start();

    if(!isset($_SESSION['ruolo'])) header('location: ../index.php');

    $host="localhost";
    $username="qq5ccx3u_root";
    $password="kudokudo2023";
    $db_nome="qq5ccx3u_kudo";

    $conn = mysqli($host, $username, $password, $db_nome) or die($conn -> error);;

    $qry='SELECT Username, Email FROM utente WHERE Username='.$_SESSION['username'];
    $res = $conn -> query($qry);

    $username = $res['Username'];
    $emailUtente = $res['Email'];

    $codiceOTP='';
    for($i=0; $i<6; $i++){
        $codiceOTP.=''.rand(0,9);
    }

    $_SESSION['otp']=$codiceOTP;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
        
        
    $mail = new PHPMailer(true);
    
    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'authsmtp.securemail.pro';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = '******';                     //SMTP username
      $mail->Password   = '*****';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('service@kudokudo.it', 'Service Kudo');
      $mail->addAddress(''.$emailUtente, ''.$username);     //Add a recipient

  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Codice OTP Kudo';
      $mail->Body    = 'Codice OTP Kudo: <b>'.$codiceOTP.'</b>';
      $mail->AltBody = 'Codice OTP Kudo: '.$codiceOTP;
  
      $p = $mail->send();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>
<!doctype html>
<html lang="it" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUDO · OTP</title>
    <link rel="icon" href="../../resources/logo.png">

<link href="../../resources/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      #intro {
        <?php
          $rand = rand(1, 7);
          echo 'background-image: url("../../resources/ridotte/img'.$rand.'.jpg");';
        ?>
        background-size: cover;
        background-position: center;
        height: 100vh;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
/*
      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }*/

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../resources/css/otp.css" rel="stylesheet">
  </head>
  
  <body class="text-center" id="intro">
    <main class="form-signin w-100 m-auto">
        <form  action="./controllaOTP.php" method="POST">
            <img class="mb-4" src="../../resources/logoBianco.png" alt="" width="100" height="100">
            <h1>Verifica codice OTP</h1>
            <p>Inserisci il codice OTP che ti è arrivato per email</p>
            <div class="form-floating">
                <input type="text" name="codiceOTP" class="form-control" id="floatingInput" placeholder="codice">
                <label for="floatingInput">codice</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
  </body>
</html>
