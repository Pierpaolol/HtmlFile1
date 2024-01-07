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
            <script defer src="js_script\creaUnTicket.js"></script>
    </head>
    <body>
    <header>
        <div align="center">
        <!-- Aggiungere stile in main.css-->
        <a href="homepage.php" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        </div>
    </header>
<main>
<h3>Quale è il tuo problema?</h3>
        <form action="creaUnTicket.php" id="form" method="get">
            <div id="error"></div>
            <input type="text" name="oggetto" id='oggetto' placeholder="Oggetto" size="50px">
            <br><br>
            <textarea name="descrizione" id="descrizione" cols="50" rows="5" placeholder="Descrivici il tuo problema"></textarea>
            <br><br>
            <legend>Scegli il dispositivo</legend>
            <input type="radio" id="dispositivo" name="dispositivo" value="T-M">
            <label for="T-M">T-M</label><br>
            <input type="radio" id="dispositivo" name="dispositivo" value="T-S">
            <label for="T-S">T-S</label><br>
            <input type="radio" id="dispositivo" name="dispositivo" value="T-R" >
            <label for="T-R">T-R</label><br><br>
            <legend>Natura del problema:</legend>
            <input type="radio" id="natura" name="natura" value="HW">
            <label for="HW">Hardware</label><br>
            <input type="radio" id="natura" name="natura" value="SW">
            <label for="SW">Software</label><br>
            <input type="submit" name="invia" value="Invia">
        </form>
        <?php
            include("database.php");
            if(!empty($_GET["oggetto"]) && isset($_GET["invia"]) && !empty($_GET["dispositivo"])){
            $oggetto = $_GET["oggetto"];
            $descrizione = $_GET["descrizione"];
            $dispositivo = $_GET["dispositivo"];
            $autore = $_SESSION["email"];
            $natura = $_GET["natura"];
            if(isset($_GET["invia"]) && !empty($_GET["oggetto"]) && !empty($autore)){
            $sql = "INSERT INTO ticket(oggetto, descrizione, dispositivo, autore, natura, risolto) VALUES ('$oggetto','$descrizione','$dispositivo','$autore', '$natura','0');";
            mysqli_query($conn, $sql);        
            }
            mysqli_close($conn);
        }
            ?>
        <h4>Il tuo Problema è stato già postato? <a href = "ricercaProblemi.php">Cerca la richiesta</a></h4>
        <form action="homepage.php" method="get">
        <input type="submit" name="logout" value="logout">
        </form>
        <?php
        if(isset($_GET["logout"])){
            session_destroy();
            header("Location: index.html");
        }
        ?>
</main>
    </body>