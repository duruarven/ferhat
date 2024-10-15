<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
if($_GET['siparis']=="iptal"){
	$referans_no = GET('referans_no');
	$Update 	= 	$Baglan->query("UPDATE hddizayn_urun_satislari SET siparis_durum='4' WHERE referans_no='$referans_no'");
	if($iptal) header("Location:".$_SERVER["HTTP_REFERER"]);
	else{ $yazdir = '	
	<div class="alert bg-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong style="float:left;margin-right:5px;"><i style="font-size:20px;" class="fa fa-exclamation-triangle"></i></strong> 
	<strong>Hata </strong> İptal İşlemi Başarısız !
	</div>'; 
}}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Siparişlerim - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
					<li><a href="hesabim.html">Hesabım</a></li>
                    <li class="active">Siparişlerim</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">SİPARİŞLERİM</span>
                </h2>
                <div class="page-content page-order">
					<div class="order-detail-content">
							<?php 
							$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' ORDER BY satistarihi DESC");
							if(!$Baglan->affected_rows){?>
							<div class="alert alert-block alert-info fade in">
							<button data-dismiss="alert" class="close" type="button"></button>
							<br/>
							<p class="bold" style="font-size:15px;">Siparişiniz Bulunmuyor.</p>
							<br/>
							</div>
							<?php }else{?>
							<div class="table-responsive">
								<table class="table table-bordered t-center cart_summary" style="font-size:15px;">
									<thead>
										<tr>
											<th class="t-center">Referans Numarası</th>
											<th class="t-center">Toplam Adet</th>
											<th class="t-center">Toplam Fiyat</th>
											<th class="t-center">Tarih</th>
											<th class="t-center">Ödeme Şekli</th>
											<th class="t-center">Sipariş Durumu</th>
											<th class="t-center">#</th>
										</tr>
									</thead>
									<?php 
									$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' GROUP BY referans_no ORDER BY id DESC");
									while($Sonuc = $Sorgu->fetch_object()){
									$Urun  = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE id = '{$Sonuc->urun_id}' ORDER BY id ASC LIMIT 1");
									$UrunSonuc = $Urun->fetch_object();
									?>
									<tr>
										<td class="main-color bold"><?php echo $Sonuc->referans_no;?></td>
										<?php
										$SorguAdet	= $Baglan->query("SELECT sum(urun_adet) FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' and referans_no = '$Sonuc->referans_no'");
										$AdetSonuc  = $SorguAdet->fetch_assoc();
										$SorguTutar	= $Baglan->query("SELECT sum(urunler_kdvli_fiyat) FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' and referans_no = '$Sonuc->referans_no'");
										$TutarSonuc = $SorguTutar->fetch_assoc();
										?>
										<td><?php echo number_format($AdetSonuc["sum(urun_adet)"]);?></td>
										<td><?php echo number_format($TutarSonuc["sum(urunler_kdvli_fiyat)"]+$Sonuc->kargo,2,",",".")." ".''.$Sonuc->para_birimi.'';?></td>
										<td><?php echo $Sonuc->satistarihi;?></td>
										<td><?php echo $Sonuc->odemesekli;?></td>
										<td>
										<?php if($Sonuc->siparis_durum == 0 and $Sonuc->odemesekli=="Kapıda Ödeme"){?>
										<span class="badge">Bekliyor</span>
										<?php }elseif($Sonuc->siparis_durum == 0){?>
										<span class="badge">Ödeme Bekliyor</span>
										<?php }elseif($Sonuc->siparis_durum == 1){?>
										<span class="badge" style="background-color:#FFA500;">İşleme Alındı</span>
										<?php }elseif($Sonuc->siparis_durum == 2){?>
										<span class="badge" style="background-color:#007bff;">Kargoya Verildi</span>
										<?php }elseif($Sonuc->siparis_durum == 3){?>
										<span class="badge" style="background-color:#2d8c43;">Tamamlandı</span>
										<?php }elseif($Sonuc->siparis_durum == 4){?>
										<span class="badge" style="background-color:#dc3545;">İptal Edildi</span>
										<?php }elseif($Sonuc->siparis_durum == 5){?>
										<span class="badge hd-color">İade Edildi</span>
										<?php }?>
										</td>
										<td>
										<?php if($Sonuc->siparis_durum==0){?>
										<form method="post" id="iptal" onsubmit="return Validator(this);">
										<a href="?siparis=iptal&referans_no=<?php echo $Sonuc->referans_no;?>" class="btn btn-sm btn-danger bold site-font" style="color:white; padding: 1px 5px;font-size: 12px;line-height: 1.5;border-radius: 3px;">İPTAL ET</a>
										</form>
										<?php }else{?>
										<a href="siparis-<?php echo $Sonuc->referans_no;?>" class="btn btn-sm hd-color bold site-font" style="color:white; padding: 1px 5px;font-size: 12px;line-height: 1.5;border-radius: 3px;">DETAYLAR</a>
										<?php }?>
										</td>
									</tr>
							<?php }}?>
								</table>
								<br/><br/>
							</div>
                    </div>
                </div>
            </div>
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