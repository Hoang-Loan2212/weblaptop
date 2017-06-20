<div class="container-pluid">
                <section id="footer">
                    <div class="container">
                        <div class="col-md-3" id="shareicon">
                            <ul>
                                <li>
                                    <a href="<?php echo $info['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $info['facebook'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $info['facebook'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $info['youtobe'] ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8" id="title-block">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                
                            </div>
                        </div>
                       
                    </div>
                </section>
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-3" id="ft-about">
                                <a href="<?php echo base_url() ?>">
                                    <img src="<?php echo base_url() ?>public/logo.jpg" class="img img-responsive" width:"100px"; height:"100px";>
                                </a>
                                <p>
                                    <b style="margin-left: 40px;">LAPTOP Quang Vũ UY TÍN LÀ SỨC MẠNH</b>

                                </p>
                            </div>
                            <div class="col-md-3 box-footer" >
                                <h3 class="tittle-footer"></h3>
                                <ul>
                                    
                                </ul>
                            </div>
                            <div class="col-md-3 box-footer">
                                <h3 class="tittle-footer">Thông Tin</h3>
                               <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href="gioi-thieu.php"><i></i> Giới thiệu</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href="dia-chi.php"><i></i> Địa chỉ </a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="col-md-3" id="footer-support">
                                <h3 class="tittle-footer"> Liên hệ</h3>
                                <ul>
                                    <li>
                                        
                                        <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Số 176A Thái Hà - Đống Đa - Hà Nội </p>
                                        <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 8px;"></i>(04) 35720633 - (04) 62757151</p>
                                        <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> mayanhJP@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ft-bottom">
                    <p class="text-center">Copyright © 2017. </p>
                </section>
            </div>
        </div>      
    </div>
    <script  src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>

    </body>
        
</html>

<script type="text/javascript">
    // $(function() {
    //     $hidenitem = $(".hidenitem");
    //     $itemproduct = $(".item-product");
    //     $itemproduct.hover(function(){
    //         $(this).children(".hidenitem").show(100);
    //     },function(){
    //         $hidenitem.hide(500);
    //     })
    // })

    $url = $(location).attr("href");

    $updatecart = $(".update-cart");
    $updatecart.click(function(){
        $id = $(this).attr("data-idca");
        $qty = $(this).parents("tr").find("#qty").val();
        $.ajax({
            url:"cap-nhat.php",
            type:'post',
            data:({'id':$id,'qty':$qty}),
            
            async:true,
            success:function(data)
            {
                if(data == 1)
                {
                    alert('  Cập nhật thành công ! !!   !'); location.href='danh-sach-gio-hang.php';
                }
                else
                {
                    alert(" Cập  nhật thất bại ");location.href='danh-sach-gio-hang.php';
                }

            }
        });
    })
</script>