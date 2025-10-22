<?php
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
?>