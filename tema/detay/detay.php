<?php
session_start();
ob_start();
include "../kaynak/dbbaglanti.php";
include "../kaynak/fonksiyon.php";

$siteayarlaricek =mysqli_query($dbbaglanti,"select * from siteayarlari where id='1'");
$siteayarlari = mysqli_fetch_array($siteayarlaricek);

$tanitimiccek =mysqli_query($dbbaglanti,"select * from reklam where reklamad='tanitimic'");
$tanitimicdetay = mysqli_fetch_array($tanitimiccek);

    if (isset($_SESSION["kullanici"])){ 
	  $uyekullaniciadi = $_SESSION["kullanici"];
$uyekullanicibilgicek =mysqli_query($dbbaglanti,"select * from uye where kadi='$uyekullaniciadi'");
$uyebilgi = mysqli_fetch_array($uyekullanicibilgicek);
$kullanicisession = $_SESSION["kullanici"];
		}else{
		$kullanicisession = $_SESSION["kullanici"];
		}


$serverurl = addslashes($_GET["serverurl"]);
$servercek =mysqli_query($dbbaglanti,"select * from serverlar where serverurl='$serverurl'");
$serverdetay = mysqli_fetch_array($servercek);

if(mysqli_num_rows($servercek)>0){ 
    
$ip=$_SERVER['REMOTE_ADDR']; $tarih = date("Y-m-d H:i:s");
$servervarmibak=mysqli_fetch_object(mysqli_query($dbbaglanti,"select * from goruntulenme where sayfa='$serverurl' and ip='$ip'"));
	{
					if($servervarmibak){
				echo "";
				}
				else
				{
				mysqli_query($dbbaglanti,"insert into goruntulenme (sayfa,tarih,ip) values('$serverurl','$tarih','$ip')");
				$ver =mysqli_query($dbbaglanti,"update serverlar Set servergoruntulenme = servergoruntulenme + 1 where serverurl='$serverurl'");
				if($ver)
				{
				echo "";
				}
				else
				{
				echo "";
				}
				
				
				}
					}
					}else{
					$sea = $siteayarlari["siteadresi"];
 header("Location: $sea/hata");	
					}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title><?=$serverdetay["serverbaslik"]?> <?=$serverdetay["serveraltkategori"]?> <?=$serverdetay["serverkategori"]?> Pvp Serveri</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="rating" content="general"/>
<meta name="robots" content="all">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1 days"/>
<meta name="description" content="<?=$serverdetay["serverbaslik"]?><?=$serverdetay["serveraltkategori"]?><?=$serverdetay["serverkategori"]?> Metin2 Pvp Serveri | Pvpler.NET"/>
<meta name="copyright" content="<?=$siteayarlari["copyright"]?>"/>
<meta name="url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
<link rel="shortcut icon" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/favicon.ico"/>
<link rel="canonical" href="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>"/>
<meta name="x-canonical-url" content="/"/>

<meta property="og:locale" content="tr_TR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?=$serverdetay["serverbaslik"]?><?=$serverdetay["serveraltkategori"]?><?=$serverdetay["serverkategori"]?> Metin2 Pvp Serveri | Pvpler.NET" />
<meta property="og:description" content="<?=$serverdetay["serverbaslik"]?><?=$serverdetay["serveraltkategori"]?><?=$serverdetay["serverkategori"]?> Metin2 Pvp Serveri | Pvpler.NET" />
<meta property="og:url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">  
<meta property="og:site_name" content="<?=$siteayarlari["siteadi"]?>">

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="<?=$serverdetay["serverbaslik"]?><?=$serverdetay["serveraltkategori"]?><?=$serverdetay["serverkategori"]?> Metin2 Pvp Serveri | Pvpler.NET" />
<meta name="twitter:title" content="<?=$serverdetay["serverbaslik"]?><?=$serverdetay["serveraltkategori"]?><?=$serverdetay["serverkategori"]?> Metin2 Pvp Serveri | Pvpler.NET" />
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

    
    <div id="main" class="container">
    	<div class="row">
<div class="col-md-8">
	<div class="panel panel-black">
	   <div class="panel-heading">
	   			   			<h1 class="panel-title font-size-20"><?=$serverdetay["serverbaslik"]?></h1>
	   				</div>
		<div class="panel-body">
			<div class="col-xs-12 col-sm-9 col-md-9 no-padding">
				<div class="col-xs-12 col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						Server Adı 
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<h1 class="col-xs-9 col-sm-9 col-md-9 font-size-12 no-margin"><?=$serverdetay["serverbaslik"]?></h1>
				</div>
				<div class="col-xs-12 col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						İp/Site 
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<span class="col-xs-9 col-sm-9 col-md-9">
					<?php
					$site_adrs = $serverdetay["serversite"];
					if(strstr($site_adrs, "http://http://")) {$site_adrs = str_replace("http://http://", "http://", $site_adrs);}
					elseif(strstr($site_adrs, "http://https://")) {$site_adrs = str_replace("http://https://", "http://", $site_adrs);}
					elseif(strstr($site_adrs, "http://https:\\")) {$site_adrs = str_replace("http://https:\\", "http://", $site_adrs);}
					elseif(strstr($site_adrs, "http://http:\\")) {$site_adrs = str_replace("http://http:\\", "http://", $site_adrs);}
					$site_adrs = str_replace("\\", "", $site_adrs);
					?>
												<a href="<?php echo $site_adrs; ?>" onclick="goog_report_conversion ('<?php echo $site_adrs; ?>')" class="color-white" rel="nofollow" target="_blank"><?php echo $site_adrs; ?></a>
											</span>
				</div>
				 <?php
					  	  if($serverdetay["serveraltkategori"] == "PK")
		  {$derece = '#FC0;';}
		  else if($serverdetay["serveraltkategori"] == "Orta")
		  {$derece = '#f79517;';}
		  else if($serverdetay["serveraltkategori"] == "Zor")
		  {$derece = 'red;';}
	  		  else if($serverdetay["serveraltkategori"] == "Ardream")
		  {$derece = '#09F;';}
	    else if($serverdetay["serveraltkategori"] == "Mage")
		  {$derece = '#0C3;';}
	  	    else if($serverdetay["serveraltkategori"] == "Kolay")
		  {$derece = '#0C3;';}
	  ?>
				<div class="col-xs-12 col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						Zorluk 
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<span class="col-xs-9 col-sm-9 col-md-9" style="color:<?php echo $derece;?>"><?=$serverdetay["serveraltkategori"]?></span>
				</div>
				<div class="col-xs-12 col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						Discord Adresi
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<span class="col-xs-9 col-sm-9 col-md-9"><a href="<?=$serverdetay["discord_adresi"]?>" target="blank" title="Discord Adresi" alt="<?=$serverdetay["serverbaslik"]?> Discord Adresi">Discord Adresi</a></span>
				</div>
				<div class="col-xs-12 col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						Facebook Adresi
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<span class="col-xs-9 col-sm-9 col-md-9"><a href="<?=$serverdetay["facebook_adresi"]?>" target="blank" title="Facebook Adresi" alt="<?=$serverdetay["serverbaslik"]?> Facebook Adresi">Facebook Adresi</a></span>
				</div>
				<div class="col-xs-12 col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						Durum
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<?php
							  if($serverdetay["serverdurum"] == "Sunucu Açık")
		  {$durum = '<span class="col-xs-9 col-sm-9 col-md-9"><font style="color:#0C3;">Sunucu Açık</font></span>';}
		  else
		  {$durum = '<span class="col-xs-9 col-sm-9 col-md-9"><font style="color:red;">Sunucu Kapalı</font></span>';}
	   ?>
	   <?php echo $durum;?>
											
									</div>
				<div class="col-xs-12 col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						E.Tarihi
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<span class="col-xs-9 col-sm-9 col-md-9"><?=$serverdetay["servertarih"]?></span>
				</div>
				<div class="col-xs- 12col-md-12 no-padding">
					<span class="color-white col-xs-3 col-sm-3 col-md-3 no-padding">
						Puan
						<span class="color-white no-padding pull-right">:</span>
					</span>
					<span class="col-xs-9 col-sm-9 col-md-9"><?=$serverdetay["serverpuan"]?> Oy</span>
				</div></br>
				
			</div>
			<div class="col-sm-3 col-md-3 text-center hidden-xs">
						 <?php
					  	  if($serverdetay["serverkategori"] == "Metin2")
		  {$tip = '/tema/tasarim/images/metin2logo.png';}
		  if($serverdetay["serverkategori"] == "Knight")
		  {$tip = '/tema/tasarim/images/knightlogo.png';}
		   if($serverdetay["serverkategori"] == "Silkroad")
		  {$tip = '/tema/tasarim/images/silkroadlogo.png';}
	  		  if($serverdetay["serverkategori"] == "Minecraft")
		  {$tip = '/tema/tasarim/images/minecraftlogo.png';}
	    if($serverdetay["serverkategori"] == "Agario")
		  {$tip = '/tema/tasarim/images/agariologo.png';}
	  	   if($serverdetay["serverkategori"] == "Transformice")
		  {$tip = '/tema/tasarim/images/transformicelogo.png';}
	  
	    	   if($serverdetay["serverkategori"] == "Bombom")
		  {$tip = '/tema/tasarim/images/bombomlogo.png';}
	    	   if($serverdetay["serverkategori"] == "Wow")
		  {$tip = '/tema/tasarim/images/wowlogo.png';}
	    	   if($serverdetay["serverkategori"] == "3doyunlar")
		  {$tip = '/tema/tasarim/images/3doyunlarlogo.png';}
	    	   if($serverdetay["serverkategori"] == "Cs")
		  {$tip = '/tema/tasarim/images/cslogo.png';}
	  ?>
			
			
									<img src="<?=$tip;?>" alt="logo" width="150px" height="150px"></br></br>
							</div>
			<div class="col-xs-12 col-sm-12 col-md-12 info-bar no-padding-right no-border-right margin-top-5">
				<div class="col-xs-9 col-sm-9 col-md-9"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 text-right no-padding">
					<?php 
						
	if($_POST['oyver'])
	{
		$serverurl = $serverdetay["serverurl"];
		
		$cerez = $_COOKIE["hakder"];
$ip = $_SERVER['REMOTE_ADDR'];   

$varmibak=mysqli_fetch_object(mysqli_query($dbbaglanti,"select * from guvenlik_oy where cerez='$cerez' and server='$serverurl'"));
	if($varmibak){
			echo"<script>alert('Daha Önce Oy Vermişsiniz.');</script>";

		
	}else{
			echo"<script>alert('Oy Verildi.');</script>";

			mysqli_query($dbbaglanti,"update serverlar Set serverpuan = serverpuan + 1 where serverurl='$serverurl'");
							mysqli_query($dbbaglanti,"insert into guvenlik_oy (cerez,ip,server) values('$cerez','$ip','$serverurl')");


	}
	
	}
					?>
					<form method="post" action="#">
				<input type="submit" class="btn btn-sm btn-orange no-border no-radius" name="oyver" value="+ Oy Ver">
				<? if($uyebilgi["yonetici"] == "evet"){ ?><a href="<?=$siteayarlari["siteadresi"]?>/yonetim/serverduzenle/<?=$serverdetay["serverurl"]?>" class="btn btn-sm btn-orange"  rel="nofollow">Düzenle</a><? } ?>

				</form>

				</div>
			</div>
		</div>
						
	</div>	
	<div class="col-md-12 no-padding margin-bottom-15 <?=$tanitimicdetay["reklamaktif"]?>">
	<a href="<?=$tanitimicdetay["reklamtikurl"]?>" onclick="goog_report_conversion ('<?=$tanitimicdetay["reklamtikurl"]?>')" rel="nofollow" target="_blank"><img src="<?=$tanitimicdetay["reklamresimurl"]?>" width="<?=$tanitimicdetay["reklamresimwidth"]?>" height="<?=$tanitimicdetay["reklamresimheight"]?>" class="full-width img-responsive" alt="reklam iç"/></a>
	 </div>
		 <div class="clearfix"></div>
		<div class="panel panel-black">
		<div class="panel-heading">
			<h3 class="panel-title font-size-20">Pvp Server Tanıtımı</h3>
		</div>
		<div class="panel-body" id="serverArticle">
			<div class="table-responsive">

<p><?=$serverdetay["serverdetay"]?></p>

		</div>
		</div>
	</div>
	
	 </div>

<?php include_once("../kaynak/sagkisim.php") ?>

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