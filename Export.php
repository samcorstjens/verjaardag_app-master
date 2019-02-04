<?PHP
  require('config/config.php');
  require('config/db.php');
  $setSql = "SELECT Username, personalmessage FROM songs";
  $setRec = mysqli_query($conn, $setSql);

  $columnHeader = '';
  $columnHeader = "USERNAMES"."\t"."PERSONALMESSAGES";

  $setData = '';

  while ($rec = mysqli_fetch_row($setRec)) {
      $rowData = '';
      foreach ($rec as $value) {
          $value = '"' . $value . '"' . "\t";
          $rowData .= $value;
      }
      $setData .= trim($rowData) . "\n";
  }


  header("Content-type: application/octet-stream");
  //FILE NAME
  header("Content-Disposition: attachment; filename=Personal_messages.xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  echo ucwords($columnHeader) . "\n" . $setData . "\n";
?>
