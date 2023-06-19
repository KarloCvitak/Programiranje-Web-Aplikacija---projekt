<?php
include 'connect.php';
define('UPLPATH', 'slike/');
$kategorija=$_GET['id'];
$query = "SELECT * FROM vijesti WHERE kategorija='$kategorija'";


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
 
    

    <section id="<?php echo mb_strtolower($kategorija, 'UTF-8'); ?>">

      
<h1><?php echo $kategorija; ?></h1>


<div class="flex-container">
<?php
    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$kategorija'";
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


<footer>  </footer>



  

</body>
</html>