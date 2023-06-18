<?php
include 'connect.php';
define('UPLPATH', 'slike/');
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
            <a>HOME</a>
            <a>MÚSICA</a>
            <a>DEPORTES</a>
            <a>ADMINISTRACIJA</a>
        </nav>

    </header>
 

    <!-- musica -->
    <section id="musica">

      
        <h1>MÚSICA</h1>
    

        <div class="flex-container">
        <?php
            $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='MÚSICA' LIMIT 4";
            $result = mysqli_query($dbc, $query);
            $i=0;
            while($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
            echo '<h2 id="articleTitle">';
            echo '<a href="clanak.php?id='.$row['id'].'">';
            echo $row['naslov'];
            echo '</a></h2>';
            echo '<h3 id="articleDate">';
            echo $row['datum'];
            echo '</h3>';

            echo '</article>';
            }?>


        </div>

    </section>
        



     <!-- deportes -->
    <section id="deportes">

        <h1>DEPORTES</h1>
      
        <div class="flex-container">
        <?php
            $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='DEPORTES' LIMIT 4";
            $result = mysqli_query($dbc, $query);
            $i=0;
            while($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
            echo '<h2 id="articleTitle">';
            echo '<a href="clanak.php?id='.$row['id'].'">';
            echo $row['naslov'];
            echo '</a></h2>';
            echo '<h3 id="articleDate">';
            echo $row['datum'];
            echo '</h3>';

            echo '</article>';
            }?>

        </div>

    </section>


    <footer></footer>





</body>
</html>