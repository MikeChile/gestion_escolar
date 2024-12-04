 <?php
  if (strlen(session_id()) < 1)
    session_start();
  ?>
 <!DOCTYPE html>
 <html>

 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- SEO básico -->
   <meta name="title" content="Gestión Escolar (GE)">
   <meta name="description"
     content="Plataforma integral para la gestión escolar que facilita la administración académica y administrativa.">
   <meta name="keywords"
     content="gestión escolar, plataforma educativa, administración académica, estudiantes, docentes">
   <meta name="author" content="mxzcompany">
   <meta name="robots" content="index, follow">

   <!-- Para dispositivos móviles y accesibilidad -->
   <meta name="mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="default">

   <!-- Redes sociales - Open Graph para Facebook, LinkedIn, etc. -->
   <meta property="og:title" content="Gestión Escolar (GE)">
   <meta property="og:description"
     content="Plataforma integral para la gestión escolar que facilita la administración académica y administrativa.">
   <meta property="og:type" content="website">

   <!-- Twitter Cards -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="Gestión Escolar (GE)">
   <meta name="twitter:description"
     content="Plataforma integral para la gestión escolar que facilita la administración académica y administrativa.">

   <!-- Bootstrap 5.2 -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- ESTILOS -->
   <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
   <link rel="stylesheet" href="../public/css/escritorio.css">

   <!-- FAVICON -->
   <link rel="shortcut icon" href="../public/img/favicon.ico">

   <!-- BOXICON -->
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

   <!-- Bootstrap 3.3.5 -->
   <link rel="stylesheet" href="../public/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../public/css/font-awesome.css">


   <!-- DATATABLES -->
   <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
   <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet" />
   <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet" />

   <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

   <!-- TITULO -->
   <title>GE | SISTEMA ESCOLAR</title>

 </head>

 <body class="hold-transition skin-blue sidebar-mini">
   <!-- Load Facebook SDK for JavaScript -->
   <div id="fb-root"></div>
   <script>
     window.fbAsyncInit = function() {
       FB.init({
         xfbml: true,
         version: 'v3.2'
       });
     };

     (function(d, s, id) {
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) return;
       js = d.createElement(s);
       js.id = id;
       js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
   </script>

   <!-- Your customer chat code -->
   <div class="fb-customerchat"
     attribution=setup_tool
     page_id="280144326139427"
     theme_color="#0084ff"
     logged_in_greeting="Hola! deseas compartir algún sistema o descargar ?"
     logged_out_greeting="Hola! deseas compartir algún sistema o descargar ?">
   </div>
   <div class="wrapper">

     <header class="main-header">
       <!-- Logo -->
       <a href="escritorio.php" class="logo">
         <!-- mini logo for sidebar mini 50x50 pixels -->
         <span class="logo-mini"><img src="../public/img/logo-short-mxz.png" alt="Logo mxzcompany" class="logo-mini-mxz"></span>
         <!-- logo for regular state and mobile devices -->
         <span class="logo-lg"><img src="../public/img/logo-short-mxz.png" alt="Logo mxzcompany" class="logo-mxz"> GE</span>
       </a>
       <!-- Header Navbar: style can be found in header.less -->
       <nav class="navbar navbar-static-top">

         <!-- Sidebar toggle button-->
         <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
           <i class='bx bx-menu-alt-left'></i>
         </a>

         <div class="navbar-custom-menu">
           <ul class="nav navbar-nav">

             <li class="dropdown user user-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                 <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
               </a>
               <ul class="dropdown-menu">
                 <!-- User image -->
                 <li class="user-header">
                   <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">

                   <p>
                     <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['cargo']; ?>
                   </p>
                 </li>
                 <!-- Menu Footer-->
                 <li class="user-footer">
                   <div class="pull-left">
                     <a href="perfil.php" class="btn btn-default btn-flat">Perfil</a>
                   </div>
                   <div class="pull-right">
                     <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar Sesión</a>
                   </div>
                 </li>
               </ul>
             </li>
             <!-- Control Sidebar Toggle Button -->

           </ul>
         </div>
       </nav>
     </header>

     <!-- Left side column. contains the logo and sidebar -->
     <aside class="main-sidebar">
       <!-- sidebar: style can be found in sidebar.less -->
       <section class="sidebar">
         <!-- Sidebar user panel -->

         <!-- /.search form -->
         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu" data-widget="tree">

           <br>
           <?php
            if ($_SESSION['escritorio'] == 1) {
              echo ' <li><a href="escritorio.php"><i class="fa  fa-dashboard (alias)"></i> <span>Escritorio</span></a>
        </li>';
            }
            ?>


           <?php
            if ($_SESSION['grupos'] == 1) {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Cursos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="grupos.php"><i class="fa fa-circle-o"></i> Cursos</a></li>
              </ul>
            </li>';
            }
            ?>

           <?php
            if (isset($_GET["idgrupo"])): ?>
             <li class="treeview">
               <a href="#">
                 <i class="fa fa-check"></i> <span>Asistencia</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                 <li><a href="asistencia.php?idgrupo=<?php echo $_GET["idgrupo"]; ?>"><i class="fa fa-circle-o"></i> Agregar</a></li>
               </ul>
             </li>
             <li class="treeview">
               <a href="#">
                 <i class="fa fa-smile-o"></i> <span>Conducta</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                 <li><a href="conducta.php?idgrupo=<?php echo $_GET["idgrupo"]; ?>"><i class="fa fa-circle-o"></i> Agregar</a></li>
               </ul>
             </li>
             <li class="treeview">
               <a href="#">
                 <i class="fa fa-tasks"></i> <span>Calificaciones</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                 <li><a href="calificaciones.php?idgrupo=<?php echo $_GET["idgrupo"]; ?>"><i class="fa fa-circle-o"></i> Calificaciones</a></li>
               </ul>
             </li>

             <li class="treeview">
               <a href="#">
                 <i class="fa fa-th-large"></i> <span>Cursos</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                 <li><a id="btncursos" href="cursos.php?idgrupo=<?php echo $_GET["idgrupo"]; ?>"><i class="fa fa-circle-o"></i> Agregar</a></li>
               </ul>
             </li>

             <!-- Materias -->
             <li class="treeview">
               <a href="#">
                 <i class="fa fa-list"></i> <span>Materias</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                 <li><a href="materias.php?idgrupo=<?php echo $_GET["idgrupo"]; ?>"><i class="fa fa-circle-o"></i> Agregar</a></li>
               </ul>
             </li>

             <li class="treeview">
               <a href="#">
                 <i class="fa fa-th-list"></i> <span>Listas</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                 <li><a id="btnlistas" href="listasis.php?idgrupo=<?php echo $_GET["idgrupo"]; ?>"><i class="fa fa-circle-o"></i> Agregar</a></li>
               </ul>
             </li>
           <?php endif; ?>


           <?php
            if ($_SESSION['acceso'] == 1) {
              echo '  <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Acceso</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Profesores</a></li>
            <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
          </ul>
        </li>';
            }
            ?>
           <li><a href="../public/img/ayuda.pdf" target="_blank"><i class="fa fa-question-circle"></i> <span>Ayuda</span><small class="label pull-right bg-yellow">PDF</small></a></li>

         </ul>
       </section>
       <!-- /.sidebar -->
     </aside>