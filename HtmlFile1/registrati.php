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
        <script defer src="js_script/registrati.js"></script>
        </head>
    <body>
    <header>
        <div align="center">
        <!-- Aggiungere stile in main.css-->
        <a href="index.html" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        </div>
        <main>
        <h2>Inserisci i dati richiesti</h2>
        <div style="font-size: medium; padding: 0rem;">
            <form action="registrati.php" id="form" method="post">
            <div id="error"></div>
                <label>Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome"  autocomplete="on" required>
                <br><br>
                        <label for="cognome">Cognome:</label>
                     <input type="text" name="cognome" id="cognome" placeholder="Cognome" autocomplete="on" required>
                
                <br><br>
                      <label for="email">Indirizzo e-mail:</label>
                     <input type="email" name="email" id="email" placeholder="esempio@dominio.it"  autocomplete="on" required >
                
                <br><br>
                     <label for="password">Password:</label>
                       <input type="password" name="password" id="password" placeholder="********" required >
                
                <br><br>
                     <label for="età">Età:</label>
                    <input type="date" name="età" id="età" min="01/01/1900" max="01/01/2024" autocomplete="on" required >
                
                <br><br>
                <input type="submit" name="registrati" value="Registrati">
        </form>
        </div>
    </main>
        <h3 style="font-size: larger; color: rgb(1, 188, 101);">
            Hai gia un account?
            <a href="login.php"><p class="tasto">Entra</p></a></h3>
    </body>
</html>    


<?php
include("database.php");
if(isset($_POST["registrati"])){
    $email = $_POST["email"];
    $sql = "SELECT Email FROM utenti WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck==0){
        $sql = "INSERT INTO utenti(Email, Nome, Cognome, Età, Password)
                VALUES ('$_POST[email]','$_POST[nome]','$_POST[cognome]','$_POST[età]','$_POST[password]')";
                header("Location: login.php");
        mysqli_query($conn, $sql);      
    }else{echo "utente già registrato";}      
}
mysqli_close($conn);

?>