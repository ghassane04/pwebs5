<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    $id=$_GET['id'];
include('connection.php');
$connection = new Connection();
$connection->selectDatabase('Projet');
include('user.php');
User::deleteClient($id,$connection->conn);
header("Location: ../admin.php");
}
?>
