<?php
require_once '../permission.php';
require '../public/dbconnection.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE user_id = $id";
// var_dump($sql);
// die;
$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:user.php");
die;
