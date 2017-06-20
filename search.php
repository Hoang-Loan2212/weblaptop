<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

    

    $sql = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc FROM sanpham 
         LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
         WHERE 1 " ;

 

    if(isset($_GET['keyword']) && $_GET['keyword'] != NULL)
    {
        $keyword = $_GET['keyword'];
        $sql .= " AND tensanpham LIKE  '%$keyword%' ";
    }
    $sql .= "LIMIT 10";
    $kqtk =  $db->fetchsql($sql);
    // _debug($kqtk);
    
?>  



    <?php if(isset($kqtk)  && count($kqtk) > 0):?>
         <ul>
            <?php foreach($kqtk as $item) :?>
                <li onClick="selectCountry('<?php echo $item["name"]; ?>');"><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>" title=""><?php echo $item["tensanpham"]; ?></a></li>
            <?php endforeach ; ?>
        </ul>
    <?php else : ?>
        không có dữ liệu
    <?php endif ; ?>