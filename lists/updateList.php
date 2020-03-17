<head>
    <?php
    include '../header.php';
    ?>
</head>
<body>
<form class="text-center border border-light p-5" id="createForm" action="actions/update_list.php" method="POST">

    <p class="h4 mb-4">Lijst bewerken</p>

    <input type="text" name="list_name" class="form-control mb-4" required value="<?php echo $_GET['list_name']?>">
    <input type="hidden" name="list_id" value="<?php echo $_GET['list_id']?>">
    <br>

    <button class="btn btn-info btn-block my-4" type="submit">Bewerk</button>
    <a class="btn btn-danger btn-block my-4" href="index.php">Annuleer</a>
</form>
</body>
