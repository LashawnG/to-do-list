<?php
include "../../connect.php";

$list_id = $_GET['list_id'];

$sql = "DELETE FROM lists WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $list_id);
$query->execute();

header('location: ../index.php');
