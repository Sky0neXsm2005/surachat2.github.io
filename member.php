<?php require_once('Connections/mysqli.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_mysqli, $mysqli);
$query_Job_rec_mem = "SELECT * FROM std_it12";
$Job_rec_mem = mysql_query($query_Job_rec_mem, $mysqli) or die(mysql_error());
$row_Job_rec_mem = mysql_fetch_assoc($Job_rec_mem);
$totalRows_Job_rec_mem = mysql_num_rows($Job_rec_mem);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <p>ข้อมูลนักศึกษา สทส.12</p>
  <p>&nbsp;</p>
  <form id="form1" name="form1" method="post" action="">
<table border="1">
      <tr>
        <td><div align="center">id</div></td>
        <td><div align="center">code_std</div></td>
        <td><div align="center">name_std</div></td>
        <td><div align="center">dep_std</div></td>
        <td><div align="center">tel_std</div></td>
      </tr>
      <?php do { ?>
        <tr>
          <td><div align="center"><?php echo $row_Job_rec_mem['id']; ?></div></td>
          <td><div align="left"><?php echo $row_Job_rec_mem['code_std']; ?></div></td>
          <td><div align="center"><?php echo $row_Job_rec_mem['name_std']; ?></div></td>
          <td><div align="center"><?php echo $row_Job_rec_mem['dep_std']; ?></div></td>
          <td><div align="center"><?php echo $row_Job_rec_mem['tel_std']; ?></div></td>
        </tr>
        <?php } while ($row_Job_rec_mem = mysql_fetch_assoc($Job_rec_mem)); ?>
    </table>
</form>
  <p><a href="logout.php"><img src="image/logout-8.png" width="30" height="31" /></a></p>
</div>
</body>
</html>
<?php
mysql_free_result($Job_rec_mem);
?>
