<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    $navactive = "gioi-thieu.php";
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a><span class="divider"></span></li>
                   
                    <li class="active"> Giới thiệu </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor" style="padding: 10px;">
                <section>
                  
                    <div class="col-md-12">
                        <ul>
                            <p style="font-size: 13px; line-height: 20px; padding-bottom:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mayanh JP chuyên cung cấp các sản phẩm điện tử với những dòng chính: Máy ảnh kỹ thuật số và các phụ kiện liên quan đến ngành ảnh.
 
Với mong muốn đáp ứng nhu cầu sử dụng các sản phẩm công nghệ mới nhất, đẹp nhất, tiên tiến nhất, Mayanh JP liên tục cập nhật sản phẩm của mình từ nước ngoài về. Chính vì thế, khi đến với chúng tôi, quý khách sẽ luôn được chiêm ngưỡng những sản phẩm công nghệ sành điệu và tính năng độc đáo. Ngoài ra, chế độ bảo hành dài hạn cũng như việc chăm sóc khách hàng chu đáo của chúng tôi sẽ khiến bạn hài lòng hơn khi mua hoặc có như cầu tư vấn sửa chữa hàng hóa.
Mayanh JP không hề ngần ngại đưa sản phẩm đến tận nhà nếu quý khách có nhu cầu. Đồng thời, công ty chúng tôi sẵn sàng trở thành nhà cung cấp cho các đại lý, cửa khác khác với giá cả rất hợp lý.</p>
                            <p style="font-size: 13px; line-height: 20px; padding-bottom:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Liên hệ:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Địa chỉ: 176A Thái Hà - Đống Đa - Hà Nội<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Điện thoại: (04) 35 720 633 - (04) 62 757 151 - (04) 35 379 594<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Email: mayanhjp@yahoo.com<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Tài khoản ngân hàng:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngân hàng Ngoại thương Việt Nam (Vietcombank) chi nhánh Thành Công<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chủ tài khoản: Hoàng Thiên Nga<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số tài khoản: 0451001874264<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giờ mở cửa: 8h30 sáng - 20h00 tối hàng ngày, kể cả thứ bảy và chủ nhật<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Để phục vụ khách hàng tốt hơn, chuyên nghiệp hơn, MayanhJP rất mong muốn nhận được góp ý về dịch vụ bán hàng và sau bán hàng từ quí khách.</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Xin cảm ơn quý khách</b></p>
                            

                        </ul>
                    </div>
                </section>
                <!-- <a href="tin-tuc.php" class="btn btn-xs btn-danger" style="margin: 20px;">Tin khác</a> -->
            </div>
        </div>

        <div class="container" style="margin-top: 20px">
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
            </div>
        </div>
      <?php  require_once __DIR__ . "/include/footer.php"; ?>