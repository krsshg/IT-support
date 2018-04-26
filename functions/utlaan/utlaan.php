<?php
   include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/session.php";
?>
<!DOCTYPE html>

<HTML>
  <HEAD>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/start.php";?>

  </HEAD>
<BODY>

<div class= "container">

  <div class= "jumbotron">
    <img src="../../img/Elkem corporate logo.png" width="190px" height="90px">
    <h2 id="title2"> Utlån IT support KRS</h2>
      <hr><br>

<div class = "utlaanButtonsAlignCenter">
      <button type=button id=status onclick="buttonToggleUTLAN()">Registrere utlån</button>
      <br>
      <div class=hidden id=utlan>
        <div class="tilgjengeligPC">
          <?php include './pcUt.php'; ?>
        </div>
      </div>
      <br>

        <button type=button style="" id="registrerlevering" onclick="buttonToggleRETUR()">Registrer retur</button><br>
        <div class="hidden" id="demo2">
          <div class="tilgjengeligPC">
    	     <?php include './pcute.php'; ?>
        </div>
      </div>

    <br>

    <button type=button id="status" onclick="buttonToggleUTSTYR()">Vedlikeholde utstyrsliste</button>
    <br>
    <div class="hidden" id="utstyr">
      <div class="tilgjengeligPC">
        <?php include './pcinne.php'; ?>
      </div>
    </div>
  </div><!--utlaanButtonsAlignCenter-->

  </div><!--jumbotron-->
</div><!--container-->
</div><!--barba-wrapper-->
</div><!--barba-container-->

<script>

</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--Include all compiled plugins (below), or include individual files as needed-->
<script src="js/bootstrap.min.js"></script>

</BODY>
</HTML>
