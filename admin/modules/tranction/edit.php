<?php

    /**
     * gọi file autoload
     */
    include __DIR__ ."/../../autoload/autoload.php";

   /**
    *  xử lý
    */
    $open = "dh";
    $active = "";
   
    if (isset($_GET['id']) && $_GET['id']  != '')
    {
        $id = intval($_GET['id']);
    }
    else
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("transaction");
    }

    $donhang = $db->fetchID("donhang", $id) ;

    if ( ! $donhang)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("tranction");
    } 

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        $ten = postInput("ten");
        $diachi        = postInput("diachi");
        
        $sodienthoai = postInput("sodienthoai");
        $email        = postInput("email");
    


        if ($ten == '')
        {
            $error['ten'] = " Tên nhà cung cấp  không được để trống !";
        }

        if ($diachi == '')
        {
            $error['diachi'] = " Địa chỉ không được để trống !";
        }

        if ($sodienthoai == '')
        {
            $error['sodienthoai'] = "Số điện thoại  không được để trống !";
        }

        if ($email == '')
        {
            $error['email'] = "Email không được để trống !";
        }


        if( empty($error))
        {
            $data = [
                'ten' => $ten,
                'sodienthoai' => $sodienthoai,
                'diachi'        => $diachi,
                'email'    => $email
            ];

            $id_update = $db->update("donhang" , $data , array('id' => $id));   
           
            $_SESSION['success'] = ' Cập nhật thành công  ';
            redirectAdmin('tranction');
        }
    }
?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../../layouts/header.php";
 ?>
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
                        <a href="index.php" ><i> Nhà cung cấp </i></a>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>
              <?php include __DIR__ ."/../../layouts/notification.php"; ?>
             <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Cập nhật 
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action="" enctype="multipart/form-data">
                       
                        <div class="form-body ">
                            <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left bor" novalidate="" enctype="multipart/form-data">
                            
                            <div class="col-md-12 bor" style="padding-top: 20px;">

                               

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Tên  <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="ten" class="form-control col-md-7 col-xs-12" value="<?php echo isset($donhang) ? $donhang['ten'] : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Địa chỉ <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="diachi" class="form-control col-md-7 col-xs-12" value="<?php echo isset($donhang) ? $donhang['diachi'] : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Sô điện thoại <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="sodienthoai" class="form-control col-md-7 col-xs-12" value="<?php echo isset($donhang) ? $donhang['sodienthoai'] : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Email <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo isset($donhang) ? $donhang['email'] : '' ?>">
                                    </div>
                                </div>
                                    
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                           
                      
                        </div>
                        <div class="form-actions right">
                            <button type="submit" class="btn green">Lưu</button>
                        </div>
                    </form>
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