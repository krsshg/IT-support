<HTML>
<HEAD>
<?PHP require '../connect.php';
session_start();
?>
</HEAD>
<body>

  <script>
      function Emptyusernamealert() {
        x = document.forms["registration"]["username"].value;
        if(x == " ") {
          alert("Brukernavn må være fyllt ut!");
          window.location.href = "http://144.127.128.203/functions/login/signup.php";
        }

      }
  </script>
<?php

// Sjekk at alle felter har blitt posta.
/*
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordCheck']))
  {
*/

// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = $passwordCheckErr = "";
$firstname = $lastname = $email = $username = $password = $passwordCheck = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
  $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }

	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username =	$_POST['username'];
	$password = $_POST['password'];
	$passwordCheck = $_POST['passwordCheck'];





  //salter og krypterer passordet
  $salted = "jregfjiehg8475mfe" . $password . "dfg7fg45g6dg4g5g";
  $hashed = hash('sha512', $salted);

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// Sjekk at password og PasswordCheck stemmer overens.

	if ($password === $passwordCheck)
	{

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

	ECHO "Bruker $username opprettet!";
  header("Location: http://144.127.128.203/functions/login/login.php"); /* Redirect browser */
	}
  else {
    header("Location: http://144.127.128.203/functions/login/signup.php"); /* Redirect browser */
    ECHO "Passordene stemmer ikke overens.";
  }
  }
  else {
    echo "Ett eller flere felt mangler!";
  }
	?>
</body>
</HTML>
