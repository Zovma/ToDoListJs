<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost:3305", "root", "27109Dbd", "todolist");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM list WHERE id = '$userid'";
    if($conn->query($sql)){
         
        header("Location: index.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
?>