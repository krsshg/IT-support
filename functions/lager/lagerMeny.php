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
    <h2 id="title2"> Lagerstyring KRS</h2>
      <hr><br>

<div class = "utlaanButtonsAlignCenter">

      <button type=button id="lagerstyringBtn" onclick="btnTglInn()">Vare inn</button>
      <br>
      <div class="hidden" id=vareInnID>
        <div class="vareInn">
          <?php include './vareInn.php'; ?>
        </div>
      </div>
      <br>

        <button type=button style="" id="lagerstyringBtn" onclick="btnTglUt()">Vare ut</button><br>
        <div class="hidden" id=vareUtID>
          <div class="vareUt">
    	     <?php include './vareUt.php'; ?>
        </div>
      </div>

    <br>

    <button type=button id=status onclick="btnTglVedlVareliste()">Vedlikeholde vareliste</button>
    <br><br>
    <div class="hidden" id=nyVareID>
      <div class="vedlVareliste">
        <?php include './vedlVareliste.php'; ?>
      </div>
    </div>
  </div><!--utlaanButtonsAlignCenter-->

  </div><!--jumbotron-->

</div><!--container-->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--Include all compiled plugins (below), or include individual files as needed-->
<script src="js/bootstrap.min.js"></script>
<script>
	function btnTglVedlVareliste() {
	  var element = document.getElementById("nyVareID");
	  element.classList.toggle("hidden");
	}
</script>

</BODY>
</HTML>
