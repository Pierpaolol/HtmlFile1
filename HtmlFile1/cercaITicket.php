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
            <script defer src="js_script/cercaITicket.js"></script>
    </head>
    <body> <header>
        <div align="center">
        <!-- Aggiungere stile in main.css-->
        <a href="homepageStaff.php" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        </div>
    </header>
    <main>
        <h4>Il tuo Problema è stato già postato? Cerca la richiesta</h4><br>
        <form action="ricercaProblemi.php" id="form" method="get">
            <div id="error"></div>
            <input type="search" name="ricerca" id="ricerca" placeholder="Oggetto"><br>
            <br>
            <legend>Scegli il dispositivo</legend>
            <input type="radio" id="dispositivo" name="dispositivo" value="T-M">
            <label for="T-M">T-M</label><br>
            <input type="radio" id="dispositivo" name="dispositivo" value="T-S">
            <label for="T-S">T-S</label><br>
            <input type="radio" id="dispositivo" name="dispositivo" value="T-R">
            <label for="T-R">T-R</label><br><br>
            <p>Autore del Post (indirizzo email) :</p>
            <input type="email" id="autore" name="autore"><br><br>
            <input type="submit" name="cerca" value="Cerca" required><br><br>
        </form>
        <br><br>
        <div id="errore"></div>
            <?php
            include("database.php");
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
            mysqli_close($conn);
            ?>
            <form action="cercaITicket.php" id="form" method="get">
            <label>Rispondi: </label>
            <br><br>
            <textarea name="risposta" id="risposta" cols="50" rows="5" placeholder="Inserisci la possibile soluzione"></textarea>
            <br><br>
            <label>Inserisci il codice del ticket a cui vuoi rispndere</label>
            <br><br>
            <input type="number" name="id" id="id" placeholder="000">
            <br><br>
            <input type="submit" name="invia" value="Invia risposta"><br>
            </form>
            <?php
            include("database.php");
            if(isset($_GET["invia"]) && !empty($_GET["id"]) && !empty($_GET["risposta"])){
            $codiceID = $_GET["id"];
            $risposta = $_GET["risposta"];
            $sql="UPDATE ticket SET risposta ='$risposta' WHERE id='$codiceID';";
            $result = mysqli_query($conn, $sql);
            $sql="SELECT * FROM ticket WHERE id='$codiceID';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
                while($rows = mysqli_fetch_assoc($result)) {
                    echo "<br>Risposta aggiunta: ".$rows['risposta'];
                }
            }}mysqli_close($conn);
            ?>
    </main>
    </body>
</html>