<?php
session_start();
ob_start();
include "../kaynak/dbbaglanti.php";
$siteayarlaricek =mysqli_query($dbbaglanti,"select * from siteayarlari where id='1'");
$siteayarlari = mysqli_fetch_array($siteayarlaricek);
session_destroy();
$sea = $siteayarlari["siteadresi"];
 header("Location: $sea");
ob_end_flush();
?>