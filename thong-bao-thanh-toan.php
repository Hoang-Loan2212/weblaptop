<?php
     require_once __DIR__ . "/autoload/autoload.php";



?>


<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> In Hóa Đơn</title>
        <link rel="stylesheet" href="">
        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <style type="text/css" media="screen">
            body
            {
                font-size: 20px;
            }
        </style>
    </head>
    <body onload="window.print();">
       <div class="container" style="padding-top: 50px;"  >
            <div><a href="/weblaptop" title=""><img src="/weblaptop/public/logo.jpg" alt="bat dong san" max-width="192" height="80"></a> <h3 class="pull-right"> Đồ Án Tốt Nghiệp </h3></div>
            <h3 class="text-center" style="font-size: 40px;">HÓA ĐƠN THANH TOÁN </h3>
        <table class="table table-hover col-md-12" border="1" style="margin: 50px auto">
            <thead >
                <tr >
                    <th class="text-center">Stt</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Số điện thoại</th>
                    <th class="text-center">Số tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center"> <?php echo $_SESSION['kh_name'] ?></td>
                    <td class="text-center"> <?php echo $_SESSION['kh_email'] ?></td>
                    <td class="text-center"> <?php echo $_SESSION['kh_phone'] ?></td>
                    <td class="text-center"> <?php echo number_format($_SESSION['tongtien'],0,',','.') ?> vnđ</td>
                </tr>
                <tr> 
                    <td colspan ="5">
                        <div class="pull-right">
                            <h3>Tổng cộng  : <button type="button" class="btn btn-default"><b><?php echo number_format($_SESSION['tongtien'],0,',','.') ?></b> vnđ</button></h3>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
        <div>
        <div class="clearfix"></div>
            <div class="pull-left">
                <h4><?php echo " Hà Nội : " . date("d - m - Y H:i:s"); ?></h4>
                <h3 style="margin-left: 90px;">Khach Hàng</h3>
                <p style="padding-top: 60px;margin-left: 70px"> <b><?php echo $_SESSION['kh_name'] ?></b> </p>
            </div>

            <div class="pull-right clearfix">
                <h4><?php echo " Hà Nội : " . date("d - m - Y H:i:s"); ?></h4>
                <h3 style="margin-left: 90px;"> Nhân Viên</h3>
                <p style="padding-top: 60px;margin-left: 70px"> <b>Nguyễn Quang</b> </p>
            </div>
            <div class=""></div>
        </div>
       </div>
    </body>
</html>