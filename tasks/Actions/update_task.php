<?php
include "../../connect.php";
$task_id = $_POST['task_id'];
$task_name = $_POST['task_name'];


$sql = "UPDATE tasks SET task_name = :task_name WHERE id = :task_id";
$query = $conn->prepare($sql);
$query->bindParam(':task_id', $task_id);
$query->bindParam(':task_name', $task_name);
$query->execute();

header('location: ../../lists/index.php');
