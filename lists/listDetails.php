<?php
require '../connect.php';

//$sql = "INSERT INTO tasks (task_name, list_id, duration) VALUES (:task_name , :list_id, :duration)";
//$query = $conn->prepare($sql);
//$query->execute([
//    'task_name' => $task_name,
//    'list_id' => $list_id,
//    'duration' => $duration
//]);

$list_id = $_GET['list_id'];
$list_name = $_GET['list_name'];
$filter = 'true';
$rowName = 'finished';



$statement = "SELECT * FROM tasks WHERE list_id = :list_id AND finished = false ORDER BY finished DESC";


////Afgerond
//if ($_POST['sorter'] == 'finished') {
//    $statement = "SELECT * FROM tasks WHERE list_id = :list_id ORDER BY finished DESC";
//
//    //Niet afgerond
//} else if ($_POST['sorter'] == 'notFinished') {
//    $statement = "SELECT * FROM tasks WHERE list_id = :list_id ORDER BY finished";
//
//    //Duur laag > hoog
//} else if ($_POST['sorter'] == 'low') {
//    $statement = "SELECT * FROM tasks WHERE list_id = :list_id ORDER BY duration";
//
//    //Duur hoog > laag
//} else if ($_POST['sorter'] == 'high') {
//    $statement = "SELECT * FROM tasks WHERE list_id = :list_id ORDER BY duration DESC";
//}  else {
//
//    //Niet gesorteerd
//    $statement = "SELECT * FROM tasks WHERE list_id = :list_id";
//}






$stmt = $conn->prepare($statement);


$stmt->bindParam(':list_id', $list_id);
//$stmt->bindParam(':filter', $filter);
$stmt->execute();
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

<!--        Sorteren-->
        <div class="col-sm-3">
        <form method="post" action="">
            <div class="form-group">
                <label for="sorter">Sorteer op:</label>
                <select name="sorter" class="form-control">
                    <option value="notFinished">Status: Niet klaar</option>
                    <option value="finished">Status: Afgerond</option>
                    <option value="low">Duur: laag > hoog</option>
                    <option value="high">Duur: hoog > laag</option>
                </select>
                <button class="btn btn-info add-new" type="submit">Sorteer</button>
            </div>
        </form>
        </div>

<!--        Filteren-->
        <div class="col-sm-3">
            <form method="post" action="">
                <div class="form-group">
                    <label for="sorter">Filter op:</label>
                    <select name="sorter" class="form-control">
                        <option value="notFinished">Status: Niet klaar</option>
                        <option value="finished">Status: Afgerond</option>
                        <option value="low">Duur: < 30 minuten</option>
                        <option value="high">Duur: > 30 minuten</option>
                    </select>
                    <button class="btn btn-info add-new" type="submit">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
