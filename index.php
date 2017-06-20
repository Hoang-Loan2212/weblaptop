<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    // session_destroy();
   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    <div id="maincontent"  >
        <div class="container" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor">
                <section id="slide" class="text-center" >
                    <div class="w3-content w3-display-container">
                        <img class="mySlides" src="<?php echo base_url() ?>public/frontend/images/slide/laptop-bg.jpg" style="width:100%">
                        <img class="mySlides" src="<?php echo base_url() ?>public/frontend/images/slide/sl3.jpg" style="width:100%">
                        
                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                </section>

                <section class="box-main1">
                    <h3 class="title-main"><a href=""> Danh sách sản  phẩm </a> </h3>
                    
                    <div class="showitem">
                        <?php foreach($sanpham as $item) :?>
                            <div class="col-md-3 item-product bor">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>">
                                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" class="" width="100%" height="180" title=<?php echo $item['tensanpham'] ?>>
                                </a>
                                <div class="info-item">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"><?php echo $item['tensanpham'] ?></a>

                                    <?php  if($item['giamgia'] > 0) :?>
                                        <p>Giá cũ <strike class="sale"><?php echo formatprice($item['gia']) ?>đ</strike> </p>
                                        <p> Giá mới <b class="price"><?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</b></p>
                                    <?php else : ?>
                                        <p><b class="price"><?php echo formatprice($item['gia']) ?> đ</b></p>
                                    <?php endif ; ?>
                                    
                                </div>
                               

                                 <div class="hidenitem">
                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>" title="Chi tiết sản phẩm "><i class="fa fa-search"></i></a></p>
                                    <p><a href="" title="Thêm vào sản phẩm yêu thích "><i class="fa fa-heart"></i></a></p>
                                    <p><a href="them-gio-hang.php?id=<?php echo $item['id'] ?>" title="Thêm vào giỏ hàng "><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                    </div>
                </section>

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

<!--       <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script> -->

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>