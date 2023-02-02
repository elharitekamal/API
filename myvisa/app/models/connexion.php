<?php


class connection
{

  public function connect()
  {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'mavisa';

    $conn = new mysqli($servername, $username, $password, $dbname);

    return $conn;
  }





}

?>