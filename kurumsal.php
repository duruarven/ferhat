<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
include("panel/sistem/site_sayac.php");
sistembakim();  $id = GET('id');
if(!@in_array($id, explode(':', $_COOKIE['hit_ekle']))){
$Hit = $Baglan->query("UPDATE hddizayn_kurumsal SET goruntulenme=goruntulenme+1 WHERE seflink = '$id' ORDER BY id ASC LIMIT 1");
setcookie('hit_ekle', $_COOKIE['hit_ekle'].$id.':', time()+9999999); 
} $Sorgu = $Baglan->query("SELECT * FROM hddizayn_kurumsal WHERE durum = '1' and seflink = '$id'");
if(!$Baglan->affected_rows){ Hata404(); yonlen("404.html");}
$Kurumsal = $Sorgu->fetch_object();
if($Kurumsal->tur==1){ $geldigi_sayfa = $_SERVER['HTTP_REFERER'];  
	yonlen("../index.html");
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<title><?php echo $Kurumsal->baslik;?> - <?php echo $HDDizayn["title"];?></title>
	<?php if($Kurumsal->tur==0){?>
	<meta name="description" content="<?php echo $Kurumsal->seo_aciklama;?>">
	<meta name="keywords" content="<?php echo $Kurumsal->anahtar_kelimeler;?>">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
	<?php }else{?>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<?php }?>
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
					<li><a href="<?php echo "bilgi/".$Kurumsal->seflink.".html";?>"><?php echo $Kurumsal->baslik;?></a></li>
                </ol>
                <div class="row">
                    <div class="col-md-9 col-md-push-3   col-main">
                        <h2 class="page-heading">
                            <span class="page-heading-title2 bold"><?php echo $Kurumsal->baslik;?></span>
                        </h2>
                        <div class="content-text clearfix">
							<?php if($Kurumsal->resim==""){}else{ 
								echo '<img width="310" alt=""'.$Kurumsal->baslik.'"" class="alignleft" src="dosyalar/kurumsal/"'.$Kurumsal->resim.'"">';
							}
							?>
							<?php echo $Kurumsal->aciklama;?>
                        </div>
						<br/><br/>
                    </div>
                    <div class="col-md-3 col-md-pull-9 col-sidebar">
                        <div class="block-sidebar block-sidebar-categorie">
                            <div class="block-content">
                                <ul class="items">
									<?php
									$Sorgula = $Baglan->query("SELECT * FROM hddizayn_kurumsal_kategori WHERE durum = 1");
									While($Sonucla = $Sorgula->fetch_object()){
									?>
                                    <li class="parent">
                                        <a href="javascript:;" class="bold"><?php echo $Sonucla->baslik;?></a>
                                        <span class="toggle-submenu"></span>
                                        <ul class="subcategory">
											<?php
											$Sorgu = $Baglan->query("SELECT * FROM hddizayn_kurumsal WHERE durum = 1 AND kategori =  '$Sonucla->id'  AND  id != '$Kurumsal->id' ORDER BY id ASC");
											While($Sonuc = $Sorgu->fetch_object()){
											?>
											<li>
												<?php if($Sonuc->tur==0){?>
													<a href="<?php echo "bilgi/".$Sonuc->seflink.".html";?>"><?php echo $Sonuc->baslik;?></a>
												<?php }else{?>
													<a href="<?php echo $Sonuc->link;?>"><?php echo $Sonuc->baslik;?></a>
												<?php } ?>
											</li>
											<?php }?>
                                        </ul>
                                    </li>
									<?php }?>
                                </ul>
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