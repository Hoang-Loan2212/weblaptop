<?php

    /**
     * gọi file autoload
     */
    $open = "warehouse";
    $active = "selling";
    $titleGlobal = "  Danh sách các sản phẩm bán chạy";
    include __DIR__ ."/../../autoload/autoload.php";


    /**
     *  lấy danh sách danh mục 
     */
    $sql = "SELECT product.* , category.name as namecate , guarantee.name as name_baohanh , guarantee.text as text_bh , promotions.name as name_km ,promotions.text as text_km , units.name as name_dv FROM product 
        LEFT JOIN category ON category.id = product.category_id
        LEFT JOIN guarantee ON guarantee.id = product.guarantee_id 
        LEFT JOIN promotions ON promotions.id = product.promotion_id 
        LEFT JOIN units ON units.id = product.units_id
        WHERE 1 AND pay > 1 ORDER BY pay DESC
    ";

    $product = $db->fetchsql($sql);

?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../../layouts/header.php";
 ?>
 <link href="<?php echo public_admin() ?>css/dataTables.bootstrap.min.css" id="style_components" rel="stylesheet" type="text/css"/>
     <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_admin() ?>">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                   
                    <li>
                        <i> Quản lý admin  </i>
                    </li>
                </ul>
                
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                        Thao tác <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                
                                <a href="add.php"> <i class="fa fa-plus"></i> Thêm</a>
                            </li>
                            <li>
                                
                                <a href="javascript:;void(0)"  class="confirmation deletealladmin_na"> <i class="fa fa-trash-o"></i> Xóa mục đã chọn </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../../partials/notification.php"; ?>

            <div class="notification">
                
            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Danh sách sản phẩm
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th> <input type="checkbox" name="" id="checkall" > All</th>                                    
                                    <th> Danh mục </th>
                                    <th> hình ảnh </th>
                                    <th> Thông tin </th>
                                    <th> Thông tin khác </th>
                            
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($product as $item) :?>
                                <tr style="<?php echo ($item['id'] == $_SESSION['admin_na_id']) ? 'color:red;font-weight: bold' : ''?>">
                                   <td><input type="checkbox" name="checkid[]" class="checkone" value="<?php echo $item['id'] ?>"></td>
                                  
                                   
                                   <td> <?php echo $item['namecate'] ?> </td>
                                   <td> 
                                        <?php if($item['thunbar'] != NULL ) :?>
                                            <a href="deleteimg.php?id=<?php echo $item['id'] ?>" title="">
                                                <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" alt="" height="50" width="50">
                                            </a>
                                        <?php endif ; ?>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                Chế độ bảo hành :  <a data-toggle="tooltip" title="<?php echo strip_tags($item['text_bh']) ?>"><?php echo $item['name_baohanh'] ?></a>
                                            </li>
                                            <li> 
                                                Khuyến mãi : 
                                                <a data-toggle="tooltip" title="<?php echo strip_tags($item['text_km']) ?>"><?php echo $item['name_km'] ?></a>
                                            </li>
                                           
                                            <li>
                                                Số lượng : <?php echo $item['number'] ?><?php echo $item['name_dv'] ?>
                                            </li>
                                            <li>
                                                <a  class="btn btn-info btn-xs" data-toggle="tooltip" title="<?php echo strip_tags($item['notes']) ?>">Chi tiết số lượng </a>
                                            </li>
                                            <li style="padding-top: 5px;"> Hót
                                                <?php if($item['hot'] == 0) :?>
                                                     <a  href="hot.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs green"><i class="fa fa-check"></i> Có </a>
                                               <?php else : ?>
                                                 <a  href="hot.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs red"><i class="fa fa-ban"></i> Không  </a>
                                               <?php endif ; ?>
                                            </li>
                                        </ul>
                                    </td>
                                   <td>
                                       
                                       <ul>
                                           <li>
                                               Trạng thái : 
                                                <?php if($item['active'] == 1) :?>
                                                     <a  href="active.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs green"><i class="fa fa-check"></i> Hiển thị</a>
                                               <?php else : ?>
                                                 <a  href="active.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs red"><i class="fa fa-ban"></i> Ẩn </a>
                                               <?php endif ; ?>
                                           </li>
                                           <li>
                                               Tình Trạng : con hàng 
                                           </li>
                                           <li>
                                               Ảnh kèm theo : <a href="addimg.php?id=<?php echo $item['id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-plus"></i></a>
                                           </li>
                                           <li>
                                               Giá nhập: <?php echo formatprice($item['inputprice']) ?> đ
                                           </li>
                                            <li>
                                               Giá bán : <?php echo formatprice($item['price']) ?> đ
                                           </li>
                                       </ul>
                                   </td>
                                
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                            <div class="modal fade" id="viewdetailproduct" role="dialog">
                                
                            </div>
                        </table>
                    </div>
                </div>


            </div>
           
           
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/../../layouts/footer.php";
 ?>