<?php
session_start();
if (isset($_POST['sponsor']) && $_POST['company'] && $_POST['mailadr'] && $_POST['tlf'])
{
  $dagsDato = date('d/m/Y');

  echo "Dato: ".$dagsDato."| Created by: ".$_SESSION['ADusername']." | Sponsor: ".$_POST['sponsor']." | Company: ".$_POST['company']." | EMAIL: ".$_POST['mailadr']." | Phone:".$_POST['tlf']."";
}
else{
  echo "OBS ! Feltene mangler data. Sponsor - Company - Mailadr - Tlf ";
}

?>
