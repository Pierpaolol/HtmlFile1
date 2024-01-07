<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Pietro Paolo Buonomo">
            <title>
                D.I.C.E.
            </title>
            <link rel="icon" href="240.png" type="image/x-icon">
            <link rel="stylesheet" href="main.css" type="text/css"> 
            <script defer src="js_script/login.js"></script>   
        </head>
        <body>
        <div align="center">
            <a href="index.html" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        <main>
            
            <h2>Entra:</h2>
            <form action="login.php" id="form" method="post">
            <div id="error"></div>
            <p><label for="email">  Email: </label>
            <input type="email" name="email" id="email" placeholder="esempio@dominio.it" autofocus >
            </p>
            <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="********" >
            </p>
            <button type="submit" name="login" href="homepage.php" value="Login">Log in</button>
             
        
        </form>
    </main>
        
        <h3 style="font-size: larger; color: rgb(1, 188, 101);">
            Non hai un account?
            <a href="registrati.php"><p class="tasto">Registrati</p></a></h3>
    </div>
    </body>
</html>
<?php
include("database.php");
if(isset($_POST["login"])){
$_SESSION["email"]= $_POST["email"];
$_SESSION["password"]= $_POST["password"];
$email = $_SESSION["email"];
$password = $_SESSION["password"];

//$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    $sql= "SELECT * FROM utenti WHERE Email = '$email' && Password = '$password'";
    mysqli_query($conn, $sql);
    $row = mysqli_fetch_array(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    if(mysqli_num_rows(mysqli_query($conn, $sql))==1){    
        header("Location: homepage.php");
    } else{
        echo "Utente non Trovato";
        session_destroy();
    } 
}
?>