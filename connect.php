<?php
$conn=mysqli_connect("localhost","root","","mym");
        if(!$conn){
            die("sorry failed to connect :". mysqli_connect_error());
        }
?>