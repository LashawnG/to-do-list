<head>
    <?php
    include '../header.php';

    $task_name = $_GET['task_name'];
    $task_id = $_GET['task_id'];

    ?>

</head>
<body>
<form class="text-center border border-light p-5" id="createForm" action="actions/update_task.php" method="POST">

    <p class="h4 mb-4">Taak bewerken</p>

    <input type="text" name="task_name" class="form-control mb-4" required value="<?php echo $task_name?>">
    <input type="hidden" name="task_id" value="<?php echo $task_id?>">
    <br>

    <button class="btn btn-info btn-block my-4" type="submit">Bewerk</button>
    <a class="btn btn-danger btn-block my-4 disabled" href="../lists/listDetails.php?list_id=<?php echo $task_id?>&task_name=<?php echo $task_name?>">Annuleer</a>
</form>
</body>
