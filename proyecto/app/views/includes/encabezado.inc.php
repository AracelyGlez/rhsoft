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
          src="/proyecto/app/images/RHSoft_logo.png"
          id="logo"
          alt="RHSoft logo"
          width="90"
          style="margin-right: 20px"
        />
        <!-- icono de home -->
        <img
          src="/proyecto/app/images/home_icon.png"
          id="home_icon"
          alt="home icon"
          width="45"
          style="margin-right: 20px"
        />
       
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
         
          <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT; ?>/usuarios/nominas">Nóminas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT; ?>/usuarios/vacaciones">Vacaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= URLROOT; ?>/usuarios/incapacidades">Incapacidades</a>
          </li>
          </ul>
          <ul class="navbar-nav d-flex my-2 my-lg-0">

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img
          src="/proyecto/app/images/login.png"
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
 