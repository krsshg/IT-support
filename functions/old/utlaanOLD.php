<HTML>
  <HEAD>
  <meta charset="UTF-8">
  <link href="../css/testTablesite.css" rel="Stylesheet" type="text/css">
  <link href="../css/utlaan.css" rel="Stylesheet" type="text/css">
<!--
  <link href="../css/bootstrap.css" rel="Stylesheet" type="text/css">
  <link href="../css/bufferlapp.css" rel="Stylesheet" type="text/css">
  <link href="../css/dropdown.css" rel="Stylesheet" type="text/css">
  <link href="../css/ITSupport.css" rel="Stylesheet" type="text/css">
  <link href="../css/lagerstyring.css" rel="Stylesheet" type="text/css">
-->
  <?php require 'functions\start.php'; ?>

  </HEAD>
<BODY>


<div class= "container">
  <div class= "jumbotron">
    <img src="img\Elkem corporate logo.png" width="190px" height="90px">
    <h2 id="title"> Utlån IT support KRS<h2>
      <hr><br>

      <button type=button style="width:310px" id=status onclick="buttonToggleUTLAN()">Registrere utlån</button>
      <br>
      <div class="hidden" id=utlan>
        <div class="tilgjengeligPC">
          <?php include 'functions\pcUt.php'; ?>
        </div>
      </div>
      <br>

      <div class="DropdownLevering">
        <button type=button style="width:310px" id="registrerlevering" onclick="buttonToggleRETUR()">Registrer retur</button><br>
        <div class="hidden" id=demo2>
    	     <?php include 'functions\pcute.php'; ?>
        </div>
    	</div>

    <br>

    <button type=button style="width:310px" id=status onclick="buttonToggleUTSTYR()">Vedlikeholde utstyrsliste</button>
    <br>
    <div class="hidden" id=utstyr>
      <div class="tilgjengeligPC">
        <?php include 'functions\pcinne.php'; ?>
      </div>
    </div>
    <br>

  </div><!--jumbotron-->
</div><!--container-->

<script>
function buttonToggleUTSTYR() {
  var element = document.getElementById("utstyr");
	element.classList.toggle("hidden");
}

function buttonToggleUTLAN() {
  var element = document.getElementById("utlan");
  element.classList.toggle("hidden");
}

function changeMargin() {
  document.getElementById("registrerlevering")
  if (document.style.marginTop = "0px") {
  document.style.marginTop = "100px";
  } else {
    document.style.marginTop = "0px";
    }
  }

	function buttonToggleRETUR() {
		var element = document.getElementById("demo2");
		element.classList.toggle("hidden");
}

</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</BODY>
</HTML>
