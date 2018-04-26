<!DOCTYPE html>
<HTML>
<HEAD>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>
	<SCRIPT>

	$(document).ready(function(){
	  $(".rTableCell").click(function(){
			var firstCell = $('.rTableCell:first', $(this).parents(".rTableRow")).text();
	      $.post("./createSubMenu.php",
	      {
	        PCnavn: firstCell,
	      },
	      function(data,status){
						$('#popup').append(data);
	      });
	  });
	});
</script>

<SCRIPT>
	$(document).ready(function(){
		$(".rTableRow").click(function (e) {
			var selected = $(this).hasClass("highlight");
			$(".rTableRow").removeClass("highlight");
			if(!selected)
				$(this).addClass("highlight");
			$("#popup").empty().slideToggle("slow").insertAfter($(this));
		});
	});
</SCRIPT>

<script>

	$(document).ready(function(){
	  $("#searchBox").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $(".rTableRow").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

</script>

</HEAD>
<body>
<input id="searchBox" type="text" placeholder="Search..">
<br><br>
<div id="popup"></div>

<?php

$sql = "SELECT * FROM PCer";
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

echo "<div class='rTableHead'><strong>PC-Navn</strong></div>";
echo "<div class='rTable'>";

if($row_count > 0){
  for($i = 0; $i < $row_count; $i++){
	  sqlsrv_fetch($stmt);
	  $felt1 = sqlsrv_get_field($stmt, 0);
	  $felt2 = sqlsrv_get_field($stmt, 1);
		echo "      <div class='rTableRow'>";
		echo "        <div class='rTableCell'>$felt1</div>";
		echo "      </div>"; //rTableRow
	} //end for loop
	echo "</div>";//rTable
} //end if loop
?>
<br><br>
<button type=button style="width:260px" id=nyPCbtn onclick="buttonTogglenyPC()">Registrere ny PC</button>
<br>
<div class="hidden" id=nyPC>
	<div class="nyPC">
		<?php include './nyPC.php'; ?>
	</div>
</div>

<script>
	function buttonTogglenyPC() {
	  var element = document.getElementById("nyPC");
	  element.classList.toggle("hidden");
	}
</script>

</body>
</HTML>
