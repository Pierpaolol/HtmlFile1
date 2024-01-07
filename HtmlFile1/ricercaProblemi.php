<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <script defer src="js_script/cercaITicket.js"></script>
        <meta charset="UTF-8">
        <meta name="author" content="Pietro Paolo Buonomo">
            <title>
                 D.I.C.E.
            </title>
            <link rel="icon" href="240.png" type="image/x-icon">
            <link rel="stylesheet" href="main.css" type="text/css">    
    </head>
    <body>
    <header>
        <div align="center">
        <!-- Aggiungere stile in main.css-->
        <a href="homepage.php" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        </div>
    </header>
    <main>
        <h2>Benvenuto</h2>
        <?php
    include("database.php");
    $email=$_SESSION["email"];
    $sql = "SELECT Nome, Cognome FROM utenti WHERE Email = '$email'";
    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);

    if ($resultCheck > 0) {
        while( $row = mysqli_fetch_assoc($results) ) {
            echo " ".$row['Nome']. " ".$row['Cognome'];
        }

        if(isset($_POST["logout"])) {
            session_destroy();
            header("Location: login.php");
        }
        mysqli_close($conn);
    }
    ?> 

    <form action="ricercaProblemi.php" method="get">
        <h4>Il tuo Problema è stato già postato? Cerca la richiesta</h4>
        <form action="ricercaProblemi.php" method="get">
            <input type="search" name="ricerca">
            <legend>Scegli il dispositivo</legend>
            <input type="radio" id="T-M" name="dispositivo" value="T-M">
            <label for="T-M">T-M</label><br>
            <input type="radio" id="T-S" name="dispositivo" value="T-S">
            <label for="T-S">T-S</label><br>
            <input type="radio" id="T-R" name="dispositivo" value="T-R">
            <label for="T-R">T-R</label><br>
            <p>Autore del Post (indirizzo email) :</p>
            <input type="text" name="autore">
            <input type="submit" name="cerca" required>
        </form>
            <?php
            //include("database.php");
            include("ricerca.php");
            if(isset($_GET["cerca"]) && !empty($_GET["dispositivo"]) && !empty($_GET["ricerca"]) && !empty($_GET["autore"])) {
                echo ricercaRDA($_GET["ricerca"], $_GET["dispositivo"], $_GET["autore"]);
            }elseif(isset($_GET["cerca"]) && !empty($_GET["dispositivo"]) && !empty($_GET["autore"])){
                echo ricercaDA($_GET["dispositivo"],$_GET["autore"]);
            }elseif(isset($_GET["cerca"]) && !empty($_GET["ricerca"]) && !empty($_GET["autore"])){
                echo ricercaRA($_GET["ricerca"],$_GET["autore"]);
            }elseif(isset($_GET["cerca"]) && !empty($_GET["dispositivo"]) && !empty($_GET["ricerca"])) {
                echo ricercaRD($_GET["dispositivo"],$_GET["ricerca"]);
            }elseif(isset($_GET["cerca"]) && !empty($_GET["dispositivo"])){
                echo ricercaD($_GET["dispositivo"]);
            }elseif(isset($_GET["cerca"]) && !empty($_GET["ricerca"])){
                echo ricercaR($_GET["ricerca"]);
            }elseif(isset($_GET["cerca"]) && !empty($_GET["autore"])){
                 echo ricercaA($_GET["autore"]);
            }elseif(isset($_GET["cerca"])){
                 "<br>"."Impossibile produrre la ricerca senza almeno compilare un campo";
            }
            //mysqli_close($conn);
            ?>
            <br><br>
            <input type="submit" name="logout" value="logout">
            </form>
    </main>
        </body>    
</html>