		<header class="site-header header-opt-1 cate-show">
            <div class="header-top">
                <div class="container">
					<?php if(!isset($_SESSION['uyegiris'])){ ?>
                    <ul class="nav-left"></ul>
					<ul class="nav-right">
                        <li class="dropdown setting">
                            <a data-toggle="dropdown" style="font-size:14px;" role="button" href="#" class="dropdown-toggle bold site-font"><i class="fas fa-user"></i>&nbsp;&nbsp;<span>Giriş Yap veya Üye Ol </span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                            <div class="dropdown-menu">
                                <ul class="account">
                                    <li><a href="giris.html">Giriş yap</a></li>
                                    <li><a href="kayit.html">Üye Ol</a></li>
                                </ul>
                            </div>
                        </li>
					 </ul>
					<?php }else{ ?>
                    <ul class="nav-left" >
                        <li><span><i class="fa fa-phone" aria-hidden="true"></i><?php echo $HDDizayn["telefon"];?></span></li>
                        <!-- <li><span><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $HDDizayn["eposta"];?></span></li>-->
                    </ul>
					<ul class="nav-right">
                        <li class="dropdown setting">
                            <a data-toggle="dropdown" style="font-size:14px;" role="button" href="hesabim.html" class="dropdown-toggle bold site-font"><i class="fas fa-user"></i>&nbsp;&nbsp;<span>Hesabım </span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                            <div class="dropdown-menu">
                                <ul class="account">
									<span class="site-font main-color bold" style="font-size:15px;"><?php echo $Uye->adsoyad;?></span>
									<hr style="margin-top:10px; height: 2px; border-top:0; border-radius: 5px; background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #a0db8e 12.5%, #a0db8e 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);">
									<li style="margin-top:-10px;"><a href="siparislerim.html">Siparişlerim</a></li>
									<li><a href="hesabim.html">Hesabım</a></li>
                                    <li><a href="favorilerim.html">Favori Listem</a></li>
									<li><a href="cikis.html">Çıkış</a></li>
                                </ul>
                            </div>
                        </li>
					 </ul>
					<?php }?>
                </div>
            </div>
			<script src="js/jquery-1.3.2.min.js"></script>
			<script type="text/javascript" src="js/sepet.js"></script>
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 nav-left">
                            <strong class="logo">
                                <a href="index.html"><img src="<?php echo "dosyalar/logo/".$HDDizayn["logo"];?>" alt="<?php echo $HDDizayn["site_adi"];?>"></a>
                            </strong>
                        </div>
                        <div class="nav-right">
                            <div class="block-minicart dropdown">
                                <a class="dropdown-toggle" role="button" data-toggle="dropdown">
                                    <span class="cart-icon"></span>
                                    <span class="counter qty">
                                        <span class="cart-text">Sepet</span>
										<div id="sepetveri"></div>
                                    </span>
                                </a>
                                <div class="dropdown-menu">
									<div id="ajaxsepet"></div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-mind">   
                            <div class="block-search">
                                <div class="block-title">
                                    <span>Ara</span>
                                </div>
                                <div class="block-content">
                                    <div class="form-search">
                                        <form method="post" action="arama.html">
                                            <div class="box-group">
                                                <input type="text" class="form-control" name="kelime" placeholder="Örnek: Çamaşır Makinası, Bilgisayar Kasası">
                                                <button type="submit" class="btn btn-search" type="button"><span>Ara...</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav mid-header">
                <div class="container">
                    <div class="box-header-nav">
                        <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>Kategoriler</span></span>
                        <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menü</span></span>
						<?php Menu(); ?>
                        <div class="block-nav-menu">
                            <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>Kapat</span></span></div>
                            <ul class="ui-menu">
                                <li class="parent parent-megamenu active"><a href="index.html"><i class="fas fa-home fa-lg"></i></a></li>
                                <li><a href="indirimli-urunler.html" style="font-weight:bold;">İNDİRİMLİ ÜRÜNLER</a></li>
								<li><a href="cok-satanlar.html" style="font-weight:bold;">ÇOK SATAN ÜRÜNLER</a></li>
								<li><a href="bilgi/islem-rehberi.html" style="font-weight:bold;">BİLGİ İŞLEM</a></li>
                                <li><a href="blog.html" style="font-weight:bold;">BLOG</a></li>
								<li><a href="iletisim.html" style="font-weight:bold;">İLETİŞİM</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>