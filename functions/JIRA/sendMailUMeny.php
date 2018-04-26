<!DOCTYPE html>
<HTML>
<HEAD>
	<!--Include jQuery-->
<script type="text/javascript" src="jquery.min.js"></script>
	<?php
  //include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";
  include 'sendMailFunc.php';
	include '../dbConnect.php';
  ?>
	<script>

	function sendMailsFunction(){

	  	var request = $.ajax({
	   		url: 'sendTheMails.php',
	   		type: 'get',
	   		dataType: 'html'
	 	});

		request.done( function ( data ) {
	 		$('#sendMailsBtn').html( data );
	 	});

		request.fail( function ( jqXHR, textStatus) {
	 		console.log( 'Sorry: ' + textStatus );
	 	});
	}

	</script>

</HEAD>
<body>
<?php
//$date = date_create(null, timezone_open("Europe/Paris"));
//date_timezone_set($date, timezone_open("Europe/Paris"));

$aLink= db_connect();
$sistDato = hentDato($aLink);
echo "<br><br><p>Siste påminnelse ble sendt ut :<strong>".$sistDato."</strong></p><br>";
?>
 	<button id = 'sendMailsBtn' onClick = "confirm('Er du sikker du skal sende mails?') && sendMailsFunction()">Send mails</button>
</body>
