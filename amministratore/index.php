<?php
    session_start();
    if(!isset($_SESSION['username'])) header('location: ../login/index.php');
    
?>

<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Amministratore</title>
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
    </style>

    
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
		  <a href="../login/index.php" class="nav-link">
			<span class="">Logout 👋</span>
		  </a>
      </div>
    </header>
    <div class="p-5 mb-4 bg-light rounded-3">
      <h1 class="display-5 fw-bold">Gestione utenti</h1><br>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
        <a href="aggiungi.php">
            <div class="card border-success h-100">
              <img src="..\resources\add.png" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">Aggiungi utente</h5>
                <p class="card-text">Crea un utente con relativa password. All'utente creato potranno essere assegnate attività.</p>
              </div>
            </div>
        </a>
        </div>
        <div class="col">
          <a href="rimuovi.php">
            <div class="card border-danger h-100">
              <img src="..\resources\remove.png" class="card-img-top">
              <div class="card-body">
                  <h5 class="card-title">Rimuovi utente</h5>
                  <p class="card-text">Rimuove un utente. Non sarà più disponibile assegnare attività a quell'utente.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="modifica.php">
            <div class="card border-primary h-100">
              <img src="..\resources\change.png" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">Cambia privilegi utente</h5>
                  <p class="card-text">Cambia il ruolo di un utente. L'utente può effettuare diverse azioni in base al ruolo.</p>
                </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="h-100 p-5 bg-light border rounded-3 mb-3">
      <h2>Storico </h2>
      <p>Lo storico mostra tutte le non conformità presenti, suddividendole in:
        <ul>
          <li>Da correggere</li>
          <li>Da verificare</li>
          <li>In attesa</li>
          <li>Concluse</li>
        </ul>
      </p>
      <a href="../storico/storico.php"><button class="btn btn-outline-secondary" type="button">Esplora</button></a>
    </div>

    <footer class="pt-3 mt-1 text-muted border-top">
      &copy; IMSPEC 2023
    </footer>
  </div>
</main>


    
  </body>
</html>
