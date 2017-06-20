<!DOCTYPE html>
<html>
    <head>
        <title title="Đồ án Tốt Nghiệp: Vũ Văn Quang">Đồ án Tốt Nghiệp: Vũ Văn Quang</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/w3.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
         <link rel="shortcut icon" href="<?php echo base_url() ?>public/Laptop-icon.png" type="image/x-icon"/>
        
    </head>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
                        $(document).ready(function(){

                            $("#search").keyup(function(){
                                $.ajax({
                                type: "get",
                                url: "search.php",
                                data:'keyword='+$(this).val(),

                                success: function(data){
                                    $("#suggesstion-box").show();
                                    $("#suggesstion-box").html(data);
                                    $("#search").css("background","#FFF");
                                }
                                });
                            });
                        });
                        //To select country name
                        function selectCountry(val) {
                            $("#search").val(val);
                            $("#suggesstion-box").hide();
                        }
                    </script>

    <body>
        <div id="wrapper">
            <!---->
           <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                           
                            <div class="col-md-6 col-md-offset-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if(isset($_SESSION['auth_name'])) :?>
                                            <li>
                                                <a href="" style="color: red">
                                                    <i class="fa fa-share-square-o"></i> Xin chào <?php echo $_SESSION['auth_name'] ?>
                                                </a>
                                                <!-- <ul id="header-submenu">
                                                    <li><a href="">Contact</a></li>
                                                    <li><a href="">Cart</a></li>
                                                    <li><a href="">Checkout</a></li>
                                                </ul> -->
                                            </li>
                                            <?php echo $_SESSION['auth_level'] == 2 ? '<a href="admin/" target="_blank"><i class="fa fa-share-alt"></i> Trang quản trị </a>' : '' ?>
                                            <li>
                                                <a href="logout.php"><i class="fa fa-share-square-o"></i> Thoát </a>
                                            </li>
                                        <?php else :?>
                                            <li>
                                                <a href="register.php"><i class="fa fa-unlock"></i> Đăng ký </a>
                                            </li>
                                            <li>
                                                <a href="login.php"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                                            </li>
                                        <?php endif ; ?>        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" action="tim-kiem.php" method="GET">
                                <div class="form-group"  id="timkiemaj">
                                   
                                    <input type="text" name="keywork" placeholder="Search..." value="<?php echo isset($keywork) ? $keywork : '' ?>" class="form-control" width="428px" size="70px" id="search">
                                                                        <button type="" class="btn btn-default"><i class="fa fa-search"></i></button>

                                    <div id="suggesstion-box"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo base_url() ?>">
                                <img src="<?php echo base_url() ?>public/logo.jpg" class="img img-reponsive" id="logos">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>(04) 35720633 - (04) 62757151</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav" style="">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <?php foreach($menu as $item) :?>
                                <li class="">
                                    <a href="<?php echo $item['slug'] ?>" class="<?php echo isset($navactive) && $navactive == $item['slug'] ? 'navactive' : '' ?>"><?php echo $item['tenmenu'] ?></a>
                                </li>
                            <?php endforeach ; ?>
                           
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="danh-sach-gio-hang.php"><i class="fa fa-shopping-basket"></i> My Cart  <b class="tongsogh"><?php echo $tongsanphamgiohang ?></b>  </a>
                            </li>
                        
                            
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            

