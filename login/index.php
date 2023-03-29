<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="../resources/logo.png">
   
<link href="../resources/css/bootstrap.min.css" rel="stylesheet">
<!--2, 3, 5-->
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
          echo 'background-image: url("../resources/ridotte/img'.$rand.'.jpg");';
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

    
    <link href="../resources/css/sign-in.css" rel="stylesheet">
  </head>
  <body class="text-center bg-image shadow-2-strong" id="intro">
    <main class="form-signin w-100 m-auto" >
      <form  action="../Dipendente/index.html">
        <img class="mb-4" src="../resources/logoBianco.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal white">Accedi</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="username">
          <label for="floatingInput">username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
    </main>  
  </body>
</html>
