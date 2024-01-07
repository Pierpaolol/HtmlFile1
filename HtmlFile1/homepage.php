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
            <script defer src="js_script/homepage.js"></script>
          
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
    }

?>  <br>   
    <p>I tuoi ticket:</p>
        <?php
    include("database.php");
    $email=$_SESSION["email"];
    $sql = "SELECT * FROM ticket WHERE autore = '$email'";
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
            
                if(!empty($row['risposta'])){
                    echo "<br>Risposta dal nostro staff: ".$row['risposta'];
                    }
    }}
?> 
        <br><br>
        <form action="homepage.php" id="form" method="get">
        <p>Se è stato risolto uno dei tuoi ticket inserisci il codice ticket nel seguente campo e clicca sul tasto "Risolto"</p>
        <div id="error"></div>
        <input type="number" name='id' id='id' placeholder='000' >
        <input type="submit" name='risolto' id='risolto' value=Risolto>
        </form>
        <?php
            include("database.php");
            if(isset($_GET["id"]) && isset($_GET["risolto"])){
            $codiceID = $_GET["id"];
            $risolto = $_GET["risolto"];    
            $sql="UPDATE ticket SET risolto ='1' WHERE id='$codiceID';";
            $result = mysqli_query($conn, $sql);
            $sql="SELECT * FROM ticket WHERE id='$codiceID';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
                while($rows = mysqli_fetch_assoc($result)) {
                    echo "Grazie per la conferma ".$rows['risolto'];
                }
            }}mysqli_close($conn);
            ?>
            <br>
        <div style="text-align: justify-all;">
        <a href ="creaUnTicket.php"><p class="tasto">Crea Ticket</p></a>
        <a href = "ricercaProblemi.php"><p class="tasto">Cerca Ticket</p></a>
        </div>
        <br>
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
