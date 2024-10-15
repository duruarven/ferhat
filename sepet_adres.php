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
    <title>Adres Seçimi - <?php echo $HDDizayn['title'];?></title>
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
	<script type="text/javascript">
		function toggle_div(id) {
			var diq = document.getElementById(id).style;
			diq.display=(diq.display=="none") ? "" : "none";
		}
	</script>
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
			<div class="yazdir"><div class="yazdir1" id="yazdir"></div></div>
            <div class="columns container">
				<?php
				$SepetSorgu	= $Baglan->query("SELECT * FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."' ORDER BY sepet_tarih DESC");
				if(!$Baglan->affected_rows){ @header("location:sepet.html");?><?php }else{?>
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">Sepet</li>
                </ol>
                <h2 class="page-heading" id="sepetadres">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">ADRES SEÇİMİ</span>
                </h2>
                <div class="page-content page-order">
                    <ul class="step">
                        <li><span>01. Özet</span></li>
                        <li class="current-step"><span>02. Adres Seçimi</span></li>
                        <li><span>03. Ödeme Yöntemi</span></li>
						<li><span>04. Sipariş Onayı</span></li>
                        <li><span>05. Sipariş Sonuç</span></li>
                    </ul>
                    <div class="order-detail-content" style="padding-top:10px;">
							<div class="cart_totals">
								<table class="Tablo">
									<tr class="shipping">
										<th class="t-center" style="font-size:16px;">Adres Bilgileri</th>
										<td>
										<?php 
										$Sorgu = $Baglan->query("SELECT * FROM hddizayn_uyeler_adres WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id DESC");
										if(!$Baglan->affected_rows){ ?>
											<div class="mesaj bilgi">
												<span style="font-size:15px;" class="bold">Dikkat: Üyeliğinize ait tanımlı adres bulunmuyor. Adres kaydı yaparak alışverişe devam edebilirsiniz.</span>
											</div>
											<p> 
											<a style="margin-bottom :10px; background-color:#000; color:white;" class="btn btn-black sm bold" href="javascript:toggle_div('yeni_adres')"><i class="fa fa-plus"></i><span class="bold site-font">&nbsp;&nbsp;Yeni Adres Kayıt</span></a>
												<div style="display:none;" id="yeni_adres" class="animated pulse faster" data-animate="fadeInDown" data-animation-delay="300">
												<hr class="left fx" data-animate="bounceInDown" data-animation-delay="300" style="margin-top:10px; height: 2px; border-top:0; border-radius: 5px; background-image: linear-gradient(to left, #c4e17f, #c4e17f 12.5%, #a0db8e 12.5%, #a0db8e 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);">
												<div class="contact-form">
													<form method="post" id="yeniadres">
															<div class="form-input">
																<label>Adres Başlığı<span class="red">*</span></label>
																<input name="adres_baslik" id="adres_baslik" type="text" class="form-control shape" placeholder="Başlık" required>
																<input name="uye_id" id="uye_id" type="hidden" value="<?php echo $Uye->id;?>">
															</div>
															<div class="row" style="margin-top:5px;">
																<div class="form-group col-md-4">
																	<label>Şehir <span class="red">*</span></label>
																	<input id="sehir" name="sehir" type="text" class="form-control shape" placeholder="Şehir" required>
																</div>
																<div class="form-group col-md-4">
																	<label>İlçe<span class="red">*</span></label>
																	<input id="ilce" name="ilce" type="text" class="form-control shape" placeholder="İlçe" required>
																</div>
																<div class="form-group col-md-4">
																	<label>Posta Kodu<span class="red">*</span></label>
																	<input id="postakodu" name="postakodu" type="text" class="form-control shape" placeholder="Posta Kodu" required>
																</div>
															</div>
															<div class="form-selector">
																<label>Adres</label>
																<textarea name="adres" id="adres" rows="6" class="form-control input-sm" placeholder="Adres Bilgileriniz" required></textarea>
															</div>
															<input style="background-color:#007802;color:white;" id="sepetadreskaydet" type="submit" class="btn btn-md main-bg bold" value="Kaydet">
														</div>
													</form>
													<hr class="left fx" data-animate="bounceInDown" data-animation-delay="300" style="margin-top:10px; height: 2px; border-top:0; border-radius: 5px; background-image: linear-gradient(to left, #c4e17f, #c4e17f 12.5%, #a0db8e 12.5%, #a0db8e 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);">
												</div>
											</div>
											</p>
										<?php }?>	
										<form method="post" action="sepet-odeme.html">
											<div class="shipping-calculator-form">
											<label>Teslimat Adresi</label>
												<p class="form-row form-row-wide">
													<?php 
													$Sorgu = $Baglan->query("SELECT * FROM hddizayn_uyeler_adres WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id ASC");
													if(!$Baglan->affected_rows){?>
														<select class="input form-control" style="font-size:15px;" disabled>
															<option selected="selected">Tanımlı Adresiniz Bulunmuyor !</option>
														</select>
													<?php }else{ ?>
													<select class="input form-control" id="teslimat_adres" name="teslimat_adres" style="font-size:15px;">
													<option value="">Adres Seçiniz !</option>
													<?php while($Adres = $Sorgu->fetch_object()){ ?>
													<option value="<?php echo $Adres->adres;?> - <?php echo $Adres->ilce;?> / <?php echo $Adres->sehir;?>"><?php echo $Adres->adres;?> - <?php echo $Adres->ilce;?> / <?php echo $Adres->sehir;?></option>
													<?php }}?>	
													</select> 
												</p>
												<br/><br/>
												<label>Fatura Adresi</label>
												<p class="form-row form-row-wide">
													<span>
														<?php 
														$Sorgu = $Baglan->query("SELECT * FROM hddizayn_uyeler_adres WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id ASC");
														if(!$Baglan->affected_rows){?>
															<select class="input form-control" style="font-size:15px;" disabled>
																<option selected="selected">Tanımlı Adresiniz Bulunmuyor !</option>
															</select>
														<?php }else{ ?>
														<select class="input form-control" id="fatura_adres" name="fatura_adres" style="font-size:15px;">
														<option value="">Adres Seçiniz !</option>
														<?php while($Adres = $Sorgu->fetch_object()){?>
														<option value="<?php echo $Adres->adres;?> - <?php echo $Adres->ilce;?> / <?php echo $Adres->sehir;?>"><?php echo $Adres->adres;?> - <?php echo $Adres->ilce;?> / <?php echo $Adres->sehir;?></option>
														<?php }}?>
														</select>
													</span>
												</p>
											</div>
										
										</td>
									</tr>
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
                        <div class="cart_navigation">
                            <a href="sepet.html#sepet" class="prev-btn">Özet'e Geri Dön</a>
							<button class="buton hd-color next-btn" type="submit">Ödeme Yöntemi<i style="font-size:10px; padding-left:15px;" class="fas fa-chevron-right"></i></button>
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