<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
uyekontrol(); sistembakim();
include("panel/sistem/site_sayac.php");
$Teslimat_adresi = POST('teslimat_adres');
$Fatura_adresi	 = POST('fatura_adres');
if($Teslimat_adresi=="" and $Fatura_adresi==""){
	header("Location:sepet-adres.html#sepetadres");
}else{
	$_SESSION["teslimat_adres"] = $Teslimat_adresi;
	$_SESSION["fatura_adres"] = $Fatura_adresi;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Ödeme Yöntemi - <?php echo $HDDizayn['title'];?></title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/yazdir.css">
	<link rel="stylesheet" href="css/odeme.css">
<style>
.ic-bosluk{
	padding: 10px 20px 10px 20px;
}
.ust-bosluk{
	margin-top:25px;
}
.box{
	color: #fff;
	padding: 20px;
	display: none;
	margin-top: 20px;
}
.Banka-Havalesi{ background: #cccccc; }
.Kapıda-Ödeme{ background: #228B22; }
</style>					
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
function banka_getir(){
	$("#bankalariYazdir").html('');
	banka=$("#banka").val();
	$.ajax({
		type:'POST',
		url:'kontrol/banka_getir.php',
		data:'banka='+banka,
		success: function(msg){
			$('#bankalariYazdir').html(msg);
		}
	});
}
</script>
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-order" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
				<?php
				$SepetSorgu	= $Baglan->query("SELECT * FROM hddizayn_sepet WHERE sepet_uye = '".$_SESSION["uye_id"]."' ORDER BY sepet_tarih DESC");
				if(!$Baglan->affected_rows){ @header("location:sepet.html");?>
				<?php }else{?>
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">Sepet</li>
                </ol>
                <h2 class="page-heading">
                    <span class="page-heading-title2 main-color" style="font-weight:bold;">ÖDEME YÖNTEMİ</span>
                </h2>
                <div class="page-content page-order">
                    <ul class="step">
                        <li><span>01. Özet</span></li>
                        <li><span>02. Adres Seçimi</span></li>
                        <li class="current-step"><span>03. Ödeme Yöntemi</span></li>
						<li><span>04. Sipariş Onayı</span></li>
                        <li><span>05. Sipariş Sonuç</span></li>
                    </ul>
                    <div class="order-detail-content">
						<form method="post" action="siparis-onayi.html">
						<div class="box-border ust-bosluk">
							<p class="t-center site-font" style="font-size:18px;">Aşağıdan Ödeme Yönteminizi Seçin !</p>
						</div>
						<section class="ust-bosluk">
							<div>
							<input type="radio" id="control_01" name="select" value="Banka-Havalesi">
								<label for="control_01">
									<h2 class="site-font">Banka Havalesi</h2>
									<p>Ödemenizi Banka Havalesi ile Yapın...</p>
								</label>
							</div>
							<div>
							<input type="radio" id="control_02" name="select" value="Kapıda-Ödeme">
								<label for="control_02">
									<h2 class="site-font">Kapıda Ödeme</h2>
									<p>Ödemenizi Kapıda Yapın...</p>
								</label>
							</div>
						</section>
						<div class="Banka-Havalesi box">
							<p class="ic-bosluk" style="color:black; font-weight:bold;">Ödeme Yapmak istediğiniz Bankayı Listeden Seçerek Devam Ediniz.</p>
							<div class="shipping-calculator-form ic-bosluk">
								<p class="form-row form-row-wide">
									<?php 
									$Sorgu = $Baglan->query("SELECT * FROM hddizayn_banka WHERE durum = 1 ORDER BY id ASC");
									if(!$Baglan->affected_rows){?>
										<select class="input form-control" style="font-size:15px;" disabled>
											<option>Banka Hesabı Bulunmuyor !</option>
										</select>
									<?php }else{ ?>
									<select class="input form-control" id="banka" name="banka" style="font-size:15px;" onchange="banka_getir()">
										<option value="">Seçim Yapınız !</option>
										<option style="font-size: 1pt; background-color: #000000;" disabled>&nbsp;</option>
										<?php while($Sonuc = $Sorgu->fetch_object()){?>
										<option value="<?php echo $Sonuc->id;?>"><?php echo $Sonuc->bankaadi;?></option>
									<?php }}?>	
									</select> 
								</p>
								<br/>
							</div>
							<div id="bankalariYazdir"></div>
						</div>
						<!--
						<div class="Kapıda-Ödeme box">
							<p style="font-size:16px;"> Teslimat Adresi : <?php echo $_SESSION["teslimat_adres"];?></p>
							<br/>
							<p style="font-size:16px;"> Fatura Adresi : <?php echo $_SESSION["fatura_adres"];?></p>
						</div>
						---->
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
                        <div class="cart_navigation ust-bosluk">
                            <a href="sepet-adres.html#sepetadres" class="prev-btn">Adres Seçimi Geri Dön</a>
							<button class="buton hd-color next-btn" type="submit">Sipariş Onayı<i style="font-size:10px; padding-left:15px;" class="fas fa-chevron-right"></i></button>
                        </div>
						</form>
						<br/><br/><br/><br/>
                    </div>
                </div>
				<?php } ?>
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