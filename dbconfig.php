
<?php
session_start();
$con = mysqli_connect("remotemysql.com","oHIoC9gXhz","6Xmw92LFJO","oHIoC9gXhz");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>