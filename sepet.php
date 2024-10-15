<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
sistembakim();
include("panel/sistem/site_sayac.php");
$SepetSorgu	= $Baglan->query("SELECT * FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."' ORDER BY sepet_tarih DESC");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Sepetim - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
				<?php
				$SepetSorgu	= $Baglan->query("SELECT * FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."' ORDER BY sepet_tarih DESC");
				if(!$Baglan->affected_rows){?>
				<br/><br/><br/>
				<center>
					<span class="fa-stack fa-5x">
					  <i class="fa fa-circle fa-stack-2x main-color"></i>
					  <i style="color:white;" class="fas fa-shopping-basket fa-stack-1x"></i>
					</span>
					<p style="font-weight:bold; font-size:18px; padding-top:20px;">SEPETİNİZDE ÜRÜN BULUNMUYOR !</p>
				</center>
				<br/><br/><br/>
				<?php }else{?>
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">Sepet</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">SEPET</span>
                </h2>
                <div class="page-content page-order">
                    <ul class="step">
                        <li class="current-step"><span>01. Özet</span></li>
                        <li><span>02. Adres Seçimi</span></li>
                        <li><span>03. Ödeme Yöntemi</span></li>
						<li><span>04. Sipariş Onayı</span></li>
                        <li><span>05. Sipariş Sonuç</span></li>
                    </ul>
                    <div class="heading-counter warning" id="sepet">Sepetinizde: 
                        <span class="main-color" style="font-weight:bold;"><?php echo $SepetSorgu->num_rows;?> Adet</span><span> Ürün Bulunuyor.</span>
                    </div>
                    <div class="order-detail-content">
                        <div class="table-responsive">
                            <table class="table table-bordered cart_summary">
                                <thead>
                                    <tr>
                                        <th class="cart_product"><center>ÜRÜN</center></th>
                                        <th><center>AÇIKLAMA</center></th>
                                        <th><center>STOK</center></th>
                                        <th><center>FİYAT</center></th>
                                        <th><center>ADET</center></th>
                                        <th><center>TOPLAM</center></th>
                                        <th class="action"><i class="far fa-trash-alt"></i></th>
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
                                        <td class="cart_description" width="350">
											<center>
                                            <p class="product-name"><a href="<?php echo $Sonuc["seflink"].".html";?>"><?php echo $UrununAdi;?></a></p>
                                            <small class="main-color" style="font-size:14px; font-weight:bold;">Ürün Kodu :</small> <small style="font-size:14px;">#<?php echo $Sonuc["kimlik"];?></small><br>
											<?php if($Renk==""){}else{echo '<small style="font-size:14px; font-weight:bold;" class="main-color">Renk :</small> <small style="font-size:14px;">'.$Renk.'</small><br>';}?>
											<?php if($Ozellik==""){}else{echo '<small style="font-size:14px; font-weight:bold;" class="main-color">Özellik :</small> <small style="font-size:14px;">'.$Ozellik.'</small><br>';}?>
											</center>
                                        </td>
                                        <td class="cart_avail">
											<?php if($Sonuc["urun_stok"] > 0){ 
												echo '<center><span class="label label-success">STOK VAR</span></center>';
											}else{
												echo '<center><span class="label label-danger">TÜKENMİŞ</span></center>';
											}
											?>
										</td>
                                        <td class="price"><span><center><?php echo $SorguUrunBirimFiyatiYaz." ".$ParaBirimi;?></center></span></td>
                                        <td class="qty">
										<style>
										  input[type=number]{
											position: relative; 
											padding: 5px;
											padding-right: 25px;
										  }
										  input[type=number]::-webkit-inner-spin-button,
										  input[type=number]::-webkit-outer-spin-button {
											opacity: 1;
										  }
										  input[type=number]::-webkit-outer-spin-button, 
										  input[type=number]::-webkit-inner-spin-button {
											-webkit-appearance: inner-spin-button !important;
											width: 25px;
											position: absolute;
											top: 0;
											right: 0;
											height: 100%;
										  }
										</style>
										<form id="adetguncelle" name="adetguncelle" method="post" action="kontrol/sepet_adetguncelle.php">
                                            <input type="number" min="1" minlength="1" maxlength="500" name="adet" value="<?php echo $SorguUrunAdedi;?>" class="form-control input-sm">
												<input type="hidden" name="id" value="<?php echo $Sorguid;?>">
												<input type="hidden" name="kdv" value="<?php echo $Kdv;?>">
											<button onClick="kontrol()" type="submit" title="Adet Güncelle" class="adet-button hd-color"><i class="fa fa-refresh"></i></button>
										</form>
										</td>
                                        <td class="price">
                                            <span><center><?php echo $SorguurUnadetliToplamYaz." ".$ParaBirimi;?> </center></span>
                                        </td>
										<form method="post" action="kontrol/sepet_sil.php">
                                        <td class="action">
											<input type="hidden" name="id" value="<?php echo $Sorguid;?>">
											<button onClick="submit()" type="submit" title="Sepetten Sil" class="btn btn-danger silbtn-circle"><i class="fa fa-times"></i></button>
                                        </td>
										</form>
                                    </tr>
									<?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td rowspan="5" colspan="3"></td>
                                        <td colspan="3"><strong>ARA TOPLAM</strong></td>
										<?php
										$SorguTutar	= $Baglan->query("SELECT sum(urunadetlitoplam) FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."'");
										$TutarSonuc = $SorguTutar->fetch_assoc();
										?>
                                        <td colspan="2"><?php echo number_format($TutarSonuc["sum(urunadetlitoplam)"],2,",",".")." ".$ParaBirimi;?></td>
                                    </tr>
                                    <tr>
										<?php
										$SorguKdv	= $Baglan->query("SELECT sum(urun_kdv) FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."'");
										$KdvSonuc = $SorguKdv->fetch_assoc();
										?>
                                        <td colspan="3"><strong>KDV</strong></td>
                                        <td colspan="2"><?php echo number_format($KdvSonuc["sum(urun_kdv)"],2,",",".")." ".$ParaBirimi;?></td>
                                    </tr>
                                    <tr>
										<?php
										$KdvliFiyat	= $Baglan->query("SELECT sum(urunler_kdvli_fiyat) FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."'");
										$UrunlerKdvli = $KdvliFiyat->fetch_assoc();
										?>
                                        <td colspan="3"><strong>KDV DAHİL</strong></td>
                                        <td colspan="2"><?php echo number_format($UrunlerKdvli["sum(urunler_kdvli_fiyat)"],2,",",".")." ".$ParaBirimi;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>KARGO</strong></td>
                                        <td colspan="2"><?php echo $Kargo = @number_format($HDDizayn['kargo_ucreti'],2,",",".")." ".$ParaBirimi; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>GENEL TOPLAM</strong></td>
                                        <td colspan="2"><?php echo number_format($UrunlerKdvli["sum(urunler_kdvli_fiyat)"]+$Kargo,2,",",".")." ".$ParaBirimi;?></td>
                                    </tr>
                                </tfoot>    
                            </table>
                        </div>
                        <div class="cart_navigation">
                            <a href="index.html" class="prev-btn">Alışverişe Devam Et</a>
                            <a href="sepet-adres.html#sepetadres" class="next-btn">Adres Seçimi</a>
                        </div>
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