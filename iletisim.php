<?php define("GUVENLIK",true);
########################################################################
######################### HDDIZAYN WEB YAZILIM #########################
##########################/ www.HDDizayn.Com \##########################
##########################/ Coder Doğan Soyer \#########################
########################################################################
include("panel/sistem/functions.php");
include("panel/sistem/site_sayac.php");
sistembakim();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>İletişim - <?php echo $HDDizayn['title']?></title>
	<meta name="description" content="<?php echo $HDDizayn['description']?>">
	<meta name="keywords" content="<?php echo $HDDizayn['meta']?>">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="Copyright" content="<?php echo $HDDizayn['copyright']?>" />
	<meta name="author" content="<?php echo $Author;?>">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/hddizayn.js"></script>
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-contact" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
		<?php require_once("header.php");?>
		<div class="yazdir"><div class="yazdir1" id="durum"></div></div>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">İletişim</li>
                </ol>
                <div class="page-content" id="contact">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="page-subheading bold site-font">İLETİŞİM FORMU</h2>
							<form id="mesajgonder" method="post">
                            <div class="contact-form-box">
                                <div class="form-selector">
                                    <label>Ad Soyad</label>
                                    <input type="text" name="adsoyad" class="form-control input-sm" style="border: 1px solid #B8B8B8;" placeholder="Adınız Soyadınız.">
                                </div>
                                <div class="form-selector">
                                    <label>E-Posta</label>
                                    <input type="text" name="eposta" class="form-control input-sm" style="border: 1px solid #B8B8B8;" placeholder="E-Posta Adresiniz.">
                                </div>
                                <div class="form-selector">
                                    <label>Telefon</label>
                                    <input type="text" name="telefon" class="form-control input-sm" style="border: 1px solid #B8B8B8;" placeholder="Telefon">
                                </div>
                                <div class="form-selector">
                                    <label>Konu</label>
                                    <input type="text" name="konu" class="form-control input-sm" style="border: 1px solid #B8B8B8;" placeholder="Konu Nedir ?">
                                </div>
                                <div class="form-selector">
                                    <label>Mesaj</label>
                                    <textarea name="mesaj" rows="8" class="form-control input-sm" style="border: 1px solid #B8B8B8;" placeholder="Mesajınız..."></textarea>
                                </div>
                                <div class="form-selector">
                                    <label>Güvenlik Kodu: 7 + 8 = ?</label>
                                    <input type="text" name="captcha" class="form-control input-sm" style="border: 1px solid #B8B8B8;" placeholder="7 + 8 = ?">
                                </div>
                                <div class="form-selector">
                                    <button id="mesajigonder" class="btn bold hd-color site-font" type="submit" style="color:white;">GÖNDER</button>
                                </div>
                            </div>
							</form>
                        </div>
                        <div id="contact_form_map" class="col-xs-12 col-sm-6">
                            <p>İnternette güvenli alışverişin adresi <?php echo '<b>'.$HDDizayn['site_adi'].'</b>';?>'a aşağıdaki iletişim adreslerinden kolayca ulaşabilirsiniz.</p>
                            <br>
                            <ul>
                                <li>Müşteri Hizmetleri servisimiz haftanın 7 günü, 24 saat gönderdiğiniz sorulara en hızlı şekilde yanıt verir.</li>
                                <li>Çağrı Merkezimiz her gün 08.00 - 24.00 saatleri arasında çalışır.</li>
                            </ul>
                            <br>
                            <ul class="store_info">
                                <li><i class="fa fa-home"></i><?php echo $HDDizayn['adres'];?></li>
                                <li><i class="fa fa-phone"></i><span><?php echo $HDDizayn['telefon'];?></span></li>
                                <li><i class="fa fa-phone"></i><span><?php echo $HDDizayn['gsm'];?></span></li>
                                <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:<?php echo $HDDizayn['eposta'];?>"><?php echo $HDDizayn['eposta'];?></a></span></li>
								<li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:<?php echo $HDDizayn['eposta_diger'];?>"><?php echo $HDDizayn['eposta_diger'];?></a></span></li>
						   </ul>
						   <br>
						   <iframe width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $HDDizayn['harita']?>"></iframe>
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