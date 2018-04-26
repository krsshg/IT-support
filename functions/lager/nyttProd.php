<!DOCTYPE html>
<HTML>
<HEAD>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>

</HEAD>
<BODY>
  <div class='rTableECHO'>
    <form action='./oppdLagerDBnyProd.php' method='Post'>

    <div class='rTableRowECHO'>
      <div class= 'rTableHeadingECHO'>Produktbeskrivelse :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'Beskrivelse'></div>
    </div>

 <div class='rTableRowECHO'>
    <div class= 'rTableCellECHO'><INPUT TYPE='submit' id='returButton' VALUE='Legg til produkt'></div>
 </div>
    </form>
</div>
</BODY>
</HTML>
