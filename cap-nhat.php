<?php
    require_once __DIR__ . "/autoload/autoload.php";

    /**
     *  xử lý giỏ hàng
     */
  

    if(isset($_POST['id']) && $_POST['id'] != '')
    {
        $id = $_POST['id'];
        $id = intval($id);
    }
     $id = $_POST['id'];

    if(isset($_POST['qty']) && $_POST['qty'] != '')
    {
        $qty = $_POST['qty'];
        $qty = intval($qty);
    }
    
    $flag = 1;

    $product = $db->fetchID('sanpham',$id);
    if($product['soluong'] < $qty)
    {
    	$flag = 0;
    }
    else
    {
    	$_SESSION['cart'][$id]['qty'] = $qty;
    }
    

    echo $flag;
?>