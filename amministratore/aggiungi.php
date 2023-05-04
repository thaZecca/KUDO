<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amministratore - Aggiungi Utente</title>
    <link rel="icon" href="../resources/logo.png">

    
  <?php
    error_reporting(E_ALL ^ E_NOTICE);
    $conn = new mysqli('localhost', 'root', '', 'qq5ccx3u_kudo');
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

      .card:hover {
        transform:scale(1.1);
      }

      .card {
       transition: .3s;
      }

      a {
        text-decoration: none;
        color:rgba(0, 0, 0, .9);
      }

      small {
        font-size: 0.8em;
      }

      .verde {
        background-color: #45CB8C;
      }
    </style>

    
  </head>
  <body>
    <?php
    if(isset($_POST['add'])){
      $top = '<main>
      <form action="aggiungi.php" method="post">
        <div class="container py-4">
          <header class="pb-3 mb-4 border-bottom navbar navbar-expand-lg ">
          <div class="container-fluid">
            <a href="" class="d-flex align-items-center text-dark text-decoration-none nav-link">
            <img src="../resources/logo.png" height=50 width=50>
            <span class="fs-4 ms-3">Kudo</span>
            </a>
            <a href="../login/index.php" class="nav-link">
            <span class="">Logout 👋</span>
            </a>
            </div>
          </header>
          <a href="index.php">
          <div class="p-1 mb-4 verde text-light rounded-3">
              <img src="../resources/exit3.png" style="max-height: 45px;" class="ps-3">
          </div></a>
          <div class="p-5 mb-4 bg-light rounded-3">
            <h1 class="display-5 fw-bold">Aggiungi utente</h1><br>
            <div class="container-fluid table-responsive">
              <p class="lead col-md-8 fs-8">Informazioni utente.</p>
              <table class="table table-striped table-hover">
                <tr>
                  <th>Username 👤</th>
                  <th>Password 🔑</th>
                  <th>Ruolo 👷‍♀️</th>
                  <th>Email</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="username"></td>
                  <td><input type="text" class="form-control" name="password"></td>
                  <td>
                    <select name="assegnazione" class="form-select">
                      <option selected></option>';

                        $ruoli = $conn -> query("SELECT R.Nominativo FROM ruolo AS R");
                        $nRuoli = $ruoli -> num_rows;
                        for ($i=0; $i < $nRuoli; $i++) {
                          $row = $ruoli -> fetch_assoc();
                          $top = $top . '
                            <option value="'.$row['Nominativo'].'">'.$row['Nominativo'].'</option>
                          ';
                        }
                      $top = $top . '
                    </select>
                  </td>
                  <td><input type="email" class="form-control" name="email"></td>
                </tr>
              </table>';

      $bot = '<input id="botn" class="mt-3 btn btn-primary btn-lg" type="submit"  name="add" value="Aggiungi">
            </div>
          </div>
          
    
          <footer class="pt-3 mt-1 text-muted border-top">
            &copy; IMSPEC 2023
          </footer>
        </div>
      </form>
      </main>';

      $username = $_POST['username'];
      $password = $_POST['password'];
      $ruolo = $_POST['assegnazione'];
      $email = $_POST['email'];
      $pass_sha1 = sha1($password);
      $pass_ins = substr($pass_sha1, 0, 4);
      $query = "SELECT * FROM utente WHERE Username = '".$username."'";
      $utenti = $conn -> query($query);
      $temp = $utenti -> num_rows;

      if($temp != 0){
        echo $top;
        echo 'Username già in uso';
        echo $bot;
      }else{
        $quey = "INSERT INTO `utente` (`Username`, `Password`, `Ruolo`, `Email`) VALUES ('".$username."', '".$pass_ins."', '".$ruolo."', '".$email."')";
        $conn -> query($quey);
        echo $top;
        echo 'Utente inserito';
        echo $bot;
        
      }


    }else{//pagina primo avvio
      echo '<main>
      <form action="aggiungi.php" method="post">
        <div class="container py-4">
          <header class="pb-3 mb-4 border-bottom navbar navbar-expand-lg ">
          <div class="container-fluid">
            <a href="" class="d-flex align-items-center text-dark text-decoration-none nav-link">
            <img src="../resources/logo.png" height=50 width=50>
            <span class="fs-4 ms-3">Kudo</span>
            </a>
            <a href="../login/index.php" class="nav-link">
            <span class="">Logout 👋</span>
            </a>
            </div>
          </header>
          <a href="index.php">
          <div class="p-1 mb-4 verde text-light rounded-3">
              <img src="../resources/exit3.png" style="max-height: 45px;" class="ps-3">
          </div></a>
          <div class="p-5 mb-4 bg-light rounded-3">
            <h1 class="display-5 fw-bold">Aggiungi utente</h1><br>
            <div class="container-fluid table-responsive">
              <p class="lead col-md-8 fs-8">Informazioni utente.</p>
              <table class="table table-striped table-hover">
                <tr>
                  <th>Username 👤</th>
                  <th>Password 🔑</th>
                  <th>Ruolo 👷‍♀️</th>
                  <th>Email</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="username"></td>
                  <td><input type="text" class="form-control" name="password"></td>
                  <td>
                    <select name="assegnazione" class="form-select">
                      <option selected></option>';

                        $ruoli = $conn -> query("SELECT R.Nominativo FROM ruolo AS R");
                        $nRuoli = $ruoli -> num_rows;
                        for ($i=0; $i < $nRuoli; $i++) { 
                          $row = $ruoli -> fetch_assoc();
                          echo '
                            <option value="'.$row['Nominativo'].'">'.$row['Nominativo'].'</option>
                          ';
                        }
                      echo '
                    </select>
                  </td>
                  <td><input type="email" class="form-control" name="email"></td>
                </tr>
              </table>
              <input id="botn" class="mt-3 btn btn-primary btn-lg" type="submit"  name="add" value="Aggiungi">
            </div>
          </div>

          <footer class="pt-3 mt-1 text-muted border-top">
            &copy; IMSPEC 2023
          </footer>
        </div>
      </form>
    </main>
    ';
    }
    ?>
  </body>
</html>
