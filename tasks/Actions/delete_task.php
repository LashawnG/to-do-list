<?php
include "../../connect.php";

$task_id = $_GET['task_id'];

$sql = "DELETE FROM tasks WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $task_id);
$query->execute();

header('location: ../../lists/index.php');
