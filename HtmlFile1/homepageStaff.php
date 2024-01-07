<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="js_script/main.js"></script>
        <meta charset="UTF-8">
        <meta name="author" content="Pietro Paolo Buonomo">
            <title>
                D.I.C.E.
            </title>
            <link rel="icon" href="240.png" type="image/x-icon">
            <link rel="stylesheet" href="main.css" type="text/css">    
    </head>
    <body> <header>
        <div align="center">
        <!-- Aggiungere stile in main.css-->
        <a href="homepageStaff.php" style="text-decoration: none; color: whitesmoke;"><h1>D.I.C.E.</h1></a>
        </div>
    </header>
    <main>
        <h2>Benvenuto</h2>
        <br>
        <?php
    include("database.php");

    $id=$_SESSION["id"];
    $sql = "SELECT nomeStaff, cognomeStaff FROM staff WHERE id = '$id'";
    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);

    if ($resultCheck > 0) {
        while( $row = mysqli_fetch_assoc($results) ) {
            echo " ".$row['nomeStaff']. " ".$row['cognomeStaff'];
        }
    }
?>
        <p>Cosa vuoi fare?</p>
        <div style="text-align: justify-all;">
        <a href="controllaITicket.php"><p class="tasto">Controlla i ticket</p></a>
        <a href="cercaITicket.php"><p class="tasto">Cerca i ticket</p></a>
        </div>
        <br>
        <form action="homepageStaff.php" method="get">
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
</html>