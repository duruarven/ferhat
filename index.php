<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
sistembakim();
include("panel/sistem/site_sayac.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $HDDizayn['title'];?></title>
	<meta name="description" content="<?php echo $HDDizayn['description']?>">
	<meta name="keywords" content="<?php echo $HDDizayn['meta']?>">
	<meta name="copyright" content="<?php echo $HDDizayn['copyright']?>"/>
	<meta property="og:title" content="<?php echo $HDDizayn['title']?>" />
	<meta property="og:description" content="<?php echo $HDDizayn['description']?>"/>
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="cms-index-index index-opt-1" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <div class="wrapper">
        <main class="site-main">
			<?php require_once('header.php'); slider();
			$Sorgu = $Baglan->query("SELECT * FROM hddizayn_serbest"); 
			$Sonuc = $Sorgu->fetch_object(); ?>
			<?php echo $Sonuc->yazi_alani;?>
            <div class="container" id="urun-extra">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-tab-products-opt1">
                            <div class="block-title">
                                <ul class="nav" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#cok-satanlar"  role="tab" data-toggle="tab">ÇOK SATANLAR</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#indirimler" role="tab" data-toggle="tab">İNDİRİMLER</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="block-content tab-content">
                                <div role="tabpanel" class="tab-pane active fade in" id="cok-satanlar">
                                    <div class="owl-carousel" 
                                        data-nav="true" 
                                        data-dots="false"
										data-autoplayTimeout="700"
										data-autoplay="true" 
										data-loop="true"
                                        data-margin="30" 
                                        data-responsive='{  "0":{"items":1},"480":{"items":2},"480":{"items":2},"768":{"items":3},"992":{"items":3}
                                    }'>
										<?php
										$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = 1 and cok_satan = 1 or satis_adedi > {$HDDizayn['populer_urun_adeti']} ORDER BY ID ASC");
										while($Sonuc = $Sorgu->fetch_object()){
										?>
                                        <div class="product-item  product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
													<a class="product-item-img" href="<?php echo $Sonuc->seflink.".html";?>">
														<img alt="<?php echo $Sonuc->baslik;?>" src="<?php echo "dosyalar/urunler/".$Sonuc->resim;?>" width="270" height="350">
													</a>
                                                </div>
												<?php if($Sonuc->indirim==1){
												$AnaFiyat 	= $Sonuc->urunfiyat;
												$Hesapla 	= $Sonuc->urunfiyat - $Sonuc->indirimli_fiyat; 
												$Yuzde	 	= ($Hesapla / $AnaFiyat) * 100;	
												?>
												<span class="product-item-label label-sale-off" align="center" style="font-size:13px; font-weight:bold;">%<?php echo floor($Yuzde);?><span style="padding-top:5px;">İndirim</span></span>
                                                <strong class="product-item-name" style="padding-top:15px;"><a href="<?php echo $Sonuc->seflink.".html";?>"><?php echo $Sonuc->baslik;?></a></strong>
                                                <div class="product-item-price">
                                                    <span class="price"><?php echo number_format($Sonuc->indirimli_fiyat, 2, ',', ',')." ".$Sonuc->para_birimi;?></span>
                                                    <span class="old-price"><?php echo number_format($Sonuc->urunfiyat, 2, ',', ',')." ".$Sonuc->para_birimi;?></span>
                                                </div>
												<?php }else{?>
                                                <strong class="product-item-name" style="padding-top:15px;"><a href="<?php echo $Sonuc->seflink.".html";?>"><?php echo $Sonuc->baslik;?></a></strong>
                                                <div class="product-item-price">
                                                    <span class="price"><?php echo number_format($Sonuc->urunfiyat, 2, ',', ',')." ".$Sonuc->para_birimi;?></span>
                                                </div>
												<?php }?>
                                            </div>
                                        </div>
										<?php }?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="indirimler">
                                    <div class="owl-carousel" 
                                        data-nav="true" 
                                        data-dots="false" 
                                        data-margin="30" 
										data-autoplayTimeout="700"
										data-autoplay="true" 
										data-loop="true"
                                        data-responsive='{  "0":{"items":1},"480":{"items":2},"480":{"items":2},"768":{"items":3},"992":{"items":3}
                                    }'>
										<?php
										$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = 1 and indirim = 1 ORDER BY ID ASC");
										while($Sonuc = $Sorgu->fetch_object()){
										?>
                                        <div class="product-item  product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
													<a class="product-item-img" href="<?php echo $Sonuc->seflink.".html";?>">
														<img alt="<?php echo $Sonuc->baslik;?>" src="<?php echo "dosyalar/urunler/".$Sonuc->resim;?>" width="270" height="350">
													</a>
                                                </div>
												<?php if($Sonuc->indirim==1){
												$AnaFiyat 	= $Sonuc->urunfiyat;
												$Hesapla 	= $Sonuc->urunfiyat - $Sonuc->indirimli_fiyat; 
												$Yuzde	 	= ($Hesapla / $AnaFiyat) * 100;	
												?>
												<span class="product-item-label label-sale-off" align="center" style="font-size:13px; font-weight:bold;">%<?php echo floor($Yuzde);?><span style="padding-top:5px;">İndirim</span></span>
                                                <strong class="product-item-name" style="padding-top:15px;"><a href="<?php echo $Sonuc->seflink.".html";?>"><?php echo $Sonuc->baslik;?></a></strong>
                                                <div class="product-item-price">
                                                    <span class="price"><?php echo number_format($Sonuc->indirimli_fiyat, 2, ',', ',')." ".$Sonuc->para_birimi;?></span>
                                                    <span class="old-price"><?php echo number_format($Sonuc->urunfiyat, 2, ',', ',')." ".$Sonuc->para_birimi;?></span>
                                                </div>
												<?php }else{?>
                                                <strong class="product-item-name" style="padding-top:15px;"><a href="<?php echo $Sonuc->seflink.".html";?>"><?php echo $Sonuc->baslik;?></a></strong>
                                                <div class="product-item-price">
                                                    <span class="price"><?php echo number_format($Sonuc->urunfiyat, 2, ',', ',')." ".$Sonuc->para_birimi;?></span>
                                                </div>
												<?php }?>
                                            </div>
                                        </div>
										<?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-banner-bottom-opt12">
                <div class="container">
                    <div class="row">
						<?php
						$Sorgucu = $Baglan->query("SELECT * FROM hddizayn_reklam WHERE durum = 1 and reklam_alani = 'cok_satan_alti' ORDER BY id DESC");
						while($Sonucla = $Sorgucu->fetch_object()){
						echo '
                        <div class="col-md-6">
                            <a href="'.$Sonucla->reklam_link.'" class="box-img"><img src="dosyalar/afis/'.$Sonucla->resim.'" alt="'.$Sonucla->reklam_aciklama.'"></a>
                        </div>';
						}
						?>
                    </div>
                </div>
            </div>
			<?php OzelKategori(); ?>
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