<!DOCTYPE html>
<HTML>
<HEAD>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>

function visAltLager(){

		var request = $.ajax({
			url: 'visAltLager.php',
			type: 'get',
			dataType: 'html'
	});

	request.done( function ( data ) {
		$('#outputID').html( data );
	});

	request.fail( function ( jqXHR, textStatus) {
		console.log( 'Sorry: ' + textStatus );
	});
}

</script>


</HEAD>
<BODY>

<button type=button id=nyPCbtn onclick="btnTglnyttProd()">Legge til nytt produkt</button>
<br>
<div class="hidden" id=nyttProd>
	<div class="nyPC">
		<?php include './nyttProd.php'; ?>
	</div>
</div>
<br><br>
<button id = 'sendMailsBtn' onClick = "visAltLager()">Vis Lagerstatus</button>
<div id="outputID"></div>

<!--
<button type=button id=visAltLagerbtn onclick="btnTglVisAltInne()">Vis alt på lager</button>
<br>
<div class="hidden" id=altLager>
	<div class="altLager">
		<?php //include './visAltLager.php'; ?>
	</div>
</div>
-->

<script>
	function btnTglnyttProd() {
	  var element = document.getElementById("nyttProd");
	  element.classList.toggle("hidden");
	}
</script>

<!--
<script>
	function btnTglVisAltInne() {
	  var element = document.getElementById("altLager");
	  element.classList.toggle("hidden");
	}
</script>
-->
</BODY>
</HTML>
