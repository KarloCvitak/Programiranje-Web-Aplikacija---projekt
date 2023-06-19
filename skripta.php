<?php
include 'connect.php';
$picture = $_FILES['pphoto']['name'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];
$date=date('d.m.Y.');
if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'slike/'.$picture;
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
$query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture',
'$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);

setlocale(LC_TIME, 'es_ES'); 
$currentDate = strftime("%B %e. %Y");
$image = "slike/image.jpg";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

    <header>

        <img src="slike/logo.png" id="logo" alt="logo">

        <nav>
            <a href="index.php">HOME</a>
            <a href="kategorija.php?id=MÚSICA">MÚSICA</a>
            <a href="kategorija.php?id=DEPORTES">DEPORTES</a>
            <a href="administracija.php">ADMINISTRACIJA</a>
            <a href="unos.html">UNOS</a>

        </nav>

    </header>
 
    

        <section class="clanak">


        <?php
        echo "<img src='$image' alt='slika'>";
        ?>
    
        <h1><?php
        echo $title;
        ?></h1>

        <h2><?php
        echo $currentDate;
        ?></h2>


        <article class="about">
        <p>
        <?php
        echo $about;
        ?>
        </p>
        </article>

        <article class="content">
        <p>
        <?php
        echo $content;
        ?>
        </p>
        </article>

        </section>


<footer>  </footer>



  

</body>
</html>