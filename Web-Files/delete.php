<?php 
    require_once "../Function/function.php";

    $id = $_GET['d'];
    $delete = "DELETE FROM users WHERE user_id='$id'";

    if(mysqli_query($connect, $delete)){
        header("Location: all-user.php");
    }else{
        echo "Data isn't Deleted";
    }
?>