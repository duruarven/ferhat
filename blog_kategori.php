<?php define("GUVENLIK",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
sistembakim();
include("panel/sistem/site_sayac.php");
$id = GET('id');
$Sorgu = $Baglan->query("SELECT * FROM hddizayn_blog_kategori WHERE durum = '1' and seflink = '$id'");
if(!$Baglan->affected_rows){ Hata404(); yonlen("404.html");}
$Sonuc = $Sorgu->fetch_object();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $Sonuc->baslik;?> - <?php echo $HDDizayn['title'];?></title>
	<meta name="description" content="<?php echo $HDDizayn['description']?>">
	<meta name="keywords" content="<?php echo $Sonuc->baslik;?>">
	<meta name="robots" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="googlebot" content="<?php echo $HDDizayn['robots'];?>">
	<meta name="copyright" content="<?php echo $HDDizayn['copyright']?>" />
	<meta name="author" content="<?php echo $Author;?>">
	<base href="<?php echo $HDDizayn["site_adresi"]."/";?>">
	<link rel="shortcut icon" href="dosyalar/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="index-opt-1 catalog-product-view catalog-view_op1 page-blog" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<div class="wrapper">
        <?php require_once("header.php");?>
		<main class="site-main">
            <div class="columns container">      
                <ol class="breadcrumb no-hide">
                    <li><a href="index.html">AnaSayfa</a></li>
                    <li class="active">Blog</li>
                </ol>
                <div class="row">
                    <div class="col-md-9 col-md-push-3 col-main">
                        <div class="sortPagiBar clearfix">
                            <span class="page-noite"><?php $Bul = $Baglan->query("SELECT * FROM hddizayn_blog WHERE durum = '1'"); echo 'Toplam ('.$Bul->num_rows.') Yazı Bulunmaktadır.';?></span>
                            <div class="bottom-pagination">
                                <nav>
									<ul class="pagination">
										<?php
										$sayfa				=	$_GET['s'];
										if						(!$sayfa){
										$sayfa				=	1;
										} $Bul 				= 	$Baglan->query("SELECT * FROM hddizayn_blog WHERE durum = '1' and kategori = '{$Sonuc->id}'");
										$toplamkaydibul = 	$Bul->num_rows; $sayfalamalimiti	=	5;
										$baslangicsayisi	=	($sayfa*$sayfalamalimiti)-$sayfalamalimiti;
										$toplamsayfasayisi	=	ceil($toplamkaydibul/$sayfalamalimiti);	
										if($sayfa>1){ $sayfayibirgerial	=	$sayfa-1;
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html'><i class='fa fa-angle-left'></i></a></li>";
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfayibirgerial'>Geri</a></li>";
										} $sayfanogosterimlimiti	=	5; for($sayfaindex=$sayfa-$sayfanogosterimlimiti; $sayfaindex<=$sayfa+$sayfanogosterimlimiti ; $sayfaindex++){
										if(($sayfaindex>0) and ($sayfaindex<=$toplamsayfasayisi)){
										if($sayfa==$sayfaindex){ echo "<li class='active bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfaindex'>$sayfaindex</a></li>";
										}else{echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfaindex'>$sayfaindex</a></li>";
										}}}if($sayfa!=$toplamsayfasayisi){ $sayfayibirilerial	=	$sayfa+1;
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfayibirilerial'>İleri</a></li>";
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$toplamsayfasayisi'><i class='fa fa-angle-right'></i></a></li>";
										}
										?>
									</ul>
                                </nav>
                            </div>
                        </div>
                        <ul class="blog-posts">
							<?php					
							$BlogBaktik 		= 	$Baglan->query("SELECT * FROM hddizayn_blog WHERE durum = '1' and kategori = '{$Sonuc->id}' ORDER BY ID DESC LIMIT $baslangicsayisi,$sayfalamalimiti");
							if(!$Baglan->affected_rows){?>
							<div class="msg-box info-box shape lg">
								<p class="bold">Sistemde Kayıtlı Haber Bulunmamaktadır.</p>
							</div>
							<?php }else{
							while($BlogGorduk = $BlogBaktik->fetch_object()){
							$Sorgu 		= 	$Baglan->query("SELECT * FROM hddizayn_blog_kategori WHERE durum = '1' and id = '{$BlogGorduk->kategori}'");
							$Kategori 	= 	$Sorgu->fetch_object();
							$YorumKontrol = $Baglan->query("SELECT * FROM hddizayn_yorumlar WHERE durum = '1' and blog_id = '{$BlogGorduk->id}' ORDER BY ID DESC");
							?>
                            <li class="post-item">
                                <article class="entry">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="entry-thumb image-hover2">
												<a href="<?php echo "blog/".$BlogGorduk->seflink.".html";?>">
													<?php $Kontrol = $BlogGorduk->resim; if($Kontrol ==""){ ?>
													<img src="assets/images/bos/blog-resim-yok.png">
													<?php }else{ ?>
													<img src="<?php echo "dosyalar/blog/".$BlogGorduk->resim;?>" alt="<?php echo $BlogGorduk->baslik;?>">
													<?php }?>
												</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="entry-ci">
                                                <h3 class="entry-title"><a href="<?php echo "blog/".$BlogGorduk->seflink.".html";?>"><?php echo $BlogGorduk->baslik;?></a></h3>
                                                <div class="entry-meta-data">
                                                    <span class="author">
                                                    <i class="fas fa-user"></i> 
                                                    Yazar: <a href="#"><?php echo $BlogGorduk->yazar;?></a></span>
                                                    <span class="cat">
                                                        <i class="fas fa-folder-open"></i>
                                                        <a href="<?php echo "blog-kategori/".$Kategori->seflink.".html";?>"><?php echo $Kategori->baslik;?></a>
                                                    </span>
                                                    <span class="comment-count">
                                                        <i class="fas fa-comment-dots"></i> <?php echo $YorumKontrol->num_rows;?>
                                                    </span>
                                                    <span class="date"><i class="fa fa-calendar"></i> <?php echo $BlogGorduk->tarih;?></span>
                                                </div>
                                                <div class="entry-excerpt">
                                                    <?php echo strip_tags(substr($BlogGorduk->aciklama,0,317))."..."; ?>
                                                </div>
												<br/>
												<div class="entry-tags clearfix">
												<style>
												.tags li {
													float: left;
													margin: 0 2px 7px;
													height: 30px;
													overflow: hidden;
													line-height: 30px;
													border: 1px #4c4c4c solid;
													display: inline-block;
												}
												.tags li a {
													display: table;
													width: 100%;
													height: 200%;
													position: relative;
													top: 0;
													text-align: center;
													font-size: 11px;
													text-transform: uppercase;
													padding: 0 10px;
													z-index: 1;
												}
												</style>
												<?php
													$Parcala = $BlogGorduk->anahtar_kelimeler;
													$Yazdir = explode(",",$Parcala);
													$Saydir = count($Yazdir);	
													for($i=0; $i<$Saydir; $i++){
													$Gelen = array(" ",",",".","'","\"","|","\\","/",";",":");
													$Duzelt = array("-");
													$Onayla = $Yazdir; $Bul = "-"; $Degistir  = "-";
													$Onayla = str_replace($Bul, $Degistir, $Onayla[$i]);
													$Link 	= str_replace($Gelen,$Duzelt,$Yazdir[$i]);
													echo '<ul class="tags">';
													echo '<li><a href="'.$HDDizayn['site_adresi'].'/tags/'.$Link.'">';
													echo $Onayla;
													echo "</a></li></ul>";
													}
												?>
												</div>
                                                <div class="entry-more">
                                                    <a class="site-font bold" href="<?php echo "blog/".$BlogGorduk->seflink.".html";?>">Devamını Göster</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>
							<?php }}?>
                        </ul>
                        <div class="sortPagiBar clearfix">
                            <div class="bottom-pagination">
                                <nav>
									<ul class="pagination">
										<?php
										if($sayfa>1){
										$sayfayibirgerial	=	$sayfa-1;
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html'><i class='fa fa-angle-left'></i></a></li>";
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfayibirgerial'>Geri</a></li>";
										}$sayfanogosterimlimiti	=	5; for($sayfaindex=$sayfa-$sayfanogosterimlimiti; $sayfaindex<=$sayfa+$sayfanogosterimlimiti ; $sayfaindex++){
										if(($sayfaindex>0) and ($sayfaindex<=$toplamsayfasayisi)){
										if($sayfa==$sayfaindex){echo "<li class='active bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfaindex'>$sayfaindex</a></li>";
										}else{echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfaindex'>$sayfaindex</a></li>";
										}}}if($sayfa!=$toplamsayfasayisi){
										$sayfayibirilerial	=	$sayfa+1;
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$sayfayibirilerial'>İleri</a></li>";
										echo "<li class='bold'><a href='blog-kategori/$Sonuc->seflink.html?s=$toplamsayfasayisi'><i class='fa fa-angle-right'></i></a></li>";
										}
										?>
									</ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3 col-md-pull-9   col-sidebar">
                        <div class="block-sidebar block-sidebar-categorie">
                            <div class="block-title">
                                <strong>KATEGORİLER</strong>
                            </div>
                            <div class="block-content">
                                <ul class="items">
									<?php
									$Sorgu = $Baglan->query("SELECT * FROM hddizayn_blog_kategori WHERE durum = 1 ORDER BY id ASC");
									while($KategoriGorduk = $Sorgu->fetch_object()){
									$Bak = $Baglan->query("SELECT * FROM hddizayn_blog WHERE durum = '1' and kategori = '$KategoriGorduk->id'");
									?>	
									<li><a href="<?php echo "blog-kategori/".$KategoriGorduk->seflink.".html";?>"><?php echo $KategoriGorduk->baslik;?> <span class="count">(<?php echo $Bak->num_rows;?>)</span></a></li>
									<?php }?>
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
								$Sorgucu = $Baglan->query("SELECT * FROM hddizayn_reklam WHERE durum = 1 and reklam_alani = 'blog_alani' ORDER BY id DESC");
								while($Sonucla = $Sorgucu->fetch_object()){
								echo '
                                <div class="item item1" >
                                   <a href="'.$Sonucla->reklam_link.'" class="box-img"><img src="dosyalar/afis/'.$Sonucla->resim.'" alt="'.$Sonucla->reklam_aciklama.'"></a>
                                </div>';
								}
								?>
                            </div>
                        </div>
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
									?><?php if($Yorumlar->blog_id==0){?>
                                    <li>
                                        <h5><a href="<?php echo $Urun->seflink.".html";?>"><?php echo $Urun->baslik;?></a></h5>
                                        <div class="comment">
                                            <?php echo $Yorumlar->yorum;?>
                                        </div>
                                        <div class="author"><a href="<?php echo $Urun->seflink.".html";?>"><?php echo $Yorumlar->ad;?> <?php echo $Yorumlar->soyad;?></a></div>
                                    </li>
									<?php }else{?>
                                    <li>
                                        <h5><a href="<?php echo "blog/".$Blog->seflink.".html#tmyorumlar";?>"><?php echo $Blog->baslik;?></a></h5>
                                        <div class="comment">
                                            <?php echo $Yorumlar->yorum;?>
                                        </div>
                                        <div class="author"><a href="<?php echo "blog/".$Blog->seflink.".html#tmyorumlar";?>"><?php echo $Yorumlar->ad;?> <?php echo $Yorumlar->soyad;?></a></div>
                                    </li>
									<?php }?>
									<?php }}?>
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