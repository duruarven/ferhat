<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Şifre İşlemi - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
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
                <ol class="breadcrumb no-hide">
					<li><a href="hesabim.html">Hesabım</a></li>
                    <li class="active">Şifre İşlemi</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">Şifre İşlemi</span>
                </h2>
                <div class="page-content page-order">
					<div class="order-detail-content">
					<style>
						input[type=text] {
						  width: 100%;
						  padding: 12px 20px;
						  margin: 8px 0;
						  box-sizing: border-box;
						  -webkit-transition: 0.5s;
						  border: 1px solid #aeaeae;
						}
						input[type=text]:focus {
						  border: 1px solid #555;
						}
						input[type=text]:hover {
						  border: 1px solid #555;
						}
					</style>	
					<div class="card">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="#sifre-islemi" aria-controls="sifre-islemi" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span class="site-font" style="font-size:16px;">Şifre İşlemi</span></a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="sifre-islemi">
								<div class="alert alert-info" style="background-color:#266bb5;" data-close="false">
									<p style="color:white; font-size:15px;" class="site-font bold">Mevcut Şifrenizi Değiştirmek istemiyorsanız, Bu Alanı Kullanmayın.</p>
								</div>
								<form method="post" id="sifreguncelle">
									<div class="row">
										<div class="form-group col-md-4">
											<label>Mevcut Şifre</label>
											<input id="mevcutsifre" name="mevcutsifre" type="text" class="form-control shape" placeholder="Mevcut Şifre">
										</div>
										<div class="form-group col-md-4">
											<label>Yeni Şifre</label>
											<input id="sifre" name="sifre" type="text" class="form-control shape"  placeholder="Yeni Şifre">
										</div>
										<div class="form-group col-md-4">
											<label>Yeni Şifre Tekrarı</label>
											<input id="sifre_tekrar" name="sifre_tekrar" type="text" class="form-control shape" placeholder="Yeni Şifre Tekrarı">
										</div>
									</div>
									<br>
									<div>
										<input id="sifredegistir" type="submit" class="btn btn-md btn-success" value="Kaydet">
									</div>
								</form>
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