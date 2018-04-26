<!DOCTYPE html>
<html>
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
   <form action='./oppdaterLanDBretur.php' method='Post'>
   <input type='hidden' name='PCnavnID' value='$PCnavn'>

   <div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>PC navn :</div>
   <div class= 'rTableCellECHO'><INPUT name='PCnavn' id='kunLese' type='text' VALUE='$PCnavn' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Modell :</div>
      <div class= 'rTableCellECHO'><INPUT name='PCmodell' id='kunLese' type='text' VALUE='$PCmodell' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Servicetag :</div>
      <div class= 'rTableCellECHO'><INPUT name='ServiceTag' id='kunLese' type='text' VALUE='$ServiceTag' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Lånt av :</div>
      <div class= 'rTableCellECHO'><INPUT name='Lanernavn' id='kunLese' type='text' VALUE='$LoanerName' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Utlånsdato :</div>
      <div class= 'rTableCellECHO'><INPUT name='Lanerdato' id='kunLese' type='date' VALUE='$LoanerDate' readonly></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'><label for = 'ETA'>ETA :</label></div>
      <div class= 'rTableCellECHO'><INPUT name='ETA' id='kunLese' type='date' VALUE='$ETA' readonly></div>
</div>
<br>
<div class='rTableRowECHO'>
   <div class= 'rTableCellECHO'><INPUT TYPE='submit' VALUE='Returner' id='returButton'></div>
</div>
<br>
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
