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
$target_dir = 'img/'.$picture;
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
$query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture',
'$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);



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
            <a href="unos.php">UNOS</a>
        </nav>

    </header>
 

    <section>
        <form action="skripta.php" method="POST">


            <div class="form-item">
            <label for="title">Naslov vijesti</label>
            <div class="form-field">
            <input type="text" name="title" class="form-field-textual">
            </div>
            </div>

            <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (do 50
           znakova)</label>
            <div class="form-field">
            <textarea name="about" id="" cols="30" rows="10" class="formfield-textual"></textarea>
            </div>
            </div>


            <div class="form-item">
            <label for="content">Sadržaj vijesti</label>
            <div class="form-field">
            <textarea name="content" id="" cols="30" rows="10"
           class="form-field-textual"></textarea>
            </div>
            </div>


            <div class="form-item">
            <label for="pphoto">Slika: </label>
            <div class="form-field">
            <input type="file" accept="image/*"
           class="input-text" name="pphoto"/>
            </div>
            </div>


            <div class="form-item">
            <label for="category">Kategorija vijesti</label>
            <div class="form-field">
            <select name="category" id="" class="form-field-textual">
            <option value="MÚSICA">MÚSICA</option>
            <option value="DEPORTES">DEPORTES</option>
            </select>
            </div>
            </div>


            <div class="form-item">
            <label>Spremiti u arhivu:
            <div class="form-field">
            <input type="checkbox" name="archive">
            </div>
            </label>
            </div>


            <div class="form-item">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" value="Prihvati">Prihvati</button>
            </div>
            
            </form>


    </section>
        



 


    <footer></footer>





</body>
</html>