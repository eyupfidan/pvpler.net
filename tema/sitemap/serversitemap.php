<?php 
header("Content-Type: text/xml; charset=utf-8");       
include "../kaynak/dbbaglanti.php";
include "../kaynak/linkduzenle.php";

$xml ='<?xml version="1.0" encoding="UTF-8"?> 
        <urlset xmlns="http://www.google.com/schemas/sitemap/0.84"> 
      
		'; 
		$anasite = $siteayarlari["siteadresi"];
		$siteayarlaricek =mysqli_query($dbbaglanti,"select * from siteayarlari where id='1'");
$siteayarlari = mysqli_fetch_array($siteayarlaricek);
$veri =mysqli_query($dbbaglanti,"SELECT * FROM serverlar ORDER BY id DESC"); 
while($yaz = mysqli_fetch_array($veri)){ 
$link = $siteayarlari["siteadresi"]."/".linkyap($yaz["serverkategori"])."/".$yaz["serverurl"].""; 
$tarih = substr($yaz["servertarih"],0,10); 
$xml.= '<url> 
    <loc>'.$link.'</loc> 
	<lastmod>'.$tarih.'</lastmod>
    <changefreq>daily</changefreq> 
    <priority>1.0</priority> 
</url> 
'; 
} 
$xml .= '</urlset>'; 
echo $xml; 
?>