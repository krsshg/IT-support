<HTML>
<HEAD>
<?PHP require '../connect.php';?>
<script>

	$(document).ready(function(){
	  $("#searchBox").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $(".vaTableRow").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

</script>
</HEAD>
<body>
  <input id="searchBox" type="text" placeholder="Search..">
  <br><br>
<?php
/*Hente alt fra lager, felter Avdeling.AvdNavn,Produkter.Beskrivelse,Beholdning.Antall */

	$sql =
	"
  SELECT Avdeling.AvdNavn, Produkter.Beskrivelse, Beholdning.Antall
	FROM Beholdning
	INNER JOIN Produkter ON Beholdning.ProdID=Produkter.ProduktID
  INNER JOIN Avdeling ON Beholdning.AvdID=Avdeling.AvdID
  order by AvdNavn
	";


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
/*skriv alt ut i tabell*/
	echo "
  <br><br>
  <div class='vaTable'>

  <div class='vaTableRow'>
  <div class='vaTableHead'>Avdeling:</strong></div>
  <div class='vaTableHead'>Produkt:</div>
  <div class='vaTableHead'>Antall:</div>
  </div>

  ";
	if($row_count > 0){

	for($i = 0; $i < $row_count; $i++){
		sqlsrv_fetch($stmt);
		$avdelingsNavn = trim(sqlsrv_get_field($stmt, 0));
		$beskrivelse = trim(sqlsrv_get_field($stmt, 1));
		$antall = trim(sqlsrv_get_field($stmt, 2));
		echo "
    <div class='vaTableRow'>
    <div class = 'vaTableCell'>$avdelingsNavn</div>
    <div class = 'vaTableCell'>$beskrivelse</div>
    <div class = 'vaTableCell'>$antall</div>
    </div>
		";


	} //end for loop

  echo "</div>";
	} //end if loop

	?>
</body>
</HTML>
