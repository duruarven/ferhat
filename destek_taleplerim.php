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
    <title>Destek Taleplerim - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
					<li><a href="hesabim.html">Hesabım</a></li>
                    <li class="active">Destek Taleplerim</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">Destek Taleplerim</span>
                </h2>
                <div class="page-content page-order">
					<div class="order-detail-content">
							<div class="table-responsive">
								<a style="margin-bottom :10px; font-weight:bold; font-size:15px;"class="btn btn-sm btn-icon-right btn-success" href="yeni-destek-talebi.html"><i class="fas fa-clipboard-check"></i> <span>BİLDİRİM OLUŞTUR</span></a>
								<?php
								$Sorgu = $Baglan->query("SELECT * FROM hddizayn_ticket WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id DESC");
								if(!$Baglan->affected_rows){?>
								<div class="alert alert-block alert-info fade in">
									<button data-dismiss="alert" class="close" type="button"></button>
									<br/>
									<p class="bold" style="font-size:15px;">Destek Bildiriminiz Bulunmuyor.</p>
									<br/>
								</div>
								<?php }else{?>	
								<table class="table table-bordered t-center cart_summary" style="font-size:15px;">
									<thead>
										<tr>
											<th class="t-center">Ticket No</th>
											<th class="t-center">Başlık</th>
											<th class="t-center">Departman</th>
											<th class="t-center">Aciliyet</th>
											<th class="t-center">Durum</th>
											<th class="t-center">İşlemler</th>
										</tr>
									</thead>
									<?php 
									$Sorgu = $Baglan->query("SELECT * FROM hddizayn_ticket WHERE uye_id = '{$_SESSION['uye_id']}' ORDER BY id DESC");
									while($TicketGorduk = $Sorgu->fetch_object()){
									?>
									<tr>
										<td><?php echo $TicketGorduk->ticketno;?></td>
										<td><?php echo substr($TicketGorduk->baslik,0,40).""; ?></td>
										<td>
										<?php if($TicketGorduk->departman=='3'){?>
										<span class="badge label-default">Diğer</span>
										<?php }elseif($TicketGorduk->departman=='2'){?>
										<span class="badge btn-purple">Muhasebe</span>
										<?php }elseif($TicketGorduk->departman=='1'){?>
										<span class="badge hd-color">Arıza Bildirimi</span>
										<?php }?>
										</td>
										<td>
										<?php if($TicketGorduk->oncelik=='3'){?>
										<span class="badge btn-green">Yüksek</span>
										<?php }elseif($TicketGorduk->oncelik=='2'){?>
										<span class="badge btn-primary">Orta</span>
										<?php }elseif($TicketGorduk->oncelik=='1'){?>
										<span class="badge btn-black">Düşük</span>
										<?php }?>
										</td>
										<td>
										<?php if($TicketGorduk->durum=='0'){?>
										<span class="badge btn-green">Açık</span>
										<?php }elseif($TicketGorduk->durum=='1'){?>
										<span class="badge bg-success" style="background-color:#4cae4c;">Yanıtlandı</span>
										<?php }elseif($TicketGorduk->durum=='2'){?>
										<span class="badge btn-juicy_pink">Kapalı</span>
										<?php }?>
										</td>
										<td>
											<span class="tooltip-area">
											<a href="destek-talebi/<?php echo $TicketGorduk->ticketno;?>" type="button" class="btn btn-sm hd-color" style="color:white">Görüntüle</a>
											</span>
										</td>
									</tr>
									<?php }}?>
								</table>
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