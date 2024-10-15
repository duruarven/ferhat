<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php"); sistembakim();
include("panel/sistem/site_sayac.php"); $Kelime = $_POST['kelime']; 
$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE baslik LIKE '%$Kelime%'");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $Kelime;?> - Arama Sonuçları | <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
</head>
<body class="index-opt-1 catalog-category-view catalog-view_op1" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
					<li class="active">Arama</li>
					<li class="active"><?php echo $Kelime;?></li>
                </ol>
                <div class="row">
                    <div class="col-md-12 col-main">
                        <div class=" toolbar-products toolbar-top">
                            <h1 class="cate-title" style="text-transform:uppercase; font-size:20px;">Arama Sonuçları (<?php echo $Sorgu->num_rows;?>)</h1>
                            <div class="modes">
                                <strong class="modes-mode active mode-grid" title="Tablo"></strong>
                            </div>
                        </div>
                        <div class="products products-grid">
                            <ol class="product-items row">
								<?php if(!$Baglan->affected_rows){?>
								<center>
									<span class="fa-stack fa-5x">
									  <i class="fa fa-circle fa-stack-2x main-color"></i>
									  <i style="color:white;" class="fas fa-exclamation-triangle fa-stack-1x"></i>
									</span>
									<p style="font-weight:bold; font-size:18px; padding-top:20px;">Sonuç Bulunamadı !<br/><br/><br/><br/></p>
								</center>
								<?php }else{
								while($Urun = $Sorgu->fetch_object()){
								$Bes = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 5 and urun_id = '{$Urun->id}'"); $BesSonuc = $Bes->fetch_object();
								$Dort = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 4 and urun_id = '{$Urun->id}'"); $DortSonuc = $Dort->fetch_object();
								$Uc = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 3 and urun_id = '{$Urun->id}'"); $UcSonuc = $Uc->fetch_object();
								$iki = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 2 and urun_id = '{$Urun->id}'"); $ikiSonuc = $iki->fetch_object();
								$Bir = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 1 and urun_id = '{$Urun->id}'"); $BirSonuc = $Bir->fetch_object();
								$BesHesapla = $Bes->num_rows*$BesSonuc->derecelendirme; $DortHesapla = $Dort->num_rows*$DortSonuc->derecelendirme; $UcHesapla = $Uc->num_rows*$UcSonuc->derecelendirme;
								$ikiHesapla = $iki->num_rows*$ikiSonuc->derecelendirme; $BirHesapla = $Bir->num_rows*$BirSonuc->derecelendirme; $HesapOrtalama = ($BesHesapla+$DortHesapla+$UcHesapla+$ikiHesapla+$BirHesapla)/5;
								$Sifir		= 0; $MevcutSayi = $HesapOrtalama; $BirYildiz  = 1.0; $ikiYildiz  = 2.0; $UcYildiz   = 3.0; $DortYildiz = 4.0; $BesYildiz  = 5.0; if($HesapOrtalama>$BesYildiz){ $MevcutSayi = 5.0;}
								?>
                                <li class="col-sm-3 product-item site-font">
                                    <div class="product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a href="<?php echo $Urun->seflink.".html";?>" class="product-item-img"><img src="<?php echo "dosyalar/urunler/".$Urun->resim;?>" alt="<?php echo $Urun->baslik;?>"></a>
                                                <a href="<?php echo $Urun->seflink.".html";?>" class="btn btn-cart" type="button"><span>Sepete Ekle</span></a>
                                            </div>
                                            <div class="product-item-detail">
												<?php if($Urun->indirim==1){
												$AnaFiyat 	= $Urun->urunfiyat;
												$Hesapla 	= $Urun->urunfiyat - $Urun->indirimli_fiyat; 
												$Yuzde	 	= ($Hesapla / $AnaFiyat) * 100;	
												?>
												<span class="product-item-label label-sale-off" align="center" style="font-size:13px; font-weight:bold;">%<?php echo floor($Yuzde);?><span style="padding-top:5px;">İndirim</span></span>
                                                <strong class="product-item-name"><a href="<?php echo $Urun->seflink.".html";?>"><?php echo $Urun->baslik;?></a></strong>
                                                <div class="clearfix">
                                                    <div class="t-center">
														<span class="price main-color bold" style="font-size:18px;"><?php echo number_format($Urun->indirimli_fiyat, 2, ',', ',')." ".$Urun->para_birimi;?></span>
														<span class="old-price" style="text-decoration:line-through;font-size:16px;"><?php echo number_format($Urun->urunfiyat, 2, ',', ',')." ".$Urun->para_birimi;?></span>
														<br/><br/>
														<?php if($Urun->cok_satan==1){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															';
														}elseif($MevcutSayi == $Sifir){
															echo 
															'
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $Sifir && $MevcutSayi < $BirYildiz){
															echo 
															'
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $BirYildiz && $MevcutSayi < $ikiYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star"></i>
															<i class="fas fa-star"></i>
															<i class="fas fa-star"></i>
															';
														}elseif($MevcutSayi > $ikiYildiz && $MevcutSayi < $UcYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $UcYildiz && $MevcutSayi < $DortYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $DortYildiz && $MevcutSayi < $BesYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															';
														}elseif($MevcutSayi > $BesYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															';
														}
														?>
													</div>
                                                </div>
												<?php }else{?>
                                                <strong class="product-item-name"><a href="<?php echo $Urun->seflink.".html";?>"><?php echo $Urun->baslik;?></a></strong>
                                                <div class="clearfix">
                                                    <div class="t-center">
													<span class="main-color bold" style="font-size:18px;"><?php echo number_format($Urun->urunfiyat, 2, ',', ',')." ".$Urun->para_birimi;?></span>
														<br/><br/>
														<?php
														if($Urun->cok_satan==1){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															';
														}elseif($MevcutSayi == $Sifir){
															echo 
															'
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $Sifir && $MevcutSayi < $BirYildiz){
															echo 
															'
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $BirYildiz && $MevcutSayi < $ikiYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star"></i>
															<i class="fas fa-star"></i>
															<i class="fas fa-star"></i>
															';
														}elseif($MevcutSayi > $ikiYildiz && $MevcutSayi < $UcYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $UcYildiz && $MevcutSayi < $DortYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color:#ccc;"></i>
															';
														}elseif($MevcutSayi > $DortYildiz && $MevcutSayi < $BesYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
															';
														}elseif($MevcutSayi > $BesYildiz){
															echo 
															'
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															<i class="fas fa-star" style="color: #ff9900;"></i>
															';
														}
														?>
                                                    </div>
                                                </div>
												<?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php }}?>
                            </ol>
                        </div>
						<?php
						$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and indirim = 1");
						if(!$Baglan->affected_rows){
						?><?php }else{ ?>	
						<div class="toolbar-products toolbar-bottom">
							<ul class="pagination">
								<?php
								if($sayfa>1){
								$sayfayibirgerial	=	$sayfa-1;
								echo "<li class='bold'><a href='indirimli-urunler.html'><i class='fa fa-angle-left'></i></a></li>";
								echo "<li class='bold'><a href='indirimli-urunler.html'?s=$sayfayibirgerial'>Geri</a></li>";
								}$sayfanogosterimlimiti	=	5; for($sayfaindex=$sayfa-$sayfanogosterimlimiti; $sayfaindex<=$sayfa+$sayfanogosterimlimiti ; $sayfaindex++){
								if(($sayfaindex>0) and ($sayfaindex<=$toplamsayfasayisi)){
								if($sayfa==$sayfaindex){echo "<li class='active bold'><a href='indirimli-urunler.html'?s=$sayfaindex'>$sayfaindex</a></li>";
								}else{echo "<li class='bold'><a href='indirimli-urunler.html'?s=$sayfaindex'>$sayfaindex</a></li>";
								}}}if($sayfa!=$toplamsayfasayisi){$sayfayibirilerial	=	$sayfa+1;
								echo "<li class='bold'><a href='indirimli-urunler.html'?s=$sayfayibirilerial'>İleri</a></li>";
								echo "<li class='bold'><a href='indirimli-urunler.html'?s=$toplamsayfasayisi'><i class='fa fa-angle-right'></i></a></li>";
								}
								?>
							</ul>
						</div>
						<?php }?>
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
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.elevateZoom.min.js"></script>
    <script src="js/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script src="js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    <script src="js/arcticmodal/jquery.arcticmodal.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $('#slider-range').slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [0, 300],
                    slide: function (event, ui) {
                        $('#amount-left').text(ui.values[0] );
                        $('#amount-right').text(ui.values[1] );
                    }
                });
                $('#amount-left').text($('#slider-range').slider('values', 0));
                $('#amount-right').text($('#slider-range').slider('values', 1));
            }); 
        })(jQuery);
    </script>
</body>
</html>