<?php
require 'config.php';

if(isset($_POST['delete'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "DELETE FROM todos WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);

    if($res){
        echo "<script>
                window.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "<script>
                alert('An error occured during deletion!');
                window.location.href = 'index.php';
            </script>
        "; 
    }
}