<?php
include '../JIRA/sendMailFunc.php';
include '../JIRA/getLineManagersFunc.php';
include '../dbConnect.php';
//For testing bruker vi toBcc, skal byttes til $alleLineManagers
$toBcc = "ole.markus.pedersen@elkem.no";
$alleLineManagers= getLineManagers();
sendMailLineManager($toBcc);
$aLink= db_connect();
settDato($aLink);
header("Location: ../functions/JIRA/jiraMeny.php");
 ?>
