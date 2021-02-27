<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css/dizajn.css" rel="stylesheet">
    <script src="js/sorttable.js"></script>

    <link rel="icon" href="img/iconka.png" type="image/png" id="ikonka">

</head>
<body>

<header>
    <h1>Uploadovanie súborov</h1>
    <p>Stránka slúži na uploadovanie Vaších súborov na server</p>
</header>
<main class="container">
    <?php
    include "generovanieTabulky.php";
    ?>
<section id="vkladanie">
    <h3>Vkladanie súborov do systému</h3>
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="fileToUpload" class="form-label">Vyberte súbor na vloženie</label>
            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
            <label for="nazov" class="form-label">Vložte názov súboru</label>
            <input type="text" class="form-control" name="nazov" id="nazov">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Vložte súbor</button>
    </form>
</section>


</main>

</body>
</html>
