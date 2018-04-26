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

$sql = "SELECT * FROM PCer WHERE Status='Inne'";
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);


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

if ($field_count === false)
	echo "Klarte ikke telle felter.";
else
echo "<div class='rTableHeadUT'><strong>Tilgjengelige PCer :</strong></div>";
echo "  <div class='rTableUT'>";

if($row_count > 0){

  for($i = 0; $i < $row_count; $i++){
  sqlsrv_fetch($stmt);
  $felt1 = sqlsrv_get_field($stmt, 0);
  $felt2 = sqlsrv_get_field($stmt, 1);
echo "      <div class='rTableRowUT'>";
echo "        <div class='rTableCellUT'>$felt1</div>";
echo "      </div>"; //rTableRow
} //end for loop
echo "</div>";//rTable
} //end if loop
?>
</body>
</HTML>
