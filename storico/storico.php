<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Storico</title>
    <link rel="icon" href="../resources/logo.png">

    

    

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

      .verde {
        background-color: #45CB8C;
      }

      span.nosubmit {
        padding: 9px 4px 9px 40px;
        background: rgb(233, 233, 233) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat 13px center;
      }

      .form-select {
        max-width: 30%;
      }
    </style>

    <script src="./ricerca.js"></script>
  </head>
  <body>
    
<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom navbar navbar-expand-lg ">
		<div class="container-fluid">
		  <a href="" class="d-flex align-items-center text-dark text-decoration-none nav-link">
			<img src="../resources/logo.png" height=50 width=50>
			<span class="fs-4 ms-3">Kudo</span>
		  </a>
		  <a href="../login/index.html" class="nav-link">
			<span class="">Logout</span>
		  </a>
      </div>
    </header>

    <a href="./indirizzamento.php">
      <div class="p-1 mb-4 verde text-light rounded-3">
          <img src="./exit3.png" style="max-height: 45px;" class="ps-3">
      </div></a>

      <form method="POST" action="storico.php">
      <div class="input-group mb-3">
        <span class="input-group-text nosubmit"></span>
        <select name="attributo" class="form-select" id="attributo">
          <option value="all">-</option>
          <option value="ID_NC">ID</option>
          <option value="Origine">Origine</option>
          <option value="Causa">Causa</option>
          <option value="UserRiscontro">User Riscontro</option>
          <option value="UserCorrezione">User Correzione</option>
          <option value="Azione_Correttiva">Azione Correttiva</option>
          <option value="DataScadenza">Data Scadenza</option>
          <option value="UserVerifica">User Verifica</option>
        </select>
        <input type="text" name="ricerca" class="form-control" placeholder="Cerca">
      </div>
    </form>

    <div class="p-5 mb-4 bg-light rounded-3" id="testo">
      <div class="container-fluid table-responsive">
        <h1 class="display-5 fw-bold">Storico non conformità</h1><br>
        <table class="table table-striped table-hover">
          <tr>
            <th>ID</th>
            <th>User Riscontro</th>
            <th>Origine</th>
            <th>Causa</th>
            <th>User Correzione</th>
            <th>Azione Correttiva</th>
            <th>Data Scadenza</th>
            <th>isCorretta</th>
            <th>User Verifica</th>
            <th>isVerificata</th>
            <th>isConclusa</th>
          </tr>
        </table>
      </div>
    </div>

    
  </div>
</main>
<div>
  <p id="query">
<?php
if (isset($_POST['ricerca'])) {
  $host = "localhost";
  $username = "qq5ccx3u_root";
  $password = "kudokudo2023";
  $db_nome = "qq5ccx3u_kudo";
  $tab_nome = "utente";

  $conn = new mysqli($host, $username, $password, $db_nome) or die($conn -> error);
  $conn -> select_db($db_nome) or die($conn -> error);

  $ricerca = '';
  $temp = $_POST['ricerca'];
  if ($_POST['attributo'] == 'Origine') $ricerca = "Nome_Reparto LIKE '%".$temp."%' OR ID_Fornitore LIKE '%".$temp."%'";
  else if ($_POST['attributo'] == '-') $ricerca = "ID_NC LIKE '%".$temp."%' OR UserRiscontro LIKE '%".$temp."%' OR isInterna LIKE '%".$temp."%' OR Nome_Reparto LIKE '%".$temp."%' OR ID_Fornitore LIKE '%".$temp."%' OR Causa LIKE '%".$temp."%' OR UserCorrezione LIKE '%".$temp."%' OR Azione_Correttiva LIKE '%".$temp."%' OR DataScadenza LIKE '%".$temp."%' OR isCorretta LIKE '%".$temp."%' OR UserVerifica LIKE '%".$temp."%' OR isVerificata LIKE '%".$temp."%' OR isConclusa LIKE '%".$temp."%'";
  else $ricerca = $_POST['attributo']." LIKE '%".$temp."%";

  $sql = "SELECT * FROM non_conformita WHERE ".$ricerca;
  $result = $conn->query($sql);

  $json = '';
  if ($result->num_rows > 0) {
    $file = array();
    while ($row = $result->fetch_assoc()) {
      $file[] = array("ID_NC" => $row['ID_NC'], "UserRiscontro" => $row['UserRiscontro'], "isInterna" => $row['isInterna'], "Nome_Reparto" => $row['Nome_Reparto'], "ID_Fornitore" => $row['ID_Fornitore'], "Causa" => $row['Causa'], "UserCorrezione" => $row['UserCorrezione'], "Azione_Correttiva" => $row['Azione_Correttiva'], "DataScadenza" => $row['DataScadenza'], "isCorretta" => $row['isCorretta'], "UserVerifica" => $row['UserVerifica'], "isVerificata" => $row['isVerificata'], "isConclusa" => $row['isConclusa']);
    }
    $json = json_encode($file);
  } else {
    $json = 'Nessun risultato.'
  }

  echo $json;
}
?>
      </p>
    </div>
    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; IMSPEC 2023
    </footer>
  </body>
</html>