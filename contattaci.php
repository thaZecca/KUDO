<!doctype html>
<html lang="it" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contattaci</title>
    <link rel="icon" href="./resources/logo.png">
  </head>

<link href="./resources/css/bootstrap.min.css" rel="stylesheet">

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
          echo 'background-image: url("./resources/ridotte/img'.$rand.'.jpg");';
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
    <link href="cover.css" rel="stylesheet">
  </head>
  
  <body class="d-flex h-100 text-center text-bg-dark" id="intro">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0">KUDO</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="./index.php">Home</a>
            <a class="nav-link fw-bold py-1 px-0" href="./chisiamo.php">Chi siamo</a>
            <a class="nav-link fw-bold py-1 px-0 active" href="./contattaci.php">Contattaci</a>
            <a class="nav-link fw-bold py-1 px-0" href="./login/index.php">Login</a>
          </nav>
        </div>
      </header>

    <main class="px-3">
      <h1>Contattaci.</h1>
      <p class="lead">Se vuoi collaborare con noi o porci delle domande utilizza il pulsante qui sotto per inviarci una email.</p>
      <p class="lead">
        <a href="mailto:zecchinato5185@itiseveripadova.edu.it" class="btn btn-lg btn-light fw-bold border-white bg-white">Email</a>
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p>IMSPEC &copy; 2022</p>
    </footer>
  </div>


    
  </body>
</html>
