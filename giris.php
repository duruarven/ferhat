<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php"); sistembakim();
include("panel/sistem/site_sayac.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Üye Girişi - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script> 
	<script type="text/javascript" src="js/hddizayn.js"></script> 
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
		<div class="yazdir"><div class="yazdir1" id="yazdir"></div></div>
            <div class="columns container">
                <div class="page-content page-order">
					<div class="order-detail-content">
						<div class="page-content">
							<div class="row">
								<div class="col-sm-6">
									<div class="box-border" style="border: 1px solid #eaeaea; min-height: 351px; background-color:#efefef; background-image: url(images/lol.png); background-position: center;background-repeat: no-repeat;background-size: 500px 300px;">
										<h2 class="page-heading">
											<span class="page-heading-title2 main-color bold site-font">Giriş Yap</span>
										</h2>
										<form id="girisyap" method="post">
											<label style="padding-top:20px;" for="emmail_login">E-Posta Adresi</label>
											<input type="text" class="form-control" id="eposta" name="eposta" placeholder="E-Posta" style="border: 1px solid #000;">
											<label style="padding-top:20px;" for="password_login">Şifre</label>
											<input type="password" class="form-control" id="sifre" name="sifre" placeholder="Şifre" style="border: 1px solid #000;">
											<p style="padding-top:15px;" class="bold">
												<a href="javascript:;" data-toggle="modal" data-target=".modal-register">Şifremi Unuttum !</a>
											</p>
											<button id="giris" class="btn btn-primary button bold site-font"><i class="fa fa-lock"></i>&nbsp;GİRİŞ YAP</button>
											<a href="kayit.html" style="padding: 0px 10px; background-color:#007bff;border-color:#3195ff;float:right;" class="btn btn-primary bold site-font"><i class="fas fa-user"></i>&nbsp;ÜYE OL</a>
										</form>
									</div>	
								</div>
								<div class="col-sm-6">
									<div style="border: 1px solid #eaeaea; background-position: center;background-repeat: no-repeat;background-size: cover;">
										<a href="indirimli-urunler.html"><img style="width:555px;" height="351" src="images/uye-giris.png"></a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div><br/><br/>
			<!-------------------------------------------------------------------------------------------------------------------------->
			<div class="modal fade modal-register t-left" tabindex="-1" role="dialog" aria-labelledby="modal-register">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header t-center">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<form method="post" id="sifrehatirlat">
							<div class="modal-body">
								<h2 style="font-size:22px; text-transform:uppercase;" class="main-color bold site-font t-center">ŞİFRE SERVİSİ</h2>
								<br/>
								<div class="alert alert-primary hd-color" role="alert">
									<span style="color:white; font-size:15px;" class="bold site-font">E-Posta Adresinizi yazınız...</span>
								</div>
								<br/>
								<div class="form-group">
									<input type="text" name="eposta" class="form-control" placeholder="E-Posta (Email)" style="border: 1px solid #B8B8B8;" required>
								</div>
								<br/>
								<hr class="colorgraph">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<button type="button" class="btn btn-danger btn-block btn-md" tabindex="7" data-dismiss="modal" aria-label="Close">Vazgeç</button>
									</div>
									<div class="col-xs-12 col-md-6">
										<input id="sifrehatirlatgonder" type="submit" class="btn btn-success btn-block btn-md" value="GÖNDER">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!---->
		</main>
		<?php require_once("footer.php");?>
	</div>  
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/jquery.actual.min.js"></script> 
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.elevateZoom.min.js"></script>
    <script src="js/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script src="js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    <script src="js/arcticmodal/jquery.arcticmodal.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>