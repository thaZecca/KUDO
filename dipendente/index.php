<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Dipendente</title>
    <link rel="icon" href="../resources/logo.png">
  </head>
    
  <?php 
        session_start();
        if($_SESSION['ruolo']!='Dipendente')   header('location: ..\login\index.php');

        $host="localhost";
        $username="qq5ccx3u_root";
        $password="kudokudo2023";
        $db_nome="qq5ccx3u_kudo";
        $tab_nome="utente";

        $conn = new mysqli($host, $username, $password, $db_nome) or die($conn -> error);
        $conn -> select_db($db_nome) or die($conn -> error);
  ?> 

  <link href="../resources/css/bootstrap.min.css" rel="stylesheet">

    <style>
      #botn{
              float: right;
            }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

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

    
  </head>
  <body>  
    <main>
      <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a href="https://kudokudo.it/dipendente/" class="d-flex align-items-center text-dark text-decoration-none nav-link">
          <img src="../resources/logo.png" height=50 width=50>
          <span class="fs-4 ms-3">Kudo</span>
          </a>
          <a href="../login/index.php" class="nav-link">
          <span class="">Logout ðŸ‘‹</span>
          </a>
          </div>
        </header>

        <form action="dipendenteVerifica.php" method="post">
          <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid table-responsive">
              <h1 class="display-5 fw-bold">In primo piano ðŸ“°</h1><br>
              <p class="lead col-md-8 fs-8">Non conformitÃ  da risolvere.</p>
              <table class="table table-striped table-hover">
                <tr>
                  <th>ID ðŸŽ¯</th>
                  <th>Causa ðŸ”¥</th>
                  <th>Azione correttiva ðŸ§¯</th>
                  <th>Scadenza ðŸ•‘</th>
                  <th>Fatto âœ”</th>
                </tr>
                <tr></tr>
                <?php 
                  $qry="SELECT ID_NC, Causa, Azione_Correttiva, DataScadenza
                        FROM non_conformita JOIN utente ON (UserCorrezione=Username)
                        WHERE Username='".$_SESSION['username']."' AND isCorretta=0";

                  $res = $conn -> query($qry);
                  $num = $res -> num_rows;
                  for($i=0; $i<$num; $i++){
                    echo '<tr>';
                    $row = $res -> fetch_assoc();
                    echo '<td>#'.$row['ID_NC'].'</td><td>'.$row['Causa'].'</td><td>'.$row['Azione_Correttiva'].'</td><td>'.$row['DataScadenza'].'</td>';
                    echo '<td><input class="form-check-input" type="checkbox" name="'.$row['ID_NC'].'"></td>';
                    echo '</tr>';
                  }               
                ?>
              </table>
            </div>
              <div class="container-fluid py-5 table-responsive">
                <p class="lead col-md-8 fs-8">Non conformitÃ  da verificare.</p>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>ID ðŸŽ¯</th>
                    <th>Azione eseguita ðŸ¦º</th>
                    <th>Scadenza ðŸ•‘</th>
                    <th>Fatto âœ”</th>
                  </tr>
                  <tr></tr>
                    <?php 
                      $qry="SELECT ID_NC, Azione_Correttiva, DataScadenza
                      FROM non_conformita JOIN utente ON (UserVerifica=Username)
                      WHERE Username='".$_SESSION['username']."' AND isCorretta=1 AND isVerificata=0";

                      $res = $conn -> query($qry);
                      $num = $res -> num_rows;
                      for($i=0; $i<$num; $i++){
                        echo '<tr>';
                        $row = $res -> fetch_assoc();
                        echo '<td>#'.$row['ID_NC'].'</td><td>'.$row['Azione_Correttiva'].'</td><td>'.$row['DataScadenza'].'</td>';
                        echo '<td><input class="form-check-input" type="checkbox" name="'.$row['ID_NC'].'"></td>';
                        echo '</tr>';
                      }
                    ?>
                </table>
                <input id="botn" class="mt-3 btn btn-primary btn-lg" type="submit" value="Esegui">
              </div>
            </div>
        </form>


        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3">
              <h2>Segnala una non conformitÃ  ðŸ“¢</h2>
              <div class="container-fluid table-responsive mt-4">
                <table class="table table-dark table-striped">
                  <tr>
                    <th>Origine</th>
                    <th>Causa</th>
                  </tr>
                  <tr>
                    <td>
                      <select name="origine" class="form-select">
                        <option selected></option>
                        <option>Logistica</option>
                        <option>Produzione</option>
                        <option>Risorse umane</option>
                      </select>
                    </td>
                    <td><input type="text" class="form-control" name="causa"></td>
                  </tr>
                </table>
              </div>
              <button class="btn btn-outline-light" type="button">Segnala</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h2>Storico ðŸ“š</h2>
              <p>Lo storico mostra tutte le non conformitÃ  presenti, suddividendole in:
                <ul>
                  <li>Da correggere</li>
                  <li>Da verificare</li>
                  <li>In attesa</li>
                  <li>Concluse</li>
                </ul>
              </p>
              <a href="#"><button class="btn btn-outline-secondary" type="button">Esplora</button></a>
            </div>
          </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
          &copy; IMSPEC 2023
        </footer>
      </div>
    </main>
  </body>
</html>
