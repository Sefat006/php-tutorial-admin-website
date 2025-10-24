<?php session_start();
    require_once "./database.php";
    function get_header(){
        require_once __DIR__ . '/../Add-Components/header.php';
    }

    function get_sidebar(){
        require_once __DIR__ . '/../Add-Components/sidebar.php';
    }

    function get_footer(){
        require_once __DIR__ . '/../Add-Components/footer.php';
    }

    function LoggedID(){
        return $_SESSION['id'] ? true : false;
    }

    function needLogged(){
        $check = LoggedID();
        if(!$check){
            header("Location: login.php");
        }
    }
?>