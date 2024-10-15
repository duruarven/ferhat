<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
$id = GET('id'); $Sorgu = $Baglan->query("SELECT * FROM hddizayn_ticket WHERE ticketno = '$id' and uye_id = '{$_SESSION['uye_id']}'");
if($Goster = $Sorgu->num_rows==0){echo '<script>window.location.href = "../destek-taleplerim.html";</script>';}
$Ticket = $Sorgu->fetch_object();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title><?php echo $Ticket->ticketno;?> - Destek Bildirimi | <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script> 
	<script type="text/javascript" src="js/hddizayn.js"></script> 
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
		<div class="yazdir"><div class="yazdir1" id="yazdir"></div></div>
            <div class="columns container">
                <ol class="breadcrumb no-hide">
					<li><a href="hesabim.html">Hesabım</a></li>
					<li><a href="destek-taleplerim.html">Destek Taleplerim</a></li>
                    <li class="active">Destek Bildirimi #<?php echo $Ticket->ticketno;?></li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">Destek Bildirimi #<?php echo $Ticket->ticketno;?></span>
                </h2>
                <div class="page-content page-order">
					<div class="order-detail-content">
						<form  id="ticketislem" method="post">
							<?php if($Ticket->departman == '1'){?>
							<a style="margin-bottom:10px; font-weight:bold; background-color:#d9534f; color:white;" class="btn btn-sm">Departman: Arıza Bildirimi</a>
							<?php }elseif($Ticket->departman == '2'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#428bca;color:white;" class="btn btn-sm">Departman: Muhasebe</a>
							<?php }elseif($Ticket->departman == '3'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#5bc0de;color:white;" class="btn btn-sm">Departman: Diğer</a>
							<?php }?>
							<?php if($Ticket->oncelik == '1'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#d9534f;color:white;" class="btn btn-sm">Öncelik: Düşük</a>
							<?php }elseif($Ticket->oncelik == '2'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#d9534f;color:white;" class="btn btn-sm">Öncelik: Orta</a>
							<?php }elseif($Ticket->oncelik == '3'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#5cb85c;color:white;" class="btn btn-sm">Öncelik: Yüksek</a>
							<?php }?>
							<?php if($Ticket->durum == '0'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#5cb85c;color:white;" class="btn btn-sm btn-green">Durum: Açık</a>
							<?php }elseif($Ticket->durum == '1'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#5cb85c;color:white;" class="btn btn-sm btn-success">Durum: Yanıtlandı</a>
							<?php }elseif($Ticket->durum == '2'){?>
							<a style="margin-bottom :10px; font-weight:bold; background-color:#d9534f;color:white;" class="btn btn-sm f-right">Durum: Kapalı</a>
							<?php }?>
							<?php if($Ticket->durum == 2){?>
							<?php }else{?>
							<input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $Ticket->id;?>"/>
							<a style="margin-bottom :10px; font-weight:bold; float: right; color:white; background-color:#ad000d;" class="btn btn-sm btn-icon-right" id="kapat"><i class="fa fa-close"></i><span> Bildirimi Kapat</span></a>
							<?php }?>
						</form>
						<?php if($Ticket->durum == 2){?>
						<div class="alert bg-info">
						<strong style="float:left;margin-right:5px;"><i style="font-size:20px;" class="fa fa-info-circle"></i></strong> 
							<strong style="font-size:16px;">Bu bildirim kapatılmış. Bildirime cevap yazarak tekrar aktif edebilirsiniz.</strong>
						</div>
						<?php }?>
						<div class="chat-box-div">
							<div class="hd-color chat-box-head">
								Destek Bildirimi | <?php echo $Ticket->baslik;?> | <?php echo $Ticket->urun_veya_siparis;?>
							</div>
							<div class="panel-body chat-box-main">
								<?php
								$Sorgu = $Baglan->query("SELECT * FROM hddizayn_ticket_mesajlar WHERE ticket_id = '{$Ticket->id}' ORDER BY id DESC");
								while($Sonuc = $Sorgu->fetch_object()){
								$System = $Baglan->query("SELECT * FROM hddizayn_uyeler WHERE id = '$Sonuc->uye_id'");
								$Hddizayn = $System->fetch_object();
								?><?php if($Sonuc->rutbe == "1"){?>
								<div class="chat-box-right">
								<span style="color:#cc0022; font-weight:bold;">Yetkili | <?php echo $Sonuc->yetkili;?></span><p style="float:right"><?php echo $Sonuc->tarih;?></p>
								<br>
								<hr class="colorgraph">
								<?php echo $Sonuc->mesaj;?>
								<hr>
								<?php echo $Hddizayn->imza;?>
								</div>
								<br><br>
								<?php }else{?>
								<div class="chat-box-left" style="border:2px solid #34495e; border-bottom:2px solid #34495e;">
									<span style="color:#34495e; font-weight:bold;">Müşteri | <?php echo $Ticket->adsoyad;?></span><p style="float:right"><?php echo $Sonuc->tarih;?></p>
									<br>
									<hr class="hr-clas"/>
									<?php echo $Sonuc->mesaj;?>
									<hr>
									IP Adres <?php echo $Uye->ipadresi;?>
								</div>				
								<br><br>
								<?php }?>
								<?php }?>
								<div class="chat-box-left" style="border:2px solid #34495e; border-bottom:2px solid #34495e;">
									<span style="color:#34495e; font-weight:bold;">Müşteri | <?php echo $Ticket->adsoyad;?></span><p style="float:right"><?php echo $Ticket->tarih;?></p>
									<br>
									<hr class="hr-clas"/>
									<?php echo $Ticket->mesaj;?>
									<hr>
									IP Adres <?php echo $Uye->ipadresi;?>
								</div>
							</div>
							<div class="chat-box-footer">
							<form id="mesajgonder" method="post">
								<div class="input-group" style="background-color:black;">
									<input name="mesaj" id="mesaj" type="text" class="form-control" placeholder="Mesajınız...">
									<input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $Ticket->id;?>"/>
									<span class="input-group-btn">
										<button id="bildirimgonder" class="btn hd-color bold" style="color:white;" type="button">GÖNDER</button>
									</span>
								</div>
							</form>
							</div>
							</div>
							<br>
							<?php if($Ticket->durum == 2){?>
							<div class="alert bg-info">
							<strong style="float:left;margin-right:5px;"><i style="font-size:20px;" class="fa fa-info-circle"></i></strong> 
								<strong style="font-size:16px;">Bu bildirim kapatılmış. Bildirime cevap yazarak tekrar aktif edebilirsiniz.</strong>
							</div>
							<?php }?>
						</div>
                    </div>
                </div>
            </div><br/><br/>
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