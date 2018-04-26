<?php

  $password = "Elkem123";

  $options = [
    'cost' => 11
  ];
  $hash1= password_hash($password, PASSWORD_BCRYPT, $options);
  if (password_verify($password, $hash1)){
    echo "password is valid!";
  }else {
    echo "Invalid password...";
  }
  echo "<br>";

  //echo password_hash($password, PASSWORD_BCRYPT, $options)."\n";
  echo "<br>";
  echo "<br>";

?>
