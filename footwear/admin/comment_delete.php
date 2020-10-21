<?php
require_once '../permission.php';
require_once '../public/dbconnection.php';
$id = $_GET['id'];
$sql = "delete from comment where id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
header('location:comment.php');
die;
