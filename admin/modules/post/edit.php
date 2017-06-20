<?php

    /**
     * gọi file autoload
     */
    include __DIR__ ."/../../autoload/autoload.php";

    /**
     *  lấy id url
     */
     $open = "dm";
    $active = "post";
    if (isset($_GET['id']) && $_GET['id']  != '')
    {
        $id = intval($_GET['id']);
    }
    else
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("post");
    }

    $tintuc = $db->fetchID("tintuc", $id) ;

    if ( ! $tintuc)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("post");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $tieude         = postInput("tieude");
        $noidung        = postInput("noidung");

        if ($tieude == '')
        {
            $error['tieude'] = " Tiêu đề  không được để trống !";
        }

        if ($noidung == '')
        {
            $error['noidung'] = "Nội dung không được để trống !";
        }


        if( empty($error))
        {
            $data = [
                'tieude'     => $tieude,
                'slug'       => to_slug($tieude),
                'noidung'    => $noidung
            ];

            /**
             * upload file 
             */
            if ( isset($_FILES['hinhanh']))
            {
               $file_name = $_FILES['hinhanh']['name'];
               $file_tmp  = $_FILES['hinhanh']['tmp_name'];
               $file_type = $_FILES['hinhanh']['type'];
               $file_erro = $_FILES['hinhanh']['error'];

               if ($file_erro == 0)
               {
                    $part = ROOT ."post/";
                    $data['hinhanh'] = $file_name;
                    move_uploaded_file($file_tmp,$part.$file_name);
               }
            }

            // tiến hành insert
            $id_update = $db->update("tintuc", $data ,array("id" => $id));   
            if($id_update)
            {
                $_SESSION['success'] = ' Cập nhật Thành Công ';
                redirectAdmin("post");
            }
            else
            {
                $_SESSION['error'] = 'Cập nhật Thất Bại ';
                redirectAdmin('post');
            }
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
                        <a href="index.php" ><i> Bài viết  </i></a>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>
              <?php include __DIR__ ."/../../layouts/notification.php"; ?>
             <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Thêm mới 
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action="" enctype="multipart/form-data">
                       
                        <div class="form-body ">
                            <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left bor" novalidate="" enctype="multipart/form-data">
                            <div class="col-md-3">
                                <div class="col-md-12 border-cus" style="padding-right: 10px">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-11" >
                                            <i class="fa fa-file-image-o"></i> Ảnh đại diện
                                            <input type="file" accept="image/*" name="hinhanh" onchange="loadFileThunbar(event)" class="col-md-12">
                                           
                                        </label>
                                        
                                    </div>
                                    <img  class="outputthunbar" class="col-md-12" width="105%" height="150" />
                                    <?php if($tintuc['hinhanh'] != NULL) :?>
                                        <img  src="<?php echo base_url() ?>public/uploads/post/<?php echo $tintuc['hinhanh'] ?>" class="col-md-12" width="105%" height="150" />
                                    <?php endif ; ?>                                  
                                </div>
                            </div>
                            <div class="col-md-9 bor">
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Tiêu đề <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="tieude" class="form-control col-md-7 col-xs-12" value="<?php echo $tintuc['tieude'] ?>">
                                       
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Nội dung <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                         <textarea name="noidung" id="content" class="form-control" rows="10"><?php echo (isset($tintuc['noidung']) ? $tintuc['noidung'] : '') ?></textarea>
                                        <?php if (isset($error['noidung'])) : ?>
                                            <p class="text-danger"> <?php echo $error['noidung']; ?> </p>
                                        <?php endif; ?>
                                        <script>
                                            CKEDITOR.replace('content');
                                        </script>                                                        
                                    </div>
                                </div>
                                    
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                            <div class="form-actions right">
                                <button type="submit" class="btn green">Lưu</button>
                            </div>                        
                        </form>
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