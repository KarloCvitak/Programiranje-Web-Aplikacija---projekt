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
            <a href="registracija.php">REGISTRACIJA</a>

        </nav>

    </header>
 

   
        



    <section>
    <?php
include 'connect.php';
$registriranKorisnik = false;

 if(isset($_POST['prijava'])){
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['username'];
$lozinka = $_POST['pass'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 0;



    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    if(mysqli_stmt_num_rows($stmt) > 0){
        $msg='Korisničko ime već postoji!';
    }else{

        $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka,  razina)VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
        mysqli_stmt_execute($stmt);
        $registriranKorisnik = true;
}
}
mysqli_close($dbc);}









 if($registriranKorisnik == true) {
 echo '<p>Korisnik je uspješno registriran!</p>';
 } else {

 ?>
 
 <section role="main">
 <form enctype="multipart/form-data" action="" method="POST">
 <div class="form-item">
 <span id="porukaIme" class="bojaPoruke"></span>
 <label for="title">Ime: </label>
 <div class="form-field">
 <input type="text" name="ime" id="ime" class="form-field-textual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaPrezime" class="bojaPoruke"></span>
 <label for="about">Prezime: </label>
 <div class="form-field">
 <input type="text" name="prezime" id="prezime" class="form-field-textual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaUsername" class="bojaPoruke"></span>
 
 <label for="content">Korisničko ime:</label>

 <div class="form-field">
 <input type="text" name="username" id="username" class="form-field-textual">
 </div>
 <?php if(isset($msg)){ echo '<br><span class="bojaPoruke">'.$msg.'</span>';}?>

 </div>
 <div class="form-item">
 <span id="porukaPass" class="bojaPoruke"></span>
 <label for="pphoto">Lozinka: </label>
 <div class="form-field">

 <input type="password" name="pass" id="pass" class="form-field-textual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaPassRep" class="bojaPoruke"></span>
 <label for="pphoto">Ponovite lozinku: </label>
 <div class="form-field">
 <input type="password" name="passRep" id="passRep" class="form-field-textual">
 </div>
 </div>
 
 <div class="form-item">
 <button type="submit" name="prijava" value="Prijava" id="slanje">Registracija</button>
 </div>
 </form>
 
 </section>
 <script type="text/javascript">
 document.getElementById("slanje").onclick = function(event) {
 
 var slanjeForme = true;
 


 var poljeIme = document.getElementById("ime");
 var ime = document.getElementById("ime").value;
 if (ime.length == 0) {
 slanjeForme = false;
 poljeIme.style.border="1px dashed red";
 document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
 } else {
 poljeIme.style.border="1px solid green";
 document.getElementById("porukaIme").innerHTML="";
 }

 var poljePrezime = document.getElementById("prezime");
 var prezime = document.getElementById("prezime").value;
 if (prezime.length == 0) {
 slanjeForme = false;

 poljePrezime.style.border="1px dashed red";
 
document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
 } else {
 poljePrezime.style.border="1px solid green";
 document.getElementById("porukaPrezime").innerHTML="";
 }
 

 var poljeUsername = document.getElementById("username");
 var username = document.getElementById("username").value;
 if (username.length == 0) {
 slanjeForme = false;
 poljeUsername.style.border="1px dashed red";
 
document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
 } else {
 poljeUsername.style.border="1px solid green";
 document.getElementById("porukaUsername").innerHTML="";
 }
 

 var poljePass = document.getElementById("pass");
 var pass = document.getElementById("pass").value;
 var poljePassRep = document.getElementById("passRep");
 var passRep = document.getElementById("passRep").value;
 if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
 slanjeForme = false;
 poljePass.style.border="1px dashed red";
 poljePassRep.style.border="1px dashed red";
 document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";
 
document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
 } else {
 poljePass.style.border="1px solid green";
 poljePassRep.style.border="1px solid green";
 document.getElementById("porukaPass").innerHTML="";
 document.getElementById("porukaPassRep").innerHTML="";
 }
 
 if (slanjeForme != true) {
 event.preventDefault();
 }

 
 };
 
 </script>
 <?php
 }



 ?>









    </section>


    <footer></footer>





</body>
</html>