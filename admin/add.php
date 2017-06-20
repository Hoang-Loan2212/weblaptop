<?php

    /**
     * gọi file autoload
     */
    include __DIR__ ."/../../autoload/autoload.php";

   
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
                        <a href="index.php" ><i> Sản phẩm </i></a>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>
              <?php include __DIR__ ."/../../layouts/notification.php"; ?>
             <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Thêm mới sản phẩm 
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action="" enctype="multipart/form-data">
                       
                        <div class="form-body ">
                            <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left bor" novalidate="" enctype="multipart/form-data">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Price <span class="required">(*)</span> </label>
                                    <div class="col-md-8">
                                        <input type="number" id="first-name" name="price" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Sale </label>
                                    <div class="col-md-8">
                                        <input type="text" id="first-name" name="sale" class="form-control" value="0">
                                    </div>
                                </div>

                                <div class="col-md-12 border-cus" style="padding-right: 10px">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-11" >
                                            <i class="fa fa-file-image-o"></i> Ảnh đại diện
                                            <input type="file" accept="image/*" name="thunbar" onchange="loadFileThunbar(event)" class="col-md-12">
                                           
                                        </label>
                                        
                                    </div>
                                    <img  class="outputthunbar" class="col-md-12" width="105%" height="150" />                                   
                                </div>
                            </div>
                            <div class="col-md-9 bor">

                                <div class="form-group">
                                    <label class="control-label col-md-2"> Category  <span class="required">(*)</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category_id">
                                            <option value=""> Mời bạn chọn danh mục </option>
                                                                                
                                        </select>
                                      
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Name <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control col-md-7 col-xs-12" value="">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Number <span class="required">(*)</span></label>
                                    <div class="col-md-5">
                                       <input type="number" name="number" value="" class="form-control">
                                      
                                    </div>

                                    <label class="control-label col-md-1" for="first-name"> Hot </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="hot">
                                            <option value="0"> No </option>
                                            <option value="1"> Yes </option>
                                        </select>
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Description <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="description"></textarea>
                                       
                                    </div>
                                </div>

                               
                                    
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                           
                        </form>
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