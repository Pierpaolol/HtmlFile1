<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <script defer src="js_script/homepage.js"></script>
        <meta charset="UTF-8">
        <meta name="author" content="Pietro Paolo Buonomo">
            <title>
                D.I.C.E.
            </title>
            <link rel="icon" href="240.png" type="image/x-icon">
            <link rel="stylesheet" href="main.css" type="text/css">    
        </head>
        <body>
        <div align="center">
            <a href="index.html" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        <main>
        <article id="entra">    
            <h2>Entra:</h2>
            <form action="loginStaff.php" id="form" method="post">
            <p><label for="id">  Inserisci il tuo numero ID: </label>
            <div id="error"></div>
            <input type="text" name="id" id="id" placeholder="#" autofocus autocomplete="on" >
            <input type="submit" name="login" value="Entra">
            </p>
        </form>
    </main>
        </article>
    </div>
    </body>
</html>
<?php
include("database.php");

$conn = mysqli_connect("localhost", "root", "", "database1");
if(!empty($_POST["id"]) && isset($_POST["login"])){
    $_SESSION["id"] = $_POST["id"]; 
    $id = $_SESSION["id"];
    $sql= "SELECT * FROM staff WHERE id = '$id'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(mysqli_num_rows($result)==1){    
        header("Location:homepageStaff.php");
    } else{
        echo "Utente non Trovato";
        session_destroy();
    } 
    mysqli_close($conn);
}
?>