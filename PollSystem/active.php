
<?php
include "connection.php";
if(isset($_GET["id"]) & (isset($_GET["status"])))
{
  if($_GET["status"]==0)
  {
    $sql1 = "update polladmin SET status = 0";
    mysqli_query($con,$sql1);
    $sp=1;
  }
  else
  {
    $sp=0;
  }

  $sql="update polladmin SET status=".$sp." WHERE id=".$_GET["id"];
  mysqli_query($con,$sql);
  header("location:AdminHome.php");
}
?>