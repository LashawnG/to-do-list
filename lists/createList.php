<head>
    <?php
    include '../header.php';
    ?>
</head>
<body>
    <form class="text-center border border-light p-5" id="createForm" action="actions/create_list.php" method="POST">

        <p class="h4 mb-4">Maak nieuwe lijst aan</p>

        <input type="text" name="list_name" class="form-control mb-4" placeholder="Keukenkast bouwen" required>
        <br>

        <button class="btn btn-info btn-block my-4" type="submit">Maak lijst</button>
        <a class="btn btn-danger btn-block my-4" href="index.php">Annuleer</a>
    </form>
</body>


