<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
include("panel/sistem/site_sayac.php");
sistembakim();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Üye Ol - <?php echo $HDDizayn['title'];?></title>
	<meta name="description" content="<?php echo $HDDizayn['title'];?> Hemen Kayıt Ol">
	<meta charset="utf-8">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/checkbox.css">
	<link rel="stylesheet" type="text/css" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script> 
	<script type="text/javascript" src="js/hddizayn.js"></script> 
	<style>
		.dogan{
			color:black;
		}
	</style>
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
		<div class="yazdir"><div class="yazdir1" id="yazdir"></div></div>
            <div class="columns container">
                <div class="page-content page-order">
					<div class="order-detail-content">
					<div class="container">
						<div class="row">
							<div class="col-md-7 box-border">
								<div class="heading">
									<h3 class="uppercase head-5 bold site-font"><span class="main-color">Üye Kayıt</span> Formu</h3>
								</div>
								<form id="uyekayit" method="post">
									<div class="row">
										<div class="form-group col-md-6" style="padding-top:20px;">
											<label>Adınız <span class="red">*</span></label>
											<input type="text" id="ad" name="ad" class="form-control shape" style="border: 1px solid #B8B8B8;" placeholder="Adınız" required>
										</div>
										<div class="form-group col-md-6" style="padding-top:20px;">
											<label>Soyadınız <span class="red">*</span></label>
											<input type="text" id="soyad" name="soyad" class="form-control shape" style="border: 1px solid #B8B8B8;" placeholder="Soyadınız" required>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6" style="padding-top:20px;">
											<label>Şifre <span class="red">*</span></label>
											<input id="sifre" name="sifre" type="password" class="form-control shape" style="border: 1px solid #B8B8B8;" placeholder="Şifre" required>
										</div>
										<div class="form-group col-md-6" style="padding-top:20px;">
											<label>Şifre Tekrarı <span class="red">*</span></label>
											<input id="sifre_tekrar" name="sifre_tekrar" type="password" style="border: 1px solid #B8B8B8;" class="form-control shape" placeholder="Şifre Tekrarı" required>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6" style="padding-top:20px;">
											<label>E-Posta *</label>
											<input id="eposta" name="eposta" type="text" class="form-control shape" style="border: 1px solid #B8B8B8;" placeholder="E-Posta" required>
										</div>
										<div class="form-group col-md-6" style="padding-top:20px;">
										<label>Telefon *</label>
											<input id="telefon" name="telefon" type="text" class="form-control shape" style="border: 1px solid #B8B8B8;" placeholder="Telefon" required>
										</div>
									</div>
									<div class="form-input" style="padding-top:20px;">
										<label>Güvenlik Kodu: <img width="" height="26px" src="images/gvn.png"/></label>
										<input id="captcha" name="captcha" type="text" class="form-control shape" placeholder="8 + 7 = ?" style="border: 1px solid #B8B8B8;" required>
									</div>
									<div class="form-input" style="padding-top:20px;">
										<div class="checkbox-inline">
											<input type="checkbox" name="sozlesme" id="checkboxG2" class="css-checkbox"/>
											<label for="checkboxG2" class="css-label radGroup1">
												<a style="font-size:14px;" class="bold" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void();">Sözleşmeyi Okudum ve Kabul Ediyorum.</a>
											</label>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="button-group" style="padding-top:20px;">
										<input type="submit" style="padding: 0px 10px;" class="btn btn-success bold site-font" type="submit" id="kayitol" value="Kayıt Ol">
										<input style="float:right; padding: 0px 10px;" type="reset" class="btn btn-default btn-md site-font bold" value="Formu Temizle">
									</div>
								</form>
							</div>
							<div  class="col-md-5">
							<hr style="margin-top:0px; height: 2px; border-top:0; border-radius: 5px; background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #a0db8e 12.5%, #a0db8e 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);">
								<div class="t-center">
									<span class="fa-stack fa-2x">
									  <i class="fa fa-circle fa-stack-2x dogan"></i>
									  <i style="color:white;" class="fa fa-shopping-bag fa-stack-1x"></i>
									</span>
									<br/>
									<h4 class="bold uppercase">Ürün Kalitesi</h4>
									<p>%100 Orjinal Ürünler Tek Tıkla Ayağına Gelsin !</p>
									<br/>
								</div>
								<br/>
								<hr style="margin-top:0px; height: 2px; border-top:0; border-radius: 5px; background-image: linear-gradient(to left, #c4e17f, #c4e17f 12.5%, #a0db8e 12.5%, #a0db8e 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);">
								<div class="t-center">
									<span class="fa-stack fa-2x">
									  <i class="fa fa-circle fa-stack-2x dogan"></i>
									  <i style="color:white;" class="fa fa fa-truck fa-stack-1x"></i>
									</span>
									<br/>
									<h4 class="bold uppercase">Hızlı Gönderi</h4>
									<p>17:00’a kadar vereceğiniz tüm siparişleriniz, Aynı gün kargoda !</p>
									<br/>
								</div>
								<br/>
								<hr style="margin-top:0px; height: 2px; border-top:0; border-radius: 5px; background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #a0db8e 12.5%, #a0db8e 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);">
								<div class="t-center">
									<span class="fa-stack fa-2x">
									  <i class="fa fa-circle fa-stack-2x dogan"></i>
									  <i style="color:white;" class="fas fa-clipboard-check fa-stack-1x"></i>
									</span>
									<br/>
									<h4 class="bold uppercase">Canlı Yardım</h4>
									<p>Olur da yardıma ihtiyaç duyarsanız, Müşteri hizmetlerimiz bir tık yakınında !</p>
									<br/>
								</div>
								<hr style="margin-top:0px; height: 2px; border-top:0; border-radius: 5px; background-image: linear-gradient(to left, #c4e17f, #c4e17f 12.5%, #a0db8e 12.5%, #a0db8e 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);">
							</div>
						</div>
					</div>
					<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
					  <div class="modal-dialog modal-lg">
						<div class="modal-content">
						  <div class="modal-header t-left">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title bold centered" id="gridSystemModalLabel">ÜYELİK SÖZLEŞMESİ</h4>
						  </div>
						  <div class="modal-body">
							  <p><?php echo $HDDizayn['sozlesme'];?></p>
							</div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
						  </div>
						</div>
					  </div>
					</div>
                    </div>
                </div>
            </div><br/><br/>
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