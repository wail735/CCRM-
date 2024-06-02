<?php
if (isset($_GET["id"])){
    $id = $_GET["id"];

$sname ="localhost";
$unme ="root";
$password="";
$db_name="fichier";

$conn =mysqli_connect($sname, $unme, $password, $db_name);

$sql="DELETE FROM livreur WHERE id= $id";
$conn->query($sql);


}
header("location:/CRM/idexlivr.php");
exit;


?>