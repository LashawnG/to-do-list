
<?php
//Open database connectie
include '../connect.php';

//Alle lijsten ophalen uit de DB
$stmt = $conn->prepare('SELECT * FROM lists');
$stmt->execute();
$result = $stmt->fetchAll();
?>




<html>
    <head>
       <title>ToDoList</title>
   <?php
   include '../header.php';
   ?>
    </head>
    <body>



    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>To Do Lists</h2></div>
                    <div class="col-sm-4">
                        <a href="createList.php" type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i>Nieuwe lijst</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="3">List name</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                    <?php
                    //Door alles lijsten heen loopen en weergeven
                    foreach ($result as $row) {
                    ?>
                <tr>
                    <td colspan="3"><?php echo $row['list_name'] ?></td>
                    <td>
                        <a href="updateList.php?list_id=<?php echo $row['id']?>&list_name=<?php echo $row['list_name']?>"><span id="edit" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="#"><span id="view" class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="deleteList.php?list_id=<?php echo $row['id']?>&list_name=<?php echo $row['list_name']?>"><span id="delete" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>

