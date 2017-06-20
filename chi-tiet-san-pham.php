<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

    
    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $id = intval($id);
    }

    $sanpham = $db->fetchID('sanpham',$id);
    
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a><span class="divider"></span></li>
                    <li><a >Sản phẩm </a><span class="divider"></span></li>
                    <li><a > Chi tiết sản phẩm </a><span class="divider"></span></li>
                    <li class="active"><span> <?php echo $sanpham['slug'] ?> </span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor">
                
               <section class="box-main1" >
                    <div class="col-md-6 text-center">
                        <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370">
                        
                       
                    </div>
                    <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                       <ul id="right">
                            <li><h3> <?php echo $sanpham['tensanpham']; ?> </h3></li>
                            <li><p> Khuyến mãi </p></li>

                            
                                 <?php  if($sanpham['giamgia'] > 0) :?>
                                       <li> <p>Giá gốc <strike class="sale"><?php echo formatprice($sanpham['gia']) ?>đ </strike> </li>
                                       <li>Giá mới <b class="price"><?php echo formatprice($sanpham['gia'] * (100 - $sanpham['giamgia'])/100) ?> đ</b></p></li>
                                    <?php else : ?>
                                        <li><p>Giá sản phẩm <b class="price"><?php echo formatprice($sanpham['gia']) ?> đ</b></p></li>
                                    <?php endif ; ?>
                            
                                   
                            <li><a href="them-gio-hang.php?id=<?php echo $sanpham['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng </a></li>
                       </ul>
                    </div>

                </section>
                <div class="col-md-12" id="tabdetail">
                    <div class="row">
                            
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                            <li><a data-toggle="tab" href="#menu1"> Nội dung bình luận  </a></li>
                            
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>Nội dung</h3>
                                <p style="padding: 10px;">
                                    <?php echo $sanpham['mota'] ?>
                                </p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3> Thông tin khác </h3>
                                <div class="fb-comments" data-href="https://www.facebook.com/nghuuhai18" data-numposts="5" width="100%"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

      <?php  require_once __DIR__ . "/include/footer.php"; ?>