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
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>404 Sayfa bulunamadı! | <?=$siteayarlari["siteadi"]?></title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="rating" content="general"/>
<meta name="robots" content="all">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1 days"/>
<meta name="description" content="Oops! Aradığınız server silinmiş olabilir. Lütfen başka pvp serverleri inceleyin. 404 Sayfa bulunamadı!"/>
<meta name="copyright" content="<?=$siteayarlari["copyright"]?>"/>
<meta name="url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
<meta name="generator" content="<?=$siteayarlari["surum"]?>"/>
<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
<link rel="shortcut icon" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/favicon.ico"/>
<link rel="canonical" href="<?=$siteayarlari["siteadresi"]?>/hata"/>
<meta name="x-canonical-url" content="/"/>

<meta property="og:locale" content="tr_TR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="404 Sayfa bulunamadı! | <?=$siteayarlari["siteadi"]?>" />
<meta property="og:description" content="Oops! Aradığınız server silinmiş olabilir. Lütfen başka pvp serverleri inceleyin. 404 Sayfa bulunamadı! />
<meta property="og:url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">  
<meta property="og:site_name" content="<?=$siteayarlari["siteadi"]?>">  

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Oops! Aradığınız server silinmiş olabilir. Lütfen başka pvp serverleri inceleyin. 404 Sayfa bulunamadı!" />
<meta name="twitter:title" content="404 Sayfa bulunamadı! | <?=$siteayarlari["siteadi"]?>" />
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
	   			   			<h1 class="panel-title font-size-24">404 Aradığınız sayfa bulunamadı.</h1>
	   				</div>
		<div class="panel-body" >
<h2 align="center">Aradığınız sayfa bulunamadı!</h2>
			<div class="col-md-12 no-padding margin-top-10">
			  <?

 
if($sayfa != 0) echo '<a href="'.$siteayarlari["siteadresi"].'/bombom/s/1" class="btn btn-black pull-left margin-right-5"><i class="fa fa-angle-double-left"></i></a> ';
 
if($sayfa == 1){

}else{
	$sayfadeger = $sayfa-1;
echo'	<a href="'.$siteayarlari["siteadresi"].'/bombom/s/'.$sayfadeger.'" class="btn btn-black pull-left">Geri</a>';

}
 if($sayfa != $toplam_sayfa){ echo '
									<a href="'.$siteayarlari["siteadresi"].'/bombom/s/'.$toplam_sayfa.'" class="btn btn-black pull-right"> <i class="fa fa-angle-double-right"></i></a>

';}
 if($sayfa == $toplam_sayfa){

}else{
	$sayfadeger = $sayfa+1;
echo'	<a href="'.$siteayarlari["siteadresi"].'/bombom/s/'.$sayfadeger.'" class="btn btn-black pull-right margin-right-5">İleri</a>';

}
 


			?>
													

				  
				<div class="clearfix"></div>        
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