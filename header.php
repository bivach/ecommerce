<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>

    <div id="navbarID">
        <div class="container">

            <div class="row row1">
                <ul class="largenav pull-right">
                  <li class="upper-links"><a class="links" href="login.php">Inicia Sesión</a></li>
                  <li class="upper-links"><a class="links" href="register.php">Registrate</a></li>
                  <li class="upper-links"><a class="links" href="faq.php">FAQ</a></li>
                </ul>
            </div>

            <div class="row row2">
                <div class="col-sm-2">
                    <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Logo</span></h2>
                    <h1 style="margin:0px;"><span class="largenav"><a class="links" href="home.php">Logo</a></span></h1>
                </div>
                <div class="navbar-search smallsearch col-sm-8 col-xs-11">
                    <div class="row">
                        <input class="navbar-input col-xs-11" type="" placeholder="Buscar Productos" name="">
                        <button class="navbar-button col-xs-1">
                            <svg width="15px" height="15px">
                                <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="mySidenav" class="sidenav">
        <div class="container" style="background-color: #1d1d50; padding-top: 10px;">
            <span class="sidenav-heading">Logo</span>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
          <a href="home.php">Home</a>
          <a href="login.php">Inicia Sesión</a>
          <a href="register.php">Registrar</a>
          <a href="faq.php">FAQ</a>
    </div>

    </header>
