  <?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'dinamic_site';
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
  //


  try {
      $pdo = new PDO ("$driver: localhost = $host; dinamic_site = $db_name; charset = $charset",  $db_user, $db_pass,  $options);
      $pdo->query("use dinamic_site");
  } catch (PDOException $i) {
      die ('Connection error');
  }