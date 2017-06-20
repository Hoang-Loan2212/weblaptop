<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";


    unset($_SESSION['auth_name']);
    unset($_SESSION['auth_level']);
    unset($_SESSION['auth_id']);

    $path = $_SERVER['HTTP_REFERER'];
    header("location: ".$path);exit();