<!DOCTYPE html>
<HTML>
<HEAD>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function()
{
document.getElementById("produkt").disabled = true;
document.getElementById("antall").disabled = true;
document.getElementById("OK").disabled = true;
$(".avdeling").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
document.getElementById("produkt").disabled = false;

$.ajax
({
type: "POST",
url: "getProdukter.php",
data: dataString,
cache: false,
success: function(html)
{
$(".produkt").html(html);
}
});

});

});

$(document).ready(function()
{
$(".produkt").change(function()
{
  document.getElementById("antall").disabled = false;
});
});

$(document).ready(function()
{
$(".antall").change(function()
{
  document.getElementById("OK").disabled = false;
});
});

</script>
</head>
<body>
  <form action="dbBeholdningUt.php" method="POST">
  <div class="vareInnTable">
    <div class="vareInnTableRow">
      <div class="vareInnTableCell">
          Velg avdeling :<br>
          <select name="avdeling" class="avdeling">
          <option selected="selected" hidden disabled>...</option>
          <?php
          $sql= "SELECT * FROM Avdeling";
          $stmt = sqlsrv_query($link ,$sql);
          if( $stmt === false) {
              die( print_r( sqlsrv_errors(), true) );
          }
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $id=$row['AvdID'];
            $data=$row['AvdNavn'];
            echo '<option value="'.$id.'">'.$data.'</option>';
            } ?>
          </select>
      </div>
    </div>
    <div class="vareInnTableRow">
      <div class="vareInnTableCell">
        Velg produkt : <br>
        <select name="produkt" class="produkt" id="produkt">
        <option selected="selected" hidden disabled>...</option>
        </select><br>
      </div>
    </div>
    <div class="vareInnTableRow">
      <div class="vareInnTableCell">
        Antall :<br>
        <input type="number" name="utAntall" class="antall" id="antall" min="1" default="1">
      </div>
    </div>
    <div class="vareInnTableRow">
      <div class="vareInnTableCell">
        <br><br>Kommentar: <br><textarea rows="4" cols="40" name="kommentar"></textarea>
      </div>
    </div>
    <div class="vareInnTableRow">
      <div class="vareInnTableCell">
        <br><br><input type="submit" value="OK" id="OK">
      </div>
    </div>
  </div>
    </form>

</body>
</HTML>
