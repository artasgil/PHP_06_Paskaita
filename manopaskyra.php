<?php 

header("Location: index.php");

if(isset($_COOKIE['prisijungti']) && isset($_COOKIE['teises'])){
    echo "Sveikas atvykes, ". $_COOKIE['prisijungti'];
} else {
    echo "Labas";
}







?>