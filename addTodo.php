<?php
require 'config.php';

if(isset($_POST['add_todo'])){
    $todo_content = mysqli_real_escape_string($conn, $_POST['todo']);

    $sql = "INSERT INTO todos (content) VALUES ('$todo_content')";
    $res = mysqli_query($conn, $sql);

    if($res){
        echo "
        <script>
            window.location.href = 'index.php';
        </script>";
    }else{
        echo "
        <script>
            alert('An error occured!!!');
            window.location.href = 'index.php';
        </script>";
    }
}