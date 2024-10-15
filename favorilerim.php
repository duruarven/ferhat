<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
if($_GET['kayit']=="sil"){ $kimlik = GET("kimlik");
	$Sil	= $Baglan->query("DELETE FROM hddizayn_favorilerim WHERE kimlik = '$kimlik'");
	if($Sil) header("Location:".$_SERVER["HTTP_REFERER"]);
	else{ echo 'Başarısız !';}
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Favorilerim - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
					<li><a href="hesabim.html">Hesabım</a></li>
                    <li class="active">Favorilerim</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">FAVORİLERİM</span>
                </h2>
                <div class="page-content page-order">
					<div class="order-detail-content">
						<?php 
						$Sorgu = $Baglan->query("SELECT * FROM hddizayn_favorilerim WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id DESC");
						if(!$Baglan->affected_rows){?>
						<div class="alert alert-block alert-info fade in">
							<button data-dismiss="alert" class="close" type="button"></button>
							<br/>
							<p class="bold" style="font-size:15px;">Favoriniz Bulunmuyor.</p>
							<br/>
						</div>
						<?php }else{?>	
						<div class="table-responsive">
							<table class="table table-bordered t-center cart_summary" style="font-size:15px;">
								<thead>
									<tr>
										<th class="t-center">#</th>
										<th class="t-center">Ürün</th>
										<th class="t-center">Fiyat</th>
										<th class="t-center">İşlem</th>
									</tr>
								</thead>
								<?php 
								$Sorgu = $Baglan->query("SELECT * FROM hddizayn_favorilerim WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id DESC");
								while($Sonuc = $Sorgu->fetch_object()){
								$Urun  = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE id = '{$Sonuc->urun_id}' ORDER BY id ASC LIMIT 1");
								$UrunSonuc = $Urun->fetch_object();
								?>
								<tr>
									<td class="width-10"><img src="<?php echo "dosyalar/urunler/".$UrunSonuc->resim;?>" width="65" height="65" class="circle" style="max-width:65px; border:2px #edece5 solid; margin:0px 0;"></td>
									<td class="bold main-color">
									<a href="<?php echo $UrunSonuc->seflink.".html";?>"><?php echo $UrunSonuc->baslik;?></a>
									</td>
									<td class="width-100 bold"><?php echo number_format($UrunSonuc->urunfiyat, 2, ',', ',')." ".$UrunSonuc->para_birimi;?></td>
									<td class="width-10 center"><a class="remove-item" href="?kayit=sil&kimlik=<?php echo $Sonuc->kimlik;?>" type="submit" form="sil"><i class="fa fa-times-circle"></i></a></td>
								</tr>
								<?php }?>
							</table>
							<?php }?>
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