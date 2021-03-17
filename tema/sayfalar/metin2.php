<?php
session_start();
ob_start();
include "../kaynak/dbbaglanti.php";
include "../kaynak/fonksiyon.php";

$siteayarlaricek =mysqli_query($dbbaglanti,"select * from siteayarlari where id='1'");
$siteayarlari = mysqli_fetch_array($siteayarlaricek);
    if (isset($_SESSION["kullanici"])){ 
	  $uyekullaniciadi = $_SESSION["kullanici"];
$uyekullanicibilgicek =mysqli_query($dbbaglanti,"select * from uye where kadi='$uyekullaniciadi'");
$uyebilgi = mysqli_fetch_array($uyekullanicibilgicek);
$kullanicisession = $_SESSION["kullanici"];
		}else{
		$kullanicisession = $_SESSION["kullanici"];
		}
?>
<!DOCTYPE html>
<html lang="TR">
<head>
<meta charset="UTF-8">
<meta http-equiv="content-language" content="tr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<title>Metin2 Pvp Serverler - Editsiz, Yeni Emek Serverler</title>
<meta name="description" content="Yeni Metin2 Pvp Serverler güncel listesi burada. Aradığınız özellikteki editsiz ve emek metin2 pvp serveri hemen oynamaya başlayın."/>
<meta name="keywords" content="metin2 pvp serverler, editsiz metin2 pvp serverler, tr tipi metin2 pvp serverler, metin2 emek serverler, metin2 pvp, pvpler, serverler" />
<meta name="rating" content="general"/>
<meta name="Author" content="Metin2 Pvp Serverler">
<meta name="publisher" content="Metin2 Pvp Serverler 2021" />
<meta name="google" content="notranslate" />
<meta name="robots" content="index,follow">
<meta name="copyright" content="<?=$siteayarlari["copyright"]?>"/>
<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
<link rel="shortcut icon" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/favicon.ico"/>
<link rel="canonical" href="<?=$siteayarlari["siteadresi"]?>/metin2-pvp-serverler"/>
<meta name="url" content="<?=$siteayarlari["siteadresi"]?>/metin2-pvp-serverler">
<link type="application/rss+xml" href="https://www.pvpler.net/rss.xml" title="Yeni Eklenen 60 Metin2 Pvp Serveri"/>
<meta name="theme-color" content="#293f58">

<meta property="og:locale" content="tr_TR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Metin2 Pvp Serverler - Editsiz, Yeni Emek Serverler" />
<meta property="og:description" content="Yeni Metin2 Pvp Serverler güncel listesi burada. Aradığınız özellikteki editsiz ve emek metin2 pvp serveri hemen oynamaya başlayın." />
<meta property="og:url" content="<?='https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">  
<meta property="og:site_name" content="<?=$siteayarlari["siteadi"]?>">  

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Yeni Metin2 Pvp Serverler güncel listesi burada. Aradığınız özellikteki editsiz ve emek metin2 pvp serveri hemen oynamaya başlayın." />
<meta name="twitter:title" content="Metin2 Pvp Serverler - Editsiz, Yeni Emek Serverler" />
<meta name="twitter:site" content="@pvpler_net" />
<meta name="twitter:creator" content="@pvpler_net" />


<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/font.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/style.min.css?v=0.2" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/helper.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/social-share/css/social-share-kit.css" />

</head>

  <body>
<?php include_once("../kaynak/ustkisim.php") ?>
<!-- Metin2 pvp serverler -->
    <div id="main" class="container">
    	<div class="row">
<div class="col-md-8">
	<div class="panel panel-black">
	   <div class="panel-heading">
	   			   			<h1 class="panel-title font-size-24">Metin2 Pvp Serverler</h1>
	   				</div>
		<div class="panel-body" >

	   					<table class="table table-server-list no-margin-bottom"  > 
				<thead> 
					<tr> 
						<th class="col-xs-1">#</th> 
						<th class="col-xs-8">Server Adı</th> 
						<th class="col-xs-1 hidden-xs">Durum</th>
						<th class="col-xs-1 hidden-xs">Zorluk</th>  
					</tr> 
				</thead> 
				<tbody>
				<style>.yazi-sinir {overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}</style>
<?

$vip_cek = "select * from serverlar where servervip='evet' ORDER BY id DESC LIMIT 0,5";
$vip_sorgu = mysqli_query($dbbaglanti, $vip_cek);
while($vipler = mysqli_fetch_array($vip_sorgu))
  {


if ($vipler["servervip"] == "evet") {
	
	if($vipler["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
		  else if($vipler["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($vipler["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	
		   echo'
  
  	<tr> 
<th scope="row"><img src="https://www.pvpler.net/resim/vip.gif" alt="Türkiyenin en iyi metin2 pvp serverleri" title="Türkiyenin en iyi metin2 pvp serverleri" width="100%" height="100%" style="width:20px;height:14px;"></th> 
<td class="yazi-sinir"><a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/'.$vipler["serverurl"].'"><b>'.$vipler["serverbaslik"].'</b></a></td> 
<td class="text-center hidden-xs"><img src="https://www.pvpler.net/tema/tasarim/images/sunucuacik.png" width="20" height="20" alt="Sunucu Açık"/></td>			 
<td class="hidden-xs" style="color:'.$derece.'">'.$vipler["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
	  }
  }
  $sayfada = 30; // sayfada gösterilecek içerik miktarını belirtiyoruz.
 
$sorgu =mysqli_query($dbbaglanti,'SELECT COUNT(*) AS toplam FROM serverlar where serverkategori = "Metin2"');
$sonuc = mysqli_fetch_assoc($sorgu);
$toplam_icerik = $sonuc['toplam'];
 
$toplam_sayfa = ceil($toplam_icerik / $sayfada);
//
// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
 if($_GET['sayfa']==1)
 {
	   $iz = 1;

 }else{
	  $deger = 30;
	  $carp = $_GET['sayfa'];
	  $iz = $deger*$carp;
 }
// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if($sayfa < 1) $sayfa = 1; 
 
// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
//
// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
$limit = ($sayfa - 1) * $sayfada;
 
$sorgu =mysqli_query($dbbaglanti,'SELECT * FROM serverlar where serverkategori = "Metin2" and servervip="hayir" order by id desc LIMIT ' . $limit . ', ' . $sayfada);

  while($sonal = mysqli_fetch_array($sorgu))
  {

		  if($sonal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" width="20" height="20" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" width="20" height="20" alt="Sunucu Kapalı"/>';}

	  	  if($sonal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
		  else if($sonal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($sonal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
  echo'
  
  	<tr> 
<th scope="row">'.$iz++.'</th> 
<td class="yazi-sinir"><a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/'.$sonal["serverurl"].'">'.$sonal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$sonal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  
  $i++;
  }
?>
	  		
								
									</tbody> 
			</table>
			<div class="col-md-12 no-padding margin-top-10">
			  <?

 
if($sayfa != 0) echo '<a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/s/1" class="btn btn-black pull-left margin-right-5"><i class="fa fa-angle-double-left"></i></a> ';
 
if($sayfa == 1){

}else{
	$sayfadeger = $sayfa-1;
echo'	<a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/s/'.$sayfadeger.'" class="btn btn-black pull-left">Geri</a>';

}
 if($sayfa != $toplam_sayfa){ echo '
									<a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/s/'.$toplam_sayfa.'" class="btn btn-black pull-right"> <i class="fa fa-angle-double-right"></i></a>

';}
 if($sayfa == $toplam_sayfa){

}else{
	$sayfadeger = $sayfa+1;
echo'	<a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/s/'.$sayfadeger.'" class="btn btn-black pull-right margin-right-5">İleri</a>';

}
 


			?>
													

				  
				<div class="clearfix"></div>        
			</div>
		</div>
	</div>	
	
</div>

<script type="application/ld+json">{ "@context": "http://schema.org", "@type": "VideoGame", "operatingSystem": "Windows", "name": "Metin2 Pvp Serverler", "url": "https://www.pvpler.net/metin2-pvp-serverler", "description": "Metin2 Pvp Serverler güncel listesini, editsiz, 1-105, emek tipi istediğiniz türde mt2 pvp serverlarını burada bulabilirsiniz. Ücretsiz MT2 Serverlar Tanıtımı.", "inLanguage": ["Türkçe"], "applicationCategory": "Game", "publisher": "GameForge", "genre": ["1st Person"], "processorRequirements": "3.1 Ghz", "memoryRequirements": "512 MB", "storageRequirements": "3 Gb", "gamePlatform": ["PC game"], "sameAs": "https://tr.wikipedia.org/wiki/Metin2", "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.9", "reviewCount": "2501241" }, "author": { "@type": "Organization", "name": "GameForge", "url": "https://gameforge.com/tr-TR/" } } </script>

<?php include_once("../kaynak/sagkisim.php") ?>

<style>
	.alt-icerik {
	margin: 15px 15px 15px 15px;
    padding: 0px 0px 10px 10px;
    border: 1px solid rgba(0,0,0,.8);
    border-radius: 5px;
    margin-bottom: 20px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 10px 10px rgba(255, 255, 255, 0.1);
	}
</style>
<div class="clearfix"></div>  
<div class="alt-icerik">
<h2>Editsiz Metin2 Pvp Serverler</h2>
<p>
Tüm bu sunucu, oyun tipi karmaşasında aradığınız en iyi, uzun ömürlü, kaliteli serverler pvpler.net'de bulabilirsiniz. 
2020'nin en güncel ve en iyi mt2 serverler listesini web sitemizden takip edebilirsiniz.
Emek, tr tipi, editli/editsiz her türden oyun tarzını burada bulabilirsiniz.
Hemen bir server seçip oynamaya başlayın.
2003 yılından buyana devam eden metin2 macerasında sürekli kapanan, verdiğiniz emeklerin boşa çıktığı değil, sürekliliği olan ve emeklerinizin karşılığını alabileceğiniz bir oyun dileğiyle.
<br>
</p>

<h3>Metin2 Wslik Serverler</h3>
<p>Kullandığımız yazılımda akıllı arama ve hızlı listeleme sayesinde istediğiniz türdeki sunucuları çok hızlı bir şekilde bulabilirsiniz.
Özel yazılımımız sayesinde yeni sunucuları tek tıkla listeleyip, anında oynamaya başlayabilirsiniz.
Yegane amacımız aktif ve uzun ömürlü sunucuları sizlere sunmaktadır.
 Kolay filtreleme sistemi ve hızlı arama özelliği ile istediğiniz türdeki oyunu kolayca bulabilirsiniz..
Her gün bir yenisinin eklendiği sunucuları takip etmesi bir hayli zorlaştı. Bu karmaşa arasında bizim sizlere sundumuğuz hizmetlerden biriside bu sunucuları kolayca takip edebilmeniz.</p>

<h3>Metin2 Emek Serverler</h3>
<p>Oyuna para yatırıp, sizden önde başlayan kişilerin olmadığı ve sadece emek ile kendinizi ve karakterinizi geliştirebileceğiniz, kar amaçlı çalışmayan sunucuları sizler için derledik.</p>
</div>

			<div class="col-md-12">
	<div class="col-md-8 no-padding hidden-xs">
		<ul class="list-unstyled list-inline">
			<li><a href="<?=$siteayarlari["siteadresi"]?>/" class="color-grey-500" title="pvp serverler">Pvp Serverler </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/metin2-pvp-serverler" class="color-grey-500" title="metin2 pvp">Metin2 pvp serverler listesi </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/bombom" class="color-grey-500" title="BomBom pvp serverler">BomBom Pvp Serverler</a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/knight" class="color-grey-500" title="Knight pvp serverler">Knight Pvp Serverler</a></li>
			</li>
		</ul>
	</div>
	<div class="col-md-4 no-padding text-right">
		Copyright <a href="<?=$siteayarlari["siteadresi"]?>/">www.pvpler.net</a>
	</div> 
</div>    	</div>
    </div>
    <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
			
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/jquery.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/social-share/js/social-share-kit.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/js/app.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/js/modal.js"></script>

	<script>
	$("img").error(function () {
		  $(this).remove();
	});
	</script>
	<script type="text/javascript">
			SocialShareKit.init({
			    selector: '.ssk',
			    url: '<?=$siteayarlari["siteadresi"]?>/',

			});
	</script>
  </body>

</html>