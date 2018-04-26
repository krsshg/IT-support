
<!DOCTYPE html>
<?php
include("../connect.php");
?>
<html>
  <head>
    <title>Signup Page</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/bootstrap-theme.min.css" rel="Stylesheet" type="text/css">
    <link href="../../css/testTablesite.css" rel="Stylesheet" type="text/css">
    <style type = "text/css">
    body {
      font-family:Arial, Helvetica, sans-serif;
      font-size:14px;
      background-image: url("../../img/gradient.jpg");
    }
    .SignupBox {
      margin-top: 100px;
    }
    .error {
      font-size:13px;
      color: #FF0000;
    }
  </style>
  </head>
<body>
<?php
  // define variables and set to empty values
  $firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = $passwordCheckErr = "";
  $firstname = $lastname = $email = $username = $password = $passwordCheck = "";
  $errorCount =0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
    $firstnameErr = "Fornavn mangler";
    $errorCount = 1;
    } else {
      $firstname = test_input($_POST["firstname"]);
      // check if firstname only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
        $firstnameErr = "Kun bokstaver og mellomrom tillatt";
        $errorCount = 1;
      }
    }
    if (empty($_POST["lastname"])) {
    $lastnameErr = "Etternavn mangler";
    $errorCount = 1;
    } else {
      $lastname = test_input($_POST["lastname"]);
      // check if lastname only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
        $lastnameErr = "Kun bokstaver og mellomrom tillatt";
        $errorCount = 1;
      }
    }
    if (empty($_POST["email"])) {
    $emailErr = "E-post mangler";
    $errorCount = 1;
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Ugyldig e-post format";
        $errorCount = 1;
      }
    }
    if (empty($_POST["username"])) {
    $usernameErr = "Brukernavn mangler";
    $errorCount = 1;
    } else {
      $username = test_input($_POST["username"]);
      // check if username only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        $usernameErr = "Kun bokstaver og mellomrom tillatt";
        $errorCount = 1;
      }
    }
    if (empty($_POST["password"])) {
    $passwordErr = "Passord mangler";
    $errorCount = 1;
    } else {
      $password = test_input($_POST["password"]);
      // check if username only contains letters and whitespace
    }
    if (empty($_POST["passwordCheck"])) {
    $passwordCheckErr = "Passordsjekk mangler";
    $errorCount = 1;
    } else {
      $passwordCheck = test_input($_POST["passwordCheck"]);
      // check if username only contains letters and whitespace
    }
    // Sjekk at password og PasswordCheck stemmer overens.
    if($password != $passwordCheck){
      $errorCount = 1;
      echo "<script>alert('Passordene stemmer ikke overens')</script>";
    }

    //salter og krypterer passordet
    $salted = "jregfjiehg8475mfe" . $password . "dfg7fg45g6dg4g5g";
    $hashed = hash('sha512', $salted);


    if ($errorCount == 0){

        $sql =
        "
              INSERT INTO Users
              Values ('$firstname', '$lastname', '$email', '$username', '$hashed')
        ";

        $params = array();
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

        $stmt = sqlsrv_query($link, $sql, $params, $options);
        if($stmt === false) {
          die( print_r( sqlsrv_errors(), true));
        }
        header("Location: http://144.127.128.203/functions/login/login.php"); /* Redirect browser */
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>


  <div class="container">
      <div class="jumbotron" style = "margin-top: 160px; padding-bottom: 120px; padding-right:0px; padding-left: 0px;">
          <img src="../../img/Elkem corporate logo.png" width="190px" height="90px" style="position: fixed; align: center;"/>
          <!--skriv koden som skal innenfor boksen her -->
          <div class="SignupBox" align="center">
                     <form name="registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                     <div class="rTableHeadRowLogin">
                       <div class="rTableHeadingLogin rTableCellLogin">Lag ny bruker</div>
                     </div>
                     <div class="rTableLogin">
                       <div class="rTableRowLogin">
                         <div class="rTableCellLogin">Fornavn:</div>
                         <div class="rTableCellLogin"><input type="text" id="indent" name="firstname" value="<?php echo $firstname;?>" class="box"/><span class="error">  *<br> <?php echo $firstnameErr;?></span></div>
                       </div>
                       <div class="rTableRowLogin">
                         <div class="rTableCellLogin">Etternavn:</div>
                         <div class="rTableCellLogin"><input type ="text" id="indent" name="lastname" value= "<?php echo $lastname;?>" class="box"/><span class="error">  *<br> <?php echo $lastnameErr;?></span></div>
                       </div>
                       <div class="rTableRowLogin">
                         <div class="rTableCellLogin">E-post:</div>
                         <div class="rTableCellLogin"><input type="text" id="indent" name="email" value= "<?php echo $email;?>" class="box"/><span class="error">  *<br> <?php echo $emailErr;?></span></div>
                       </div>
                       <div class="rTableRowLogin">
                         <div class="rTableCellLogin">Brukernavn:</div>
                         <div class="rTableCellLogin"><input type="text" id="indent" name="username" value="<?php echo $username;?>" class="box"/><span class="error">  *<br> <?php echo $usernameErr;?></span></div>
                       </div>
                       <div class="rTableRowLogin">
                         <div class="rTableCellLogin">Passord:</div>
                         <div class="rTableCellLogin" id="indent"><input type="password" id="indent" name="password" pattern=".{8,}" required title="8 karakterer minimum" class="box"/><span class="error">  *<br> <?php echo $passwordErr;?></span></div>
                       </div>
                       <div class="rTableRowLogin">
                         <div class="rTableCellLogin">Gjenta passord:</div>
                         <div class="rTableCellLogin"><input type="password" id="indent" name="passwordCheck" class="box"/><span class="error">  *<br> <?php echo $passwordCheckErr;?></span></div>
                       </div>

                       <div class="rTableRowLogin">
                         <div class="rTableCellLogin"><input type="submit" value="Submit"/><br /></div>
                       </div>
                     </div><!--rTableLogin-->
                   </form>
                     <p style="font-size:14px;">Har du bruker allerede? klikk <a href="../../functions/login/login.php">her</a></p>

                   <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php //echo $error; ?></div>

                </div>
              </div>

</div>
<?php


 ?>
</body>
</html>
