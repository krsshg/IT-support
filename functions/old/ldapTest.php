<!DOCTYPE html>
<HTML>
<HEAD>
	<!--Include jQuery-->
<script type="text/javascript" src="jquery.min.js"></script>
	<?php
  //include 'ldapTestFunction.php';
  //include '../dbConnect.php';
  include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";
  //include '../dbConnect.php';

  ?>
	<script>

	function ldapTest(){

	  	var request = $.ajax({
	   		url: './ldapTestFunction.php',
	   		type: 'get',
	   		dataType: 'html'
	 	});

		request.done( function ( data ) {
	 		$('#ldaptest').html( data );
	 	});

		request.fail( function ( jqXHR, textStatus) {
	 		console.log( 'Sorry: ' + textStatus );
	 	});
	}

	</script>

</HEAD>
<body>
 	<button id = 'ldaptest' onClick = "confirm('Er du sikker du skal sende mails?') && ldapTest()">testLDAP</button>

</body>
