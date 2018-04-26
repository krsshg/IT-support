<?php
  $link = ldap_connect('elkem.com'); //tilkobling til Domene

  if(! $link) {
    echo "Kunne ikke nå Domenet.";
  }else {
    echo "Koblet til";
  }

?>
