<?php
require '../public/dbconnection.php';

$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE cate_id = $id";
// var_dump($sql);
// die;
$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:category.php");
die;
