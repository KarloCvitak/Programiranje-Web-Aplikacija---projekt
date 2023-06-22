<?php
include 'connect.php';
define('UPLPATH', 'slike/');
$id=$_GET['id'];
$query = "SELECT * FROM vijesti WHERE id=$id";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result)

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
            <a href="registracija.php">REGISTER</a>

        </nav>

    </header>
 
    

    <section class="clanak">

        <?php
        echo '<img src="' . UPLPATH . $row['slika'] . '">';
        ?>

        <h1 ><?php
        echo $row['naslov'];
        ?></h1>

        <?php
        echo "<h2>".$row['datum']."</h2>";
        ?>


        <article class="about">
        <p>
        <?php
        echo "<i>".$row['sazetak']."</i>";
        ?>
        </p>
        </article>


        <article class="content">
        <p>
        <?php
        echo $row['tekst'];
        ?>
        </p>
        </article>

        

</section>


<footer>  </footer>




  

</body>
</html>