<?php

if(session_status() === PHP_SESSION_ACTIVE) {

  echo "session er satt";

}else{
  echo "session er ikke satt";
}
?>
