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
    <title>Yeni Destek Talebi - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script> 
	<script type="text/javascript" src="js/hddizayn.js"></script> 
	<style>
		.arka{
			background-color:#f4f4f4;
			/* 		 [üst][sağ][alt][sol] */
			padding: 30px 30px 30px 30px;
		}
	</style>
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
			<div class="yazdir"><div class="yazdir1" id="yazdir"></div></div>
                <ol class="breadcrumb no-hide">
					<li><a href="hesabim.html">Hesabım</a></li>
					<li><a href="destek-taleplerim.html">Destek Taleplerim</a></li>
                    <li class="active">Yeni Destek Talebi</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">Yeni Destek Talebi</span>
                </h2>
                <div class="page-content page-order">
					<div class="order-detail-content">
		    				<div class="col-md-12 arka">
		    					<form id="ticket" method="post">
									<fieldset class="form-group">
										<label for="exampleInputEmail1">Ad Soyad</label>
										<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $Uye->adsoyad;?>" style="border: 1px solid #B8B8B8;" disabled>
										<input type="hidden" name="adsoyad" id="adsoyad" value="<?php echo $Uye->adsoyad;?>"/>
									</fieldset> 
									<fieldset class="form-group">
										<label for="exampleInputEmail1">E-Posta</label>
										<input type="email" class="form-control" value="<?php echo $Uye->eposta;?>" style="border: 1px solid #B8B8B8;" disabled>
										<input type="hidden" name="eposta" id="eposta" value="<?php echo $Uye->eposta;?>"/>
									</fieldset> 
									<fieldset class="form-group">
										<label for="exampleSelect1">Ürün ve Sipariş Listeniz</label>
										<?php 
										$Sorgu  = $Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' ORDER BY satistarihi DESC");
										$Sonuc = $Sorgu->fetch_object();
										?>
										<?php if($Sonuc->satinalanuye ==  $Uye->id){?>
										<select name="urun_veya_siparis" id="urun_veya_siparis" class="form-control" style="border: 1px solid #B8B8B8;">
											<option>Seçiniz</option>
											<?php
											$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' ORDER BY satistarihi DESC ");
											while($Sonuc1 = $Sorgu->fetch_object()){
											$Urun  = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE id = '{$Sonuc1->urun_id}' ORDER BY id ASC LIMIT 1");
											$UrunSonuc = $Urun->fetch_object();
											?>
											<option value="<?php echo $UrunSonuc->baslik;?>"><?php echo $UrunSonuc->baslik;?> | Sipariş Durumu: 
											<?php if($Sonuc1->siparis_durum == 0 and $Sonuc->odemesekli=="Kapıda Ödeme"){?>
											<span class="badge">Bekliyor</span>
											<?php }elseif($Sonuc1->siparis_durum == 0){?>
											<span class="badge">Ödeme Bekliyor</span>
											<?php }elseif($Sonuc1->siparis_durum == 1){?>
											<span class="badge" style="background-color:#FFA500;">İşleme Alındı</span>
											<?php }elseif($Sonuc1->siparis_durum == 2){?>
											<span class="badge" style="background-color:#007bff;">Kargoya Verildi</span>
											<?php }elseif($Sonuc1->siparis_durum == 3){?>
											<span class="badge" style="background-color:#2d8c43;">Tamamlandı</span>
											<?php }elseif($Sonuc1->siparis_durum == 4){?>
											<span class="badge" style="background-color:#dc3545;">İptal Edildi</span>
											<?php }elseif($Sonuc1->siparis_durum == 5){?>
											<span class="badge hd-color">İade Edildi</span>
											<?php }?>
											</option>
											<?php }?>
										</select>
										<?php }else{?>
											<select class="form-control" style="border: 1px solid #B8B8B8;" disabled>
											<option>Hesabınıza ait Ürün ve Sipariş Bulunmuyor !</option>
											</select>
											<?php }?>
										<small class="text-muted">Yardım Almak İstediğiniz Ürün veya Siparişiniz için Seçim Yapınız. </small>
									</fieldset> 
									<fieldset class="form-group">
										<label for="exampleSelect1">Departman</label> 
										<select  name="departman" id="departman" class="form-control" style="border: 1px solid #B8B8B8;">
											<option>Seçiniz</option>
											<option value="1">Arıza Bildirimi</option>
											<option value="2">Muhasebe</option>
											<option value="3">Diğer</option>
										</select> 
									</fieldset> 
									<fieldset class="form-group">
										<label for="exampleInputEmail1">Başlık</label>
										<input name="baslik" id="baslik" type="text" class="form-control" id="exampleInputEmail1" placeholder="Sorun veya Konu Nedir ?" style="border: 1px solid #B8B8B8;">
									</fieldset> 
									<fieldset class="form-group">
										<label for="exampleSelect1">Öncelik</label> 
										<select name="oncelik" id="oncelik" class="form-control" style="border: 1px solid #B8B8B8;">
											<option value="1">Düşük</option>
											<option value="2">Orta</option>
											<option value="3">Yüksek</option>
										</select> 
									</fieldset> 
									<fieldset class="form-group">
										<label for="exampleTextarea">Mesaj</label>
										<textarea name="mesaj" id="mesaj" class="form-control" rows="6" placeholder="Sorununuzu veya konuyu detaylı şekilde açıklayınız" style="border: 1px solid #B8B8B8;"></textarea>
									</fieldset> 
									<button id="gonder" type="submit" class="btn btn-primary">Gönder</button>
									<button type="reset" class="btn btn-danger">Formu Temizle</button>
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
    <script src="js/arcticmodal/jquery.arcticmodal.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>