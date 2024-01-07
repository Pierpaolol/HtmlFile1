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
            <script defer src="js_script\controllaITicket.js"></script>    
    </head>
    <body> <header>
        <div align="center">
        <!-- Aggiungere stile in main.css-->
        <a href="homepageStaff.php" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        </div>
    </header>
    <main>
    <br>
        <?php
        include("database.php");
        $sql= "SELECT * FROM ticket WHERE risolto='0';";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if ($resultCheck > 0) {
            while( $row = mysqli_fetch_assoc($results) ) {
                echo "Titolo: ".$row['oggetto']. "<br>Data: ".$row['data']."<br>Da: ".$row['autore']."<br>Codice ticket: ".$row['id'];
                if(!empty($row['descrizione'])){
                echo "<br>Descrzione: ".$row['descrizione'];
                }
                if(!empty($row['dispositivo'])){
                    echo "<br>Modello: ".$row['dispositivo'];
                    }
                    
            }
        }
        mysqli_close($conn);
        ?>
        <br>
        <form action="controllaITicket.php" id="form" method="get">
            <label>Rispondi: </label>
            <br><br>
            <div id="error"></div>
            <textarea name="risposta" id="risposta" cols="50" rows="5" placeholder="Inserisci la possibile soluzione"></textarea>
            <br><br>
            <label>Inserisci il codice del ticket a cui vuoi rispndere</label>
            <br><br>
            <input type="number" name="id" id="id" placeholder="000">
            <br><br>
            <input type="submit" name="invia" value="Invia risposta">
            <br><br>
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