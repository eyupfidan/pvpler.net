<?php

session_start();
ob_start();
include "tema/kaynak/dbbaglanti.php";
include "tema/kaynak/fonksiyon.php";

$veri .= '
<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">
<channel>
<title>Metin2 Pvp Serverler - Editsiz, Yeni Emek Serverler</title> 
<description>Yeni Metin2 Pvp Serverler güncel listesi burada. Aradığınız özellikteki editsiz ve emek metin2 pvp serveri hemen oynamaya başlayın.</description> 
<link>https://www.pvpler.net/metin2-pvp-serverler</link> 
<language>tr-tr</language>';

$tarih = date('Y-m-d');

$vip_cek = "select * from serverlar ORDER BY id DESC LIMIT 0,60";
$vip_sorgu = mysqli_query($dbbaglanti, $vip_cek);
while($vipler = mysqli_fetch_array($vip_sorgu))
 {
$veri .= '
<item>
<title>'.$vipler['serverbaslik'].'</title>
<lastmod>'.$tarih.'</lastmod>
<link>https://www.pvpler.net/metin2-pvp-serverler/'.$vipler['serverurl'].'</link>
</item>
';
 }
$veri .= '
</channel>
</rss>';

if(file_exists('rss.xml')) {
   unlink('rss.xml');
   touch('rss.txt');
   $dosya = fopen('rss.txt', 'w');
	fwrite($dosya,$veri);
	fclose($dosya);
	rename("rss.txt", "rss.xml");
} else {
   touch('rss.txt');
   $dosya = fopen('rss.txt', 'w');
	fwrite($dosya,$veri);
	fclose($dosya);
	rename("rss.txt", "rss.xml");
}

?>