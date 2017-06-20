<?php

    /**
     * gọi file autoload
     */
    session_start();
    require_once __DIR__ . "/../libraries/Database.php";
    require_once __DIR__ . "/../libraries/Function.php";

    $db = new Database();
    /**
     * danh sách danh mục
     */
    $danhmuc = $db->fetchAll('danhmuc');
     define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/weblaptop/public/uploads/");
    /**
     * sắp xếp
     * @var integer
     */
    recursive($danhmuc , $parents = 0 , $level = 1 , $danhmucsort);

     $sqlsp = "SELECT * FROM sanpham WHERE 1 ORDER BY id DESC LIMIT 12 ";
    $sanpham = $db->fetchsql($sqlsp);

    /**
     * sản phẩm hót
     */
    
    $sqlhot = "SELECT * FROM sanpham WHERE hot = 1 ORDER BY id DESC LIMIT 3  ";
    $sanphamhot = $db->fetchsql($sqlhot);

      /** sản phẩm mới
     */
    
    $sqlnew = "SELECT * FROM sanpham WHERE 1 ORDER BY id DESC LIMIT 3  ";
    $sanphamnew = $db->fetchsql($sqlnew);

    $tongsanphamgiohang = 0;
    if(isset($_SESSION['cart']))
    {
        $tongsanphamgiohang = count($_SESSION['cart']);
    }

    /**
     *  sản phẩm bán chạy
     */
    
    $sqlbc = "SELECT * FROM sanpham WHERE 1 ORDER BY pay DESC LIMIT 3 ";
    $sanphambc = $db->fetchsql($sqlbc);




    /**
     * show menu
     */
    
    $menu = $db->fetchAll('menu');
?>  