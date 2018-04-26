<?php
   include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/session.php";
?>
<!DOCTYPE html>
<HTML>
<HEAD>

	<?php require 'c:/wamp64/www/KRSITSintern/functions/start.php';?>

</HEAD>
<BODY>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Internpost</h1>
        <br><br>
        <p>Bruker skrivere: KRS-PRT-ITPOSTLAPP, KRS-PRT-itpostlappHovedLager</p>
        <p>ZDesigner GK420d - labelwriter - 144.127.62.194 og 144.127.62.196</p>
        <br><br><br>
        <div class= "forminput">
        <form action="./printPostLabel.php" method="post">
          <menytext>Printer på ITS:</menytext><input id="inbox" type="checkbox" onclick="HovedlagerDisabled()" name="printerValg" value="ITS">
          <br>
          <menytext>Printer på hovedlager: </menytext><input id="inbox2" type="checkbox" onclick="ITSDisabled()" name="printerValg2" value="hovedlager">
          <br><br><br>
          <menytext>EGS#:</menytext>
          <input id="egs" type="text" name="EGS"><br>
          <menytext>Til:</menytext>
          <input type="text" name="Til"><br>
          <menytext>Tlf:</menytext>
          <input id="tlf" type="text" name="TLF"><br>
          <menytext>Antall:</menytext>
          <input id="numberbox" type="number" name="antall" min="1" max="10" default="1"><br><br>
          <div class ="semi-square">
            <select id="soflow-color" name="avdeling" required>
              <ul>
                <option value="" disabled selected hidden>Velg Avdeling</option>
                <option value="Carbon">Carbon</option>
                <option value="Foundry">Foundry</option>
                <option value="Materials">ESM</option>
                <option value="Solar">Solar</option>
                <option value="Technology">Technology</option>
                <option value="Elkem HK">Elkem HK</option>
              </ul>
            </select>
          </div>
        </div>
        <br><br>
          <div class="printButton">
            <input type="submit" value="Print"><br>
          </div>
        </form>
        <?php

        if(isset($_POST['submit'])) {
        echo 'You entered: ', htmlspecialchars($_POST['something']);
        }
        ?>

      </div> <!-- /jumbotron -->
    </div> <!-- /container -->

		<!-- Script for å kun tillate ett valgt element i checkboxene-->
		<script>
		function HovedlagerDisabled() {
			if($('input:checkbox[id=inbox]').is(':checked')) {
				document.getElementById("inbox2").disabled = true;
			} else {
				document.getElementById("inbox2").disabled = false;
			}
		}
		</script>
		<script>
			function ITSDisabled() {
				if($('input:checkbox[id=inbox2]').is(':checked')) {
					document.getElementById("inbox").disabled = true;
				} else {
					document.getElementById("inbox").disabled = false;
				}
			}
		</script>
  </BODY>
</HTML>
