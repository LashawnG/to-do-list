<?php
include "../../connect.php";

$list_id = $_POST['list_id'];
$list_name = $_POST['list_name'];

$sql = "UPDATE lists SET list_name = :list_name WHERE id = :list_id";
$query = $conn->prepare($sql);
$query->bindParam(':list_id', $list_id);
$query->bindParam(':list_name', $list_name);
$query->execute();

header('location: ../index.php');
