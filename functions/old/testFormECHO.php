<HEAD>
  <link href="testECHO.css" rel="Stylesheet" type="text/css">
</HEAD>
<BODY<
<?php

$PCnavn = "Navnet";
$PCmodell = "E6440";
$ServiceTag = "ASDG";
$status = "A";
$LoanerName = "";
$LoanerDep = "";
$LoanerDate = "";
$Telefonnr = "";
$ETA = "";
/*
echo "
<FORM method='Post' action='oppdaterLanDB.php'>
  <input type='hidden' name='PCnavnID' value='$PCnavn'>
  PC navn :<INPUT TYPE='text' name= 'PCnavn' VALUE='$PCnavn'><br>
  PC modell :<INPUT TYPE='text' name= 'PCmodell' VALUE='$PCmodell'><br>
  PC servicetag :<INPUT TYPE='text' name= 'ServiceTag' VALUE='$ServiceTag'><br>
  Status :<INPUT TYPE='text' name= 'Status' VALUE='$status'><br>
  Lånt av :<INPUT TYPE='text' name= 'Lanernavn' VALUE='$LoanerName'><br>
  Låners avdeling :<INPUT TYPE='text' name= 'Laneravd' VALUE='$LoanerDep'><br>
  Telefonnr :<INPUT TYPE='text' name= 'TLF' VALUE='$Telefonnr'><br>
  Utlånsdato :<INPUT TYPE='text' name= 'Lanerdato' VALUE='$LoanerDate'><br>
  Leveringsdato :<INPUT TYPE='text' name= 'ETA' VALUE='$ETA'><br>
  <INPUT TYPE='submit' VALUE='Oppdater'>
</form>
";
*/
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
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'Lanerdato' VALUE='$LoanerDate'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableHeadingECHO'>Leveringsdato :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'ETA' VALUE='$ETA'></div>
</div>

<div class='rTableRowECHO'>
   <div class= 'rTableCellECHO'><INPUT TYPE='submit' VALUE='Oppdater'></div>
</div>
</div>
   </form>
";
?>
</BODY>
