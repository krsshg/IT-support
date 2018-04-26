<?php
   include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/session.php";
?>
<!DOCTYPE html>
<HTML>
  <HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
  <?php include "functions/includes/header.php"?>


</HEAD>
<BODY>

 <link rel=Stylesheet href="lagerstyring.css" type="text/css">
<div class="container">


  <div class="jumbotron">
    <img src="../../img/Elkem corporate logo.png" width="190px" height="90px"/>
    <h1> Lagerstyring IT Support KRS <h1>

      <p> Registrer artikler inn på lageret, og registrer dem ut når du henter noe ut. <br>
        Hvis det er en artikkel som ikke er registrert så kan du legge inn denne<p><br><br>

<a>UT</a><br><br>
<a>INN</a><br><br>
    <div class="LagerInn">
        <div id="utstyr">
        <form method="post">
          <div class="row">
            <div id="wrapper">
            <?php
              include "../../functions/lager/ITSLagerAVD.php"
             ?>
           </div>
           <?php
           include "../../functions/lager/ITSLagerInn.php"

          ?>
         </div>

          <div class="row2">
          <div class="antall-ok">
            <br>
            <h3 id="antall">Antall:</h3>
            <input type="number" placeholder="0" max="10" min="0"></input>
            <br>
          <br><br>
            <input type="submit" name="ok" value="ok"></input>
            </div>
          </div>
        </div>
        </form>


      </div>
    </div>

  </div>
</div>
<script>
function AvdelingisNotChecked(){
  var selected_option = $('#avdelingLager option:selected');

  if (selected_option) {
    document.getElementById("produkterLager").disabled = false;
    document.getElementById("produkterLager").hidden = false;
  } else {
    document.getElementById("produkterLager").disabled = false;
    document.getElementById("produkterLager").hidden = false;
  }
}

</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</BODY>
</HTML>
