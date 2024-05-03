<!-- <?php 

if(isset($_POST['submit'])){ 
session_start();
include "admin/config.php";
$username   =$_POST['username'];
$password =md5($_POST['pass']);
$query=  mysqli_query($koneksi, "SELECT * FROM login where username='$username' and password='$password'");
$jumlah=  mysqli_num_rows($query);
if($jumlah>0){
    $r=  mysqli_fetch_array($query);
    $_SESSION['status_login']='sudah_login';
    $_SESSION['nama']=$r['username'];
    header("location:admin/index.php");
}
else{ 
  echo "<SCRIPT type='text/javascript'>
        alert('Login gagal!');
        window.location.replace('index.php');
        </SCRIPT>";
}
}
  ?> -->

<?php
if(isset($_POST['submit'])){
    session_start();
    include "admin/config.php";
    $username = $_POST['username'];
    $password = $_POST['pass']; // Kata sandi tidak perlu di-hash di sini

    // Melakukan query ke database untuk mendapatkan kata sandi yang sesuai dengan username
    $query = mysqli_prepare($koneksi, "SELECT password FROM login WHERE username = ?");
    mysqli_stmt_bind_param($query, 's', $username);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $hashed_password);
    mysqli_stmt_fetch($query);
    mysqli_stmt_close($query);

    // Memverifikasi kata sandi menggunakan password_verify()
    if(password_verify($password, $hashed_password)){
        // Jika kata sandi sesuai, mulai sesi dan arahkan ke halaman admin
        $_SESSION['status_login'] = 'sudah_login';
        $_SESSION['nama'] = $username;
        header("location:admin/index.php");
    } else {
        // Jika kata sandi tidak sesuai, tampilkan pesan kesalahan
        echo "<script type='text/javascript'>
                alert('Login gagal!');
                window.location.replace('index.php');
              </script>";
    }
}
?>


<!DOCTYPE html>

<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>UAS</title>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

      <!-- Favicon ================== -->
      <!-- Standard -->
      <link rel="shortcut icon" href="assets/img/favicon-144.png">
      <!--  Resources style ================== -->
      <link href="assets/css/advanced-Portage.css" rel="stylesheet" type="text/css" media="all"/>
    </head>
    <body>

    <!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
      <div class="modal-content" style="margin-top: 120px;">
        <div class="modal-header" ,align="center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="ion-close-round" aria-hidden="true"></span>
          </button>
          <img class="img-circle" id="img_logo" src="assets/img/f1.png">
          <h2 align="center" style="color: #fff; margin-bottom: 0px; padding-bottom: 0px;">John<strong>Riady</strong> </h2>
        </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="modal-body">
                <div id="div-login-msg">
                                <div id="icon-login-msg" class="icon ion-information-circled"> </div>
                                <span id="text-login-msg" style="font-size: 12px;">Isikan username dan password kamu.</span>
                            </div>
                <input id="login_username" name="username" maxlength="40" class="form-control" type="text" placeholder="Username" required>
                <input id="login_password" name="pass" maxlength="50" class="form-control" type="password" placeholder="Password" required>
                         <!--   <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div> -->
                  </div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" name="submit" class="button-light pull-right">Login</button>
                            </div>
     
                </div>
                    </form>
                    <!-- End # Login Form -->
                </div>
                <!-- End # DIV Form -->
                
      </div>
    </div>
  </div>
    <!-- END # MODAL LOGIN -->
      <section class="back">



        <div id="leftSide" class="slideshow">
          <!-- <div class="background-img-holder gradient">
            <img src="assets/img/coffee-apple-iphone-desk.jpg" alt="This is my work">
          </div> -->

          <div id="home" class="gradient">
            <!-- Your logo -->
  			    <img src="assets/img/f1.png" alt="" class="main-logo" />

            <div class="h-content">
              <div class="heading text-white">
                <h1>Welcome to John Riady!</h1>
                <h4>Ayo Daftar dan Gunakan Aplikasinya!</h4> <br/>
                <a href="#" class="button-light" role="button" data-toggle="modal" data-target="#login-modal">Masuk Login</a>


              </div>
            </div>

            <ul class="social_icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
              <li><a href="#"><i class="icon ion-social-youtube"></i></a></li>       
            </ul>
          </div>
        </div>

        <div id="rightSide">

            <div class="appContainer">
              <div class="row">
                <div class="ipad-app col-sm-12 col-xs-12">
                  <img src="assets/img/jon1.png" alt="This is my work" class="img-responsive"/>
                </div>

              </div>
            </div>
      
            <!-- Hidden slider Lol :D 
            <div id="slider" class="flexslider">
              <ul class="slides">
                <li>
                  <img src="assets/img/apple-iphone-technology-white.jpg" />
                </li>
                <li>
                  <img src="assets/img/coffee-apple-iphone-desk.jpg" />
                </li>
              </ul>
            </div> -->
            <!--
            <div id="subscribe">
              <h2>Stay tunned we're coming this year</h2>
              <div class="mb100" id="clock" data-date="2016/08/02 12:00:00"></div>

              <form
              id="subscribe-form"
              action="http://coderare.us12.list-manage.com/subscribe/post-json?u=112a29375b248b89f47be54b7&amp;id=e46717ab68"
              method="get">
                <input type="email" name="EMAIL" class="input-email" value="" placeholder="Fill Your Email Address Here...">
                <input type="submit" name="subscribe" class="submit button-light input-submit" value="Subscribe">
                <div id="subscribe-result"></div>
              </form>
            </div> -->

            

            <div class="about">
              <h2>Our Philosophy</h2>
              <p>
               Buat porject demi dapat nilai!
              </p>

              <p>
                Lihat dan dapatkan produknya!
              </p>

              <div class="service row">

                <!-- <div class="col-sm-4 col-xs-4">
                  <div class="feature">
                    <span class="upper_icon" aria-hidden="true">
                      <i class="ion-heart"></i>
                    </span>
                    <span class="lower_icon">
                      <i class="ion-heart"></i>
                      <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, assumenda.</h6>
                    </span>
                  </div>
                </div>

                <div class="col-sm-4 col-xs-4">
                  <div class="feature">
                    <span class="upper_icon" aria-hidden="true">
                      <i class="ion-woman"></i>
                    </span>
                    <span class="lower_icon">
                      <i class="ion-woman"></i>
                      <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, accusantium.</h6>
                    </span>
                  </div>
                </div>

                <div class="col-sm-4 col-xs-4">
                  <div class="feature">
                    <span class="upper_icon">
                      <i class="ion-man"></i>
                    </span>
                    <span class="lower_icon">
                      <i class="ion-man"></i>
                      <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, quo.</h6>
                    </span>
                  </div>
                </div>

                <div class="col-sm-4 col-xs-4">
                  <div class="feature">
                    <span class="upper_icon">
                      <i class="ion-earth"></i>
                    </span>
                    <span class="lower_icon">
                      <i class="ion-earth"></i>
                      <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, rerum.</h6>
                    </span>
                  </div>
                </div>

                <div class="col-sm-4 col-xs-4">
                  <div class="feature">
                    <span class="upper_icon" aria-hidden="true">
                      <i class="ion-ribbon-b"></i>
                    </span>
                    <span class="lower_icon">
                      <i class="ion-ribbon-b"></i>
                      <h6>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, nostrum.</h6>
                    </span>
                  </div>
                </div>

                <div class="col-sm-4 col-xs-4">
                  <div class="feature">
                    <span class="upper_icon">
                      <i class="ion-cash"></i>
                    </span>
                    <span class="lower_icon">
                      <i class="ion-cash"></i>
                      <h6>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, nam?</h6>
                    </span>
                  </div> 
                </div> -->

              </div>
            </div>

            <div class="portfolio">
              <ul class="gallery">
                <div class="grid-sizer col-sm-4 col-xs-6"></div>

                <li class="item col-sm-4 col-xs-6">
                  <a href="assets/img/KAIN-KATUN-fotor-20240501152628.jpg"  title="Kain ke 1">
                    <figure>
                      <!-- Your picture -->
                      <img src="assets/img/KAIN-KATUN-fotor-20240501152628.jpg" alt="This is my work" class="img-responsive" height="400px" width="400px" />
                    <!-- Picture's description below this one -->
                    <figcaption class="caption">
                      <div class="photo-details">
                        <h4>Jenis Kain :</h4>
                        <span>Katun</span>
                      </div>
                    </figcaption>
                    </figure>
                  </a>
                </li>

                <li class="item col-sm-4 col-xs-6">
                  <a href="assets/img/polyester-fotor-20240501152555.jpg" title="Kain ke 2">
                    <figure>
                        <!-- Your picture -->
                        <img src="assets/img/polyester-fotor-20240501152555.jpg" alt="This is my work" class="img-responsive" height="200px" width="200px" />
                      <!-- Picture's description below this one -->
                      <figcaption class="caption">
                        <div class="photo-details">
                          <h4>Jenis Kain :</h4>
                        <span>Polyester</span>
                        </div>
                      </figcaption>
                    </figure>
                  </a>
                </li>

                <li class="item col-sm-4 col-xs-6">
                  <a href="assets/img/Kelebihan-Lycra-000-fotor-20240501153020.jpg" title="Kain ke 3">
                    <figure>
                        <!-- Your picture -->
                        <img src="assets/img/Kelebihan-Lycra-000-fotor-20240501153020.jpg" alt="This is my work" class="img-responsive" />
                      <!-- Picture's description below this one -->
                      <figcaption class="caption">
                        <div class="photo-details">
                          <h4>Jenis Kain :</h4>
                        <span>Lycra</span>
                        </div>
                      </figcaption>
                    </figure>
                  </a>
                </li>

                <li class="item col-sm-4 col-xs-6">
                  <a href="assets/img/kain shimer-fotor-20240501153648.png" title="Kain ke 4">
                    <figure>
                        <!-- Your picture -->
                        <img src="assets/img/kain shimer-fotor-20240501153648.png" alt="This is my work" class="img-responsive" />
                      <!-- Picture's description below this one -->
                      <figcaption class="caption">
                        <div class="photo-details">
                          <h4>Jenis Kain :</h4>
                        <span>Shimer Shimer</span>
                        </div>
                      </figcaption>
                    </figure>
                  </a>
                </li>

                <li class="item col-sm-4 col-xs-6">
                  <a href="assets/img/Gambar Kain Hyget-fotor-20240501154117.jpg" title="Kain ke 5">
                    <figure>
                        <!-- Your picture -->
                        <img src="assets/img/Gambar Kain Hyget-fotor-20240501154117.jpg" alt="This is my work" class="img-responsive" />
                      <!-- Picture's description below this one -->
                      <figcaption class="caption">
                        <div class="photo-details">
                          <h4>Jenis Kain :</h4>
                        <span>Hyget</span>
                        </div>
                      </figcaption>
                    </figure>
                  </a>
                </li>

                <li class="item col-sm-4 col-xs-6">
                  <a href="assets/img/denim2-fotor-20240501155142.jpg" title="Kain ke 6">
                    <figure>
                        <!-- Your picture -->
                        <img src="assets/img/denim2-fotor-20240501155142.jpg" alt="This is my work" class="img img-responsive" />
                      <!-- Picture's description below this one -->
                      <figcaption class="caption">
                        <div class="photo-details">
                          <h4>Jenis Kain :</h4>
                        <span>Denim</span>
                        </div>
                      </figcaption>
                    </figure>
                  </a>
                </li>
              </ul>
            </div>

            <footer>
              <p class="uppercase">© Copyright 2024 <i class="ion-heart"></i></p>
              <div class="drag">
                <i class="up ion-arrow-up-c"></i>
              </div>
            </footer>

          </div>
      </section>

      <script src="assets/js/jquery-1.11.3.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/animsition.min.js"></script>
      <script src="assets/js/jquery.magnific-popup.min.js"></script>
      <script src="assets/js/masonry.pkgd.min.js"></script>
      <script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <script src="assets/js/jquery.flexslider-min.js"></script>
      <script src="assets/js/photoswipe.min.js"></script>
      <script src="assets/js/photoswipe-ui-default.min.js"></script>
      <script src="assets/js/script.js"></script>
       <!-- <script src="assets/js/vegas.min.js"></script> -->
       <script type="text/javascript">
        // $(function() {
        //     $('.slideshow').vegas({
        //       delay:4000,
        //       timer: false,
        //         slides: [
        //             { src: 'assets/img/bg-4.jpg' },
        //             { src: 'assets/img/bg-1.jpg' },
        //             { src: 'assets/img/bg-3.jpg' },
        //             { src: 'assets/img/bg-6.jpg' }
        //         ]

        //     });
        // });
      </script>

      <script type="text/javascript">

$(function() {
    
    var $formLogin = $('#login-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
   
    
    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

});
      </script>

  </body>
</html>

