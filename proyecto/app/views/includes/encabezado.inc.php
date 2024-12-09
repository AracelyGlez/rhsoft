<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nóminas</title>
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/bs/css/bootstrap.min.css"  />
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/owner/style.css" />
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/media_queries.css" />
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/bs/css/" />
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">

<!-- Fontawesome -->
 <link rel="stylesheet" href="<?= URLROOT; ?>/assets/fa/css/all.min.css">
 <link rel="stylesheet" href="<?= URLROOT; ?>/assets/fa/css/fontawesome.min.css">
 

  
    <!-- Custom styles for this template -->
    <link href="<?= URLROOT ?>/assets/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-pastelblue">
      <div class="container-fluid">
        <!-- logotipo -->
        <img
          src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjzi2MWhooAwulmelu8KVWteeSjJ7bMLJSgvpltMTYLcqy4T1svtkMQA8lfyA0CZ_WDP-xDFSwruQYjokQRA86nIrOIAKFuPsSZkS_rVPXwA0WrPLGUUhYnO585Rac1P6gQW7qlmZ4z1gekeuht1DlrCRCi9mPn5OT1_wVpiGfQpL2BPX2C78UscW7cy3g/s156/RHSoft_logo.png"
          id="logo"
          alt="RHSoft logo"
          width="50"
          style="margin-right: 20px"
        />
        <!-- icono de home -->
        <a href="<?= URLROOT; ?>/home">
        <img
          src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjFyWJfJRZFfQYlk6W3ztQLOH189t_RqSfykx6Yd8KKb-S1Nlc_BxQfEPfmX-I-sfFUeRCT_p0hl8JS-7-DUwR9kdxlJiHm-LxcNeyYjMmHiUobukyI9NQs1EYbuNOl535vt9upyb1uLLTekWNa_hOgTRfkhvcBESteJJdrMs2QxLZEBaYqGcCN5P9wwZ4/s1600/home_icon.png"
          id="home_icon"
          alt="home icon"
          width="45"
          style="margin-right: 20px"
        />
        </a>
       
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
         
          <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT; ?>/usuarios/agregarNominas">Nóminas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT; ?>/usuarios/agregarVacaciones">Vacaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT; ?>/usuarios/agregarIncapacidades">Incapacidades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT; ?>/usuarios/index">Archivos</a>
          </li>
          </ul>
          <ul class="navbar-nav d-flex my-2 my-lg-0">
          <?php if(estaLogueado()) { ?>
            <?php } else { }?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img
          src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjZ4-hwAnAA_QECUg9q_zdm2Vpd0Qnp6-2ClyJ0KzmS8sAE-KlyNGm5Bx1LwFVEEtZlmW8w8oDg6_tOfglhHsqRh1gmTNCSs3H3LDR-_9k7YKgr0rWE8MQGvIdsONxmUdAayI76TSj-dSD-RWaLBKK1NhSKAK26wsZ4sJum7AG3OfP47psz5pic6x81hAg/s320/login.png"
          id="login_icon"
          alt="login icon"
          width="45"
          style="margin-right: 20px"
        />
        
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URLROOT; ?>/usuarios/login">Login</a></li>
            <li><a class="dropdown-item" href="<?= URLROOT; ?>/usuarios/registrar">Registro</a></li>
            </ul>
        </li>

        </ul>
       
        </div>
      </div>
    </nav>
    
</header>


<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
 