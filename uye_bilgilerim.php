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
    <title>Üyelik Bilgilerim - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <li class="active">Üyelik Bilgilerim</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">Üyelik Bilgilerim</span>
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
								<li role="presentation" class="active"><a href="#uye-bilgileri" aria-controls="uye-bilgileri" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span class="site-font" style="font-size:16px;">Üye Bilgileri</span></a></li>
								<li role="presentation"><a href="#uye-bilgileri-guncelle" aria-controls="uye-bilgileri-guncelle" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span class="site-font" style="font-size:16px;">Üye Bilgilerini Düzenle</span></a></li>
							</ul>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="uye-bilgileri">
									<div class="form-input">
										<label>Ad Soyad</label>
										<input type="text" class="form-control" value="<?php echo $Uye->adsoyad;?>" disabled>
									</div>
									<div class="form-input" style="padding-top:25px;">
										<label>E-Posta</label>
										<input type="text" class="form-control" value="<?php echo $Uye->eposta;?>" disabled>
									</div>
									<div class="form-input" style="padding-top:25px;">
										<label>Telefon</label>
										<input type="text" class="form-control" value="<?php echo $Uye->telefon;?>" disabled>
									</div>
									<div class="form-input" style="padding-top:25px;">
										<label>Cinsiyet</label>
										<?php if($Uye->cinsiyet == ""){ ?>
										<input type="text" class="form-control" value="Seçim Yapılmamış" disabled>
										<?php }else{?>
										<input type="text" class="form-control" value="<?php echo $Uye->cinsiyet;?>" disabled>
										<?php }?>
									</div>
									<div class="row" style="padding-top:25px;">
										<div class="form-group col-md-6">
											<label>Doğum Tarihi</label>
											<?php if( ($Uye->ay == "") or ($Uye->gun == "") or ($Uye->yil == "") ){ ?>
											<input type="text" class="form-control" value="Doğum Tarihi Belirtilmemiş" disabled>
											<?php }else{?>
											<input type="text" class="form-control" value="<?php echo $Uye->gun;?> / <?php echo $Uye->ay;?> / <?php echo $Uye->yil;?>" disabled>
											<?php }?>
										</div>
										<div class="form-group col-md-6">
											<label>&nbsp;</label>
											<?php if( ($Uye->ay == "") or ($Uye->gun == "") or ($Uye->yil == "") ){ ?>
											<input type="text" class="form-control" value="Yaş Hesaplanamıyor !" disabled>
											<?php }else{?>
											<input type="text" class="form-control" value="<?php $GelenTarih = $Uye->gun."/".$Uye->ay."/".$Uye->yil; $Hesapla = substr( $GelenTarih,-4); $Yil = date("Y"); $Yas = $Yil - $Hesapla; echo $Yas;?> Yaşında" disabled>
											<?php }?>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="uye-bilgileri-guncelle">
									<form method="post" id="uyebilgiguncelle">
										<div class="row">
											<div class="form-group col-md-6">
												<label>Adınız <span class="red">*</span></label>
												<input id="ad" name="ad" type="text" class="form-control shape" value="<?php echo $Uye->ad;?>" placeholder="Ad" required>
											</div>
											<div class="form-group col-md-6">
												<label>Soyadınız <span class="red">*</span></label>
												<input id="soyad" name="soyad" type="text" class="form-control shape" value="<?php echo $Uye->soyad;?>" placeholder="Soyad" required>
											</div>
										</div>
										<div class="form-input" style="padding-top:25px;">
											<label>Telefon<span class="red">*</span></label>
											<input name="telefon" id="telefon" type="text" class="form-control shape" value="<?php echo $Uye->telefon;?>" required>
										</div>
										<div class="form-input" style="padding-top:25px;">
											<label>E-Posta<span class="red">*</span></label>
											<input name="eposta" id="eposta" type="text" class="form-control shape" value="<?php echo $Uye->eposta;?>" required>
											<small class="text-muted main-color" style="font-size:14px;">Bilgi: Şifre ve Bildirim E-Postaları Gereksiz Kutunuza Düşebilir. Gereksiz E-Posta(Spam) Kutunuzu Kontrol Etmeyi Unutmayınız. </small>
										</div>
										<div class="form-input" style="padding-top:25px;">
											<label>Cinsiyet *</label>
											<select name="cinsiyet" id="cinsiyet" style="border: 1px solid #aeaeae;" class="form-control" required>
												<option>Seçim Yapınız !</option>
												<option value="Bay" <?php echo $Uye->cinsiyet == Bay ? 'selected' : null; ?>>Bay</option>
												<option value="Bayan" <?php echo $Uye->cinsiyet == Bayan ? 'selected' : null; ?>>Bayan</option>
											</select>
										</div>
										<div class="row">
											<div class="form-group col-md-4" style="padding-top:25px;">
												<label>Doğum Tarihi Gün *</label>
												<input id="gun" name="gun" type="text" class="form-control shape" value="<?php echo $Uye->gun;?>" placeholder="Gün" required>
											</div>
											<div class="form-group col-md-4" style="padding-top:25px;">
												<label>Doğum Tarihi Ay *</label>
												<input id="ay" name="ay" type="text" class="form-control shape" value="<?php echo $Uye->ay;?>" placeholder="Ay" required>
											</div>
											<div class="form-group col-md-4" style="padding-top:25px;">
												<label>Doğum Tarihi Yıl *</label>
												<input id="yil" name="yil" type="text" class="form-control shape" value="<?php echo $Uye->yil;?>" placeholder="Yıl" required>
											</div>
										</div>
										<br>
										<div>
											<input id="uyeguncelle" type="submit" class="btn btn-md btn-success bold" value="Kaydet">
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