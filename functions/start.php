<!DOCTYPE html>
<?xml version="1.0" encoding0"utf-8"?>
<html lang="en">
  <head>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";
    ?>

    <title>Velkommen til IT-support</title>
      <?php include 'connect.php';?>
  </head>
  <body>
<script src="../../js/dropdown.js"></script>
    <!-- Static navbar -->
   <nav class="navbar navbar-default navbar-static-top">
     <a id="logout" href = "../../functions/login/logout.php">Sign Out</a>
     <a id="LoggedOnAs"> Pålogget som:
       <?php
         echo ($_SESSION['givenname']);
       ?>
     </a>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/index.php">Elkem IT Support</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../../functions/utlaan/utlaan.php">Utlån</a></li>
			      <li><a href="http://144.127.128.203/krsITSwiki/index.php" target="_blank">Wiki</a></li>
            <li><a href="../../functions/lager/lagerMeny.php">Lagerstying</a></li>
            <li><a href="../../functions/JIRA/jiraMeny.php">JIRA</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Print Label <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../../functions/labels/postlapp.php">Internpost</a></li>
                <li><a href="../../functions/labels/bufferlapp.php">Buffervare</a></li>
              </ul>
            </li>
            <li><a href="../../functions/misc/extVPNmeny.php">extVPN</a></li>
          </ul>
        </div> <!--navbar end-->
      </div> <!--Container end-->
    </nav>
    <div id="barba-wrapper">
      <div class="barba-container">

  </BODY>
</HTML>
