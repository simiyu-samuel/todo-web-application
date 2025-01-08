<?php
$conn = mysqli_connect("localhost", "root", "", "todo");
if(!$conn){
    die("Connection failed! " . mysqli_connect_error());
}