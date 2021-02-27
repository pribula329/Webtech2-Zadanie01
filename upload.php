<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 1 - Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css/dizajn.css" rel="stylesheet">
</head>
<body class="container">
<section id="vkladanie">
<?php
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$NazovNaUlozenie = $_POST['nazov'].'.'.$FileType;
// Check if  file is a actual  or fake
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo '<h2 class="upload"> Súbor je korektný' .$check["mime"].' !</h2><br>';
        $uploadOk = 1;
    } else {
        echo '<h2 class="upload"> Súbor nie je korektný !</h2><br>';
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists('files/'.$_POST['nazov'].'.'.$FileType)) {
    echo '<h2 class="upload"> Súbor s daným názvom a príponou existuje!</h2><br>';

    $NazovNaUlozenie = $_POST['nazov'].'.'.time().'.'.$FileType;
    echo '<h2 class="upload"> Pre uloženie súboru sme upravili názov na:</h2><br>'
            . '<h2 class="upload">'.$NazovNaUlozenie.'</h2><br>';
    $uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 200000000) {
    echo '<h2 class="upload">Súbor je príliš veľký!</h2>';
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<h2 class="upload">Prepáčte Váš súbor nebol uploadnutý!</h2>';
// if everything is ok, try to upload fil
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 'files/'.$NazovNaUlozenie)) {
        echo '<h2 class="upload">Súbor '. htmlspecialchars( $NazovNaUlozenie). ' bol uploadnutý!</h2>';
    } else {
        echo '<h2 class="upload">Prepáčte, nastala chyba pri uploadnutí súboru!</h2>';
    }
}
?>
<div class="upload">
<button onclick="window.location.href='index.php'" type="submit" class="btn btn-primary"  name="return">Vrátiť sa na úvodnú stánku</button>
</div>
</section>
</body>
</html>
