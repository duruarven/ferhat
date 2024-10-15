<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
if($_GET['kayit']=="sil"){
	$kimlik = GET('kimlik');
	$Sil = $Baglan->query("DELETE FROM hddizayn_uyeler_adres WHERE kimlik = '$kimlik'");
	if($Sil) header("Location:".$_SERVER["HTTP_REFERER"]);
	else{$yazdir = '	
	<div class="alert bg-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong style="float:left;margin-right:5px;"><i style="font-size:20px;" class="fa fa-exclamation-triangle"></i></strong> 
	<strong>Hata </strong> Silme İşlemi Başarısız !
	</div>'; 
}}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Adreslerim - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/yazdir.css">
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
                    <li class="active">Adreslerim</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">Adreslerim</span>
                </h2>
                <div class="page-content page-order">
					<div class="order-detail-content">
					<div class="table-responsive">
						<button style="margin-bottom :10px; font-weight:bold; font-size:15px;" type="button" class="btn btn-sm btn-icon-right btn-success" data-toggle="modal" data-target=".modal-register"><i class="fas fa-clipboard-check"></i> <span>Yeni Adres Kayıt</span></button>
						<div class="modal fade modal-register t-left" tabindex="-1" role="dialog" aria-labelledby="modal-register">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header t-center">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<form method="post" id="yeniadres">
										<div class="modal-body">
											<h2 style="font-size:22px; text-transform:uppercase;" class="main-color bold site-font">Adres Kayıt</h2>
											<div class="form-group">
												<input type="text" name="adres_baslik" id="adres_baslik" class="form-control" placeholder="Adres Başlığı" required>
												<input name="uye_id" id="uye_id" type="hidden" value="<?php echo $Uye->id;?>">
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-4 col-md-4">
													<div class="form-group">
														<input type="text" id="sehir" name="sehir" class="form-control" placeholder="Şehir" required>
													</div>
												</div>
												<div class="col-xs-12 col-sm-4 col-md-4">
													<div class="form-group">
														<input type="text" id="ilce" name="ilce" class="form-control" placeholder="İlçe" required>
													</div>
												</div>
												<div class="col-xs-12 col-sm-4 col-md-4">
													<div class="form-group">
														<input type="text" id="postakodu" name="postakodu" class="form-control" placeholder="Posta Kodu" required>
													</div>
												</div>
											</div>
											<div class="form-group">
												<textarea name="adres" rows="6" cols="30" class="form-control required" placeholder="Adres"></textarea>
											</div>
											<hr class="colorgraph">
											<div class="row">
												<div class="col-xs-12 col-md-6">
													<button type="button" class="btn btn-danger btn-block btn-md" tabindex="7" data-dismiss="modal" aria-label="Close">Vazgeç</button>
												</div>
												<div class="col-xs-12 col-md-6">
													<input id="adreskaydet" type="submit" class="btn btn-success btn-block btn-md" value="Kaydet">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<form method="post" id="sil">
						<?php
						$Sorgu = $Baglan->query("SELECT * FROM hddizayn_uyeler_adres WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id DESC");
						if(!$Baglan->affected_rows){?>
						<div class="alert alert-block alert-info fade in">
							<button data-dismiss="alert" class="close" type="button"></button>
							<br/>
							<p class="bold" style="font-size:15px;">Tanımlı Adresiniz Bulunmuyor !</p>
							<br/>
						</div>
						<?php }else{?>	
						<table class="table table-bordered t-center cart_summary" style="font-size:15px;">
							<thead>
								<tr>
									<th class="t-center">Başlık</th>
									<th class="t-center">Şehir</th>
									<th class="t-center">Adres</th>
									<th class="t-center">İşlem</th>
								</tr>
							</thead>
							<?php while($Adres = $Sorgu->fetch_object()){?>
							<tr>
								<td><?php echo substr($Adres->adres_baslik,0,40).""; ?></td>
								<td><?php echo $Adres->sehir;?> / <?php echo $Adres->ilce;?></td>
								<td><?php echo $Adres->adres;?></td>
								<td>
									<style>
									.sil-circle {
										width: 35px;
										height: 10px;
										padding: 0px 0px 0px 0px;
										border-radius: 25px;
										text-align: center;
									}
									</style>
									<span>
									<a class="remove-item" href="?kayit=sil&kimlik=<?php echo $Adres->kimlik;?>" type="submit" form="sil"><i class="fa fa-times-circle"></i></a>
									</span>
								</td>
							</tr>
							<?php }}?>
						</table>
						</form>	
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
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>