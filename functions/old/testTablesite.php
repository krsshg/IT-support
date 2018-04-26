<HTML>
<HEAD>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <SCRIPT SRC="..\js\jquery-3.3.1.min.js"></SCRIPT>

<!--
  <script>
  $(document).ready(function(){
    $(".rTableCell").click(function(){
        $.post("testDosomething.php",
        {
          PCnavn: this.innerText,
        },

        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});
  </script>
-->
<script>

$(document).ready(function(){
  $(".rTableCell").click(function(){
      $.post("testDosomething.php",
      {
        PCnavn: this.innerText,
      },

      function(data,status){
//        var array = data.split(',');
          $('#popup').append(data);
//          var A=array[1];

//          form.element["inputbox"]value = array[1];

      });
  });
});


$(document).ready(function(){
  $("rTableCell").click(function(e){
      $(this).data('clicked', true);
  });
});

/* TEST

$(document).ready(function(){
  $(".rTableCell").click(function(){
      alert ('ok');
      //alert (prevClick.data('previs'));
      //var prevClick.data('previs',this.innerText);
      //var dataArr = $("dataArr")[0];
      $("dataArr").data("bar", {myType: "test", count: 40});
      //var first = jQuery.data( dataArr, "test" ).first;
      alert( $("dataArr").data());
      //alert (first);
      //var last = jQuery.data( dataArr, "test" ).last;


//      var $this = $(this);
//      if($('rTableCell').data('clicked')) {
//        alert('yes');

  });
  });
*/

</script>

<script>
$(document).ready(function(){
  $(".rTableRow").click(function (e) {
    $("#popup").empty().show().insertAfter($(this));

  });
});
</script>

<!-- Skjuler #popup

<script>
$(document).ready(function(){
  $("#popup").click(function (e) {
    $("#popup").hide().empty();

  });
});
</script>
-->

<!--
<script>
$(document).ready(function(){
  $(".rTableRow").click(function (e) {
    $("#popup").css({
        'position': 'absolute',
        'left': $(this).offset().left,
        'top': $(this).offset().top + $(this).height() + 5
   }).show("slow").insertAfter($(this));
  });
});
</script>
-->

</HEAD>
<body>
  <div id="popup"></div>

<?php
require 'connect.php';
include 'testTablesite.css';
include 'testECHO.css';

$sql = "SELECT * FROM PCer WHERE Status='Inne'";
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
//	echo "Antall rader: $row_count<br><br>";

$field_count = sqlsrv_num_fields ($stmt);
if ($field_count === false)
	echo "Klarte ikke telle felter.";
else


echo "<div class='rTable'>";
echo "  <div class='rTableBody'>";
echo "      <div class='rTableRow'>";
echo "          <div class='rTableHead'><strong>PC-Navn</strong></div>";
echo "          <div class='rTableHead'><strong>PC-Modell</strong></div>";
//echo "          <div class='rTableHead'><strong>Rediger</strong></div>";
echo "       </div>"; //rTableRow

if($row_count > 0){

  for($i = 0; $i < $row_count; $i++){
  sqlsrv_fetch($stmt);
  $felt1 = sqlsrv_get_field($stmt, 0);
  $felt2 = sqlsrv_get_field($stmt, 1);
echo "      <div class='rTableRow'>";
echo "        <div class='rTableCell'>$felt1</div>";
echo "        <div class='rTableCell'>$felt2</div>";
//echo "        <div class='rTableCell'><button type='submit' value='$felt1'>Rediger</button></div>";
echo "      </div>"; //rTableRow
} //end for loop
echo "  </div>";//rTableBody
echo "</div>";//rTable
} //end if loop
 ?>
</body>
</HTML>
