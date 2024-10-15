<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
if(isset($_SESSION["uyegiris"])){
$Sorgu	=	$Baglan->query("SELECT * FROM hddizayn_uyeler WHERE eposta = '".$_SESSION["eposta"]."' ORDER BY id ASC LIMIT 1");
$Sonuc	=	$Sorgu->fetch_assoc(); $Uyeid = $Sonuc["id"];
$ReferansSorgu	=	$Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE satinalanuye = '$Uyeid' ORDER BY id DESC LIMIT 1");
$ReferansSonuc	=	$ReferansSorgu->fetch_assoc();$ReferansNo		=	$ReferansSonuc["referans_no"]; $OdemeYontemi	=	$ReferansSonuc["odemesekli"];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Sipariş Sonuç - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/yazdir.css">
<style>
.ic-bosluk{
	padding: 10px 20px 10px 20px;
}
.ust-bosluk{
	margin-top:35px;
}
.box{
	color: #fff;
	padding: 20px;
	display: none;
	margin-top: 20px;
}
.Banka-Havalesi{ background: #cccccc; }
.Kapıda-Ödeme{ background: #228B22; }
</style>					
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">Sepet</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">SİPARİŞ SONUÇ</span>
                </h2>
                <div class="page-content page-order">
                    <ul class="step">
                        <li><span>01. Özet</span></li>
                        <li><span>02. Adres Seçimi</span></li>
                        <li><span>03. Ödeme Yöntemi</span></li>
						<li><span>04. Sipariş Onayı</span></li>
                        <li class="current-step"><span>05. Sipariş Sonuç</span></li>
                    </ul>
                    <div class="order-detail-content">
						<div class="ust-bosluk">
							<div class="container">
								<?php if($OdemeYontemi=="Banka Havalesi"){?>
								<div class="heading main-heading t-center" style="font-size:16px;">
										<div class="alert success-box shape" style="background-color:#880590;" data-close="false">
											<p class="heading-desc" style="color:white;">Sayın <?php echo $_SESSION['adsoyad'];?><br/> Banka Havalesi / EFT İle Siparişiniz Oluşturulmuştur.</p>
											<p style="color:white;">Ödemeyi bilgileri verilen Banka Hesabımıza yatırın. Lütfen ilgili <b>"Referans Numarasını"</b> havale dekontunun açıklama kısmına yazınız. <br>Siparişiniz banka havalesi onaylanmadıkça işleme alınmayacaktır.</p>
											<br/>
											<p class="referansno t-center">Referans Numarası: <?php echo $ReferansNo;?></p>
											<style>
											.referansno{
												color:white; 
												font-weight:bold;
												padding: 10px 20px 10px 20px; 
												width: auto;
												border: 1px solid white;
												text-align: center;
											}
											</style>
											<br/>
										</div>
									<div class="heading-separator"><span class="main-bg"></span><span class="dark-bg"></span></div>
								</div>
								<table class="table table-bordered table-stripped table-hover">
									<thead>
										<tr>
											<th style="background-color:#f3f3f3; font-weight:bold;" class="t-center" colspan="6">BANKA HESAPLARIMIZ</th>
										</tr>
										<tr>
											<th class="main-bg t-center">BANKA</th>
											<th class="main-bg t-center">HESAP SAHİBİ</th>
											<th class="main-bg t-center">IBAN</th>
											<th class="main-bg t-center">HESAP NO</th>
											<th class="main-bg t-center">ŞUBE ADI</th>
											<th class="main-bg t-center">ŞUBE NO</th>
										</tr>
									</thead>
									<tbody>
								<?php 
								$Sorgu = $Baglan->query("SELECT * FROM hddizayn_banka WHERE durum = 1 ORDER BY ID ASC");
								while($Sonuc = $Sorgu->fetch_object()){?>
										<tr>
											<td class="main-color bold"><center><?php echo $Sonuc->bankaadi;?></center></td>
											<td><center><?php echo $Sonuc->hesapsahibi;?></center></td>
											<td><center><?php echo $Sonuc->iban;?></center></td>
											<td><center><?php echo $Sonuc->hesapno;?></center></td>
											<td><center><?php echo $Sonuc->subeadi;?></center></td>
											<td><center><?php echo $Sonuc->subeno;?></center></td>
										</tr>
									<?php }?>
								</table>
								<?php }else{?>
								<div class="heading main-heading t-center" style="font-size:16px;">
										<div class="alert success-box shape" style="background-color:#880590;" data-close="false">
											<p class="heading-desc" style="color:white;">Sayın <?php echo $_SESSION['adsoyad'];?><br/><br/> Kapıda Ödeme İle Siparişiniz Oluşturulmuştur.</p>
											<br/>
											<p class="referansno t-center">Referans Numarası: <?php echo $ReferansNo;?></p>
											<style>
											.referansno{
												color:white; 
												font-weight:bold;
												padding: 10px 20px 10px 20px; 
												width: auto;
												border: 1px solid white;
												text-align: center;
											}
											</style>
											<br/>
										</div>
									<div class="heading-separator"><span class="main-bg"></span><span class="dark-bg"></span></div>
								</div>
								<?php }?>
							</div>
						</div>
						<style>
						.cart_navigation button.next-btn {
							float: right;
							background: #ad000d;
							color: #fff;
							border: 1px solid #ad000d;
						}
						.buton {
							border-radius: 0;
							font-size: 14px;
							height: 39px;
							padding: 0 35px;
							-webkit-transition: 0.2s;
							-o-transition: 0.2s;
							transition: 0.2s;
						}
						</style>
                        <div class="cart_navigation ust-bosluk">
                            <a href="siparislerim.html" class="next-btn">Siparişleri Görüntüle</a>
                        </div>
						</form>
						<br/><br/><br/><br/>
                    </div>
                </div> 
				<?php }?>
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