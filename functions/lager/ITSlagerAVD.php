<?php
$sql = "SELECT * FROM Avdeling";
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
//  echo "Antall rader: $row_count<br><br>";

$field_count = sqlsrv_num_fields ($stmt);
if ($field_count === false)
  echo "Klarte ikke telle felter.";
  echo "<div id='wrapper'>";
  echo "<select onclick='AvdelingisNotChecked()' id='avdelingLager' class='ITSDropdown'>";
   if($row_count > 0) {
    // echo "<select id='InnDropdown'>";
  //echo "<option value= disabled selected hidden>Velg Avdeling</option>";

  for($i = 0; $i < $row_count; $i++){
  sqlsrv_fetch($stmt);
  $felt2 = sqlsrv_get_field($stmt, 1);

  echo "<option value='' hidden  >Velg Avdeling</option>";
  echo "<option value = ''>$felt2</option>";
}
  echo "</select>";
  echo "</div>";
}

 ?>
