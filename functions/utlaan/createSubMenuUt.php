<!DOCTYPE html>
<HTML>
<HEAD>

  <?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>
  <?php require '../connect.php';?>

</HEAD>

<BODY>
<?php
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
/*
      $LoanerDatetemp = sqlsrv_get_field($stmt, 4);
      if ($LoanerDatetemp === null or $LoanerDatetemp === false) {
      	$LoanerDatetemp = new DateTime('01.01.1901');
      }
      $LoanerDate = $LoanerDatetemp->format('Y-m-d');
*/
      $dagensDato = date('Y-m-d');

      $ETAtemp = sqlsrv_get_field($stmt, 5);
      if ($ETAtemp === null or $ETAtemp === false) {
      	$ETAtemp = new DateTime('NOW');
      }
      $ETA = trim($ETAtemp->format('d-m-Y'));

      $status = trim(sqlsrv_get_field($stmt, 6));
      $ServiceTag = trim(sqlsrv_get_field($stmt, 7));
      $Telefonnr = trim(sqlsrv_get_field($stmt, 8));

//Skriver ut FORM med formatering fra testTablesite.css
 echo
 "
  <div class='rTableECHO'>
   <form action='./oppdaterLanDBut.php' method='Post'>
   <input type='hidden' name='PCnavnID' value='$PCnavn'>

   <div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>PC navn :</div>
   <div class= 'rTableCellECHO'><INPUT TYPE='text' id='kunLese' name= 'PCnavn' VALUE='$PCnavn' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Modell :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' id='kunLese' name= 'PCmodell' VALUE='$PCmodell' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Servicetag :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' id='kunLese' name= 'ServiceTag' VALUE='$ServiceTag' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Utlånsdato :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='date' id='kunLese' name= 'Lanerdato' VALUE='$dagensDato' readonly></div>
</div><br><br>

<div class='rTableRowECHO'>
<div class= 'rTableHeadingECHO'>Lånt av :</div>
<div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'Lanernavn' VALUE='$LoanerName'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Telefonnr :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'TLF' VALUE='$Telefonnr'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Avdeling :</div>
      <div class= 'rTableCellECHO'>
        <select name='Laneravd' value='$LoanerDep'>
        <option value='' selected>$LoanerDep</option>
        <option value='Carbon'>Carbon</option>
        <option value='Foundry'>Foundry</option>
        <option value='Materials'>Materials</option>
        <option value='Solar'>Solar</option>
        <option value='Technology'>Technology</option>
        </select>
      </div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>ETA :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='date' name= 'ETA' VALUE='$ETA'></div>
</div>
<br>
<div class='rTableRowECHO'>
   <div class= 'rTableCellECHO'><INPUT TYPE='submit' id='returButton' VALUE='Registrer lån'></div>
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
</BODY>
</HTML>
