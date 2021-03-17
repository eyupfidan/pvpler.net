<?php
session_start();
ob_start();
include "../kaynak/dbbaglanti.php";
include "../kaynak/fonksiyon.php";
include "../kaynak/linkduzenle.php";

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
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>PvP Server Ekle | Pvp Server Tanıtımı | <?=$siteayarlari["siteadi"]?></title>
<meta name="rating" content="general"/>
<meta name="robots" content="all">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1 days"/>
<meta name="description" content="Metin2, BomBom, Knigt, Silkroad gibi pvpsi bulunan oyunların tümünü sitemizde ücretsiz tanıtabilirsiniz."/>
<meta name="copyright" content="<?=$siteayarlari["copyright"]?>"/>
<meta name="url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
<link rel="shortcut icon" href="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/images/favicon.ico"/>
<link rel="canonical" href="<?=$siteayarlari["siteadresi"]?>/kullanici/uyegiris"/>
<meta name="x-canonical-url" content="/"/>

<meta property="og:locale" content="tr_TR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="PvP Server Ekle | Pvp Server Tanıtımı | <?=$siteayarlari["siteadi"]?>" />
<meta property="og:description" content="Metin2, BomBom, Knigt, Silkroad gibi pvpsi bulunan oyunların tümünü sitemizde ücretsiz tanıtabilirsiniz." />
<meta property="og:url" content="<?='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">  
<meta property="og:site_name" content="<?=$siteayarlari["siteadi"]?>">  

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Metin2, BomBom, Knigt, Silkroad gibi pvpsi bulunan oyunların tümünü sitemizde ücretsiz tanıtabilirsiniz." />
<meta name="twitter:title" content="PvP Server Ekle | Pvp Server Tanıtımı | <?=$siteayarlari["siteadi"]?>" />
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
	   			   			<h1 class="panel-title">Server Ekle</h1>
	   				</div>
		<div class="panel-body">
		<? if($_SESSION["kullanici"] == ""){  echo '<div class="alert alert-danger">

<div class="message">Lütfen Giriş Yapınız.</div></div>';
}else{  
?>
<?php
$selinay = 1;
if($selinay == 1){
	 if($_POST)
	{
	$serverkategori = addslashes($_POST["serverkategori"]);
	$serveraltkategori = addslashes($_POST["serveraltkategori"]);
	$serverbaslik = addslashes($_POST["serverbaslik"]);
	$discord = addslashes($_POST["discord"]);
	$facebook = addslashes($_POST["facebook"]);
	$site = addslashes($_POST["site"]);
	$serverdetay = addslashes($_POST["article"]);
	$hal = substr($site, 0, 7);
	$hal1 = substr($site, 0, 8);
	$serverdurum = 'Sunucu Açık';
	$tarih = date("Y-m-d H:i:s");
	$ekliyen = $_SESSION["kullanici"];
	$serverurl = linkyap(addslashes($_POST["serverbaslik"]));
	if($hal == "http://" || $hal1 == "https://")
	{
	$site = $site;
	}
	else
	{
	$site = $site;
	}
	$varmibak=mysqli_fetch_object(mysqli_query($dbbaglanti,"select * from serverlar where serverbaslik='$serverbaslik'"));
	if($varmibak){
		echo '<div class="alert alert-danger">

<div class="message">Daha önce eklenmiş</div></div>';
	}else{
	$ekle = mysqli_query($dbbaglanti,"insert into serverlar (serverkategori,serveraltkategori,servervip,serverbaslik,serveradi,serversite,serverdetay,serverdurum,servergoruntulenme,serveryorum,serverpuan,servertarih,serverekliyen,serverkonudurum,serverurl,facebook_adresi,discord_adresi)
	values('$serverkategori','$serveraltkategori','hayir','$serverbaslik','$serverbaslik','$site','$serverdetay','$serverdurum','0','0','0','$tarih','$ekliyen','aktif','$serverurl','$facebook','$discord')")or die(mysqli_error());
	if($ekle){
		$ip = $_SERVER['REMOTE_ADDR'];
	echo'
<div class="alert alert-success">
<div class="message">Başarılı Yönlendiriliyorsunuz...</div></div>
';
echo '<meta http-equiv="refresh" content="2;URL='.$siteayarlari["siteadresi"].'">'; 

	}else{
		echo'hata';
	}
	
	}		
	
	}
		?>
	

	
			<form class="form-fv" method="post" action="#" data-process="hideBtn" data-ckeditor="true">
				<div class="form-group">
			    <label for="type">Oyun</label>
			    <select class="form-control input-black" name="serverkategori" id="type" required>
			    	<option value="">Seçiniz</option>
			    	<option value="Metin2">Metin2</option>
			    	<option value="Knight">Knight</option>
					<option value="Silkroad">Silkroad</option>
					<option value="Minecraft">Minecraft</option>
					<option value="Agario">Agario</option>
					<option value="Transformice">Transformice</option>
					<option value="Bombom">Bombom</option>
					<option value="Wow">Wow</option>
					<option value="3doyunlar">3doyunlar</option>
					<option value="Cs">Cs</option>					
			    </select>
			  </div>
			  			  <div class="form-group">
			    <label for="username">Zorluk</label>
			    <select class="form-control input-black" name="serveraltkategori" id="subType" required>
			    	<option value="">Seçiniz</option>
					<option value="Kolay">Kolay</option>
					<option value="Orta">Orta</option>
					<option value="Zor">Zor</option>
					<option value="Wslik">Wslik</option>
					<option value="Emek">Emek</option>
					<option value="Mage">Mage</option>
					<option value="Ardream">Ardream</option>
					<option value="Pk">Pk</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="username">Server Adı</label>
			    <input type="text" class="form-control input-black" id="name" name="serverbaslik" placeholder="Server Adı"
			    minlength="5" maxlength="70" data-fv-stringlength-trim="true" autocomplete="off" required>
			  </div>
			  <div class="form-group">
			    <label for="facebook">Facebook Adresi</label>
			    <input type="text" class="form-control input-black" id="name" name="facebook" placeholder="Facebook Adresi"
			    minlength="5" maxlength="600" data-fv-stringlength-trim="true" autocomplete="off" required>
				<span class="help-block">Linkinizin başında https:// olmalıdır.</span>
			  </div>
			  <div class="form-group">
			    <label for="discord">Discord Adresi</label>
			    <input type="text" class="form-control input-black" id="name" name="discord" placeholder="Discord Adresi"
			    minlength="5" maxlength="600" data-fv-stringlength-trim="true" autocomplete="off" required>
				<span class="help-block">Linkinizin başında https:// olmalıdır.</span>
			  </div>
			  <div class="form-group">
			    <label for="site">Site</label>
				    <input type="url" class="form-control input-black" id="site" name="site" placeholder="Site adresi" required>
				    <span class="help-block">
			    <span class="help-block">
			    	Başında http:// ve https:// olmalıdır. Sonunda '/' olmamalıdır.<br/>
					Subdomain eklenebilir. Örn: (Pvp.metin2.org) gibi.</span>
			  </div>

			  <div class="form-group">
			    <label for="article">Tanıtım</label>
			    <textarea class="form-control" name="article" id="tanitim"></textarea>
			    <span class="help-block">Lütfen sade ve anlaşılır bir dille tanıtımınızı yazınız</span>
			  </div>
			  

			  <button type="submit" class="btn btn-default btn-orange">Gönder</button>
			</form>
				<? } else { echo '<div class="alert alert-danger">

<div class="message">Günlük sadece bir server eklenebilir.</div></div>'; } ?>
		<? 
							
						} ?>
		</div>
	</div>

	
	
	
		
	
</div>
<?php include_once("../kaynak/sagkisim.php") ?>

			<div class="col-md-12">
	<div class="col-md-8 no-padding hidden-xs">
		<ul class="list-unstyled list-inline">
			<li><a href="<?=$siteayarlari["siteadresi"]?>/" class="color-grey-500" title="pvp serverler">Pvp Serverler </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>/metin2-pvp-serverler" class="color-grey-500" title="metin2 pvp">Metin2 pvp serverler listesi </a> |</li>
			<li><a href="<?=$siteayarlari["siteadresi"]?>bombom" class="color-grey-500" title="BomBom pvp serverler">BomBom Pvp Serverler</a> |</li>
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
<script type="text/javascript" src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/js/form.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/jquery-form/jquery.form.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/formvalidation/dist/js/formValidation.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/formvalidation/dist/js/framework/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/plugins/formvalidation/dist/js/language/tr_TR.js"></script>
<script type="text/javascript" src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>


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
	<script type="text/javascript">
			
            CKEDITOR.replace( 'tanitim',
                {
                    toolbar :
                    [
                ['Undo','Redo'],
                ['Image','Link','Unlink'],
                ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],	
                ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                ['BidiLtr', 'BidiRtl'],
                '/',
                ['Styles','Format','Font','FontSize'],
                ['TextColor','BGColor'],
                ['Maximize', 'ShowBlocks']
            
                    ]
					
					
                });
				
            
            CKEDITOR.replace("tanitim");
            </script>
			 <script type="text/javascript" src="<?=$siteayarlari["siteadresi"]?>/tema/tasarim/ckeditor/ckeditor.js"></script>

  </body>

</html>