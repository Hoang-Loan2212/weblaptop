<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    if ( ! isset($_SESSION['cart']))
    {
        echo " <script>alert('  Chưa có sản phẩm trong giỏ hàng   !'); location.href='index.php';</script>";
    }
    $sum = 0;
   
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name    = postInput("name");
        $email   = postInput("email");
        $phone   = postInput("phone");
        $address = postInput("address");
        $comment = postInput("comment");


        $data = [
            'ten'         => $name,
            'sodienthoai' => $phone,
            'diachi'      => $address,
            'email'       => $email,
            'tongtien'    => $_SESSION['tongtien'],
            'noidung'     => $comment
        ];
   
        // tiến hành insert
         $id_instart = $db->insert("donhang",$data);
        if((isset($_SESSION['cart'])) && count($_SESSION['cart']) > 0)
        {
            foreach( $_SESSION['cart'] as $m => $l)
            {
                $data2 = [
                    'sanpham_id' => $m,
                    'donhang_id' => $id_instart,
                    'soluong'    => $l['qty'],
                    'gia'        => $l['gia'],
                    'hinhanh'    => $l['hinhanh']
                ];
                $id_instart2 = $db->insert("chitietdonhang",$data2);
                
            }
            $_SESSION['kh_name']  = $data['ten'];
            $_SESSION['kh_phone'] = $data['sodienthoai'];
            $_SESSION['kh_email'] = $data['email'];
            unset($_SESSION['cart']);
            // unset($_SESSION['tongtien']);
            $_SESSION['success'] = ' Mua hàng thành công ! Vui lòng đợi bộ phân thanh toán xác nhận  ' ;
            redirectStyle('thong-bao-thanh-toan.php');

        }  
    }
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a><span class="divider"></span></li>
                    <li class="active"><span> Giỏ hàng </span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor">
                <section class="box-main1">
                    <h3 class="title-main"><a href=""> Giỏ hàng của bạn </a> </h3>
                    
                    <div class="showitem">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Id</th>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Số Lượng</th>
                                    <th>Tiền</th>
                                    <th>Tổng tiền</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1 ;foreach($_SESSION['cart'] as $key => $val ): ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $val['tensanpham'] ?></td>
                                    <td>
                                        <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $val['hinhanh'] ?>" class="" with="30px" height="30px">
                                    </td>
                                    <td>
                                        <input type="number" name="qty" min="0" max="10" value="<?php echo $val['qty']; ?>" id="qty" style="width: 70px" class="form-control">
                                    </td>
                                    <td><?php echo $val['gia']; ?></td>
                                    <td>
                                        <?php echo $val['gia'] * $val['qty']; ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-info update-cart" data-idca="<?php echo $key ?>"><i class="fa fa-spinner" style="color: white"></i></a>
                                        <a  href="remove-cart.php?id=<?php echo $key ?>" class="btn  btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không? ')"; > <i class="fa fa-times" style="color: white"></i></a>
                                    </td>
                                    
                                </tr>
                                <?php $sum += $val['gia'] * $val['qty'] ?>
                            <?php $stt++;  endforeach ;$_SESSION['tongtien'] = $sum; ?>
                            <tr class="text-right">

                                <td colspan="7">
                                    <h3>Tổng tiền : <a href="" class="btn btn-info"><?php echo formatprice($sum) ?> đ</a></h3>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section>
                    <div class="col-md-12" style="padding-bottom: 20px">
                        <div class="col-md-6" id="dienthongtin">
                            <form action="" method="POST">
                            <h3> Mời bạn điền thông tin thanh toán </h3>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" required="required" value="">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Mời bạn nhập tên" required="" value="">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input id="name" type="number" class="form-control" name="phone" placeholder="Mời bạn nhập số điện thoại" required="" value="">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                    <input id="name" type="text" class="form-control" name="address" placeholder="Mời bạn nhập địa chỉ" required="" value="">
                                </div>
                                <div class="input-group">
                                    <textarea class="form-control" name="comment" placeholder="Ghi chú" rows="2" cols="100"></textarea>
                                </div>
                                <div class="input-group">
                                    <input type="submit" name="" value="Xác nhận thông tin " class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3> Hình thức thanh toán </h3>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="padding-top: 10px">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                                        Chuyển khoản qua ngân hàng
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="height: 0px;">
                                    <div class="panel-body">
                                        Quý khách vui lòng chuyển tiền vào STK: 711A72507332 của chúng tôi. Chúng tôi sẽ gửi sản phẩm trong thời gian ngắn nhất tới bạn!
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       Thanh toán khi giao hàng
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        Quý khách vui lòng thanh toán đầy đủ giá thành của sản phẩm khi nhân viên của chúng tôi giao hàng tới nhà.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Kiểm tra trước khi nhận hàng
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        Quý khách vui lòng kiểm tra sản phẩm trước khi nhận hàng và thanh toán đầy đủ giá của sản phẩm
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>

      <?php  require_once __DIR__ . "/include/footer.php"; ?>