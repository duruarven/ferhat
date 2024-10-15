<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
if($_POST['select']==""){
	header("Location:sepet-adres.html#sepetadres");
}else{
	if($_POST['select'] == 'Banka-Havalesi'){
		$OdemeYontemi = "Banka Havalesi";
		$_SESSION["odeme_yontemi"] = $OdemeYontemi;
		$Banka = POST('banka');
			if($Banka==""){
				header("Location:sepet-odeme.html");
			}
	}elseif($_POST['select'] == 'Kapıda-Ödeme'){
		$OdemeYontemi = "Kapıda Ödeme";
		$_SESSION["odeme_yontemi"] = $OdemeYontemi;
	}
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Sipariş Onayı - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script> 
	<script type="text/javascript" src="js/hddizayn.js"></script> 
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
		<div class="yazdir"><div class="yazdir1" id="sepet"></div></div>
            <div class="columns container">
				<?php
				$SepetSorgu	= $Baglan->query("SELECT * FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."' ORDER BY sepet_tarih DESC");
				if(!$Baglan->affected_rows){ @header("location:sepet.html");?>
				<?php }else{?>
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">Sepet</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">SİPARİŞ ONAYI</span>
                </h2>
                <div class="page-content page-order">
                    <ul class="step">
                        <li><span>01. Özet</span></li>
                        <li><span>02. Adres Seçimi</span></li>
                        <li><span>03. Ödeme Yöntemi</span></li>
						<li class="current-step"><span>04. Sipariş Onayı</span></li>
                        <li><span>05. Sipariş Sonuç</span></li>
                    </ul>
                    <div class="order-detail-content">
                        <div class="table-responsive ust-bosluk">
							<table class="table table-bordered cart_summary">
								<thead>
									<tr>
										<th class="cart_product"><center>ÜRÜN</center></th>
										<th><center>AÇIKLAMA</center></th>
										<th><center>FİYAT</center></th>
										<th><center>ADET</center></th>
										<th><center>TOPLAM</center></th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<?php
									while($SepetSonuc = $SepetSorgu->fetch_assoc()){
									$Sorguid					=	$SepetSonuc["id"];
									$SorguSepetNo				=	$SepetSonuc["sepet_no"];
									$SorguUrunid				=	$SepetSonuc["urun_id"];
									$Sorgu						=	$Baglan->query("SELECT * FROM hddizayn_urunler WHERE id='$SorguUrunid' ORDER BY id ASC LIMIT 1");
									$Sonuc						=	$Sorgu->fetch_assoc();
									$UrununAdi					=	$Sonuc["baslik"];
									$ParaBirimi					=	$Sonuc["para_birimi"];
									$Kdv						=	$Sonuc["urun_kdv"];
									$Renk						=	$SepetSonuc["renk"];
									$Ozellik					=	$SepetSonuc["ozellik"];
									$SorguUrunBirimFiyati		=	$SepetSonuc["urunbirimfiyati"];
									$SorguUrunBirimFiyatiYaz	=	@number_format($SorguUrunBirimFiyati,2,",",".");
									$SorguUrunAdedi				=	$SepetSonuc["adet"];
									$SorguUrunAdetliToplam		=	$SepetSonuc["urunadetlitoplam"];
									$SorguurUnadetliToplamYaz	=	@number_format($SorguUrunAdetliToplam,2,",",".");
									?>
										<td class="cart_product">
											<center>
											<a href="<?php echo $Sonuc["seflink"].".html";?>"><img alt="Product" src="<?php echo "dosyalar/urunler/".$Sonuc['resim'];?>"></a>
											</center>
										</td>
										<td class="cart_description" width="600">
											<center>
											<p class="product-name"><a href="<?php echo $Sonuc["seflink"].".html";?>"><?php echo $UrununAdi;?></a></p>
											<small class="main-color" style="font-size:14px; font-weight:bold;">Ürün Kodu :</small> <small style="font-size:14px;">#<?php echo $Sonuc["kimlik"];?></small><br>
											<?php if($Renk==""){}else{echo '<small style="font-size:14px; font-weight:bold;" class="main-color">Renk :</small> <small style="font-size:14px;">'.$Renk.'</small><br>';}?>
											<?php if($Ozellik==""){}else{echo '<small style="font-size:14px; font-weight:bold;" class="main-color">Özellik :</small> <small style="font-size:14px;">'.$Ozellik.'</small><br>';}?>
											</center>
										</td>
										<td class="price"><span><center><?php echo $SorguUrunBirimFiyatiYaz." ".$ParaBirimi;?></center></span></td>
										<td class="cart_product">
											<span><center><?php echo $SorguUrunAdedi;?></center></span>
										</td>
										<td class="price">
											<span><center><?php echo $SorguurUnadetliToplamYaz." ".$ParaBirimi;?> </center></span>
										</td>
									</tr>
									<?php }?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2" rowspan="4">
											<div align="left">
												<?php
												$Sorgu = $Baglan->query("SELECT * FROM hddizayn_banka WHERE durum = 1 and id = '$Banka' ORDER BY id ASC");
												$Sonuc = $Sorgu->fetch_object();
												?>
												<?php echo '<span class="bold">Ödeme Yöntemi&nbsp;&nbsp;:&nbsp;</span>'.'<span class="main-color">'.$OdemeYontemi.'</span><br/><br/>';?>
												<?php if($Banka==""){}else{ $_SESSION["banka"] = $Sonuc->bankaadi; echo '<span class="bold">Seçilen Banka&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>'.'<span class="main-color">'.$Sonuc->bankaadi.'</span><br/><br/>';}?>
												<?php echo '<span class="bold">Teslimat Adresi&nbsp;&nbsp;&nbsp;:&nbsp;</span>'.'<span class="main-color">'.$_SESSION["teslimat_adres"].'</span><br/><br/>';?>
												<?php echo '<span class="bold">Fatura Adresi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>'.'<span class="main-color">'.$_SESSION["fatura_adres"].'</span>';?>
											</div>
										</td>
										<td colspan="2"><strong>ARA TOPLAM</strong></td>
										<?php
										$SorguTutar	= $Baglan->query("SELECT sum(urunadetlitoplam) FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."'");
										$TutarSonuc = $SorguTutar->fetch_assoc();
										?>
									  <td colspan="2"><?php echo number_format($TutarSonuc["sum(urunadetlitoplam)"],2,",",".")." ".$ParaBirimi;?></td>
									</tr>
									<tr>
										<?php
										$KdvliFiyat	= $Baglan->query("SELECT sum(urunler_kdvli_fiyat) FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."'");
										$UrunlerKdvli = $KdvliFiyat->fetch_assoc();
										?>
										<td colspan="2"><strong>KDV DAHİL</strong></td>
										<td colspan="2"><?php echo number_format($UrunlerKdvli["sum(urunler_kdvli_fiyat)"],2,",",".")." ".$ParaBirimi;?></td>
									</tr>
									<tr>
										<td colspan="2"><strong>KARGO</strong></td>
										<td colspan="2"><?php echo $Kargo = @number_format($HDDizayn['kargo_ucreti'],2,",",".")." ".$ParaBirimi; ?></td>
									</tr>
									<tr>
										<td colspan="2"><strong>GENEL TOPLAM</strong></td>
										<td colspan="2"><?php echo number_format($UrunlerKdvli["sum(urunler_kdvli_fiyat)"]+$Kargo,2,",",".")." ".$ParaBirimi;?></td>
									</tr>
								</tfoot>    
							</table>
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
						<form method="post" id="sepetkontrol">
                        <div class="cart_navigation ust-bosluk">
                            <a href="sepet-odeme.html" class="prev-btn">Ödeme Yöntemi Geri Dön</a>
							<button id="siparisver" class="buton hd-color next-btn" type="submit">Alışverişi Tamamla<i style="font-size:10px; padding-left:15px;" class="fas fa-chevron-right"></i></button>
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