<head>
    <?php
    include '../header.php';
    ?>
</head>
<body>
<form class="text-center border border-light p-5" id="createForm" action="actions/delete_task.php?task_id=<?php echo $_GET['task_id']?>" method="POST">

    <h3>"<?php echo $_GET['task_name'];?>" verwijderen?</h3>

    <button class="btn btn-info btn-block my-4" type="submit">Verwijder</button>
    <a class="btn btn-danger btn-block my-4" href="index.php">Annuleer</a>
</form>
</body>


