<!DOCTYPE html>
<HTML>
<HEAD>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>

	<SCRIPT>
	$(document).ready(function(){
		$(".rTableCellUT").click(function(){
			var firstCell = $('.rTableCellUT:first', $(this).parents(".rTableRowUT")).text();
				$.post("./createSubMenuUt.php",
				{
					PCnavn: firstCell,
				},
				function(data,status){
						$('#popup2').append(data);
				});
		});
	});
</script>

<SCRIPT>
	$(document).ready(function(){
		$(".rTableRowUT").click(function (e) {
			var selected = $(this).hasClass("highlight");
			$(".rTableRowUT").removeClass("highlight");
			if(!selected)
				$(this).addClass("highlight");
			$("#popup2").empty().slideToggle("fast").insertAfter($(this));
		});
	});
</SCRIPT>

<script>
	$(function(){
$( "#avdelingSelected" ).change(function() {
  alert( "Handler for .change() called." );
	//printe ut select box med verdier fra
	$.post("./produktQuery.php",{avdelingID : "1"} )
	.done(function( data ) {
	alert( "Data Loaded: " + data );

});
});
});
</script>


<script>
/*
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $(".rTableRowUT").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});
*/
</script>

</HEAD>
<body>
<div id="popup2"></div>
<!--
<input id="myInput" type="text" placeholder="Search..">
-->

<?php
/* Populate $produkterArr */
$sql = "SELECT * FROM Produkter";
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$produkterArr = array();

$stmt = sqlsrv_query($link, $sql, $params, $options);
if($stmt === false) {
  die( print_r( sqlsrv_errors(), true));
}
$currentrow = 0;
$row_count = sqlsrv_num_rows($stmt);
if ($row_count === false)
  echo "Klarte ikke telle rader.";
else
$field_count = sqlsrv_num_fields ($stmt);
if ($field_count === false){
  echo "Klarte ikke telle felter.";
}
  if($row_count > 0) {
    for($i = 0; $i < $row_count; $i++){
      sqlsrv_fetch($stmt);
			$produktId = sqlsrv_get_field($stmt, 0);
      $produkt = sqlsrv_get_field($stmt, 1);
			$produkterArr[$produktId] = $produkt;
    }
  }

/* Populate $avdArr */
$sqlAvd = "SELECT * FROM Avdeling";
$paramsAvd = array();
$optionsAvd = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$avdArr = array();

$stmtAvd = sqlsrv_query($link, $sqlAvd, $paramsAvd, $optionsAvd);
if($stmtAvd === false) {
  die( print_r( sqlsrv_errors(), true));
}
$currentrowAvd = 0;
$row_countAvd = sqlsrv_num_rows($stmtAvd);
if ($row_countAvd === false)
  echo "Klarte ikke telle rader.";
else{
  $field_countAvd = sqlsrv_num_fields ($stmtAvd);
  if ($field_countAvd === false)
    echo "Klarte ikke telle felter.";
    if($row_countAvd > 0) {
      for($i = 0; $i < $row_countAvd; $i++){
        sqlsrv_fetch($stmtAvd);
				$avdId = sqlsrv_get_field($stmtAvd, 0);
        $avd = sqlsrv_get_field($stmtAvd, 1);
    		$avdArr[$avdId] = $avd;
      }
			//print_r(array_keys($avdArr));
	}
	/*Skriv ut select felt for Produkt og Avdeling med data fra $produkterArr og $avdArr
	Formatering i lagerstyring.css */


		echo "
		<div class='vareInnTable'>
			<div class='vareInnTableRow'>
				<form action='produktQuery.php' method='POST'>
					<div class='vareInnTableCell'>
						<select name ='avdelingID' id='avdelingSelected'>
						<option value='' hidden disabled selected>Velg avdeling</option>
						";
						foreach($avdArr as $avdId => $avd) {
						echo "<option value='$avdId'>$avd</option>";
						}
						echo "
						</select>
					</div>
				</form>
			</div>
		</div>
		";
  }


?>

</body>
</HTML>
