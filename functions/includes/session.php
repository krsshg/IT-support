<?php
  require $_SERVER["DOCUMENT_ROOT"] . "../functions/connect.php";
  session_start();

   $user_check = $_SESSION['ADusername'];

/*
  $sql = "SELECT username FROM admin WHERE username = (?)";
  $params = array($user_check);
  $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
  $result = sqlsrv_query($link,$sql,$params,$options);
  $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
//   $row = sqlsrv_fetch($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];
*/
   if(!isset($_SESSION['ADusername'])){
      header("location: /functions/login/login.php");
   }
   function userElevation(){
     if($_SESSION["userlevel"] == "0"){
        header('location: http://krs-nts72/functions/includes/CheckElevation.php');
   }

}
?>
