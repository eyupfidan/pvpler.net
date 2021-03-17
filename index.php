<?php
session_start();
ob_start();
include "tema/kaynak/dbbaglanti.php";
include "tema/kaynak/fonksiyon.php";

$siteayarlaricek = mysqli_query($dbbaglanti,"select * from siteayarlari where id='1'");
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
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Pvpler.NET | Türkiyenin en iyi pvp server tanıtım sitesi</title>
<meta name="rating" content="general"/>
<meta name="robots" content="all">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1 days"/>
<meta name="description" content="Pvpler.NET | Pvp Serverler Tanıtım Sitesi, Sitemize Serverinizi Ücretsiz Ekleyebilirsiniz. Güncel PvP Serverleri Web Sitemizde Bulabilirsiniz."/>
<meta name="url" content="<?='https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
<link rel="shortcut icon" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/favicon.ico"/>
<link rel="canonical" href="<?=$siteayarlari["siteadresi"]?>"/>
<meta name="x-canonical-url" content="/"/>

<meta property="og:locale" content="tr_TR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Pvpler.NET | Türkiyenin en iyi pvp server tanıtım sitesi" />
<meta property="og:description" content="Pvpler.NET | Pvp Serverler Tanıtım Sitesi, Sitemize Serverinizi Ücretsiz Ekleyebilirsiniz. Güncel PvP Serverleri Web Sitemizde Bulabilirsiniz." />
<meta property="og:url" content="<?='https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">  
<meta property="og:site_name" content="<?=$siteayarlari["siteadi"]?>">  

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Pvpler.NET | Pvp Serverler Tanıtım Sitesi, Sitemize Serverinizi Ücretsiz Ekleyebilirsiniz. Güncel PvP Serverleri Web Sitemizde Bulabilirsiniz." />
<meta name="twitter:title" content="Pvpler.NET | Türkiyenin en iyi pvp server tanıtım sitesi" />
<meta name="twitter:site" content="@pvpler_net" />
<meta name="twitter:creator" content="@pvpler_net" />

<meta name="p:domain_verify" content="ba3df4523b6a83af3cb50d69d15e04f6"/>

<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/font.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/style.min.css?v=0.2" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/css/helper.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/social-share/css/social-share-kit.css" />

  </head>
  <body>
<?php include_once("tema/kaynak/ustkisim.php") ?>

    
    <div id="main" class="container">
    	<div class="row">
<div class="col-md-8">
	<div class="panel panel-black">
	   <div class="panel-heading">
	   		<div class="col-xs-6 col-md-6 no-padding">
	   			<h1 class="panel-title font-size-26">Metin2 Pvp Serverler</h1>
	   		</div>
	   		<div class="col-xs-6 col-md-6 no-padding">
				<ul class="list-unstyled list-inline pull-right" role="tablist">
					<li class="no-padding">
						<a href="#metin2-pop" id="metin2-pop-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Popüler</a>
					</li>
					<li class="no-padding hidden-xs active">
						<a href="#metin2-last" id="metin2-last-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
					<li class="no-padding visible-xs" style="margin-top:5px;">
						<a href="#metin2-last" id="metin2-last-tab2" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
				</ul>
	   		</div>
	   		
	   		<div class="clearfix"></div>
	   		
		</div>

		<div class="panel-body tab-content" >

			<div role="tabpanel" class="tab-pane" id="metin2-pop">

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
					 <?
$i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Metin2' and servervip='hayir' order by servergoruntulenme desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  
?>
 <?

  }
    $i = 1;
  $server = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Metin2' and servervip='evet' order by id desc limit 10");
  while($al = mysqli_fetch_array($server))
  {
  
		  if($al["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}
	  
	  	  if($al["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
		  else if($al["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($al["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
		 

  echo'
  
<tr> 
<th scope="row"><i class="fa fa-star" style="color:#ffa200" title="Vip Server"></i></th> 
<td><a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/'.$al["serverurl"].'">'.$al["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$al["serveraltkategori"].'</td>
</tr>
							
 
  ';

  $i++;
  }
?>
																														
							
											</tbody> 
				</table>
			</div>
			<div role="tabpanel" class="tab-pane active" id="metin2-last">
				<table class="table table-server-list no-margin-bottom tab-pane"  > 
					<thead> 
						<tr> 
							<th class="col-xs-1">#</th> 
							<th class="col-xs-8">Server Adı</th> 
							<th class="col-xs-1 hidden-xs">Durum</th>
							<th class="col-xs-1 hidden-xs">Zorluk</th>  
						</tr> 
					</thead> 
					<tbody> 
											
							<?
  $i = 1;
      $ix = 1;

  $sonserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Metin2' and servervip='hayir' order by id desc limit 5");
  while($sonal = mysqli_fetch_array($sonserver))
  {

		  if($sonal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($sonal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
		  else if($sonal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($sonal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/metin2-pvp-serverler/'.$sonal["serverurl"].'">'.$sonal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$sonal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>
							
											</tbody> 
				</table>
			</div>
		</div>
	</div>
	
	<div class="panel panel-black">
	   <div class="panel-heading">
	   		<div class="col-xs-6 col-md-6 no-padding">
	   			<h1 class="panel-title font-size-26">Bombom Pvp Serverler</h1>
	   		</div>
	   		<div class="col-xs-6 col-md-6 no-padding">
				<ul class="list-unstyled list-inline pull-right" role="tablist">
					<li class="no-padding">
						<a href="#bombom-pop" id="bombom-pop-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Popüler</a>
					</li>
					<li class="no-padding hidden-xs active">
						<a href="#bombom-last" id="bombom-last-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
					<li class="no-padding visible-xs" style="margin-top:5px;">
						<a href="#bombom-last" id="bombom-last-tab2" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
				</ul>
	   		</div>
	   		<div class="clearfix"></div>
	   		
		</div>
		<div class="panel-body tab-content" >
			<div role="tabpanel" class="tab-pane" id="bombom-pop">
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
										 <?
  $i = 1;
  $server = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Bombom' and servervip='evet' order by id desc limit 10");
  while($al = mysqli_fetch_array($server))
  {
  
		  if($al["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}
	  
	  	  if($al["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($al["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($al["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($al["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($al["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($al["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
	  
		 

  echo'
  
<tr> 
<th scope="row"><i class="fa fa-star" style="color:#ffa200" title="Vip Server"></i></th> 
<td><a href="'.$siteayarlari["siteadresi"].'/bombom/'.$al["serverurl"].'">'.$al["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$al["serveraltkategori"].'</td>
</tr>
							
 
  ';

  $i++;
  }
  
?>
<?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Bombom' and servervip='hayir' order by servergoruntulenme desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/bombom/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
							
							
											</tbody> 
				</table>
			</div>
			<div role="tabpanel" class="tab-pane active" id="bombom-last">
				<table class="table table-server-list no-margin-bottom tab-pane"  > 
					<thead> 
						<tr> 
							<th class="col-xs-1">#</th> 
							<th class="col-xs-8">Server Adı</th> 
							<th class="col-xs-1 hidden-xs">Durum</th>
							<th class="col-xs-1 hidden-xs">Zorluk</th>  
						</tr> 
					</thead> 
					<tbody> 
											
							<?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Bombom' and servervip='hayir' order by id desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/bombom/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
		
											</tbody> 
				</table>
			</div>
		</div>
	</div>
	
	<div class="panel panel-black">
	   <div class="panel-heading">
	   		<div class="col-xs-6 col-md-6 no-padding">
	   			<h1 class="panel-title font-size-26">Knight Pvp Serverler</h1>
	   		</div>
	   		<div class="col-xs-6 col-md-6 no-padding">
				<ul class="list-unstyled list-inline pull-right" role="tablist">
					<li class="no-padding">
						<a href="#knight-pop" id="knight-pop-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Popüler</a>
					</li>
					<li class="no-padding hidden-xs active">
						<a href="#knight-last" id="knight-last-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
					<li class="no-padding visible-xs" style="margin-top:5px;">
						<a href="#knight-last" id="knight-last-tab2" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
				</ul>
	   		</div>
	   		<div class="clearfix"></div>
	   		
		</div>
		<div class="panel-body tab-content" >
			<div role="tabpanel" class="tab-pane" id="knight-pop">
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
										 <?
  $i = 1;
  $server = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Knight' and servervip='evet' order by id desc limit 10");
  while($al = mysqli_fetch_array($server))
  {
  
		  if($al["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}
	  
	  	  if($al["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($al["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($al["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($al["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($al["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($al["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
	  
		 

  echo'
  
<tr> 
<th scope="row"><i class="fa fa-star" style="color:#ffa200" title="Vip Server"></i></th> 
<td><a href="'.$siteayarlari["siteadresi"].'/knight/'.$al["serverurl"].'">'.$al["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$al["serveraltkategori"].'</td>
</tr>
							
 
  ';

  $i++;
  }
  
?>
 <?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Knight' and servervip='hayir' order by servergoruntulenme desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/knight/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
							
							
											</tbody> 
				</table>
			</div>
			<div role="tabpanel" class="tab-pane active" id="knight-last">
				<table class="table table-server-list no-margin-bottom tab-pane"  > 
					<thead> 
						<tr> 
							<th class="col-xs-1">#</th> 
							<th class="col-xs-8">Server Adı</th> 
							<th class="col-xs-1 hidden-xs">Durum</th>
							<th class="col-xs-1 hidden-xs">Zorluk</th>  
						</tr> 
					</thead> 
					<tbody> 
											
							<?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Knight' and servervip='hayir' order by id desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/knight/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
		
											</tbody> 
				</table>
			</div>
		</div>
	</div>
	
		<div class="panel panel-black">
	   <div class="panel-heading">
	   		<div class="col-xs-6 col-md-6 no-padding">
	   			<h1 class="panel-title font-size-26">Silkroad Pvp Serverler</h1>
	   		</div>
	   		<div class="col-xs-6 col-md-6 no-padding">
				<ul class="list-unstyled list-inline pull-right" role="tablist">
					<li class="no-padding">
						<a href="#silkroad-pop" id="silkroad-pop-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Popüler</a>
					</li>
					<li class="no-padding hidden-xs active">
						<a href="#silkroad-last" id="silkroad-last-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
					<li class="no-padding visible-xs" style="margin-top:5px;">
						<a href="#silkroad-last" id="silkroad-last-tab2" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
				</ul>
	   		</div>
	   		<div class="clearfix"></div>
	   		
		</div>
		<div class="panel-body tab-content" >
			<div role="tabpanel" class="tab-pane" id="silkroad-pop">
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
										 <?
  $i = 1;
  $server = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Silkroad' and servervip='evet' order by id desc limit 10");
  while($al = mysqli_fetch_array($server))
  {
  
		  if($al["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}
	  
	  	  if($al["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($al["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($al["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($al["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($al["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($al["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
	  
		 

  echo'
  
<tr> 
<th scope="row"><i class="fa fa-star" style="color:#ffa200" title="Vip Server"></i></th> 
<td><a href="'.$siteayarlari["siteadresi"].'/silkroad/'.$al["serverurl"].'">'.$al["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$al["serveraltkategori"].'</td>
</tr>
							
 
  ';

  $i++;
  }
  
?>
 <?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Silkroad' and servervip='hayir' order by servergoruntulenme desc limit 2");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/silkroad/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
							
							
											</tbody> 
				</table>
			</div>
			<div role="tabpanel" class="tab-pane active" id="silkroad-last">
				<table class="table table-server-list no-margin-bottom tab-pane"  > 
					<thead> 
						<tr> 
							<th class="col-xs-1">#</th> 
							<th class="col-xs-8">Server Adı</th> 
							<th class="col-xs-1 hidden-xs">Durum</th>
							<th class="col-xs-1 hidden-xs">Zorluk</th>  
						</tr> 
					</thead> 
					<tbody> 
											
							<?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Silkroad' and servervip='hayir' order by id desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/silkroad/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
		
											</tbody> 
				</table>
			</div>
		</div>
	</div>
	
			<div class="panel panel-black">
	   <div class="panel-heading">
	   		<div class="col-xs-6 col-md-6 no-padding">
	   			<h1 class="panel-title font-size-26">Minecraft Pvp Serverler</h1>
	   		</div>
	   		<div class="col-xs-6 col-md-6 no-padding">
				<ul class="list-unstyled list-inline pull-right" role="tablist">
					<li class="no-padding">
						<a href="#minecraft-pop" id="minecraft-pop-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Popüler</a>
					</li>
					<li class="no-padding hidden-xs active">
						<a href="#minecraft-last" id="minecraft-last-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
					<li class="no-padding visible-xs" style="margin-top:5px;">
						<a href="#minecraft-last" id="minecraft-last-tab2" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
				</ul>
	   		</div>
	   		<div class="clearfix"></div>
	   		
		</div>
		<div class="panel-body tab-content" >
			<div role="tabpanel" class="tab-pane" id="minecraft-pop">
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
										 <?
  $i = 1;
  $server = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Minecraft' and servervip='evet' order by id desc limit 10");
  while($al = mysqli_fetch_array($server))
  {
  
		  if($al["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}
	  
	  	  if($al["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($al["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($al["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($al["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($al["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($al["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
	  
		 

  echo'
  
<tr> 
<th scope="row"><i class="fa fa-star" style="color:#ffa200" title="Vip Server"></i></th> 
<td><a href="'.$siteayarlari["siteadresi"].'/minecraft/'.$al["serverurl"].'">'.$al["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$al["serveraltkategori"].'</td>
</tr>
							
 
  ';

  $i++;
  }
  
?>
 <?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Minecraft' and servervip='hayir' order by servergoruntulenme desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/minecraft/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
							
							
											</tbody> 
				</table>
			</div>
			<div role="tabpanel" class="tab-pane active" id="minecraft-last">
				<table class="table table-server-list no-margin-bottom tab-pane"  > 
					<thead> 
						<tr> 
							<th class="col-xs-1">#</th> 
							<th class="col-xs-8">Server Adı</th> 
							<th class="col-xs-1 hidden-xs">Durum</th>
							<th class="col-xs-1 hidden-xs">Zorluk</th>  
						</tr> 
					</thead> 
					<tbody> 
											
							<?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Minecraft' and servervip='hayir' order by id desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/minecraft/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
		
											</tbody> 
				</table>
			</div>
		</div>
	</div>
	
	
			<div class="panel panel-black">
	   <div class="panel-heading">
	   		<div class="col-xs-6 col-md-6 no-padding">
	   			<h1 class="panel-title font-size-26">Transformice Pvp Serverler</h1>
	   		</div>
	   		<div class="col-xs-6 col-md-6 no-padding">
				<ul class="list-unstyled list-inline pull-right" role="tablist">
					<li class="no-padding">
						<a href="#transformice-pop" id="transformice-pop-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Popüler</a>
					</li>
					<li class="no-padding hidden-xs active">
						<a href="#transformice-last" id="transformice-last-tab" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
					<li class="no-padding visible-xs" style="margin-top:5px;">
						<a href="#transformice-last" id="transformice-last-tab2" role="tab" data-toggle="tab" class="btn btn-default btn-sm btn-orange no-border">Son Eklenen</a>
					</li>
				</ul>
	   		</div>
	   		<div class="clearfix"></div>
	   		
		</div>
		<div class="panel-body tab-content" >
			<div role="tabpanel" class="tab-pane" id="transformice-pop">
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
										 <?
  $i = 1;
  $server = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Transformice' and servervip='evet' order by id desc limit 10");
  while($al = mysqli_fetch_array($server))
  {
  
		  if($al["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}
	  
	  	  if($al["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($al["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($al["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($al["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($al["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($al["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
	  
		 

  echo'
  
<tr> 
<th scope="row"><i class="fa fa-star" style="color:#ffa200" title="Vip Server"></i></th> 
<td><a href="'.$siteayarlari["siteadresi"].'/transformice/'.$al["serverurl"].'">'.$al["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$al["serveraltkategori"].'</td>
</tr>
							
 
  ';

  $i++;
  }
  
?>
 <?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Transformice' and servervip='hayir' order by servergoruntulenme desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/transformice/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
							
							
											</tbody> 
				</table>
			</div>
			<div role="tabpanel" class="tab-pane active" id="transformice-last">
				<table class="table table-server-list no-margin-bottom tab-pane"  > 
					<thead> 
						<tr> 
							<th class="col-xs-1">#</th> 
							<th class="col-xs-8">Server Adı</th> 
							<th class="col-xs-1 hidden-xs">Durum</th>
							<th class="col-xs-1 hidden-xs">Zorluk</th>  
						</tr> 
					</thead> 
					<tbody> 
											
							<?
  $i = 1;
      $ix = 1;

  $populerserver = mysqli_query($dbbaglanti,"select * from serverlar where serverkategori='Transformice' and servervip='hayir' order by id desc limit 5");
  while($popal = mysqli_fetch_array($populerserver))
  {

		  if($popal["serverdurum"] == "Sunucu Açık")
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucuacik.png" alt="Sunucu Açık"/>';}
		  else
		  {$durum = '<img src="'.$siteayarlari["siteadresi"].'/tema/tasarim/images/sunucukapali.png" alt="Sunucu Kapalı"/>';}

	  	  if($popal["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($popal["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($popal["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($popal["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($popal["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($popal["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
  echo'
  
  	<tr> 
<th scope="row">'.$ix++.'</th> 
<td><a href="'.$siteayarlari["siteadresi"].'/transformice/'.$popal["serverurl"].'">'.$popal["serverbaslik"].'</a></td> 
<td class="text-center hidden-xs">'.$durum.'</td>		 
<td class="hidden-xs" style="color:'.$derece.'">'.$popal["serveraltkategori"].'</td>
</tr>
  
 				
 
  ';
  

  $i++;
  }
  
?>				
		
											</tbody> 
				</table>
			</div>
		</div>
	</div>
	
</div>
<?php include_once("tema/kaynak/sagkisim.php") ?>
<div class="alt-icerik">
<h2>Pvpler.NET</h2>
<p>
Başta <a href="/metin2-pvp-serverler" title="metin2 pvp serverler"><strong>Metin2 pvp serverler</strong></a> olmak üzere bir çok oyunun pvp serverlerini burada bulabilirsiniz.
Metin2ye en yakın oyun olarak <a href="/" title="Knight online pvp serverler"><em>Knight Online Pvp Serverleri</em></a>, <a href="/silkroad" title="Silkroad private serverler"><em>Silkroad Private Serverler</em></a>, <a href="/bombom" title="BomBom Pvp Serverler">BomBom Pvp Serverler</a> ve <a href="/minecraft" title="Minecraft Pvp Serverler">Minecraft Pvp Serverler</a> <a href="/transformice" title="Transformice Pvp Serverler"><u>Transformice Pvp Serverler</u></a> 'i de burada bulabilirsiniz.<br>
</p>

<h3>Güncel Pvp Serverler Listesi</h3>
<p>Pvpler olarak piyasada olmayan yazılımları kullanıyoruz. Örneğin kapanan bir serveri anında sitemizde offline olarak gösteren sistemin üzerinde çalışıyoruz. Amacımız siz oyunculara en mükkemmel <em>pvp serverleri</em> tek tıkla ulaştırmak.
Yegane amacımız <strong>aktif ve uzun ömürlü serverleri</strong> sizlere sunmaktadır.</p>

<h4>Blog Yazılarımız</h4>
<p>Bloğumuzda hergün pvp serverler için öneri, geliştirme, admin/gm komutları, şifreler ve daha fazlasını sizler için ücretsiz paylaşıyoruz.</p>
</div>
			<div class="col-md-12">
	<div class="col-md-8 no-padding hidden-xs">
		<ul class="list-unstyled list-inline">
			<li><a href="<?=$siteayarlari["siteadresi"]?>/" class="color-grey-500" title="Pvp serverler">Pvp serverler </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/metin2-pvp-serverler" class="color-grey-500" title="Metin2 pvp serverler">Metin2 pvp serverler </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/bombom" class="color-grey-500" title="BomBom pvp serverler">BomBom pvp serverler</a></li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/knight" class="color-grey-500" title="Knight pvp serverler">Knight pvp serverler</a></li>
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