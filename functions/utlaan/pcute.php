<!DOCTYPE html>
<HTML>
<HEAD>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>
	<SCRIPT>

	$(document).ready(function(){
	  $(".rTableCellinn").click(function(){
			var firstCell = $('.rTableCellinn:first', $(this).parents(".rTableRowinn")).text();
	      $.post("./createSubMenuUte.php",
	      {
	        PCnavn: firstCell,
	      },
	      function(data,status){
						$('#popupECHO').append(data);
	      });
	  });
	});

</script>

<SCRIPT>
	$(document).ready(function(){
	  $(".rTableRowinn").click(function (e) {
			var selected = $(this).hasClass("highlight");
			$(".rTableRowinn").removeClass("highlight");
			if(!selected)
				$(this).addClass("highlight");
	    $("#popupECHO").empty().slideToggle("slow").insertAfter($(this));
	  });
	});
</SCRIPT>

<script>
/*
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $(".rTableRowinn").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});
*/
</script>

</HEAD>
<body>
  <!--
<input id="myInput" type="text" placeholder="Search..">
<br><br>
-->
<div id="popupECHO"></div>

<?php
require '../connect.php';

$sql = "SELECT * FROM PCer WHERE Status='Ute'";
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

echo "<div class='rTableHeadinn'><strong>Velg PC for retur :</strong></div>";
echo "<div class='rTableinn'>";
//echo "      <div class='rTableRowinn'>";
//echo "       </div>"; //rTableRow

if($row_count > 0){
  for($i = 0; $i < $row_count; $i++){
    sqlsrv_fetch($stmt);
    $felt1 = trim(sqlsrv_get_field($stmt, 0));
    $felt2Lanernavn = sqlsrv_get_field($stmt, 2);
    echo "      <div class='rTableRowinn'>";
    echo "        <div class='rTableCellinn' id='nostretch'>$felt1</div>";
		echo "				<div class='rTableCellinn' id='nostretch'>$felt2Lanernavn</div>";
    echo "      </div>"; //rTableRow
  } //end for loop
  echo "</div>";//rTable
} //end if loop
?>
</body>
</HTML>
