<?php

    /**
     * gọi file autoload
     */
    
    include __DIR__ ."/../../autoload/autoload.php";

    /**
     *  lấy id url
     */
    
    if (isset($_GET['id']) && $_GET['id']  != '')
    {
        $id = intval($_GET['id']);
    }
    else
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("producer");
    }

    $producerEdit = $db->fetchID("nhacungcap", $id) ;

    if ( ! $producerEdit)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("producer");
    }




    $product = "SELECT * FROM sanpham WHERE nhacungcap_id = $id";
    $productDE =  $db->fetchsql($product);
    if (count($productDE) > 0)
    {
        $_SESSION['error'] = '  Không thể xóa danh mục này vì nó chứa dữ liệu kèm theo !!! ';
        redirectAdmin("producer");
    }

    



    $num = $db->delete('nhacungcap', $id);

    if ($num > 0)
    {
        $_SESSION['success'] = ' Xóa Thành Công ';
        redirectAdmin("producer");
    }
    else
    {
        $_SESSION['error'] = " Xóa Thất Bại";
        redirectAdmin("producer");
    }

 ?>