<?php
include("database.php");
function ricercaRDA($ricerca, $dispositivo, $autore){  
    $conn = mysqli_connect("localhost", "root", "", "database1");  
    $sql = "SELECT * FROM ticket WHERE oggetto = '$ricerca' && dispositivo = '$dispositivo' && autore = '$autore';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        while($row = mysqli_fetch_array($result)) {
            return " ".$row['oggetto']."<br>".$row['descrizione']."<br>"."Autore: ".$row["autore"];
        }            
    }else{return "<br>"."Nessun risultato.";}
    mysqli_close($conn);
}
function ricercaDA($dispositivo, $autore){
    $conn = mysqli_connect("localhost", "root", "", "database1");
    $sql = "SELECT * FROM ticket WHERE dispositivo = '$dispositivo' && autore = '$autore'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        while($row = mysqli_fetch_array($result)) {
            return " ".$row['oggetto']."<br>".$row['descrizione']."<br>"."Autore: ".$row["autore"];
        }            
    }else{return "<br>"."Nessun risultato.";}
    mysqli_close($conn);
}
function ricercaRA($ricerca,$autore){
    $conn = mysqli_connect("localhost", "root", "", "database1");
    $sql = "SELECT * FROM ticket WHERE oggetto = '$ricerca' && autore = '$autore'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        while($row = mysqli_fetch_array($result)) {
            return " ".$row['oggetto']."<br>".$row['descrizione']."<br>"."Autore: ".$row["autore"];
        }            
    }else{return "<br>"."Nessun risultato.";}
    mysqli_close($conn);
}
function ricercaRD($ricerca, $dispositivo){
    $conn = mysqli_connect("localhost", "root", "", "database1");
    $sql = "SELECT * FROM ticket WHERE oggetto = '$ricerca' && dispositivo = '$dispositivo';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        while($row = mysqli_fetch_array($result)) {
            return " ".$row['oggetto']."<br>".$row['descrizione']."<br>"."Autore: ".$row["autore"];
        }            
    }else{return "<br>"."Nessun risultato.";}
    mysqli_close($conn);
}
function ricercaR($ricerca){
    $conn = mysqli_connect("localhost", "root", "", "database1");
    $sql = "SELECT * FROM ticket WHERE oggetto = '$ricerca'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        while($row = mysqli_fetch_array($result)) {
            return " ".$row['oggetto']."<br>".$row['descrizione']."<br>"."Autore: ".$row["autore"];
        }            
    }else{return "<br>"."Nessun risultato.";}
    mysqli_close($conn);
}
function ricercaD($dispositivo){
    $conn = mysqli_connect("localhost", "root", "", "database1");
    $sql = "SELECT * FROM ticket WHERE dispositivo = '$dispositivo'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        while($row = mysqli_fetch_array($result)) {
            return " ".$row['oggetto']."<br>".$row['descrizione']."<br>"."Autore: ".$row["autore"];
        }            
    }else{return "<br>"."Nessun risultato.";}
    mysqli_close($conn);
}
function ricercaA($autore){
    $conn = mysqli_connect("localhost", "root", "", "database1");
    $sql = "SELECT * FROM ticket WHERE autore = '$autore'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
    while($row = mysqli_fetch_array($result)) {
        return " ".$row['oggetto']."<br>".$row['descrizione']."<br>"."Autore: ".$row["autore"];
    }            
    }else{return "<br>"."Nessun risultato.";}
    mysqli_close($conn);
}
?>
