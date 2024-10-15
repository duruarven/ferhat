<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
include("panel/sistem/site_sayac.php");
sistembakim();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<title>Sıkça Sorulan Sorular - <?php echo $HDDizayn["title"];?></title>
	<meta name="description" content="<?php echo $Kurumsal->seo_aciklama;?>">
	<meta name="keywords" content="<?php echo $Kurumsal->anahtar_kelimeler;?>">
	<meta name="author" content="<?php echo $Author;?>">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
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
                    <li class="active">Bilgi</li>
					<li><a href="sss.html">S.S.S</a></li>
                </ol>
                <div class="row">
                    <div class="col-md-12 col-main">
                        <h2 class="page-heading">
                            <span class="page-heading-title2 bold">Sıkça Sorulan Sorular</span>
                        </h2>
                        <div class="content-text clearfix">
							<div class="tab-pane active" id="tab_1">
									<div class="panel-group" id="accordion1">
										<?php 
										$Sorgu = $Baglan->query("SELECT * FROM hddizayn_sss WHERE durum = '1' ORDER BY id ASC");
										$Sira = 1; $Saydir = 1; $Cogalt = 1; $Sonlandir = 1;
										while($Sonuc = $Sorgu->fetch_object()){
										?> 
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a href="#accordion1_<?php echo $Sonuc->kimlik;?>" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle <?php echo($Cogalt++ == "1" ? '' : 'collapsed');?>" aria-expanded="<?php echo($Saydir++ == "1" ? 'true' : 'false');?>">
													 <?php echo $Sonuc->baslik;?>
													</a>
												</h4>
											</div>
											<div class="panel-collapse collapse <?php echo($Sonlandir++ == "1" ? 'in' : '');?>" id="accordion1_<?php echo $Sonuc->kimlik;?>" aria-expanded="<?php echo($Sira++ == "1" ? 'true' : 'false');?>">
												<div class="panel-body">
													<?php echo $Sonuc->cevap;?>
												</div>
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
</body>
</html>