<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php"); sistembakim();
include("panel/sistem/site_sayac.php");
$seflink = GET('seflink'); $no = GET('no');
$Ana = $Baglan->query("SELECT * FROM hddizayn_kategori WHERE durum = '1' and seflink = '$seflink' and no = '$no'");
$Alt = $Baglan->query("SELECT * FROM hddizayn_kategori_alt WHERE durum = '1' and seflink = '$seflink' and no = '$no'");
$AltAlt = $Baglan->query("SELECT * FROM hddizayn_categori_alt WHERE durum = '1' and seflink = '$seflink' and no = '$no'");
if($Ana->num_rows==1){
	$Sorgu = $Baglan->query("SELECT * FROM hddizayn_kategori WHERE durum = '1' and seflink = '$seflink' and no = '$no'");
	if(!$Baglan->affected_rows){ Hata404(); yonlen("../404.html");}
	$Sonuc = $Sorgu->fetch_object();
}elseif($Alt->num_rows==1){
	$Sorgu = $Baglan->query("SELECT * FROM hddizayn_kategori_alt WHERE durum = '1' and seflink = '$seflink' and no = '$no'");
	if(!$Baglan->affected_rows){ Hata404(); yonlen("../404.html");}
	$Sonuc = $Sorgu->fetch_object();
	$Bul = $Sorgu = $Baglan->query("SELECT * FROM hddizayn_kategori WHERE durum = '1' and id = '$Sonuc->ust'");
	$Sonucla = $Bul->fetch_object();
}elseif($AltAlt->num_rows==1){
	$Sorgu = $Baglan->query("SELECT * FROM hddizayn_categori_alt WHERE durum = '1' and seflink = '$seflink' and no = '$no'");
	if(!$Baglan->affected_rows){ Hata404(); yonlen("../404.html");}
	$Sonuc = $Sorgu->fetch_object();
	$Bull = $Sorgu = $Baglan->query("SELECT * FROM hddizayn_kategori_alt WHERE durum = '1' and id = '$Sonuc->ust'");
	$Sonuclaa = $Bull->fetch_object();
	$Bul = $Sorgu = $Baglan->query("SELECT * FROM hddizayn_kategori WHERE durum = '1' and id = '$Sonuclaa->ust'");
	$Sonucla = $Bul->fetch_object();
}else{ Hata404(); yonlen("../404.html");}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $Sonuc->seo_aciklama;?> | <?php echo $HDDizayn['title'];?></title>
	<meta name="description" content="<?php echo $Sonuc->seo_aciklama;?>">
	<meta name="keywords" content="<?php echo $Sonuc->anahtar_kelimeler;?>">
	<meta name="author" content="<?php echo $Author;?>">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
	<link rel="canonical" href="<?php echo "kategori/".$Sonuc->seflink."/".$Sonuc->no;?>"/>
	<meta property="og:title" content="<?php echo $Sonuc->seo_aciklama;?> - <?php echo $HDDizayn['title'];?>"/>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo $Sonuc->seflink.".html";?>"/>
	<meta property="og:image" content="<?php echo "dosyalar/kategori/".$Sonuc->resim;?>"/>
	<meta property="og:site_name" content="<?php echo $HDDizayn['title'];?>"/>
	<meta property="og:description" content="<?php echo $Sonuc->seo_aciklama;?>" />
	<meta property="article:published_time" content="<?php echo $Sonuc->tarih;?>T<?php echo $Sonuc->saat;?>Z"/>
	<meta property="article:modified_time" content="<?php echo $Sonuc->tarih_guncelle;?>T<?php echo $Sonuc->saat_guncelle;?>Z"/>
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:title" content="<?php echo $Sonuc->seo_aciklama;?> - <?php echo $HDDizayn['title'];?>" />
	<meta name="twitter:description" content="<?php echo $Sonuc->seo_aciklama;?>"/>
	<meta name="twitter:image" content="<?php echo "dosyalar/kategori/".$Sonuc->resim;?>"/>
	<meta itemprop="image" content="<?php echo "dosyalar/kategori/".$Sonuc->resim;?>"/>
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="index-opt-1 catalog-category-view catalog-view_op1" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
					<?php if($Bul->num_rows==0){}else{?>
					<li><a href="<?php echo "kategori/".$Sonucla->seflink."/".$Sonucla->no;?>"><?php echo $Sonucla->baslik;?></a></li>
					<?php }?> <?php if($Bull->num_rows==0){}else{?>
					<li><a href="<?php echo "kategori/".$Sonuclaa->seflink."/".$Sonuclaa->no;?>"><?php echo $Sonuclaa->baslik;?></a></li>
					<?php }?> <?php if($Sorgu->num_rows==0){}else{?>
					<li><a href="<?php echo "kategori/".$Sonuc->seflink."/".$Sonuc->no;?>"><?php echo $Sonuc->baslik;?></a></li>
					<?php }?>
                </ol>
                <div class="row">
                    <div class="col-md-9 col-md-push-3  col-main">
                        <ul class="category-links">
							<?php $Adres = $HDDizayn['site_adresi']."/"."kategori/".$seflink."/".$no; $TumunuGoster = $Protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>
                            <li <?php if($Adres == $TumunuGoster){echo 'class="current-cate bold"';}?>><a href="<?php echo "kategori/".$Sonuc->seflink."/".$Sonuc->no;?>">Tüm Ürünler</a></li>
                            <li <?php if($_GET['siralama'] == "cok-satan"){echo 'class="current-cate bold"';}?>><a href="<?php echo "kategori/".$Sonuc->seflink."/".$Sonuc->no;?>?siralama=cok-satan">Çok Satanlar</a></li>
                            <li <?php if($_GET['siralama'] == "en-dusuk-fiyat"){echo 'class="current-cate bold"';}?>><a href="<?php echo "kategori/".$Sonuc->seflink."/".$Sonuc->no;?>?siralama=en-dusuk-fiyat">En Düşük Fiyat</a></li>
                            <li <?php if($_GET['siralama'] == "en-yuksek-fiyat"){echo 'class="current-cate bold"';}?>><a href="<?php echo "kategori/".$Sonuc->seflink."/".$Sonuc->no;?>?siralama=en-yuksek-fiyat">En Yüksek Fiyat</a></li>
                            <li <?php if($_GET['siralama'] == "en-yuksek-puan"){echo 'class="current-cate bold"';}?>><a href="<?php echo "kategori/".$Sonuc->seflink."/".$Sonuc->no;?>?siralama=en-yuksek-puan">En Yüksek Puan</a></li>
                        </ul>
                        <div class=" toolbar-products toolbar-top">
                            <h1 class="cate-title"><?php echo $Sonuc->baslik;?></h1>
                            <div class="modes">
                                <strong  class="modes-mode active mode-grid" title="Tablo"></strong>
                            </div>
                        </div>
                        <div class="products  products-grid">
                            <ol class="product-items row">
								<?php
								$sayfa				=	$_GET['s'];
								if						(!$sayfa){
								$sayfa				=	1;
								}if($Ana->num_rows==1){ $Bul = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori = '{$Sonuc->id}' ORDER BY ID DESC");
								}elseif($Alt->num_rows==1){ $Bul = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori_alt = '{$Sonuc->id}' ORDER BY ID DESC");	
								}elseif($AltAlt->num_rows==1){ $Bul = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori_altt = '{$Sonuc->id}' ORDER BY ID DESC");
								} $toplamkaydibul 	= 	$Bul->num_rows; $sayfalamalimiti	=	18;
								$baslangicsayisi	=	($sayfa*$sayfalamalimiti)-$sayfalamalimiti; $toplamsayfasayisi	=	ceil($toplamkaydibul/$sayfalamalimiti);	
								if($_GET['siralama']=='cok-satan'){ $Siralama = 'ORDER BY cok_satan DESC';
								}elseif($_GET['siralama']=='en-dusuk-fiyat'){ $Siralama = 'ORDER BY urunfiyat ASC';
								}elseif($_GET['siralama']=='en-yuksek-fiyat'){ $Siralama = 'ORDER BY urunfiyat DESC';
								}elseif($_GET['siralama']=='en-yuksek-puan'){ $Siralama = 'ORDER BY urun_puan DESC';
								}else{ $Siralama = 'ORDER BY id DESC';}
								if($Ana->num_rows==1){ $Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori = '{$Sonuc->id}' ".$Siralama." LIMIT $baslangicsayisi,$sayfalamalimiti");
								}elseif($Alt->num_rows==1){ $Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori_alt = '{$Sonuc->id}' ".$Siralama." LIMIT $baslangicsayisi,$sayfalamalimiti");
								}elseif($AltAlt->num_rows==1){ $Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori_altt = '{$Sonuc->id}' ".$Siralama." LIMIT $baslangicsayisi,$sayfalamalimiti");
								}if(!$Baglan->affected_rows){
								?>	
									<center>
										<span class="fa-stack fa-5x">
										  <i class="fa fa-circle fa-stack-2x main-color"></i>
										  <i style="color:white;" class="fas fa-exclamation-triangle fa-stack-1x"></i>
										</span>
										<p style="font-weight:bold; font-size:18px; padding-top:20px;">Aradığınız kategoriye ait ürün bulunamadı !</p>
									</center>
								<?php }else{											
								while($Urun = $Sorgu->fetch_object()){
								$Bes = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 5 and urun_id = '{$Urun->id}'"); $BesSonuc = $Bes->fetch_object();
								$Dort = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 4 and urun_id = '{$Urun->id}'"); $DortSonuc = $Dort->fetch_object();
								$Uc = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 3 and urun_id = '{$Urun->id}'"); $UcSonuc = $Uc->fetch_object();
								$iki = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 2 and urun_id = '{$Urun->id}'"); $ikiSonuc = $iki->fetch_object();
								$Bir = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 1 and urun_id = '{$Urun->id}'"); $BirSonuc = $Bir->fetch_object();
								$BesHesapla = $Bes->num_rows*$BesSonuc->derecelendirme; $DortHesapla = $Dort->num_rows*$DortSonuc->derecelendirme; $UcHesapla = $Uc->num_rows*$UcSonuc->derecelendirme;
								$ikiHesapla = $iki->num_rows*$ikiSonuc->derecelendirme; $BirHesapla = $Bir->num_rows*$BirSonuc->derecelendirme;
								$HesapOrtalama = ($BesHesapla+$DortHesapla+$UcHesapla+$ikiHesapla+$BirHesapla)/5; $Sifir = 0; $MevcutSayi = $HesapOrtalama; $BirYildiz  = 1.0; $ikiYildiz  = 2.0; $UcYildiz   = 3.0; $DortYildiz = 4.0; $BesYildiz  = 5.0;
								if($HesapOrtalama>$BesYildiz){$MevcutSayi = 5.0;}
								?>
                                <li class="col-sm-4 product-item ">
                                    <div class="product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a href="<?php echo $Urun->seflink.".html";?>" class="product-item-img"><img src="<?php echo "dosyalar/urunler/".$Urun->resim;?>" alt="<?php echo $Urun->baslik;?>"></a>
                                                <a href="<?php echo $Urun->seflink.".html";?>" class="btn btn-cart" type="button"><span>Sepete Ekle</span></a>
                                            </div>
                                            <div class="product-item-detail">
												<?php if($Urun->indirim==1){ $AnaFiyat 	= $Urun->urunfiyat;
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
						if($Ana->num_rows==1){ 
							$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori = '{$Sonuc->id}'");
						}elseif($Alt->num_rows==1){ 
							$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori_alt = '{$Sonuc->id}'");
						}elseif($AltAlt->num_rows==1){ 
							$Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and kategori_altt = '{$Sonuc->id}'");
						}
						if(!$Baglan->affected_rows){
						?>
						<?php }else{ ?>	
						<div class="toolbar-products toolbar-bottom">
							<ul class="pagination">
								<?php
								if($sayfa>1){ $sayfayibirgerial	=	$sayfa-1;
								echo "<li class='bold'><a href='kategori/".$Sonuc->seflink."/".$Sonuc->no."'><i class='fa fa-angle-left'></i></a></li>";
								echo "<li class='bold'><a href='kategori/".$Sonuc->seflink."/".$Sonuc->no."?s=$sayfayibirgerial'>Geri</a></li>";
								} $sayfanogosterimlimiti	=	5; for($sayfaindex=$sayfa-$sayfanogosterimlimiti; $sayfaindex<=$sayfa+$sayfanogosterimlimiti ; $sayfaindex++){
								if(($sayfaindex>0) and ($sayfaindex<=$toplamsayfasayisi)){
								if($sayfa==$sayfaindex){ echo "<li class='active bold'><a href='kategori/".$Sonuc->seflink."/".$Sonuc->no."?s=$sayfaindex'>$sayfaindex</a></li>";
								}else{ echo "<li class='bold'><a href='kategori/".$Sonuc->seflink."/".$Sonuc->no."?s=$sayfaindex'>$sayfaindex</a></li>";
								}}}if($sayfa!=$toplamsayfasayisi){ $sayfayibirilerial	=	$sayfa+1;
								echo "<li class='bold'><a href='kategori/".$Sonuc->seflink."/".$Sonuc->no."?s=$sayfayibirilerial'>İleri</a></li>";
								echo "<li class='bold'><a href='kategori/".$Sonuc->seflink."/".$Sonuc->no."?s=$toplamsayfasayisi'><i class='fa fa-angle-right'></i></a></li>";
								}
								?>
							</ul>
						</div>
						<?php }?>
                    </div>
                    <div class="col-md-3 col-md-pull-9  col-sidebar">
                        <?php if($Ana->num_rows==1){?>
						<div class="block-sidebar block-sidebar-categorie">
                            <div class="block-title">
                                <strong>KATEOGORİLER</strong>
                            </div>
                            <div class="block-content">
                                <ul class="items">
									<?php 
									if($Ana->num_rows==1){
										$ListeSorgu = $Baglan->query("SELECT * FROM hddizayn_kategori_alt WHERE durum = 1 and ust = '$Sonuc->id'");
										while($Liste = $ListeSorgu->fetch_object()){ echo '<li><a href="kategori/'.$Liste->seflink.'/'.$Liste->no.'">'.$Liste->baslik.'</a></li>';
										}}elseif($Alt->num_rows==1){
										$ListeSorgu = $Baglan->query("SELECT * FROM hddizayn_categori_alt WHERE durum = 1 and ust = '$Sonuc->id'");
										while($Liste = $ListeSorgu->fetch_object()){ echo '<li><a href="kategori/'.$Liste->seflink.'/'.$Liste->no.'">'.$Liste->baslik.'</a></li>';
										}}elseif($AltAlt->num_rows==1){}
									?>
                                </ul>
                            </div>
                        </div>
						<?php }elseif($Alt->num_rows==1){?>
						<div class="block-sidebar block-sidebar-categorie">
                            <div class="block-title">
                                <strong>KATEOGORİLER</strong>
                            </div>
                            <div class="block-content">
                                <ul class="items">
									<?php 
									if($Ana->num_rows==1){
										$ListeSorgu = $Baglan->query("SELECT * FROM hddizayn_kategori_alt WHERE durum = 1 and ust = '$Sonuc->id'");
										while($Liste = $ListeSorgu->fetch_object()){ echo '<li><a href="kategori/'.$Liste->seflink.'/'.$Liste->no.'">'.$Liste->baslik.'</a></li>';
										}}elseif($Alt->num_rows==1){
										$ListeSorgu = $Baglan->query("SELECT * FROM hddizayn_categori_alt WHERE durum = 1 and ust = '$Sonuc->id'");
										while($Liste = $ListeSorgu->fetch_object()){ echo '<li><a href="kategori/'.$Liste->seflink.'/'.$Liste->no.'">'.$Liste->baslik.'</a></li>';
										}}elseif($AltAlt->num_rows==1){}
									?>
                                </ul>
                            </div>
                        </div>
						<?php }elseif($AltAlt->num_rows==1){}?>
                        <div id="layered-filter-block" class="block-sidebar block-filter no-hide">
                            <div class="close-filter-products"><i class="fa fa-times" aria-hidden="true"></i></div>
                            <div class="block-title">
                                <strong>FİLİTRE</strong>
                            </div>
                            <div class="block-content">
							<form action="filter.html" method="POST">
								<?php 
								$MarkaSorgu = $Baglan->query("SELECT * FROM hddizayn_marka WHERE durum = 1 and kategori = '$Sonuc->id' and kategori_kimlik = '$Sonuc->no' ORDER BY id DESC ");
								if(!$Baglan->affected_rows){
								?>
								<?php }else{?>
                                <div class="filter-options-item filter-options-categori">
								<div class="filter-options-title bold">MARKALAR</div>
                                    <div class="filter-options-content">
                                        <ol class="items">
											<?php while($Marka = $MarkaSorgu->fetch_object()){
											$UrunSorgu  = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = 1 and marka = '$Marka->id'");
											?>
                                            <li class="item ">
                                                <label>
                                                    <input name="marka[]" value="<?php echo $Marka->id;?>" type="checkbox"><span><?php echo $Marka->baslik;?> <span class="count">(<?php echo $UrunSorgu->num_rows;?>)</span></span>
                                                </label>
                                            </li>
											<?php }?>
                                        </ol>
                                    </div>
                                </div>
								<?php }?>
                                <div class="filter-options-item filter-options-price">
                                    <div class="filter-options-title bold">FİYAT</div>
                                    <div class="filter-options-content">
                                        <ol class="items">
                                            <li class="item">
                                                <label>
                                                    <input name="fiyataraligi" value="1" type="radio"><span>100 - 500 TL</span>
													<input type="hidden" value="<?php echo $Sonuc->id;?>" name="kategori">
													<input type="hidden" value="<?php echo $Sonuc->no;?>" name="no">
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input name="fiyataraligi" value="2" type="radio"><span>500 - 1,000 TL</span>
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input name="fiyataraligi" value="3" type="radio"><span>1,000 - 2,500 TL</span>
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input name="fiyataraligi" value="4" type="radio"><span>2,500 - 5,000 TL</span>
                                                </label>
                                            </li>
                                            <li class="item">
                                                <label>
                                                    <input name="fiyataraligi" value="5" type="radio"><span>5,000 TL Üzeri</span>
                                                </label>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
								<button type="submit" class="btn btn-md hd-color bold site-font" style="color:white;font-size:15px;">FİLİTRELE</button>
                            </div>
							</form>
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