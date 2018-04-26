<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="../../css/vareUt.css" rel="stylesheet">


<body>
<?php

/* Populate $produkterArr */
$sql = "SELECT * FROM Produkter";
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$produkterArr = array();
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
if ($field_count === false){
  echo "Klarte ikke telle felter.";
}
  if($row_count > 0) {
    for($i = 0; $i < $row_count; $i++){
      sqlsrv_fetch($stmt);
			$produktId = sqlsrv_get_field($stmt, 0);
      $produkt = sqlsrv_get_field($stmt, 1);
			$produkterArr[$produktId] = $produkt;
    }
  }

  /* Populate $avdArr */
  $sqlAvd = "SELECT * FROM Avdeling";
  $paramsAvd = array();
  $optionsAvd = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
  $avdArr = array();

  $stmtAvd = sqlsrv_query($link, $sqlAvd, $paramsAvd, $optionsAvd);
  if($stmtAvd === false) {
    die( print_r( sqlsrv_errors(), true));
  }
  $currentrowAvd = 0;
  $row_countAvd = sqlsrv_num_rows($stmtAvd);
  if ($row_countAvd === false)
    echo "Klarte ikke telle rader.";
  else
    $field_countAvd = sqlsrv_num_fields ($stmtAvd);
    if ($field_countAvd === false){
      echo "Klarte ikke telle felter.";
  	}
      if($row_countAvd > 0) {
        for($i = 0; $i < $row_countAvd; $i++){
          sqlsrv_fetch($stmtAvd);
  				$avdId = sqlsrv_get_field($stmtAvd, 0);
          $avd = sqlsrv_get_field($stmtAvd, 1);
      		$avdArr[$avdId] = $avd;
        }
  			//print_r(array_keys($avdArr));
  	}
echo "
<form id='regForm' action='/action_page.php'>
<!--  <h1>Register:</h1>  -->
  <!-- One 'tab' for each step in the form: -->
  <div class='tab'>Avdeling:

    <select name ='avdelingID'>
    <option value='' disabled hidden selected>Velg avdeling</option>
    ";
    foreach($avdArr as $avdId => $avd) {
    echo "<option value='$avdId'>$avd</option>";
    }
    echo "
    </select>

  </div>
  <div class='tab'>Produkt:
  <select name='produktID' value='produktID'>
  <option value='' disabled hidden selected>Velg produkt</option>
  ";
  foreach($produkterArr as $x => $x_value) {
    echo "<option name='produktID' value='$x'>$x_value</option>";
  }
  echo "
  </select>
  </div>
  <div class='tab'>Antall:
  <input type='number' name='innAntall' placeholder='Velg antall...' min='1' default='1'>
  </div>
  <div class='tab'>Kommentar:
    <textarea id='textAreaInput'></textarea>
  </div>
  <div style='overflow:auto;'>
    <div style='float:right;'>
      <button type='button' id='prevBtn' onclick='nextPrev(-1)'>Previous</button>
      <button type='button' id='nextBtn' onclick='nextPrev(1)'>Next</button>
    </div>
  </div>
  ";
  ?>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>


<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var elems,x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
//  y = x[currentTab].getElementsByTagName("input");
  var elems = x[currentTab].querySelectorAll("select,input,textarea")
  // A loop that checks every input field in the current tab:
  for (i = 0; i < elems.length; i++) {
    // If a field is empty...
    if (elems[i].value == "") {
      // add an "invalid" class to the field:
      elems[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>
