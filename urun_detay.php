<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");  include("panel/sistem/site_sayac.php");
$Urun_id = GET('id'); if(!@in_array($Urun_id, explode(':', $_COOKIE['hit_ekle']))){
$Hit = $Baglan->query("UPDATE hddizayn_urunler SET goruntulenme=goruntulenme+1 WHERE seflink = '$Urun_id' ORDER BY id ASC LIMIT 1");
setcookie('hit_ekle', $_COOKIE['hit_ekle'].$Urun_id.':', time()+9999999); 
} $Sorgu = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and seflink = '$Urun_id'");
if(!$Baglan->affected_rows){ Hata404(); yonlen("404.html");} $Urun = $Sorgu->fetch_object(); $UrunID = $Urun->id;
$Yorum = $Baglan->query("SELECT * FROM hddizayn_yorumlar WHERE durum = '1' and urun_id = '{$Urun->id}'");
$AnaKategorii = $Baglan->query("SELECT * FROM hddizayn_kategori WHERE durum = 1 and id = '$Urun->kategori'"); $AnaKategori = $AnaKategorii->fetch_object();
$AltKategorii = $Baglan->query("SELECT * FROM hddizayn_kategori_alt WHERE durum = 1 and id = '$Urun->kategori_alt'"); $AltKategori = $AltKategorii->fetch_object();
$AltKategorri = $Baglan->query("SELECT * FROM hddizayn_categori_alt WHERE durum = 1 and id = '$Urun->kategori_altt'"); $AltKategorri = $AltKategorri->fetch_object();
$Bes = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 5 and urun_id = '{$Urun->id}'"); $BesSonuc = $Bes->fetch_object();
$Dort = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 4 and urun_id = '{$Urun->id}'"); $DortSonuc = $Dort->fetch_object();
$Uc = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 3 and urun_id = '{$Urun->id}'"); $UcSonuc = $Uc->fetch_object();
$iki = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 2 and urun_id = '{$Urun->id}'"); $ikiSonuc = $iki->fetch_object();
$Bir = $Baglan->query("SELECT derecelendirme FROM hddizayn_yorumlar WHERE durum = 1 and derecelendirme = 1 and urun_id = '{$Urun->id}'"); $BirSonuc = $Bir->fetch_object();
$BesHesapla = $Bes->num_rows*$BesSonuc->derecelendirme; $DortHesapla = $Dort->num_rows*$DortSonuc->derecelendirme; $UcHesapla = $Uc->num_rows*$UcSonuc->derecelendirme; $ikiHesapla = $iki->num_rows*$ikiSonuc->derecelendirme;
$BirHesapla = $Bir->num_rows*$BirSonuc->derecelendirme; $HesapOrtalama = ($BesHesapla+$DortHesapla+$UcHesapla+$ikiHesapla+$BirHesapla)/5; $Sifir = 0; $MevcutSayi = $HesapOrtalama; $BirYildiz  = 1.0; $ikiYildiz  = 2.0; $UcYildiz   = 3.0; $DortYildiz = 4.0; $BesYildiz  = 5.0; if($HesapOrtalama>$BesYildiz){ $MevcutSayi = 5.0;}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $Urun->baslik;?> - <?php echo $HDDizayn['title'];?></title>
	<meta name="description" content="<?php echo $Urun->seo_aciklama;?>">
	<meta name="keywords" content="<?php echo $Urun->anahtar_kelimeler;?>">
	<meta name="author" content="<?php echo $Author;?>">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
	<link rel="canonical" href="<?php echo $Urun->seflink.".html";?>"/>
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
	<meta property="og:title" content="<?php echo $Urun->baslik;?> - <?php echo $HDDizayn['title'];?>"/>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo $Urun->seflink.".html";?>"/>
	<meta property="og:image" content="<?php echo "dosyalar/urunler/".$Urun->resim;?>"/>
	<meta property="og:site_name" content="<?php echo $HDDizayn['title'];?>"/>
	<meta property="og:description" content="<?php echo $Urun->seo_aciklama;?>" />
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:title" content="<?php echo $Urun->baslik;?> - <?php echo $HDDizayn['title'];?>" />
	<meta name="twitter:description" content="<?php echo $Urun->seo_aciklama;?>"/>
	<meta name="twitter:image" content="<?php echo "dosyalar/urunler/".$Urun->resim;?>"/>
	<meta itemprop="image" content="<?php echo "dosyalar/urunler/".$Urun->resim;?>"/>
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script> 
	<script type="text/javascript" src="js/hddizayn.js"></script> 
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="yazdir"><div class="yazdir1" id="sepet"></div></div>
	<div class="yazdir"><div class="yazdir1" id="yorumyaz"></div></div>
	<div class="yazdir"><div class="yazdir1" id="favori"></div></div>
	<div class="yazdir"><div class="yazdir1" id="begen"></div></div>
	<div class="wrapper">
		<?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
					<li><a href="index.html">AnaSayfa</a></li>
                    <li><a href="<?php echo "kategori/".$AnaKategori->seflink."/".$AnaKategori->no;?>"><?php echo $AnaKategori->baslik;?></a></li>
                    <li><a href="<?php echo "kategori/".$AltKategori->seflink."/".$AltKategori->no;?>"><?php echo $AltKategori->baslik;?></a></li>
                    <li><a href="<?php echo "kategori/".$AltKategorri->seflink."/".$AltKategorri->no;?>"><?php echo $AltKategorri->baslik;?></a></li>
					<li class="active"><?php echo $Urun->baslik;?></li>
                </ol>
                <div class="row">
                    <div class="col-md-12  col-main">
                        <div class="row">
                            <div class="col-sm-6 col-md-5 col-lg-5">
                                <div class="product-media media-horizontal">
                                    <div class="image_preview_container images-large">
                                        <img id="img_zoom" data-zoom-image="<?php echo "dosyalar/urunler/zoom/".$Urun->resim;?>" src="<?php echo "dosyalar/urunler/".$Urun->resim;?>" alt="<?php echo $Urun->baslik;?>">
                                        <button class="btn-zoom open_qv"><span>Yakınlaştır</span></button>
                                    </div>
                                    <div class="product_preview images-small">
                                        <div class="owl-carousel thumbnails_carousel" id="thumbnails"  data-nav="true" data-dots="false" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'>
											<a href="#" data-image="<?php echo "dosyalar/urunler/".$Urun->resim;?>" data-zoom-image="<?php echo "dosyalar/urunler/zoom/".$Urun->resim;?>">
                                                <img src="<?php echo "dosyalar/urunler/".$Urun->resim;?>" data-large-image="<?php echo "dosyalar/urunler/zoom/".$Urun->resim;?>" alt="<?php echo $Urun->baslik;?>">
                                            </a>
											<?php 
											$Diger = $Baglan->query("SELECT * FROM hddizayn_urun_resim WHERE urun_id = '{$Urun->id}' ORDER BY id ASC");
											while($DigerResim = $Diger->fetch_object()){
											?>	
                                            <a href="#" data-image="<?php echo "dosyalar/urunler/diger/".$DigerResim->resim;?>" data-zoom-image="<?php echo "dosyalar/urunler/diger/zoom/".$DigerResim->resim;?>">
                                                <img src="<?php echo "dosyalar/urunler/diger/".$DigerResim->resim;?>" data-large-image="<?php echo "dosyalar/urunler/diger/zoom/".$DigerResim->resim;?>" alt="<?php echo $Urun->baslik;?>">
                                            </a>
											<?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-7 col-lg-7"> 
                                <div class="product-info-main">
                                    <h1 class="page-title" style="font-size:21px;">
                                        <?php echo $Urun->baslik;?>
                                    </h1>
                                    <div class="product-reviews-summary">
                                        <div class="rating-summary">
												<?php
												if($Urun->cok_satan==1){
													echo '
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>';
												}elseif($MevcutSayi == $Sifir){
													echo '
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>';
												}elseif($MevcutSayi > $Sifir && $MevcutSayi < $BirYildiz){
													echo '
													<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>';
												}elseif($MevcutSayi > $BirYildiz && $MevcutSayi < $ikiYildiz){
													echo  '
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>';
												}elseif($MevcutSayi > $ikiYildiz && $MevcutSayi < $UcYildiz){
													echo '
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>';
												}elseif($MevcutSayi > $UcYildiz && $MevcutSayi < $DortYildiz){
													echo '
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color:#ccc;"></i>';
												}elseif($MevcutSayi > $DortYildiz && $MevcutSayi < $BesYildiz){
													echo '
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star-half-alt" style="color: #ff9900;"></i>';
												}elseif($MevcutSayi > $BesYildiz){
													echo '
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>
													<i class="fas fa-star" style="color: #ff9900;"></i>';
												}
												?>
                                        </div>
                                        <div class="reviews-actions">
                                            <span href="#" class="action view">Yorum (<?php echo $Yorum->num_rows;?>)</span>
                                            <a data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:;" class="action add"><img id="yorumlaragit" src="images/ikon/write.png">&#160;&#160;Yorum Yap</a>
									   </div>
                                    </div>
                                    <div class="product-info-price">
                                        <div class="price-box">
											<?php if($Urun->indirim==1){
												echo '<span class="price" style="font-size:26px;">'.number_format($Urun->indirimli_fiyat, 2, ',', ',')." ".$Urun->para_birimi.'</span>';
												echo '<span class="old-price" style="font-size:26px;">'.number_format($Urun->urunfiyat, 2, ',', ',')." ".$Urun->para_birimi.'</span>';
											}else{
												echo '<span class="price" style="font-size:26px;">'.number_format($Urun->urunfiyat, 2, ',', ',')." ".$Urun->para_birimi.'</span>';
											}?>
											<?php if($Urun->indirim==1){
											$AnaFiyat 	= $Urun->urunfiyat;
											$Hesapla 	= $Urun->urunfiyat - $Urun->indirimli_fiyat; 
											$Yuzde	 	= ($Hesapla / $AnaFiyat) * 100;	
											?> 
                                            <span class="label-sale" style="font-size:16px;">-%<?php echo floor($Yuzde);?></span>
											<?php }?>
                                        </div>
                                    </div>  
                                    <div class="product-code">
                                        <span style="font-weight:bold;">Ürün Kodu: </span> #<?php echo $Urun->kimlik;?>
                                    </div> 
                                    <div class="product-info-stock">
                                        <div class="stock available">
											<?php if($Urun->urun_stok>0){
												echo '<span class="label" style="font-weight:bold;">Stok:</span> <span style="font-weight:bold; color:#009966;">Var</span>';
											}else{
												echo '<span class="label" style="font-weight:bold;">Stok:</span> <span style="font-weight:bold; color:#F70000;">Tükenmiş</span>';
											}
											?>
                                        </div>
                                    </div>
                                    <div class="product-add-form">
                                            <div class="product-options-wrapper">
											<form id="sepeteat" method="post">
                                                <div class="form-configurable">
													<?php if($Urun->renkler==""){?>
													<?php }else{?>
													<label for="forSize" class="label main-color" style="font-weight:bold; color:black;">Renk Seçenekleri</label>
														<select name="renk" id="forSize" class="form-control attribute-select" style="font-size:15px; border: 1px solid #B8B8B8;">
															<?php
															$Parcala = $Urun->renkler;
															$limit	=	4;
															$Bolunmus = explode(",",$Parcala);
															$Saydir = count($Bolunmus);	
															for($limit, $i=0; $i<$Saydir; $i++){
															echo '<option value="'.$Bolunmus[$i].'">'.$Bolunmus[$i].'</option>';
															}
															?>
														</select>
													<?php }?>
													<br>
													<?php if($Urun->ozellik==""){?>
													<?php }else{?>
													<label for="forSize" class="label" style="font-weight:bold; color:black;">Seçenekler</label>
														<select name="ozellik" id="forSize" class="form-control attribute-select" style="font-size:15px; border: 1px solid #B8B8B8;">
															<?php
															$Parcala = $Urun->ozellik;
															$limit	=	4;
															$Bolunmus = explode(",",$Parcala);
															$Saydir = count($Bolunmus);	
															for($limit, $i=0; $i<$Saydir; $i++){
															echo '<option value="'.$Bolunmus[$i].'">'.$Bolunmus[$i].'</option>';
															}
															?>
														</select>
													<?php }?>
                                                </div>
                                               <div class="form-qty">
                                                    <label class="label" style="font-weight:bold; font-size:16px; padding-top:11px; color:<?php echo $HDDizayn['site_renk']?>;">ADET : </label>
                                                    <div class="control">
                                                        <input type="text" class="form-control input-qty" value='1' name="adet" maxlength="500" minlength="1">
														<input type="hidden" name="urun_id" value="<?php echo $Urun->id;?>">
                                                        <button class="btn-number qtyminus" data-type="minus" data-field="adet"><span>-</span></button>
                                                        <button class="btn-number qtyplus" data-type="plus" data-field="adet"><span>+</span></button>
                                                    </div>
													<button id="ekle" type="submit" class="btn hd-color btn-md" style="color:white; height:49px; font-weight:bold; font-family: Titillium Web;"><i class="fas fa-cart-plus"></i> &nbsp;&nbsp;Sepete Ekle</button>
                                                </div>
                                            </div>
											</form>
                                            <div class="product-options-bottom clearfix">
                                                <div class="actions">
                                                    <div class="product-addto-links">
														<form id="favorigonder" method="post" class="clearfix">
															<input type="hidden" name="urun_id" value="<?php echo $Urun->id;?>">
															<a id="favoriekle" href="javascript:;" class="action btn-wishlist">
																<span class="bold">Favorilerime Ekle</span>
															</a>
														</form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
									<hr/>
									<div class="share-post" style="margin-top:-10px;">
										<div class="f-left" id="share_btns" data-easyshare data-easyshare-url="">
											<button class="facebook" data-easyshare-button="facebook">
												<span class="fab fa-facebook-f"></span>
											</button>
											<button class="twitter" data-easyshare-button="twitter" data-easyshare-tweet-text="">
												<span class="fab fa-twitter"></span>
											</button>
											<button class="googleplus" data-easyshare-button="google">
												<span class="fab fa-google-plus"></span>
											</button>
											<button class="linkedin" data-easyshare-button="linkedin">
												  <span class="fab fa-linkedin"></span>
											</button>
											<button class="pinterest" data-easyshare-button="pinterest">
												  <span class="fab fa-pinterest-p"></span>
											</button>
											<button class="whatsapp" onclick="OpenPopupCenter('https://api.whatsapp.com/send?text=<?php echo $HDDizayn["site_adresi"]."/".$Urun->seflink.".html";?>&t=<?php echo $Urun->baslik;?>', 'TEST!?', 500, 400);">
												<span class="fab fa-whatsapp"></span>
												<script>
													function OpenPopupCenter(pageURL, title, w, h) {
														var left = (screen.width - w) / 2;
														var top = (screen.height - h) / 3;
														var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
													} 
												</script>
											</button>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="product-info-detailed ">
                            <ul class="nav nav-pills" role="tablist" id="degerlendirme">
                                <li role="presentation" class="active"><a href="#urun-aciklama" role="tab" data-toggle="tab">Ürün Açıklaması</a></li>
                                <li role="presentation"><a href="#yorumlar" role="tab" data-toggle="tab">Yorumlar (<?php echo $Yorum->num_rows;?>)</a></li>
								<?php $Deger = $HDDizayn['iptal_iade'];
								$Bilgin = $Baglan->query("SELECT * FROM hddizayn_kurumsal WHERE durum = 1 AND id = $Deger");
								$Bilgi = $Bilgin->fetch_object();
								?>
                                <li role="presentation"><a href="#<?php echo $Bilgi->seflink;?>" role="tab" data-toggle="tab"><?php echo $Bilgi->baslik;?></a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="urun-aciklama">
									<div class="block-title"><strong class="title">Ürün Açıklaması</strong></div>
                                    <div class="block-content">
                                        <?php echo $Urun->aciklama;?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="yorumlar">
                                    <div class="block-title"><strong class="title">Yorumlar (<?php echo $Yorum->num_rows;?>)</strong></div>
                                    <div class="block-content">
										<div class="dogan">
											<h4 class="bold"><?php echo $Urun->baslik;?> Yorumları</h4>
										<hr>
										</div>
										<?php if(isset($_SESSION['uyegiris'])){?>
										<button data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-top:20px; margin-bottom:20px; font-weight:bold; font-size:16px; padding: 15px 20px 35px 20px;" type="button" class="btn btn-sm btn-icon-right btn-danger hd-color"><i class="far fa-comment-dots"></i> <span>Yorum Yap</span></button>
										<?php }else{?>
										<a href="giris.html" style="margin-top:20px; margin-bottom:20px; font-weight:bold; font-size:16px; padding: 15px 20px 15px 20px;" type="button" class="btn btn-sm btn-icon-right btn-danger hd-color"><i class="far fa-comment-dots"></i> <span>Yorum Yap</span></a>
										<?php }?>
										<div class="single-box">
											<div class="comment-list">
												<ul>
												<?php 
												$Sorgula = $Baglan->query("SELECT * FROM hddizayn_yorumlar WHERE durum = '1' and urun_id = '{$Urun->id}' ORDER BY ID DESC");
												if(!$Baglan->affected_rows){?>
												<?php }else{ while($Sonucla = $Sorgula->fetch_object()){
												?>
													<li>
														<style>
															.avartar{
															background-color: #eee;
															border: 2px solid #000;
															border-radius:80px;
															width:80px;
															height:80px;
															line-height:72px;
															font-size:16px;
															color:#666666;
															font-weight:bold;
															text-align:center; 
															text-transform:uppercase;
															}
														</style>
														<div class="avartar">
															<p style="margin-top:-3px;"><?php $Ad = $Sonucla->ad; echo $Ad = mb_substr($Ad, 0, 1);?><?php $SoyAd = $Sonucla->soyad; echo $SoyAd = mb_substr($SoyAd, 0, 1);?></p>
														</div>
														<div class="comment-body">
															<div class="comment-meta">
																<?php if($Sonucla->derecelendirme == 1){?>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<?php }elseif($Sonucla->derecelendirme == 2){?>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<?php }elseif($Sonucla->derecelendirme == 3){?>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star"></i>
																<i class="fas fa-star"></i>
																<?php }elseif($Sonucla->derecelendirme == 4){?>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star"></i>
																<?php }elseif($Sonucla->derecelendirme == 5){?>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<i class="fas fa-star" style="color: #ff9900;"></i>
																<?php }?>
																<span class="date bold "><a href="javascript:;"><?php echo $Sonucla->tarih;?>, <?php echo $Sonucla->saat;?></a><span style="color:black;"class="bold f-right"><?php echo $Sonucla->ad." ".gizlibilgi($Sonucla->soyad,1,5);?></span></span>
															</div>
															<br/>
															<div class="comment" style="background-color:#eee; border-radius: 8px; padding: 25px 35px 25px 35px;">
															<?php if($Sonucla->yorum_basligi==""){}else{echo '<span class="bold" style="color:#484848;">'.$Sonucla->yorum_basligi.'</span><br/>';}?>
															<?php echo $Sonucla->yorum;?>
															</div>
														</div>
													</li>
												<?php }}?>
												</ul>
											</div>
										</div>
									</div>
                                </div>
								<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								  <div class="modal-dialog modal-lg">
									<div class="modal-content">
									  <div class="modal-header t-left">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title bold centered" id="gridSystemModalLabel">YORUM YAP</h4>
									  </div>
									  <div class="modal-body">
											<form id="yorumugonder" method="post">
											<div class="single-box">
												<div class="coment-form">
													<div class="row">
														<div class="col-sm-12">
															<div class="form-group">
																<label>Bu Ürünü Nasıl Değerlendirirsiniz ? <span class="red"> *</span></label>
																<select name="derecelendirme" class="form-control" style="border: 1px solid #B8B8B8;">
																	<option value="5" selected="selected">Çok İyi</option>
																	<option value="4">İyi</option>
																	<option value="3">Ne iyi / Ne Kötü</option>
																	<option value="2">Kötü</option>
																	<option value="1">Çok Kötü</option>
																</select>
															</div>
														</div>
														<div class="col-sm-12">
															<label for="website">Yorum Başlığı (Opsiyonel)</label>
															<input name="yorum_basligi" type="text" class="form-control" style="border: 1px solid #B8B8B8;" placeholder="Yorum Başlığı (Opsiyonel)">
															<input name="ad" type="hidden" value="<?php echo $Uye->ad;?>">
															<input name="soyad" type="hidden" value="<?php echo $Uye->soyad;?>">
															<input name="uye_id" type="hidden" value="<?php echo $Uye->id;?>">
															<input name="urun_id" type="hidden" value="<?php echo $Urun->id;?>">
															<input name="eposta" type="hidden" value="<?php echo $Uye->eposta;?>">
															<input name="captcha" type="hidden" value="<?php echo "12";?>">
														</div>
														<div class="col-sm-12">
															<label for="message">Yorum</label>
															<textarea name="yorum" rows="6" class="form-control" style="border: 1px solid #B8B8B8;" placeholder="Yorum"></textarea>
														</div>
													</div>
													<button id="yolla" type="submit" class="btn-comment site-font bold">GÖNDER</button>
													<a data-toggle="modal" data-target=".bs-example-modal-md" href="javascript:;"class="f-right" style="margin-top:25px;"><i class="fas fa-question-circle"></i> Yorum yayınlanma kriterleri</a>
												</div>
											</div>
											</form>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default bold site-font" data-dismiss="modal">Kapat</button>
									  </div>
									</div>
								  </div>
								</div>
								<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								  <div class="modal-dialog modal-md">
									<div class="modal-content">
									  <div class="modal-header t-left">
										<button type="button" class="close bold site-font" data-dismiss="modal" aria-label="Close" style="margin-top:3px;"><span aria-hidden="true" style="font-size:17px;">KAPAT</span></button>
										<h4 class="modal-title bold centered site-font" id="gridSystemModalLabel">Ürün Yorum Kriterlerimiz</h4>
									  </div>
									  <div class="modal-body">
									  <p>
										Ürünle ilgili görüşlerinizi paylaştığınız için müşterilerimiz adına teşekkür ederiz.<br/>
										<?php echo $HDDizayn["site_adi"];?>’da yer alan ürün yorumları, müşterilerimizin satın aldıkları veya kullandıkları ürünlere dair değerlendirmelerini içerir.<br/>
										Ürün veya markayla ilgili bilgi veren, ürüne ve kullanımına dair artı ya da eksi özellikleri yazan, tedarik ve teslimat sürecini değerlendiren yorumlar onaylanarak ürün sayfasında yer alır.<br/>
										Hakaret, argo veya alaycı tavır içeren, fiyat bilgisi verilen, soru sorulan, link verilen, karşılaştırma yapılan, 1-2 kelime olup yeterli bilgi içermeyen yorumlar onaylanamamaktadır.<br/>
										Bu kriterlere göre incelenen yorumlar, kısa bir değerlendirme sürecinden geçer, uygunsa onaylanarak ilgili ürün sayfasında yer alır. Değerlendirme süresi, yorumların geliş sıralamasına göre değişkenlik gösterebilir.
									  </p>
									  </div>
									  <div class="modal-footer">
									  </div>
									</div>
								  </div>
								</div>
                                <div role="tabpanel" class="tab-pane" id="<?php echo $Bilgi->seflink;?>">
									<div class="block-title"><strong class="title"><?php echo $Bilgi->baslik;?></strong></div>
                                    <div class="block-content">
                                        <?php echo $Bilgi->aciklama;?>
                                    </div>
                                </div>
                            </div>
                        </div>  
						<?php
						if(!@in_array($UrunID, explode(',',$_COOKIE['urunler_id']))){
						setcookie('urunler_id', $_COOKIE['urunler_id'].$UrunID.',', time()+9999999);
						} $TutulanID = substr_replace($_COOKIE['urunler_id'],'',-1);
						if($TutulanID==""){}else{
						$Sql = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = 1 and id in ($TutulanID)");
						?>
                        <div class="block-related ">
                            <div class="block-title">
                                <strong class="title site-font main-color" style="font-size:20px;">SON BAKTIĞINIZ ÜRÜNLER</strong>
                            </div>
                            <div class="block-content ">
                                <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3},"1200":{"items":4}}'>
									<?php
									while($SqlSonuc = $Sql->fetch_object()){
									?>
                                    <li class="product-item product-item-opt-2">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <img alt="<?php echo $SqlSonuc->baslik;?>" src="<?php echo "dosyalar/urunler/".$SqlSonuc->resim;?>" width="270" height="350">
                                            </div>
                                            <div class="product-item-detail">
												<?php if($SqlSonuc->indirim==1){
												$AnaFiyat 	= $SqlSonuc->urunfiyat;
												$Hesapla 	= $SqlSonuc->urunfiyat - $SqlSonuc->indirimli_fiyat; 
												$Yuzde	 	= ($Hesapla / $AnaFiyat) * 100;	
												?>
												<span class="product-item-label label-sale-off" align="center" style="font-size:13px; font-weight:bold;">%<?php echo floor($Yuzde);?><span style="padding-top:5px;">İndirim</span></span>
                                                <strong class="product-item-name" style="padding-top:15px;"><a href="<?php echo $SqlSonuc->seflink.".html";?>"><?php echo $SqlSonuc->baslik;?></a></strong>
                                                <div class="product-item-price">
                                                    <span class="price"><?php echo number_format($SqlSonuc->indirimli_fiyat, 2, ',', ',')." ".$SqlSonuc->para_birimi;?></span>
                                                    <span class="old-price"><?php echo number_format($SqlSonuc->urunfiyat, 2, ',', ',')." ".$SqlSonuc->para_birimi;?></span>
                                                </div>
												<?php }else{?>
                                                <strong class="product-item-name" style="padding-top:15px;"><a href="<?php echo $SqlSonuc->seflink.".html";?>"><?php echo $SqlSonuc->baslik;?></a></strong>
                                                <div class="product-item-price">
                                                    <span class="price"><?php echo number_format($SqlSonuc->urunfiyat, 2, ',', ',')." ".$SqlSonuc->para_birimi;?></span>
                                                </div>
												<?php }?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ol>
                            </div>
                        </div>
						<?php }?>
                    </div>
                </div>
            </div>
		</main>
		<?php require_once("footer.php");?>
	</div>
	<script type="text/javascript" src="js/easyshare.js"></script>
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