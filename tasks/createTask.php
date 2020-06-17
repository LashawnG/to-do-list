<head>
    <?php
    include '../header.php';
    ?>
</head>
<?php $id = $_GET['list_id']; ?>

<body>
    <form class="text-center border border-light p-5" id="createForm" action="actions/create_task.php" method="POST">

        <p class="h4 mb-4">Maak nieuwe taak aan</p>

        <input type="text" name="task_name" class="form-control mb-4" placeholder="Taak naam..." required>
        <input type="hidden" name="list_id" value="<?php echo $id?>" required>
        <br>

            <div class="form-group">
                <input type="number" class="form-control" name="duration" placeholder="Duur in minuten...">
            </div>


        <button class="btn btn-info btn-block my-4" type="submit">Voeg taak toe</button>
        <a class="btn btn-danger btn-block my-4" href="../lists/listDetails.php?list_id=<?php echo $id?>&list_name=<?php echo $_GET['list_name']?>">Annuleer</a>
    </form>
</body>


