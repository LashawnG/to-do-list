
<?php

include "../../connect.php";

$task_name = $_POST['task_name'];
$list_id = $_POST['list_id'];
$duration = $_POST['duration'];


$sql = "INSERT INTO tasks (task_name, list_id, duration) VALUES (:task_name , :list_id, :duration)";
$query = $conn->prepare($sql);
$query->execute([
    'task_name' => $task_name,
    'list_id' => $list_id,
    'duration' => $duration
]);

header('location: ../../lists/index.php');
