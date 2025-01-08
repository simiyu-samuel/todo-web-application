<?php
require 'config.php';

if(isset($_POST['clear'])){
    $sql = "DELETE FROM todos";
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