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

        <h1>Bufferlapp</h1>
        <p>Bruker skriver: KRS-PRT-ITPOSTLAPP</p>
        <p>ZDesigner GK420d - labelwriter - 144.127.62.194</p>
        <br>
        <form action= "printBufferLabel.php" method="post">
          <br><br>
        <div class ="semi-square">
          <select id="soflow-color" name="avdeling" required>
            <ul>
              <option value="" disabled selected hidden>Velg Avdeling</option>
              <option value="Carbon">Carbon</option>
              <option value="Foundry">Foundry</option>
              <option value="Materials">Materials</option>
              <option value="Solar">Solar</option>
              <option value="Technology">Technology</option>
              <option value="IT Support"> IT Support</option>
            </ul>
          </select>
        </div>

        <br><br>
        <div class="printButton">
          <input type="submit" value="Print"><br>
        </div>
        </form>

      </div> <!--/jumbotron -->

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
