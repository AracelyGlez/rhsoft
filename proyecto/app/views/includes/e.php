<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/bs/css/bootstrap.min.css"  />
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/owner/style.css" />
    <link rel="stylesheet" href="<?= URLROOT; ?>/assets/media_queries.css" />
</head>
<body>
<body class="d-flex flex-column h-100">
   
   <header>
     <!-- Fixed navbar -->
     <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       <div class="container-fluid">
         
         <div class="collapse navbar-collapse" id="navbarCollapse">
           <ul class="navbar-nav me-auto mb-2 mb-md-0">
             <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="<?= URLROOT; ?>/"><i class="fa fa-house text-success"></i></a>
             </li>
             
             <li class="nav-item">
               <a class="nav-link " href="<?= URLROOT; ?>/agregar.php">Formularios</a>
             </li>
           </ul>
           <!-- <form class="d-flex" role="search">
             <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success" type="submit">Search</button>
           </form> -->
   
           <!-- Insertar la sección de login -->
          
         </div>
       </div>
     </nav>
   </header>
   
   <!-- Begin page content -->
   <main class="flex-shrink-0">
     <div class="container">
