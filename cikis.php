<?php
#########################################################################
#########################| HDDIZAYN WEB YAZILIM |##########################
##########################| www.HDDizayn.Com |###########################
###########################| Coder Doğan Soyer |###########################
########################################################################
include("panel/sistem/functions.php");
$Guncelle	=	$Baglan->query("UPDATE uyeler SET son_islem = 0 WHERE eposta = '{$_SESSION['eposta']}'");
session_destroy();
echo '<meta http-equiv="refresh" content="0; url = giris.html"/>';
?>