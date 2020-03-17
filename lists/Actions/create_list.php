
<?php

include "../../connect.php";

$list_name = $_POST['list_name'];

$sql = "INSERT INTO lists SET list_name = :list_name";
$query = $conn->prepare($sql);
$query->bindParam(":list_name", $list_name);
$query->execute();

header('location: ../index.php');
