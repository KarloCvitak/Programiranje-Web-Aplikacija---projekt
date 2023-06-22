<?php
include 'connect.php';
define('UPLPATH', 'slike/');

session_start();
$uspjesnaPrijava = false;
$admin = false;

if (isset($_POST['prijava'])) {

$prijavaImeKorisnika = $_POST['username'];
$prijavaLozinkaKorisnika = $_POST['lozinka'];
$sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
}
mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, 
$levelKorisnika);
mysqli_stmt_fetch($stmt);
//Provjera lozinke
if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && 
mysqli_stmt_num_rows($stmt) > 0) {
$uspjesnaPrijava = true;

if($levelKorisnika == 1) {
$admin = true;
}
else {
$admin = false;
}

$_SESSION['$username'] = $imeKorisnika;
$_SESSION['$level'] = $levelKorisnika;
} else {
$uspjesnaPrijava = false;

}

}

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
           <?php if($uspjesnaPrijava == true && $admin == true ||
            (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1){echo '<a href="unos.html">UNOS</a>';}   ?>
           <a href="registracija.php">REGISTER</a>

        </nav>

    </header>

    

    <section>
      


        <?php

    if (isset($_POST['prijava'])) {
    if($uspjesnaPrijava == false){
    echo '<p class="link" ><a href="registracija.php">Morate se registrirat.</a></p>
    <hr>';}}
        
    if((isset($_SESSION['$username'])) == true){
        echo '<p class="link"><a  href="logout.php">Logout</a></p>
        <hr>';}
    
      
        if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
        
            $query = "SELECT * FROM vijesti";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result)) {
          
            echo '
            <form enctype="multipart/form-data" action="" method="POST">
            <div class="form-item">
            <label for="title">Naslov vjesti:</label>
            <div class="form-field">
            <input type="text" name="title" class="form-field-textual" 
            value="'.$row['naslov'].'">
            </div>
            </div>
            <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (do 50 
            znakova):</label>
            <div class="form-field">
            <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
            </div>
            </div>
            <div class="form-item">
            <label for="content">Sadržaj vijesti:</label>
            <div class="form-field">
            <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
            </div>
            </div>
            <div class="form-item">
            <label for="pphoto">Slika:</label>
            <div class="form-field">
            <input type="file" class="input-text" id="pphoto" 
            value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH . 
            $row['slika'] . '" width=100px>
            </div>
            </div>
            <div class="form-item">
            <label for="category">Kategorija vijesti:</label>
            <div class="form-field">
            <select name="category" id="" class="form-field-textual" 
            value="'.$row['kategorija'].'">
            <option value="MÚSICA">MÚSICA</option>
            <option value="DEPORTES">DEPORTES</option>
            </select>
            </div>
            </div>
            <div class="form-item">
            <label>Spremiti u arhivu: 
            <div class="form-field">';
            if($row['arhiva'] == 0) {
                echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
            } else {
                echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
            }
            echo '</div>
            </label>
            </div>
            </div>
            <div class="form-item">
            <input type="hidden" name="id" class="form-field-textual" 
            value="'.$row['id'].'">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" name="update" value="Prihvati">Izmjeni</button>
            <button type="submit" name="delete" value="Izbriši">Izbriši</button>
            </div>
            </form>
            ';
            
    
        
        
            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM vijesti WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
               }
               
        
    
        
            if(isset($_POST['update'])){
            $picture = $_FILES['pphoto']['name'];
            $title=$_POST['title'];
            $about=$_POST['about'];
            $content=$_POST['content'];
            $category=$_POST['category'];
            if(isset($_POST['archive'])){
            $archive=1;
            }else{
            $archive=0;
            }
            $target_dir = 'slike/'.$picture;
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
            $id=$_POST['id'];
            $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', 
            slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
            $result = mysqli_query($dbc, $query);
    }
    


        }
        
        } else if ($uspjesnaPrijava == true && $admin == false) {
        
        echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
        } else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
        echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
        } else if ($uspjesnaPrijava == false) {



        
        ?>
        
        <form action="" method="POST">
         <label for="username">Korisnicko ime:</label>
         <input type="text" id="username" name="username" required><br>

         <label for="lozinka">Lozinka:</label>
         <input type="password" id="lozinka" name="lozinka" required><br>

         <input type="submit" name="prijava" id="prijava" value="Prijava">
        </form>

        
        <script type="text/javascript">
        
       
        
        </script>
        
        <?php
        }
        ?>
        
        </section>




    


    <footer></footer>





</body>
</html>