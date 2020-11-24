<?php
require '../connect.php';

$status = '';
$filter = $_POST['filter'];
$sorter = $_POST['sorter'];
$list_id = $_GET['list_id'];
$list_name = $_GET['list_name'];

//filteren
if ($filter == 'low') {
    $status = 'AND duration < 30';
}
else if ($filter == 'high') {
    $status = 'AND duration > 30';
}
else if ($filter == 'finished') {
    $status = "AND finished = 'true'";
}
else if ($filter == 'notFinished') {
    $status = "AND finished = 'false'";

//Sorteren
} else if($filter == 'sortFinished') {
    $status = 'ORDER BY finished DESC';
} else if($filter == 'sortNotFinished') {
    $status = 'ORDER BY finished';
}

//Alles in de lijst weergeven
else if ($filter = 'all') {
    $status = '';
}

$statement = "SELECT * FROM tasks WHERE list_id = :list_id $status";
$stmt = $conn->prepare($statement);

$stmt->execute([
    'list_id' => $list_id,
]);
$result = $stmt->fetchAll();
?>

<head>
    <title>Lijst: <?php echo $result['list_name'] ?></title>
    <?php
    include '../header.php';
    ?>
</head>
<body>

<div class="container">

    <div class="table-wrapper">
        <a type="button" id="backBtn" class="glyphicon glyphicon-arrow-left" href="index.php" aria-hidden="true"></a>

        <div class="table-title">

            <div class="row">
                <div class="col-sm-8"><h2>Huidige lijst: "<?php echo $list_name?>"</h2></div>
                <div class="col-sm-4">

                    <a href="../tasks/createTask.php?list_id=<?php echo $list_id?>" type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i>Nieuwe taak toevoegen</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="3">Taken</th>
                <th>Duur (in minuten)</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            <?php
            //Door alles lijsten heen loopen en weergeven
            foreach ($result as $row) {
                ?>
                <tr>
                    <td colspan="3"><?php echo $row['task_name']?></td>
                    <td><?php echo $row['duration'] ?></td>
                    <td>

                        <script>
                       if (!<?php echo $row['finished'] ?>) {
                        document.write('Niet klaar');
                        } else {
                           document.write('Afgerond');
                       }
                       </script>
                    </td>
                    <td>
                        <a href="../tasks/updateTask.php?task_id=<?php echo $row['id']?>&task_name=<?php echo $row['task_name']?>"><span id="edit" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="../tasks/deleteTask.php?task_id=<?php echo $row['id']?>&task_name=<?php echo $row['task_name']?>"><span id="delete" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>

                </tr>
            <?php } ?>
            </tbody>

        </table>

<!--        Filteren/Sorteren-->
        <div class="col-sm-3">
            <form method="post" action="">
                <div class="form-group">
                    <label for="sorter">Filter/Sorteer op:</label>
                    <select name="filter" class="form-control">
                        <option value="notFinished">Filter: Niet klaar</option>
                        <option value="finished">Filter: Afgerond</option>
                        <option value="low">Filter: duur < 30 minuten</option>
                        <option value="high">Filter: duur > 30 minuten</option>
                        <option value="sortFinished">Sorteer: Afgerond</option>
                        <option value="sortNotFinished">Sorteer: Niet klaar</option>
                        <option value="all">Geen</option>
                    </select>
                    <button class="btn btn-info add-new" type="submit">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
