<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
$id = GET('referans_no');
$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE referans_no = '$id'");
if ($Goster = $Sorgu->num_rows==0)
{ Hata404(); yonlen("404.html"); }
$Siparisler = $Sorgu->fetch_object();
$Urun  = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE id = '$Siparisler->urun_id' ORDER BY id ASC LIMIT 1");
$UrunSonuc = $Urun->fetch_object();
$Yazdir = $Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' and referans_no = '$Siparisler->referans_no'");
$Adet = $Yazdir->num_rows;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Sipariş - <?php echo $Siparisler->referans_no;?></title>
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
        <?php require_once('header.php');?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
					<li><a href="hesabim.html">Hesabım</a></li>
					<li><a href="siparislerim.html">Siparişlerim</a></li>
                    <li class="active bold">Sipariş - <?php echo $Siparisler->referans_no;?></li>
                </ol>
                <div class="page-content page-order">
					<div class="order-detail-content">
						<div class="invoice">
							<?php
							$Sorgu = $Baglan->query("SELECT * FROM hddizayn_uyeler WHERE id = '{$Siparisler->satinalanuye}' ORDER BY ID ASC");
							$Sonuc = $Sorgu->fetch_object();
							?>
							<div class="row">
								<div class="col-lg-6" align="left">
									<h4 class="main-color"><strong>SİPARİŞ VEREN</strong></h4>
										<span style="font-size:15px; font-weight:bold; color:black;"><?php echo $Sonuc->adsoyad;?></span> <br>
										<span style="font-size:15px; font-weight:bold; color:black;"><?php echo $Sonuc->eposta;?></span> <br>
										<span style="font-size:15px; font-weight:bold; color:black;"><?php echo $Sonuc->telefon;?></span>
										<?php if($Siparisler->siparis_durum==2){?>
											<div>
												<br/>
												<label class="nav-left main-color" style="font-size:18px;">KARGO FİRMASI</label>
												<br/>
												<?php if($Siparisler->kargofirmasi==1){?>
												<img class="centered" width="140" height="60" src="images/kargo/yurtici.png">
												<?php }elseif($Siparisler->kargofirmasi==2){?>
												<img class="centered" width="100" height="70" src="images/kargo/aras.png">
												<?php }elseif($Siparisler->kargofirmasi==3){?>
												<img class="centered" width="200" height="70" src="images/kargo/mng.png">
												<?php }elseif($Siparisler->kargofirmasi==4){?>
												<img class="centered" width="200" height="70" src="images/kargo/surat.png">
												<?php }?>
											</div>
										<?php }?>
								</div>
								<div class="col-lg-6" align="right">
									<h4 class="main-color"><strong>SİPARİŞ DETAY</strong></h4>
										<span style="font-size:15px; font-weight:bold; color:black;">Ödeme Şekli : <?php echo $Siparisler->odemesekli;?></span><br>
										<span style="font-size:15px; font-weight:bold; color:black;">Referans No : <?php echo $Siparisler->referans_no;?></span> <br>
										<span style="font-size:15px; font-weight:bold; color:black;">Sipariş Kimlik : <?php echo "#".$Siparisler->kimlik;?></span>
										<?php if($Siparisler->siparis_durum==2){?>
											<br/><br/>
											<label class="main-color" style="font-size:18px;">GÖNDERİ TAKİP NO</label>
											<br/>
											<p style="font-size:18px;"><?php echo $Siparisler->kargotakipno;?></p>
										<?php }?>	
								</div>
							</div>
							<br><br>
							<div class="table-responsive">
								<table class="table table-bordered cart_summary">
									<?php
									$Sorgula = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE id = '{$Siparisler->urun_id}' ORDER BY ID ASC");
									$Sonucla = $Sorgula->fetch_object();
									?>
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
										<?php
										$Sorguuu = $Baglan->query("SELECT * FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' and referans_no = '$Siparisler->referans_no' GROUP BY id ASC");
										while($Sonuccc = $Sorguuu->fetch_object()){
										$Urun  = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE id = '{$Sonuccc->urun_id}' ORDER BY id ASC LIMIT 1");
										$UrunSonuc = $Urun->fetch_object();
										?>
										<tr>
											<td class="cart_product">
												<center>
												<a href="<?php echo $UrunSonuc->seflink.".html";?>" target="_blank"><img src="<?php echo "dosyalar/urunler/".$UrunSonuc->resim;?>" width="100" height="130"></a>
												</center>
											</td>
											<td style="font-weight:bold;" width="600">
												<center>
												<p style="font-size:bold; font-size:16px;"><?php echo $UrunSonuc->baslik;?></p>
												<small class="main-color" style="font-size:15px; font-weight:bold;">Ürün Kodu :</small> <small style="font-size:15px;">#<?php echo $UrunSonuc->kimlik;?></small><br>
												<?php
												$Renk = $Sonuccc->renk;
												$Ozellik = $Sonuccc->ozellik;
												?>
												<?php if($Renk==""){}else{echo '<small style="font-size:14px; font-weight:bold;" class="main-color">Renk :</small> <small style="font-size:14px;">'.$Renk.'</small><br>';}?>
												<?php if($Ozellik==""){}else{echo '<small style="font-size:14px; font-weight:bold;" class="main-color">Özellik :</small> <small style="font-size:14px;">'.$Ozellik.'</small><br>';}?>
												</center>
											</td>
											<td style="font-weight:bold;"><span><center><?php echo number_format($Sonuccc->satisfiyati,2,",",".")." ".$Sonuccc->para_birimi;?></center></span></td>
											<td  style="font-weight:bold;">
												<span><center><?php echo $Sonuccc->urun_adet;?></center></span>
											</td>
											<td  style="font-weight:bold;">
												<span><center><?php echo number_format($Sonuccc->urunadetlifiyati,2,",",".")." ".$Sonuccc->para_birimi;?> </center></span>
											</td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2" rowspan="5">
												<div align="left">
													<?php echo '<span style="font-size:15px; font-weight:bold;">Ödeme Yöntemi&nbsp;&nbsp;:&nbsp;</span>'.'<span style="font-size:15px; font-weight:bold; color:black">'.$Siparisler->odemesekli.'</span><br/><br/>';?>
													<?php if($Siparisler->banka==""){}else{echo '<span style="font-size:15px; font-weight:bold;">Seçilen Banka&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>'.'<span style="font-size:15px; font-weight:bold; color:black">'.$Siparisler->banka.'</span><br/><br/>';}?>
													<?php echo '<span style="font-size:15px; font-weight:bold;">Teslimat Adresi&nbsp;&nbsp;&nbsp;:&nbsp;</span>'.'<span style="font-size:15px; font-weight:bold; color:black">'.$Siparisler->teslimat_adres.'</span><br/><br/>';?>
													<?php echo '<span style="font-size:15px; font-weight:bold;">Fatura Adresi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>'.'<span style="font-size:15px; font-weight:bold; color:black">'.$Siparisler->fatura_adres.'</span>';?>
												</div>
											</td>
											<?php
											$SorguTutar	= $Baglan->query("SELECT sum(urunadetlifiyati) FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' and referans_no = '$Siparisler->referans_no'");
											$TutarSonuc = $SorguTutar->fetch_assoc();
											?>
											<td colspan="2" style="font-size:15px;"><strong>ARA TOPLAM</strong></td>
											<td colspan="2" style="font-weight:bold; color:black; text-align:center;font-size:15px;"><?php echo number_format($TutarSonuc["sum(urunadetlifiyati)"],2,",",".")." ".$Siparisler->para_birimi;?></td>
										</tr>
										<?php
										$SorguKdv	= $Baglan->query("SELECT sum(urun_kdv) FROM hddizayn_urun_satislari WHERE satinalanuye = '{$_SESSION['uye_id']}' and referans_no = '$Siparisler->referans_no'");
										$KdvSonuc = $SorguKdv->fetch_assoc();
										?>
										<tr>
											<td colspan="2" style="font-size:15px;"><strong>KDV</strong></td>
											<td colspan="2" style="font-weight:bold; color:black; text-align:center;font-size:15px;"><?php echo number_format($KdvSonuc["sum(urun_kdv)"],2,",",".")." ".$Siparisler->para_birimi;?></td>
										</tr>
										<?php
										$KdvliFiyat	= $Baglan->query("SELECT sum(urunler_kdvli_fiyat) FROM hddizayn_urun_satislari WHERE satinalanuye = '".$_SESSION["uye_id"]."' and referans_no = '$Siparisler->referans_no'");
										$UrunlerKdvli = $KdvliFiyat->fetch_assoc();
										?>
										<tr>
											<td colspan="2" style="font-size:15px;"><strong>KDV DAHİL</strong></td>
											<td colspan="2" style="font-weight:bold; color:black; text-align:center;font-size:15px;"><?php echo number_format($UrunlerKdvli["sum(urunler_kdvli_fiyat)"],2,",",".")." ".$Siparisler->para_birimi;?></td>
										</tr>
										<tr>
											<td colspan="2" style="font-size:15px;"><strong>KARGO</strong></td>
											<td colspan="2" style="font-weight:bold; color:black; text-align:center;font-size:15px;"><?php echo $Kargo = @number_format($Siparisler->kargo,2,",",".")." ".$Siparisler->para_birimi;?></td>
										</tr>
										
										<tr>
											<td colspan="2" style="font-size:15px;"><strong>GENEL TOPLAM</strong></td>
											<td colspan="2" style="font-weight:bold; color:black; text-align:center;font-size:15px;"><?php echo number_format($UrunlerKdvli["sum(urunler_kdvli_fiyat)"]+$Siparisler->kargo,2,",",".")." ".$Siparisler->para_birimi;?></td>
										</tr>
									</tfoot>    
								</table>
							</div>
							<br><br>
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