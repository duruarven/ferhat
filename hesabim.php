<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
sistembakim();
include("panel/sistem/site_sayac.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Hesabım - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.box-border:hover {
		   background-color: #d3d8e5;
		}
		.dogan{
			color:black;
		}
	</style>
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
					<li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">Hesabım</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">Hesabım</span>
                </h2>
				<?php 
				$Sorgu = $Baglan->query("SELECT * FROM hddizayn_uyeler_adres WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id DESC");
				if(!$Baglan->affected_rows){ ?>
				<div class="col-md-12 t-center" style="padding-top:15px;">
					<div style="background-color:#d9534f; color:#fff;" class="alert alert-block alert-danger fade in">
						<p style="font-size:17px;" class="bold site-font">Dikkat: Üyeliğinize ait tanımlı adres bulunmuyor.<br/>Adres kaydı yaparak alışverişe hemen başlayabilirsiniz.</p>
						<a class="btn btn-sm btn-danger bold site-font" style="margin-top:15px; font-size:14px;" href="adreslerim.html"> Yeni Adres Kaydet</a>
					</div>
				</div>	
				<div class="clearfix"></div>
				<?php }?>	
				<?php
				if(($Uye->cinsiyet== "") or ($Uye->gun== "") or ($Uye->ay== "") or ($Uye->yil== "")){?>
				<div class="col-md-12 t-center" style="padding-top:15px;">
					<div style="background-color:#337ab7; color:#fff;" class="alert alert-block alert-info fade in">
						<p style="font-size:17px;" class="bold site-font">Dikkat: Üyeliğinizin bazı bilgileri eksik. <br/>Eksik bilgileri doldurmanız gerekli.</p>
						<a class="btn btn-sm btn-primary bold site-font" style="margin-top:15px;font-size:14px;" href="uye-bilgilerim.html"> Bilgileri Güncelle</a>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php }?>
                <div class="page-content page-order">
					<div class="order-detail-content">
						<p class="sub-heading" style="font-size:16px;">
							Hesabım Sayfanızdan ürün ve hizmetlerinizi görüntüleyebilir, destek bildirimi yollayabilir
							üyelik bilgisi güncelleme, şifre ve adres değişikliği gibi hesap ayarlarınızı kolayca yapabilirsiniz. 
							Size özel fırsatlar ve dönemsel kampanyalar da bu sayfada duyurulur.
						</p>
						<hr/>
                        <div class="col-md-2 t-center box-border">
							<span class="fa-stack fa-4x">
							<a href="siparislerim.html">
							  <i class="fa fa-square fa-stack-2x dogan"></i>
							  <i style="color:white;" class="fas fa-shopping-basket fa-stack-1x"></i>
							</a>
							</span>
							<p style="font-weight:bold; font-size:18px; padding-top:20px;"><a href="siparislerim.html">SİPARİŞLERİM</a></p>
					   </div>
                        <div class="col-md-2 t-center box-border">
							<span class="fa-stack fa-4x">
							<a href="favorilerim.html">
							  <i class="fa fa-square fa-stack-2x dogan"></i>
							  <i style="color:white;" class="far fa-grin-stars fa-stack-1x"></i>
							</span>
							</a>
							<p style="font-weight:bold; font-size:18px; padding-top:20px;"><a href="favorilerim.html">FAVORİLERİM</a></p>
                        </div>
                         <div class="col-md-2 t-center box-border">
							<span class="fa-stack fa-4x">
							<a href="destek-taleplerim.html">
							  <i class="fa fa-square fa-stack-2x dogan"></i>
							  <i style="color:white;" class="fas fa-ticket-alt fa-stack-1x"></i>
							</span>
							</a>
							<p style="font-weight:bold; font-size:18px; padding-top:20px;"><a href="destek-taleplerim.html">DESTEK TALEPLERİM</a></p>
                        </div>
                        <div class="col-md-2 t-center box-border">
							<span class="fa-stack fa-4x">
							<a href="adreslerim.html">
							  <i class="fa fa-square fa-stack-2x dogan"></i>
							  <i style="color:white;" class="far fa-address-card fa-stack-1x"></i>
							</a>
							</span>
							<p style="font-weight:bold; font-size:18px; padding-top:20px;"><a href="adreslerim.html">ADRESLERİM</a></p>
					   </div>
                        <div class="col-md-2 t-center box-border">
							<span class="fa-stack fa-4x">
							<a href="uye-bilgilerim.html">
							  <i class="fa fa-square fa-stack-2x dogan"></i>
							  <i style="color:white;" class="fas fa-user-edit fa-stack-1x"></i>
							</span>
							</a>
							<p style="font-weight:bold; font-size:18px; padding-top:20px;"><a href="uye-bilgilerim.html">ÜYELİK BİLGİLERİM</a></p>
                        </div>
                        <div class="col-md-2 t-center box-border">
							<span class="fa-stack fa-4x">
							<a href="sifre-islemi.html">
							  <i class="fa fa-square fa-stack-2x dogan"></i>
							  <i style="color:white;" class="fas fa-user-lock fa-stack-1x"></i>
							</span>
							</a>
							<p style="font-weight:bold; font-size:18px; padding-top:20px;"><a href="sifre-islemi.html">ŞİFRE İŞLEMİ</a></p>
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