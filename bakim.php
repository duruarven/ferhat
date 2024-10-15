<?php define("HDDIZAYN",true);
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php"); include("panel/sistem/site_sayac.php");
if($HDDizayn['bakimmodu'] == 0){header("location: index.html");}
?>
<!DOCTYPE html>
<html lang="tr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bakım Modu - <?php echo $HDDizayn['title'];?></title>
<meta name="robots" content="noindex">
<meta name="author" content="<?php echo $Author;?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="dosyalar/favicon.ico">
<link href="css/static/css/styles.min.css" rel="stylesheet"/>
<link href="css/static/css/soon.min.css" rel="stylesheet"/>
<style>
body, html {
    height: 100%;
    margin: 0;
}
.bgimg {
    background-image: url('images/bakim.jpg');
    height: 100%;
    background-position: center;
    background-size: cover;
    position: relative;
    color: white;
    font-family: 'Quicksand', sans-serif;
	font-size: 40px;
}
.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
hr {
    margin: auto;
    width: 40%;
}
</style>
<style>
	@import url(https://fonts.googleapis.com/css?family=Quicksand);
	#soon-glow {
		font-family: 'Quicksand', sans-serif;
		color:#fff;
		text-transform:lowercase;
	}
</style>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<div class="bgimg">
  <div class="middle">
    <h1><?php echo $HDDizayn['bakimmodu_baslik'];?> </h1>
	<hr>
    <div class="live">
        <div class="auto-due">
			<div class="soon" id="soon-glow"
				 data-layout="group overlap"
				 data-face="slot doctor glow"
				 data-padding="false"
				 data-scale-max="l"
				 data-visual="ring color-light width-thin glow-progress length-70 gap-0 offset-65">
			</div>
			<script>
				(function(){
					var i=0,soons = document.querySelectorAll('.auto-due .soon'),l=soons.length;
					for (;i<l;i++) {
					soons[i].setAttribute('data-due','<?php echo $HDDizayn['yil'];?>-<?php echo $HDDizayn['ay'];?>-<?php echo $HDDizayn['gun'];?>T00:00');
					////soons[i].setAttribute('data-due','<?php echo $HDDizayn['yil'];?>-<?php echo $HDDizayn['ay'];?>-<?php echo $HDDizayn['gun'];?>T<?php echo $HDDizayn['saat'];?>');
					}
				}());
			</script>
        </div>
    </div>
  <div style="margin-top:-80px;">
    <?php echo $HDDizayn['bakimmodu_mesaj'];?>
  </div>
  </div>
</div>
</body>
</html>
<script src="css/static/js/jquery.js"></script>
<script src="css/static/js/soon.min.js" data-auto="false"></script>
<script>
  if ('addEventListener' in document) {
    var showDemo = function(e){
        var btn = e.target;
        btn.style.display = 'none';
        var wrapper = e.target.parentNode;
        var panel = wrapper.querySelector('.el-sample');
        panel.style.display = 'block';
        var nodes = e.target.parentNode.querySelectorAll('.soon');
        for(var i=0;i<nodes.length;i++){
            Soon.create(nodes[i]);
        }
    };
    var buttons = document.querySelectorAll('.demo-button');
    for(var i=0;i<buttons.length;i++) {
        buttons[i].addEventListener('click',showDemo);
    }
  }
  var soons = document.querySelectorAll('.auto-due .soon');
  for(var i=0;i<soons.length;i++) {
      Soon.create(soons[i]);
  }
</script>