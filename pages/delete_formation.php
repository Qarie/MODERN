<?php
include_once 'config.php';

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../index.php");
    exit;
  }

$id=$_GET['id'];
$sql = "DELETE FROM formation WHERE id='$id'";
if (mysqli_query($con, $sql)) {
    header("location:formations.php");
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>