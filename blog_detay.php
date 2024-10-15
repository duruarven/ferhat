<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
include("panel/sistem/site_sayac.php");
sistembakim(); $Blog_id = GET('id');
if(!@in_array($Blog_id, explode(':', $_COOKIE['hit_ekle']))){
$Hit = $Baglan->query("UPDATE hddizayn_blog SET goruntulenme=goruntulenme+1 WHERE seflink = '$Blog_id' ORDER BY id ASC LIMIT 1");
setcookie('hit_ekle', $_COOKIE['hit_ekle'].$Blog_id.':', time()+9999999); 
} $Sorgu = $Baglan->query("SELECT * FROM hddizayn_blog WHERE durum = '1' and seflink = '$Blog_id'");
if(!$Baglan->affected_rows){ Hata404(); yonlen("404.html");}
$Blog = $Sorgu->fetch_object();
$Sorgu = $Baglan->query("SELECT * FROM hddizayn_blog_kategori WHERE durum = '1' and id = '{$Blog->kategori}'");
$Kategori = $Sorgu->fetch_object();
$YorumKontrol = $Baglan->query("SELECT * FROM hddizayn_yorumlar WHERE durum = '1' and blog_id = '{$Blog->id}' ORDER BY ID DESC");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $Blog->baslik;?> - <?php echo $HDDizayn['site_adi'];?></title>
	<meta name="description" content="<?php echo $Blog->seo_aciklama;?>">
	<meta name="keywords" content="<?php echo $Blog->anahtar_kelimeler;?>">
	<meta name="author" content="<?php echo $Author;?>">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/yazdir.css">
	<script type="text/javascript" src="js/ajax.js"></script> 
	<script type="text/javascript" src="js/hddizayn.js"></script> 
		<script type="text/javascript">
			function addLink(){
				var body_element = document.getElementsByTagName('body')[0];
				var selection;
				selection = window.getSelection();
				var pagelink = "<br /><br /><br /><br />Kaynak : <a href='"+document.location.href+"'>"+document.location.href+"</a><br />"; // 
				var copytext = selection + pagelink;
				var newdiv = document.createElement('div');
				newdiv.style.position='absolute';
				newdiv.style.left='-99999px';
				body_element.appendChild(newdiv);
				newdiv.innerHTML = copytext;
				selection.selectAllChildren(newdiv);
				window.setTimeout(function() {
					body_element.removeChild(newdiv);
				},0);
			} document.oncopy = addLink;
		</script>
	<?php require_once("panel/sistem/analytics.php");?>
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-blog" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
	<div class="yazdir"><div class="yazdir1" id="yorumyaz"></div></div>
       <?php require_once("header.php");?>     	
		<!-- MAIN -->
		<main class="site-main">
            <div class="columns container">
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li class="active"><?php echo $Blog->baslik;?></li>
                </ol>
                <div class="row">
                    <div class="col-md-9 col-md-push-3 col-main">
                        <h1 class="page-heading">
                            <span class="page-heading-title2 site-font bold"><?php echo $Blog->baslik;?></span>
                        </h1>
                        <article class="entry-detail">
                            <div class="entry-meta-data">
                                <span class="author">
                                <i class="fas fa-user"></i> 
                                Yazar: <a href="javascript:;"><?php echo $Blog->yazar;?></a></span>
                                <span class="cat">
                                    <i class="fa fa-folder-open"></i>
                                    <a href="#"><?php echo $Kategori->baslik;?></a>
                                </span>
                                <span class="comment-count">
                                    <i class="fas fa-comment-dots"></i> <?php echo $YorumKontrol->num_rows;?>
                                </span>
                                <span class="date"><i class="fa fa-calendar"></i> <?php echo $Blog->tarih;?></span>
                                <span class="post-star">
                                    <i class="fas fa-heart"></i>
                                    <span>(<?php echo $Blog->goruntulenme;?>)</span>
                                </span>
                            </div>
                            <div class="entry-photo">
                                <img src="<?php echo "dosyalar/blog/buyuk/".$Blog->resim;?>" alt="<?php echo $Blog->baslik;?>">
                            </div>
                            <div class="content-text clearfix">
                                <?php echo $Blog->aciklama;?>
                            </div>
                        </article>
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
								<button class="whatsapp" onclick="OpenPopupCenter('https://api.whatsapp.com/send?text=<?php echo $HDDizayn["site_adresi"]."/blog/".$Blog->seflink.".html";?>&t=<?php echo $Blog->baslik;?>', 'TEST!?', 500, 400);">
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
						<hr/>
						<hr id="tmyorumlar">
						<?php if(isset($_SESSION['uyegiris'])){?>
						<button data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-top:20px; margin-bottom:20px; font-weight:bold; font-size:16px; padding: 15px 20px 35px 20px;" type="button" class="btn btn-sm btn-icon-right btn-danger hd-color"><i class="far fa-comment-dots"></i> <span>Yorum Yap</span></button>
						<?php }else{?>
						<a href="giris.html" style="margin-top:20px; margin-bottom:20px; font-weight:bold; font-size:16px; padding: 15px 20px 15px 20px;" type="button" class="btn btn-sm btn-icon-right btn-danger hd-color"><i class="far fa-comment-dots"></i> <span>Yorum Yap</span></a>
						<?php }?>
                        <div class="single-box">
							<div class="comment-list">
								<ul>
								<?php 
								$Sorgula = $Baglan->query("SELECT * FROM hddizayn_yorumlar WHERE durum = '1' and blog_id = '{$Blog->id}' ORDER BY ID DESC");
								if(!$Baglan->affected_rows){?>
								<?php }else{
								while($Sonucla = $Sorgula->fetch_object()){
								?>
									<li>
										<style>
											.avartar{
											background-color: #d8d8d8;
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
											<div class="comment" style="background-color:#d8d8d8; border-radius: 8px; padding: 25px 35px 25px 35px;">
											<span class="date bold "><a href="javascript:;"><?php echo $Sonucla->tarih;?>, <?php echo $Sonucla->saat;?></a><span style="color:black;"class="bold f-right"><?php echo $Sonucla->ad." ".$Sonucla->soyad;?></span></span><br><br>
											<?php echo $Sonucla->yorum;?>
											</div>
										</div>
									</li>
								<?php }}?>
								</ul>
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
													<label for="message">Yorum</label>
													<input name="ad" type="hidden" value="<?php echo $Uye->ad;?>">
													<input name="soyad" type="hidden" value="<?php echo $Uye->soyad;?>">
													<input name="uye_id" type="hidden" value="<?php echo $Uye->id;?>">
													<input name="blog_id" type="hidden" value="<?php echo $Blog->id;?>">
													<input name="eposta" type="hidden" value="<?php echo $Uye->eposta;?>">
													<input name="captcha" type="hidden" value="<?php echo "12";?>">
													<textarea name="yorum" rows="6" class="form-control" style="border: 1px solid #B8B8B8;" placeholder="Yorum"></textarea>
												</div>
												<div class="col-sm-12">
													<label for="website">Güvenlik Kodu: 7 + 5 = ?</label>
													<input name="captcha" type="text" class="form-control" placeholder="7 + 5 = ?">
												</div>
											</div>
											<button id="yolla" type="submit" class="btn-comment site-font bold">GÖNDER</button>
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
						<br/><br/>			
                    </div>
                    <div class=" col-md-3 col-md-pull-9   col-sidebar">
						<?php 
						$Sorgucu = $Baglan->query("SELECT * FROM hddizayn_blog WHERE durum = 1 AND id != '$Blog->id' ORDER BY goruntulenme ASC");
						if(!$Baglan->affected_rows){}else{
						?>
                        <div class="block-sidebar block-PopularPosts">
                            <div class="block-title">
                                <strong>POPÜLER YAZILAR</strong>
                            </div>
                            <div class="block-content">
                                <ul class="blog-list-sidebar clearfix">
									<?php while($Sonuccu = $Sorgucu->fetch_object()){?>
                                    <li>
                                        <div class="post-thumb"> 
                                            <a href="<?php echo "blog/".$Sonuccu->seflink.".html";?>"><img alt="<?php echo $Sonuccu->baslik;?>" src="<?php echo "dosyalar/blog/".$Sonuccu->resim;?>"></a>
                                        </div>
                                        <div class="post-info">
                                            <h5 class="entry_title"><a href="<?php echo "blog/".$Sonuccu->seflink.".html";?>"><?php echo $Sonuccu->baslik;?></a></h5>
                                            <div class="post-meta">
                                                <span class="date"><i class="fa fa-calendar"></i> <?php echo $Sonuccu->tarih;?></span>
                                            </div>
                                        </div>
                                    </li>
									<?php }?>
                                </ul>
                            </div>
                        </div> 
						<?php }?>
                        <div class="block-sidebar block-sidebar-RecentComments">
                            <div class="block-title">
                                <strong>SON YORUMLAR</strong>
                            </div>
                            <div class="block-content">
                                <ul class="recent-comment-list">
									<?php
									$Yorum = $Baglan->query("SELECT * FROM hddizayn_yorumlar WHERE durum = '1' ORDER BY RAND () LIMIT 6");
									if(!$Baglan->affected_rows){?>
										<div class="alert square" data-close="false" data-animate="fadeInLeft">
											<h4>Yorum Bulunmuyor !</h4>
										</div>
									<?php }else{
									while($Yorumlar = $Yorum->fetch_object()){
									$BlogYorum = $Baglan->query("SELECT * FROM hddizayn_blog WHERE durum = '1' and id = '$Yorumlar->blog_id'");
									$Blog = $BlogYorum->fetch_object();
									$UrunYorum = $Baglan->query("SELECT * FROM hddizayn_urunler WHERE durum = '1' and id = '$Yorumlar->urun_id'");
									$Urun = $UrunYorum->fetch_object();
									?>
									<?php if($Yorumlar->blog_id==0){?>
                                    <li>
                                        <h5><a href="<?php echo $Urun->seflink.".html";?>"><?php echo $Urun->baslik;?></a></h5>
                                        <div class="comment">
                                            <?php echo $Yorumlar->yorum;?>
                                        </div>
                                        <div class="author"><a href="<?php echo $Urun->seflink.".html";?>"><?php echo $Yorumlar->ad;?> <?php echo $Yorumlar->soyad;?></a></div>
                                    </li>
									<?php }else{?>
                                    <li>
                                        <h5><a href="<?php echo "blog/".$Blog->seflink.".html";?>"><?php echo $Blog->baslik;?></a></h5>
                                        <div class="comment">
                                            <?php echo $Yorumlar->yorum;?>
                                        </div>
                                        <div class="author"><a href="<?php echo "blog/".$Blog->seflink.".html";?>"><?php echo $Yorumlar->ad;?> <?php echo $Yorumlar->soyad;?></a></div>
                                    </li>
									<?php }?>
									<?php }}?>
                                </ul>
                            </div>
                        </div>
                        <div class="block-sidebar block-banner-sidebar">
                            <div class="owl-carousel" 
                                data-nav="false" 
                                data-dots="true" 
                                data-margin="0" 
                                data-items='1' 
                                data-autoplayTimeout="700" 
                                data-autoplay="true" 
                                data-loop="true">
								<?php
								$Sorgucu = $Baglan->query("SELECT * FROM hddizayn_reklam WHERE durum = 1 and reklam_alani = 'blog_detay_alani' ORDER BY id DESC");
								while($Sonucla = $Sorgucu->fetch_object()){
								echo '
                                <div class="item item1" >
                                   <a href="'.$Sonucla->reklam_link.'" class="box-img"><img src="dosyalar/afis/'.$Sonucla->resim.'" alt="'.$Sonucla->reklam_aciklama.'"></a>
                                </div>';
								}
								?>
                            </div>
                        </div>
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
</body>
</html>