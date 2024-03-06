<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dataBase = 'code-with-harry';

$connection = mysqli_connect($serverName, $userName, $password, $dataBase);
if (!$connection) {
    echo ('Connection is not successful');
}
$id = $_GET['rn'];
$querytoDelete = "DELETE FROM `harry-table` WHERE `id` = '$id' ";
$result = mysqli_query($connection,$querytoDelete);
header('location: form.php');
?>