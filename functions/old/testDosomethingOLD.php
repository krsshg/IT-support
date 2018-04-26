<?php
require "connect.php";

    if (isset($_POST['PCnavn']))
    {
      $PCnavn = $_POST['PCnavn'];
      $sql = "SELECT * FROM PCer WHERE PCname='$PCnavn'";
      $params = array();
      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
      $stmt = sqlsrv_query($link, $sql, $params, $options);

      sqlsrv_fetch($stmt);
      $PCnavn = trim(sqlsrv_get_field($stmt, 0));
      $PCmodell = trim(sqlsrv_get_field($stmt, 1));
      $LoanerName = trim(sqlsrv_get_field($stmt, 2));
      $LoanerDep = trim(sqlsrv_get_field($stmt, 3));

      $LoanerDatetemp = sqlsrv_get_field($stmt, 4);
      if ($LoanerDatetemp === null or $LoanerDatetemp === false) {
      	$LoanerDatetemp = new DateTime('01.01.1901');
      }
      $LoanerDate = $LoanerDatetemp->format('Y-m-d');

      $ETAtemp = sqlsrv_get_field($stmt, 5);
      if ($ETAtemp === null or $ETAtemp === false) {
      	$ETAtemp = new DateTime('02.02.2222');
      }
      $ETA = trim($ETAtemp->format('Y-m-d'));

      $status = trim(sqlsrv_get_field($stmt, 6));
      $ServiceTag = trim(sqlsrv_get_field($stmt, 7));
      $Telefonnr = trim(sqlsrv_get_field($stmt, 8));

//Skriver ut FORM med formatering fra testECHO.css
 echo
 "
  <div class='rTableECHO'>
   <form action='oppdaterLanDB.php' method='Post'>
   <input type='hidden' name='PCnavnID' value='$PCnavn'>

   <div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>PC navn :</div>
   <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'PCnavn' VALUE='$PCnavn'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>PC modell :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'PCmodell' VALUE='$PCmodell'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>PC servicetag :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'ServiceTag' VALUE='$ServiceTag'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Status :</div>
      <div class= 'rTableCellECHO'>
        <select name='Status' value='$status'>
        <option value='inne'>Inne</option>
        <option value='ute'>Ute</option>
        </select>
      </div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Lånt av :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'Lanernavn' VALUE='$LoanerName'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Låners avdeling :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'Laneravd' VALUE='$LoanerDep'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Telefonnr :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'TLF' VALUE='$Telefonnr'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Utlånsdato :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='date' name= 'Lanerdato' VALUE='$LoanerDate'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Leveringsdato :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='date' name= 'ETA' VALUE='$ETA'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableCellECHO'><INPUT TYPE='submit' VALUE='Oppdater'></div>
</div>
   </form>
</div>
";
    }
    else
    {
        echo "Post not received.";
    }
?>
