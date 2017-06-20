<div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i> Danh mục sản phẩm</h3>
                            <?php showcatemenu($danhmuc) ?>
                            
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i> Sản phẩm mới </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach($sanphamnew as $item) :?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                                        <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                           <p class="name"><?php echo $item['tensanpham'] ?></p >
                                        <?php if($item['giamgia'] > 0) :?>
                                            <b class="sale"> Giá gốc :<?php echo formatprice($item['gia']) ?>đ</b><br>
                                            <b class="price"> Giá mới  : <?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</b><br>
                                        <?php else : ?>
                                             <b class="price"> Giá :<?php echo formatprice($item['gia']) ?>đ</b><br>
                                        <?php endif; ?>
                                            <!-- <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span> -->
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ; ?>
                                
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>


                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm HOT </h3> 
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach($sanphamhot as $item) :?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                                        <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['tensanpham'] ?></p >
                                        <?php if($item['giamgia'] > 0) :?>
                                            <b class="price"> Giảm giá :<?php echo formatprice($item['gia']) ?>đ</b><br>
                                            <b class="sale"> Giá gốc  : <?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</b><br>
                                        <?php else : ?>
                                             <b class="price"> Giá :<?php echo formatprice($item['gia']) ?>đ</b><br>
                                        <?php endif; ?>
                                            <!-- <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span> -->
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ; ?>
                                
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i> Mua Nhiều </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach($sanphambc as $item) :?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                                        <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['tensanpham'] ?></p >
                                        <?php if($item['giamgia'] > 0) :?>
                                            <b class="price"> Giảm giá :<?php echo formatprice($item['gia']) ?>đ</b><br>
                                            <b class="sale"> Giá gốc  : <?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</b><br>
                                        <?php else : ?>
                                             <b class="price"> Giá :<?php echo formatprice($item['gia']) ?>đ</b><br>
                                        <?php endif; ?>
                                            <!-- <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span> -->
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ; ?>
                                
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>

                    
                    </div>