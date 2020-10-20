<?php
require_once '../public/dbconnection.php';
$id = $_GET['id'];
$sql = "delete from products where id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("location: products.php");
die;
