<!DOCTYPE html>
<html lang="en">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>

  <body>
    <div class='rTableECHO'>
      <form action='./oppdaterLanDBnyPC.php' method='Post'>

      <div class='rTableRowECHO'>
        <div class= 'rTableHeadingECHO'>PC navn :</div>
        <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'PCnavn'></div>
      </div>

   <div class='rTableRowECHO'>
      <div class= 'rTableHeadingECHO'>PC modell :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'PCmodell'></div>
   </div>

   <div class='rTableRowECHO'>
      <div class= 'rTableHeadingECHO'>PC servicetag :</div>
      <div class= 'rTableCellECHO'><INPUT TYPE='text' name= 'ServiceTag'></div>
   </div>

   <div class='rTableRowECHO'>
      <div class= 'rTableCellECHO'><INPUT TYPE='submit' id='returButton' VALUE='Legg til PC'></div>
   </div>
      </form>
  </div>

  </body>
</html>
